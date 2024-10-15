<?php
session_start();
$title = "Editar Registro";
include '../config/db/conn.php';
include '../public/components/header.php';

$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if ($id !== null) {
  $query = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
  $query->bind_param("i", $id);
  $query->execute();
  $result = $query->get_result();
  $row_usuario = $result->fetch_assoc();
}
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
        <h3 class="text-center mb-3 mt-3">Edite seu usuário</h3>
        <form id="editForm">
          <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Insira seu nome completo"
              value="<?php echo $row_usuario['name']; ?>">
          </div>
          <div class=" mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Essa será sua matrícula"
              value="<?php echo $row_usuario['email']; ?> ">
          </div>
          <div class=" mb-3">
            <label for="role" class="form-label">Cargo</label>
            <select class="form-select" name="role" id="role" required>
              <option selected>Selecione um cargo de TI</option>
              <option value="Desenvolvedor" <?php echo ($row_usuario['role'] === 'Desenvolvedor') ? 'selected' : ''; ?>>
                Desenvolvedor</option>
              <option value="Analista de Sistemas" <?php echo ($row_usuario['role'] === 'Analista de Sistemas') ? 'selected' : ''; ?>>Analista de Sistemas</option>
              <option value="Analista de Dados" <?php echo ($row_usuario['role'] === 'Analista de Dados') ? 'selected' : ''; ?>>Analista de Dados</option>
              <option value="Administrador de Sistemas" <?php echo ($row_usuario['role'] === 'Administrador de Sistemas') ? 'selected' : ''; ?>>Administrador de Sistemas</option>
              <option value="Engenheiro de Redes" <?php echo ($row_usuario['role'] === 'Engenheiro de Redes') ? 'selected' : ''; ?>>Engenheiro de Redes</option>
              <option value="Gerente de Projetos" <?php echo ($row_usuario['role'] === 'Gerente de Projetos') ? 'selected' : ''; ?>>Gerente de Projetos</option>
              <option value="Engenheiro de Qualidade" <?php echo ($row_usuario['role'] === 'Engenheiro de Qualidade') ? 'selected' : ''; ?>>Engenheiro de Qualidade</option>
              <option value="Designer de Experiência do Usuário" <?php echo ($row_usuario['role'] === 'Designer de Experiência do Usuário') ? 'selected' : ''; ?>>Designer de Experiência do Usuário</option>
              <option value="Engenheiro DevOps" <?php echo ($row_usuario['role'] === 'Engenheiro DevOps') ? 'selected' : ''; ?>>Engenheiro DevOps</option>
              <option value="Especialista em Segurança" <?php echo ($row_usuario['role'] === 'Especialista em Segurança') ? 'selected' : ''; ?>>Especialista em Segurança</option>
              <option value="Cientista de Dados" <?php echo ($row_usuario['role'] === 'Cientista de Dados') ? 'selected' : ''; ?>>Cientista de Dados</option>
              <option value="Arquiteto de Software" <?php echo ($row_usuario['role'] === 'Arquiteto de Software') ? 'selected' : ''; ?>>Arquiteto de Software</option>
              <option value="Desenvolvedor Front-end" <?php echo ($row_usuario['role'] === 'Desenvolvedor Front-end') ? 'selected' : ''; ?>>Desenvolvedor Front-end</option>
              <option value="Desenvolvedor Back-end" <?php echo ($row_usuario['role'] === 'Desenvolvedor Back-end') ? 'selected' : ''; ?>>Desenvolvedor Back-end</option>
              <option value="Consultor de TI" <?php echo ($row_usuario['role'] === 'Consultor de TI') ? 'selected' : ''; ?>>Consultor de TI</option>
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
          <div class="mb-3">
            <label for="gender">Gênero</label> <br>
            <select class="form-select" name="gender" id="gender">
              <option selected>Selecione seu gênero</option>
              <option value="homem" <?php echo ($row_usuario['gender'] === 'homem') ? 'selected' : ''; ?>>Homem</option>
              <option value="mulher" <?php echo ($row_usuario['gender'] === 'mulher') ? 'selected' : ''; ?>>Mulher
              </option>
              <option value="outros" <?php echo ($row_usuario['gender'] === 'outros') ? 'selected' : ''; ?>>Outros
              </option>
            </select>
          </div>

          <div id="message" style="visibility: hidden;"></div>

          <button type="submit" class="btn btn-primary w-100 mt-1">Editar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/6943b72b92.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="..\public\js\edit.js"></script>
</body>

</html>