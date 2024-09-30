<?php
session_start();
$title = "Relatorio";
include '../public/components/header.php';

if (!isset($_SESSION['usuario_id'])) {
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../public/css/record.css" />
<link rel="stylesheet" href="../public/css/sidebar.css" />
<html lang="pt-br">
<style>
  .card_perfil {}

  .card_perfil img {
    margin-top: 10px;
    margin-left: 10px;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
  }

  .card_perfil h2 {
    margin: 0;
    font-size: 24px;
  }

  .card_perfil p {
    color: gray;
    margin: 5px 0;
  }
</style>

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

      <main class="col-md-8 ms-sm-auto col-lg-10 main-content">
        <div class="card card_perfil col-10" style="margin-bottom: 20px;">
          <div class="header_perfil">
            <img src="../public/img/logo.png">
            <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
            <p>Analista de TI</p>
          </div>
          <div class="hours"></div>
        </div>

        <div class="card tabela col-10">
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


  <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>