<?php
session_start();
header('Content-Type: application/json');

include 'conn.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $passwordInput = $_POST['password'];

    $query = $conn->prepare("SELECT id, name, password, role, gender FROM usuarios WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    $user = $result->fetch_assoc();

    if ($user) {
      if (password_verify($passwordInput, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['gender'] = $user['gender'];
        $response['success'] = true;
        $response['user'] = [
          'id' => $user['id'],
          'name' => $user['name']
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
