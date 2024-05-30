<?php
include_once('../../services/conexao_bd.php');

function getEntregas()
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getEntregasQuery = "SELECT 
      alunos.name, 
      alunos.ra, 
      COALESCE(SUM(entrega_atividade.grade) / total_atividades.total, 0) AS points, 
      COALESCE(SUM(entrega_atividade.grade), 0) AS totalPoints, 
      COUNT(entrega_atividade.id) AS submits,
      (total_atividades.total - COUNT(entrega_atividade.id)) AS pendings
    FROM 
      alunos
    LEFT JOIN 
      entrega_atividade ON entrega_atividade.idAluno = alunos.id
    LEFT JOIN 
      atividades ON entrega_atividade.idAtividade = atividades.id
    CROSS JOIN 
      (SELECT COUNT(id) AS total FROM atividades) AS total_atividades
    GROUP BY 
      alunos.id, alunos.name, alunos.ra, total_atividades.total
    ORDER BY 
      points DESC;
  ";

      $stmt = $conn->prepare($getEntregasQuery);
      $stmt->execute();

      $responseGetEntregas = $stmt->fetchAll();

      if ($responseGetEntregas) {
        return $responseGetEntregas;
      } else {
        echo "Nenhuma entrega encontrada.";
      }
    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
  } else {
    echo "Falha na conexão.";
  }
}

function postEntrega($aluno, $atividade, $grade, $comments)
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getEntregaQuery = "SELECT * FROM `entrega_atividade` WHERE `idAluno` = " . $aluno . " AND `idAtividade` = " . $atividade;
      $stmt = $conn->prepare($getEntregaQuery);
      $stmt->execute();

      $responseGetEntrega = $stmt->fetch();

      if ($responseGetEntrega) {
        echo "Entrega já cadastrada.";
      } else {
        $registerEntregaQuery = "INSERT INTO `entrega_atividade` (`idAluno`, `idAtividade`, `grade`, `comments`) VALUES (" . $aluno . ", " . $atividade . ", " . $grade . ", '" . $comments . "')";
        $stmt = $conn->prepare($registerEntregaQuery);
        $stmt->execute();

        $responseRegisterEntrega = $stmt->fetch();

        if ($responseRegisterEntrega) {
          echo "Erro ao cadastrar entrega. Tente novamente";
        } else {
          echo "Entrega cadastrada com sucesso.";
        }
      }
    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
  } else {
    echo "Falha na conexão.";
  }
}
