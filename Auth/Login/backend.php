<?php
$username = $_POST["ra"];
$senha = $_POST["password"];

include('../../Config/conexao_bd.php');
$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $query = "SELECT * FROM `alunos` WHERE `aluno_ra` = " . $username . " AND `aluno_senha` = '" . $senha . "'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $retorno_do_banco = $stmt->fetch(); 
    if ($retorno_do_banco) {
      session_start();

      $_SESSION["username"] = $retorno_do_banco['aluno_nome'];
      $_SESSION["ra"] = $retorno_do_banco['aluno_ra'];
 
      header("Location: ../../Home");
    } else {
      echo "Aluno não encontrado. Tente novamente";
    }
  } catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
  }
} else {
  echo "Falha na conexão.";
}
