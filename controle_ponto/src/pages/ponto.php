<?php
session_start();
$title = "Ponto";
include '../public/components/header.php';
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../public/css/ponto.css" />
<html lang="pt-br">

<body>
    <nav class="navbar navbar-light bg-body-tertiary">
        <div class="container-fluid">
            
            <!-- <a class="navbar-brand" href="#">
                <img src="../public/img/logo.png" height="45" alt="Logo" loading="lazy" class="logo"/>
            </a>
            <div class="teste">
                <ul>
                    <li><a href="record.php">Relatório</a></li>
                    <li><a href="login.php">Sair</a></li>
                </ul>
            </div> -->
        </div>
    </nav>

    <div class="card">
        <div>
            <h1 class="card-title">Olá, registre o seu ponto agora!</h1>
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
        <button class="my-button" type="button" href="#">Bater ponto</button>
    </div>

    <div class="date" id="current-date"></div>

    <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>

</script>

</html>