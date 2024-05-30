<?php
$ra = $_POST["ra"];
$username = $_POST["username"];
$password = $_POST["password"];

include_once("../../../controller/aluno/index.php");
include_once('../../../services/conexao_bd.php');

$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $getUserQuery = "SELECT * FROM `alunos` WHERE `ra` = " . $ra;
    $stmt = $conn->prepare($getUserQuery);
    $stmt->execute();

    $responseGetUser = $stmt->fetch();
    if ($responseGetUser) {
      echo "Aluno já cadastrado.";
    } else {
      postAluno($username, $ra, $password);
    }
  } catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
  }
} else {
  echo "Falha na conexão.";
}
?>
