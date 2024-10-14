<?php
session_start();
header('Content-Type: application/json');

include 'conn.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        !empty($_POST['email']) && !empty($_POST['name']) &&
        !empty($_POST['gender']) && !empty($_POST['role']) &&
        !empty($_POST['id'])
    ) {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if (!empty($password) || !empty($confirmPassword)) {
            if ($password !== $confirmPassword) {
                $response['message'] = "As senhas não coincidem.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $updateQuery = $conn->prepare("UPDATE usuarios SET name = ?, email = ?, role = ?, gender = ?, password = ? WHERE id = ?");
                $updateQuery->bind_param("sssssi", $name, $email, $role, $gender, $hashedPassword, $id);
            }
        } else {
            $updateQuery = $conn->prepare("UPDATE usuarios SET name = ?, email = ?, role = ?, gender = ? WHERE id = ?");
            $updateQuery->bind_param("ssssi", $name, $email, $role, $gender, $id);
        }

        if ($updateQuery->execute()) {
            $response['success'] = true;
            $response['message'] = "Usuário editado com sucesso!";
        } else {
            $response['message'] = "Erro ao editar o usuário.";
        }
    } else {
        $response['message'] = "Por favor, preencha todos os campos.";
    }
}

echo json_encode($response);
