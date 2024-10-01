<?php
session_start();
header('Content-Type: application/json');

include 'conn.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $passwordInput = $_POST['password'];

    $query = $conn->prepare("SELECT id, name, password FROM usuarios WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    $usuario = $result->fetch_assoc();

    if ($usuario) {
      if (password_verify($passwordInput, $usuario['password'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['username'] = $usuario['name'];
        $response['success'] = true;
        $response['user'] = [
          'id' => $usuario['id'],
          'name' => $usuario['name']
        ];
      } else {
        $response['message'] = "Login ou senha incorretos!";
      }
    } else {
      $response['message'] = "Usuário não encontrado!";
    }
  } else {
    $response['message'] = "Por favor, preencha todos os campos.";
  }
}

echo json_encode($response);
