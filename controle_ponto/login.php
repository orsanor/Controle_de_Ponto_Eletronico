<?php
session_start();
$title = "Login Page";
include 'components/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<style>
  #message {
    min-height: 20px;
    margin-top: -6px;
    font-size: 13px;
  }
</style>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row shadow rounded-3" style="width: 60%; background-color: #f5faff;">
      <div class="logo col-md-6 d-none d-md-flex justify-content-center align-items-center">
        <img src="img/logo.png" alt="Ilustração" class="img-fluid">
      </div>
      <div class="col-md-6 p-4">
        <h3 class="text-center mb-4">Bem-vindo ao Controle de Ponto</h3>
        <form id="loginForm">
          <div class="mb-3">
            <label for="email" class="form-label">Matricula</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Insira sua matricula">
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
          </div>
          <p id="message"></p>
          <button type="submit" class="btn btn-primary w-100 mt-2">Entrar</button>
        </form>
        <button type="submit" class="btn btn-primary w-100 mt-1"
          onclick="location.href='pages/register.php'">Registrar</button>
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
            const data = response;
            if (data.success) {
              window.location.href = 'pages/record.php';
            } else {
              $('#message').css('visibility', 'visible').html(data.message);
            }
          }
        });
      });
    });
  </script>
</body>

</html>