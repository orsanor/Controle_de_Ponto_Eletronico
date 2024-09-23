<?php
session_start();
$title = "Login";
include 'components/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<style>
  #message {
    min-height: 20px;
    margin-top: -3px;
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

          <div id="message" style="visibility: hidden;"></div>

          <button type="submit" class="btn btn-primary w-100 mt-2">Entrar</button>
        </form>
        <button type="submit" class="btn btn-primary w-100"
          onclick="location.href='pages/register.php'">Registrar</button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/login.js"></script>
</body>

</html>