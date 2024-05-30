<?php
$ra = $_POST["ra"];
$password = $_POST["password"];

include('../../Config/conexao_bd.php');
$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $getUserQuery = "SELECT * FROM `alunos` WHERE `aluno_ra` = " . $ra;
    $stmt = $conn->prepare($getUserQuery);
    $stmt->execute();

    $getUserResponse = $stmt->fetch();
    if ($getUserResponse) {
      $resetPasswordUserQuery = "UPDATE `alunos` SET `aluno_senha` = '" . $password . "' WHERE `aluno_ra` = " . $ra;

      $stmt = $conn->prepare($resetPasswordUserQuery);
      $stmt->execute();

      $resetPasswordUserResponse = $stmt->fetch();

      if ($resetPasswordUserResponse) {
        echo "Erro ao alterar senha. Tente novamente";
      } else {
        echo "Senha alterada com sucesso.";
      }
    } else {
      echo "Aluno não encontrado. Tente novamente";
    }
  } catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
  }
} else {
  echo "Falha na conexão.";
}
