<?php
$name = $_POST["name"];
$description = $_POST["description"];
$maxValue = $_POST["maxValue"];

include_once("../../controller/atividade/index.php");
include_once('../../services/conexao_bd.php');

$db = new Database();
$conn = $db->connect();

if ($conn) {
  try {
    $getExamQuery = "SELECT * FROM `atividades` WHERE `name` = '" . $name . "'";
    $stmt = $conn->prepare($getExamQuery);
    $stmt->execute();

    $responseGetUser = $stmt->fetch();
    if ($responseGetUser) {
      echo "Atividade já cadastrada.";
    } else {
      postAtividade($name, $description, $maxValue);
    }
  } catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
  }
} else {
  echo "Falha na conexão.";
}
?>
