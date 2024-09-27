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
<link rel="stylesheet" href="../public/css/record_1.css" />
<link rel="stylesheet" href="../public/css/sidebar.css" />
<html lang="pt-br">


<body>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="sidebar">
        <div class="sidebar-content">
          <img src="../public/img/logo.png" class="logo" alt="Logo" loading="lazy" />
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="ponto.php">
                <i class="fas fa-clock"></i>
                <span class="link-text">Bater ponto</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="record.php">
                <i class="fas fa-file-alt"></i>
                <span class="link-text">Relatórios</span>
              </a>
            </li>
          </ul>
          <button type="button" class="btn logout-btn" onclick="location.href='../config/db/logout.php'">
            Sair
            <i class="fa-solid fa-person-walking-arrow-right"></i>
          </button>
        </div>
      </nav>

      <main class="col-md-8 ms-sm-auto col-lg-8 main-content">
        <h1>Seu relatório</h1>
        <div class="d-flex col-12 justify-content-center">
          <div class="col-6">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Horário de Entrada</th>
                  <th>Horário de Saída</th>
                  <th>Horas Trabalhadas</th>
                  <th>Carga Horária</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <td scope="row" class="date">19/09/2024</td>
                  <td id="">12:00</td>
                  <td id="">18:00</td>
                  <td id="">06:00</td>
                  <td id="">08:00</td>
                </tr>
                <tr>
                  <td scope="row" class="date">17/09/2024</td>
                  <td id="">12:00</td>
                  <td id="">18:00</td>
                  <td id="">06:00</td>
                  <td id="">08:00</td>
                </tr>
                <tr>
                  <td scope="row" class="date">16/09/2024</td>
                  <td id="">12:00</td>
                  <td id="">18:00</td>
                  <td id="">06:00</td>
                  <td id="">08:00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>


  <script>
    document.getElementById('toggle-btn').addEventListener('click', function () {
      var sidebar = document.getElementById('sidebar');
      var content = document.querySelector('.main-content');
      sidebar.classList.toggle('collapsed');
    });
  </script>
  <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>