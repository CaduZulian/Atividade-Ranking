<?php
$ra = $_POST["ra"];
$password = $_POST["password"];

include_once("../../../controller/aluno/index.php");
include_once('../../../services/conexao_bd.php');

$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $query = "SELECT * FROM `alunos` WHERE `ra` = " . $ra . " AND `password` = '" . $password . "'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $retorno_do_banco = $stmt->fetch();
    if ($retorno_do_banco) {
      session_start();

      $_SESSION["username"] = $retorno_do_banco['name'];
      $_SESSION["ra"] = $retorno_do_banco['ra'];

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
?>
