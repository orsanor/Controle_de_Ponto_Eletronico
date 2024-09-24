<?php
session_start();
$title = "Bater ponto";
include '../public/components/header.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../public/css/ponto.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light w-100" style="background-color: white;">
        <div class="container-fluid">
            <img src="../public/img/logo.png" height="40" alt="Logo" loading="lazy" />
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="ponto.php">Bater ponto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="record.php">Relatórios</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-warning" onclick="location.href='../config/db/logout.php'">
                    Sair
                    <i class="fa-solid fa-person-walking-arrow-right" style="padding: 2px"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-title">
            <div class="welcome-text">
                <p>Olá, <?php echo htmlspecialchars($_SESSION['username']); ?> 😉<br>
                    Registre o seu ponto agora!</p>
                <div class="date_time">
                    <div id="current-date"></div>
                    <div id="clock"></div>
                </div>
            </div>

            <div class="info-container">
                <div class="saldos">
                    <div class="saldo-container">
                        <div class="saldo">
                            <span>Saldo mês</span>
                            <p class="saldo-valor">+0h00min</p>
                        </div>
                    </div>
                    <div class="saldo-container" style="background-color: #dde7ef">
                        <div class="saldo" >
                            <span>Saldo geral</span>
                            <p class="saldo-valor">+0h00min</p>
                        </div>
                    </div>
                </div>
                <div class="ultimo-registro">
                    Último registro no dia 24/09/24, às 00h00min
                </div>
            </div>
        </div>
        <button class="my-button btn btn-warning" type="button" href="#">Bater ponto</button>
    </div>

    <script>
        function formatDate(date) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('pt-BR', options);
        }

        function displayCurrentDate() {
            const today = new Date();
            const formattedDate = formatDate(today);
            document.getElementById('current-date').innerText = formattedDate;
        }

        displayCurrentDate();

        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}`;
        }

        setInterval(updateClock, 1000);
        updateClock();
    </script>

    <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>