<?php
include_once('../../services/conexao_bd.php');

function getAtividades()
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getAtividadesQuery = "SELECT * FROM `atividades`";
      $stmt = $conn->prepare($getAtividadesQuery);
      $stmt->execute();

      $responseGetAtividades = $stmt->fetchAll();

      return $responseGetAtividades;
    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
  } else {
    echo "Falha na conexão.";
  }
}

function postAtividade($name, $description, $maxValue)
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getAtividadeQuery = "SELECT * FROM `atividades` WHERE `name` = '" . $name . "'";
      $stmt = $conn->prepare($getAtividadeQuery);
      $stmt->execute();

      $responseGetAtividade = $stmt->fetch();

      if ($responseGetAtividade) {
        echo "Atividade já cadastrada.";
      } else {
        $registerAtividadeQuery = "INSERT INTO `atividades` (`name`, `description`, `maxValue`) VALUES ('" . $name . "', '" . $description . "', " . $maxValue . ")";
        $stmt = $conn->prepare($registerAtividadeQuery);
        $stmt->execute();

        $responseRegisterAtividade = $stmt->fetch();

        if ($responseRegisterAtividade) {
          echo "Erro ao cadastrar atividade. Tente novamente";
        } else {
          echo "Atividade cadastrada com sucesso.";
        }
      }
    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
  } else {
    echo "Falha na conexão.";
  }
}
