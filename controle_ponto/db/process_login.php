<?php
session_start();
header('Content-Type: application/json');


include 'conn.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $passwordInput = $_POST['password'];


    $query = $conn->prepare("SELECT id, password FROM usuarios WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();


    if ($result->num_rows > 0) {
      $usuario = $result->fetch_assoc();


      if (password_verify($passwordInput, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $response['success'] = true;
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
