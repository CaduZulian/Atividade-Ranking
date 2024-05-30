<?php
$ra = $_POST["ra"];
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

    $getUserResponse = $stmt->fetch();
    if ($getUserResponse) {
      putAluno($getUserResponse['id'], $getUserResponse['name'], $ra, $password);
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
