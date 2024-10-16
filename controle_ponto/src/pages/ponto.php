<?php
session_start();
$title = "Bater ponto";
include '../public/components/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../public/css/ponto.css" />
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
                <div class="card mt-3">
                    <div class="card-title">
                        <div class="welcome-text">
                            <p>Olá, <?php echo htmlspecialchars($_SESSION['username']); ?> 😉<br>
                                Registre o seu ponto agora!</p>
                            <div class="date_time">
                                <div id="current-date"></div>
                                -
                                <div id="clock"></div>
                            </div>
                        </div>

                        <div class="info-container">
                            <div class="saldos">
                                <div class="saldo-container">
                                    <div class="saldo">
                                        <span>Saldo mês</span>
                                        <p class="saldo-mes">+0h00min</p>
                                    </div>
                                </div>
                                <div class="saldo-container" style="background-color: #dde7ef">
                                    <div class="saldo">
                                        <span>Saldo geral</span>
                                        <p class="saldo-valor">+0h00min</p>
                                    </div>
                                </div>
                            </div>
                            <div class="ultimo-registro">
                                Último registro no dia --/--/--, às --h--min
                            </div>
                        </div>
                    </div>
                    <button class="my-button btn btn-warning" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Bater ponto</button>
                </div>
            </main>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Registre seu Ponto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" label="close"></button>
                </div>
                <div class="modal-body">
                    <div id="message">Para bater o ponto, clique em "Bater".</div>
                </div>
                <div class="modal-footer">
                    <form id="baterPonto">
                        <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <button type="submit" class="button_bater btn btn-warning">Bater</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/date.js"></script>
    <script src="../public/js/ponto.js"></script>
    <script src="../public/js/get_total_hours.js"></script>
</body>

</html>