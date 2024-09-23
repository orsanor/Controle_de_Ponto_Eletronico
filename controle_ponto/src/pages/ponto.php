<?php
session_start();
$title = "Ponto";
include '../public/components/header.php';
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../public/css/ponto.css" />
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

    .nav-link:hover {
        color: #f7941d;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light w-100" style="background-color: #D9DEE1;">
        <div class="container-fluid">
            <img src="../public/img/logo.png" height="40" alt="Logo" loading="lazy" style="margin-top: -1px;" />

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="record.php">Relatórios</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-secondary" onclick="location.href='login.php'">
                    Sair
                    <i class="fa-solid fa-person-walking-arrow-right" style="padding: 2px"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="card">
        <div>
            Olá, <?php echo htmlspecialchars($_SESSION['username']); ?>, registre o seu ponto agora!
            <p class="card-text">
            <div class="date_time">
                <div id="current-date"></div>
                <div id="clock"></div>
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
            </script>
            </p>


            <script>
                function updateClock() {
                    const now = new Date();
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');

                    document.getElementById('clock').textContent = `${hours}:${minutes}`;
                }

                setInterval(updateClock, 1000);
                updateClock(); 
            </script>
        </div>
        <button class="my-button btn btn-secondary" type="button" href="#">Bater ponto</button>
    </div>

    <div class="date" id="current-date"></div>

    <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>

</script>

</html>