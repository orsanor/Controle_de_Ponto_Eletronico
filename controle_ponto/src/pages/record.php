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
            <i class="fa-solid fa-person-walking-arrow-right"></i>
            <span class="link-text">Sair</span>
          </button>
        </div>
      </nav>

      <main class="col-md-8 ms-sm-auto col-lg-8 main-content">
        <div class="card tabela col-12">
          <div class="card-body">
            <h1 class="card-title" style="color: #004c94;">Seu relatório</h1>
            <?php
            echo "
    <div class='d-flex col-12 justify-content-center'>
      <div class='col-6'>
        <table class='table table-bordered''>
          <thead>
            <tr style='text-align: center;color: #004c94;background-color: white'>
              <th scope='col' style='text-align: center; color: white;background-color: #F7941D'>Data</th>
              <th scope='col' style='text-align: center; color: white;background-color: #F7941D'>Horário de Entrada</th>
              <th scope='col' style='text-align: center; color: white;background-color: #F7941D'>Horário de Saída</th>
              <th scope='col' style='text-align: center; color: white;background-color: #F7941D'>Horas Trabalhadas</th>
            </tr>
          <thead>
        <tbody class='table-group-divider'>  
      ";
            echo "<tr style='text-align: center;color: #004c94;background-color: white'><td class='date' scope='row' >" . "27/09/2024" . "</th>";
            echo "<td id='Hen'> " . "12:00,00" . "</td>";
            echo "<td id='Hsa'>" . "18:00,00" . "</td>";
            echo "<td id='Hto'></td></tr>";
            echo "
        </tbody>
      </table>
    </div>
  </div>
";
            ?>
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