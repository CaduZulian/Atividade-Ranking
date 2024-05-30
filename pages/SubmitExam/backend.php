<?php
$aluno = $_POST["aluno"];
$atividade = $_POST["atividade"];
$grade = $_POST["grade"];
$comments = $_POST["comments"];

include_once("../../controller/entregaAtividade/index.php");
include_once('../../services/conexao_bd.php');

$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $getSubmitQuery = "SELECT * FROM `entrega_atividade` WHERE `idAluno` = " . $aluno . " AND `idAtividade` = " . $atividade;
    $stmt = $conn->prepare($getSubmitQuery);
    $stmt->execute();

    $responseGetSubmit = $stmt->fetch();

    if ($responseGetSubmit) {
      echo "Entrega já cadastrada.";
    } else {
      postEntrega($aluno, $atividade, $grade, $comments);
    }
  } catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
  }
} else {
  echo "Falha na conexão.";
}
?>
