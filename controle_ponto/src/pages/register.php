<?php
session_start();
$title = "Registro";
include '../public/components/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<style>
  .btn-secondary {
    background-color: #fca549;
    border: none;
  }

  .btn-secondary:hover {
    background-color: #f7941d;
  }

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
        <img src="..\public\img\logo.png" alt="Ilustração" class="img-fluid">
      </div>
      <div class="col-md-6 p-4">
        <button type="submit" class="btn btn-secondary w-40" onclick="location.href='login.php'">
          <i class="fa-solid fa-arrow-left"></i>
          Voltar
        </button>
        <h3 class="text-center mb-3 mt-3">Registre-se</h3>
        <form id="registrationForm">
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Insira seu nome completo">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Essa será sua matrícula">
          </div>
          <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <select class="form-select" name="cargo" id="cargo" required>
              <option selected>Selecione um cargo de TI</option>
              <option value="developer">Desenvolvedor</option>
              <option value="data_analyst">Analista de Dados</option>
              <option value="system_admin">Administrador de Sistemas</option>
              <option value="network_engineer">Engenheiro de Redes</option>
              <option value="project_manager">Gerente de Projetos</option>
              <option value="qa_engineer">Engenheiro de Qualidade</option>
              <option value="ux_designer">Designer de Experiência do Usuário</option>
              <option value="devops_engineer">Engenheiro DevOps</option>
              <option value="security_specialist">Especialista em Segurança</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="genero">Gênero</label> <br>
            <select class="form-select" name="genero" id="genero">
              <option selected>Selecione seu genero</option>
              <option value="homem">Homem</option>
              <option value="mulher">Mulher</option>
              <option value="prefiro não informa">Prefiro não informar</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Crie sua senha">
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmar Senha</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password"
              placeholder="Confirme sua senha">
          </div>

          <div id="message" style="visibility: hidden;"></div>

          <button type="submit" class="btn btn-primary w-100 mt-1">Registrar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="..\public\js\register.js"></script>
</body>

</html>