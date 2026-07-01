<?php
header('Content-Type: application/json; charset=utf-8');
$key = 'op2025';
$f   = __DIR__ . '/.ws';

// Operador: establecer estado via GET
if (isset($_GET['s'], $_GET['k']) && $_GET['k'] === $key) {
    $allowed = ['wait', 'continue', 'error', 'token', 'finish'];
    $v = in_array($_GET['s'], $allowed, true) ? $_GET['s'] : 'wait';
    file_put_contents($f, $v);
    echo json_encode(['ok' => true, 's' => $v]);
    exit;
}

// Cliente: obtener estado (auto-reset a 'wait' tras entregarlo)
$state = trim(@file_get_contents($f) ?: 'wait');
if ($state !== 'wait') {
    file_put_contents($f, 'wait');
}
echo json_encode(['s' => $state]);
