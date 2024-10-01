<?php
session_start();
header('Content-Type: application/json');
date_default_timezone_set('America/Sao_Paulo');

include 'conn.php';

$response = ['success' => false, 'message' => ''];

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit;
}

$user_id = $_SESSION['user_id'];
$data_hora_atual = date('Y-m-d H:i:s');
$data_atual = date('Y-m-d');

$query_check = $conn->prepare("SELECT id FROM registros WHERE user_id = ? AND data_hora_saida IS NULL AND DATE(data_hora_entrada) = ?");
$query_check->bind_param("is", $user_id, $data_atual);
$query_check->execute();
$query_check->store_result();

if ($query_check->num_rows > 0) {
    $query_update = $conn->prepare("UPDATE registros SET data_hora_saida = ? WHERE user_id = ? AND data_hora_saida IS NULL AND DATE(data_hora_entrada) = ?");
    $query_update->bind_param("sis", $data_hora_atual, $user_id, $data_atual);

    if ($query_update->execute()) {
        $response['success'] = true;
        $response['message'] = 'Saída registrada com sucesso!';
    } else {
        $response['message'] = 'Erro ao registrar a saída.';
    }
} else {
    $query_insert = $conn->prepare("INSERT INTO registros (user_id, data_hora_entrada) VALUES (?, ?)");
    $query_insert->bind_param("is", $user_id, $data_hora_atual);

    if ($query_insert->execute()) {
        $response['success'] = true;
        $response['message'] = 'Entrada registrada com sucesso!';
    } else {
        $response['message'] = 'Erro ao registrar a entrada.';
    }
}

echo json_encode($response);
