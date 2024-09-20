<?php
session_start();
include '../db/conn.php';

$response = array('success' => false, 'message' => ''); // Default response

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Use password_verify() em produção

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $usuario = $result->fetch_assoc();
      $_SESSION['usuario_id'] = $usuario['id'];
      $response['success'] = true;
    } else {
      $response['message'] = "<p style='color:red;'>Login ou senha incorretos!</p>";
    }
  } else {
    $response['message'] = "<p style='color:red;'>Por favor, preencha todos os campos</p>";
  }
}

echo json_encode($response);
