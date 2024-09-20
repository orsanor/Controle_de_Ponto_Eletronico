<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/navbar.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Relatorio</title>
</head>
<style>
  body {
    text-align: center;
    color: #004c94;
    background-color: white;
  }

  thead {
    color: white;
    background-color: #F7941D;
  }

  table {
    margin-top: 20px;
  }

  h2 {
    display: flex;
    justify-content: center;
  }
</style>

<body>
  <nav>
    <div>
      <img class="logo" src="../img/logo.png" alt="">
    </div>
    <div class="linkstart">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#">Cadastro</a></li>
        <li><a class="sair" href="../login.php">SAIR</a></li>
      </ul>
    </div>
  </nav>

  <h1>Seu relatorio</h1>
  <h2>Bem vindo<p id="">ᅠ (nome do funcionario)</p>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>