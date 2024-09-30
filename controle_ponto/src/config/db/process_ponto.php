<?php
session_start();
header('Content-Type: application/json');

include 'conn.php';

$response = ['success' => false, 'message' => ''];

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$data_hora_entrada = date('Y-m-d H:i:s');
$data_hora_saida = date('Y-m-d H:i:s');

$query = $conn->prepare("INSERT INTO registros (usuario_id, data_hora_entrada, data_hora_saida) VALUES (?, ?, ?)");
$query->bind_param("iss", $usuario_id, $data_hora_entrada, $data_hora_saida);

if ($query->execute()) {
    $response['success'] = true;
    $response['message'] = 'Registro inserido com sucesso!';
} else {
    $response['message'] = 'Erro ao inserir registro.';
}

echo json_encode($response);