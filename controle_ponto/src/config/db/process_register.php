<?php
session_start();
header('Content-Type: application/json');

include 'conn.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (
    !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) &&
    !empty($_POST['confirm_password']) && !empty($_POST['gender']) && !empty($_POST['role'])
  ) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    if ($password !== $confirmPassword) {
      $response['message'] = "As senhas não coincidem.";
    } else {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $query = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
      $query->bind_param("s", $email);
      $query->execute();
      $result = $query->get_result();

      if ($result->num_rows > 0) {
        $response['message'] = "Email já está em uso.";
      } else {
        $insertQuery = $conn->prepare("INSERT INTO usuarios (name, email, password, gender, role) VALUES (?, ?, ?, ?, ?)");
        $insertQuery->bind_param("sssss", $_POST['name'], $email, $hashedPassword, $gender, $role);

        if ($insertQuery->execute()) {
          $response['success'] = true;
          $response['message'] = "Usuário registrado com sucesso!";
        } else {
          $response['message'] = "Erro ao registrar o usuário.";
        }
      }
    }
  } else {
    $response['message'] = "Por favor, preencha todos os campos.";
  }
}

echo json_encode($response);
