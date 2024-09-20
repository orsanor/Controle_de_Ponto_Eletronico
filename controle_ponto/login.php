<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row shadow rounded-3" style="width: 60%; background-color: #f5faff;">
      <!-- Imagem para ajustar -->
      <div class="logo col-md-6 d-none d-md-flex justify-content-center align-items-center">
        <img src="img/logo.png" alt="Ilustração" class="img-fluid">
      </div>
      <!-- Formulário de login -->
      <div class="col-md-6 p-4">
        <!-- <div class="text-end">
          <a href="#" class="text-primary">Não tem uma conta? <strong>Sign up</strong></a>
        </div> -->
        <h3 class="text-center mb-4">Bem-Vindo ao Controle de Ponto</h3>
        <form id="loginForm">
          <div class="mb-3">
            <label for="email" class="form-label">Matricula</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Insira sua matricula">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
          </div>
          <div id="message"></div>
          <button type="submit" class="btn btn-primary w-100 mt-2">Entrar</button>
          <button type="submit" class="btn btn-primary w-100 mt-2">Registrar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#loginForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
          url: 'db/process_login.php',
          type: 'POST',
          data: $(this).serialize(),
          success: function (response) {
            const data = JSON.parse(response);

            if (data.success) {
              window.location.href = 'pages/record.php';
            } else {
              $('#message').html(data.message);
            }
          }
        });
      });
    });
  </script>
</body>

</html>