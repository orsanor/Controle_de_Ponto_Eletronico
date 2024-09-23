<?php
session_start();
$title = "Relatorio";
include '../public/components/header.php';

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../public/css/record.css" />
<html lang="pt-br">

<style>
  .btn-secondary {
    background-color: #fca549;
    border: none;
  }

  .btn-secondary:hover {
    background-color: #f7941d;
  }

  .nav-link {
    font-weight: bold;
    color: #004c97;
    margin-left: 25px;
    margin-top: 2px;
    font-size: 16px;
  }

  .navbar {
    border-bottom: 3px solid #f38c00;
  }

  .nav-link:hover {
    color: #fca549;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light w-100" style="background-color: white;">
    <div class="container-fluid">
      <img src="../public/img/logo.png" height="40" alt="Logo" loading="lazy" style="margin-top: -1px;" />

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="ponto.php">Bater Ponto</a>
        </li>
      </ul>

      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-secondary" onclick="location.href='../config/db/logout.php'">
          Sair
          <i class="fa-solid fa-person-walking-arrow-right" style="padding: 2px"></i>
        </button>
      </div>
    </div>
  </nav>

  <h1 style="margin-top: 50px">Seu relatorio</h1>
  </h2>
  <div class="d-flex col-12 justify-content-center">
    <div class="col-6">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Horário de Entrada</th>
            <th scope="col">Horário de Saída</th>
            <th scope="col">Horas Trabalhadas</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">19/09/2024</th>
            <td id="">12:00,00</td>
            <td id="">18:00,00</td>
            <td id="">06:00,00</td>
          </tr>
          <tr>
            <th scope="row">17/09/2024</th>
            <td id="">12:00,00</td>
            <td id="">18:00,00</td>
            <td id="">06:00,00</td>
          </tr>
          <tr>
            <th scope="row">16/09/2024</th>
            <td id="">12:00,00</td>
            <td id="">18:00,00</td>
            <td id="">06:00,00</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>