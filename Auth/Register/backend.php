<?php
$ra = $_POST["ra"];
$username = $_POST["username"];
$password = $_POST["password"];

include('../../Config/conexao_bd.php');
$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $getUserQuery = "SELECT * FROM `alunos` WHERE `aluno_ra` = " . $ra;
    $stmt = $conn->prepare($getUserQuery);
    $stmt->execute();

    $responseGetUser = $stmt->fetch();
    if ($responseGetUser) {
      echo "Aluno já cadastrado.";
    } else {
      $registerUserQuery = "INSERT INTO `alunos` (`aluno_ra`, `aluno_senha`, `aluno_nome`) VALUES (" . $ra . ", '" . $password . "', '" . $username . "')";
      $stmt = $conn->prepare($registerUserQuery);
      $stmt->execute();

      $responseRegisterUser = $stmt->fetch();

      if ($responseRegisterUser) {
        echo "Erro ao cadastrar aluno. Tente novamente";
      } else {
        echo "Aluno cadastrado com sucesso.";
      }
    }
  } catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
  }
} else {
  echo "Falha na conexão.";
}
