<?php
session_start();
header('Content-Type: application/json');
date_default_timezone_set('America/Sao_Paulo');

include 'conn.php';

$response = ['success' => false, 'saldo_geral' => '0h00min', 'ultimo_registro' => null, 'saldo_mes' => null];

if (!isset($_SESSION['user_id'])) {
  echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
  exit;
}

$user_id = $_SESSION['user_id'];

$mes_atual = date('m');
$ano_atual = date('Y');

$query = $conn->prepare("SELECT data_hora_entrada, data_hora_saida FROM registros WHERE user_id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

$total_horas = 0;
$total_minutos = 0;
$total_horas_mes = 0;
$total_minutos_mes = 0;
$ultimo_registro = null;

while ($row = $result->fetch_assoc()) {
  if ($row['data_hora_saida']) {
    $entrada = new DateTime($row['data_hora_entrada']);
    $saida = new DateTime($row['data_hora_saida']);
    $intervalo = $entrada->diff($saida);

    $total_horas += $intervalo->h;
    $total_minutos += $intervalo->i;

    $ultimo_registro = $row['data_hora_saida'];

    if ($entrada->format('m') == $mes_atual && $entrada->format('Y') == $ano_atual) {
      $total_horas_mes += $intervalo->h;
      $total_minutos_mes += $intervalo->i;
    }
  }
}

$total_horas += floor($total_minutos / 60);
$total_minutos %= 60;

$saldo_geral = sprintf('%dh%02dmin', $total_horas, $total_minutos);
$response['saldo_geral'] = $saldo_geral;

$total_horas_mes += floor($total_minutos_mes / 60);
$total_minutos_mes %= 60;

$saldo_mes = ($total_horas_mes > 0 || $total_minutos_mes > 0)
  ? sprintf('%dh%02dmin', $total_horas_mes, $total_minutos_mes)
  : null;

$response['saldo_mes'] = $saldo_mes;

if ($ultimo_registro) {
  $ultimo_registro_dt = new DateTime($ultimo_registro);
  $response['ultimo_registro'] = [
    'data' => $ultimo_registro_dt->format('d/m/y'),
    'hora' => $ultimo_registro_dt->format('H\hi\m\i\n')
  ];
}

$response['success'] = true;

echo json_encode($response);
