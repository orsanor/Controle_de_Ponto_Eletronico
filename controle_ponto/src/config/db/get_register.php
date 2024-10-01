<?php
session_start();
header('Content-Type: application/json');
date_default_timezone_set('America/Sao_Paulo');

include 'conn.php';

$response = ['success' => false, 'data' => []];

if (!isset($_SESSION['user_id'])) {
  echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
  exit;
}

$user_id = $_SESSION['user_id'];

$query = $conn->prepare("SELECT data_hora_entrada, data_hora_saida FROM registros WHERE user_id = ? ORDER BY data_hora_entrada DESC");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
  $data_entrada = date('d/m/Y', strtotime($row['data_hora_entrada']));
  $hora_entrada = date('H:i:s', strtotime($row['data_hora_entrada']));
  $hora_saida = $row['data_hora_saida'] ? date('H:i:s', strtotime($row['data_hora_saida'])) : '---';


  $horas_trabalhadas = '---';
  if ($row['data_hora_saida']) {
    $entrada = new DateTime($row['data_hora_entrada']);
    $saida = new DateTime($row['data_hora_saida']);
    $intervalo = $entrada->diff($saida);
    $horas_trabalhadas = $intervalo->format('%H:%I:%S');
  }

  $response['data'][] = [
    'data' => $data_entrada,
    'entrada' => $hora_entrada,
    'saida' => $hora_saida,
    'horas_trabalhadas' => $horas_trabalhadas
  ];
}

$response['success'] = true;
echo json_encode($response);
