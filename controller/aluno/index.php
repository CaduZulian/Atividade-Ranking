<?php
include_once('../../services/conexao_bd.php');

function getAlunos()
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getAlunosQuery = "SELECT * FROM `alunos`";
      $stmt = $conn->prepare($getAlunosQuery);
      $stmt->execute();

      $responseGetAlunos = $stmt->fetchAll();

      if ($responseGetAlunos) {
        return $responseGetAlunos;
      } else {
        echo "Nenhum aluno encontrado.";
      }
    } catch (PDOException $e) {
      echo "Erro na consulta: " . $e->getMessage();
    }
  } else {
    echo "Falha na conexão.";
  }
}

function postAluno($name, $ra, $password)
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getAlunoQuery = "SELECT * FROM `alunos` WHERE `ra` = " . $ra;
      $stmt = $conn->prepare($getAlunoQuery);
      $stmt->execute();

      $responseGetAluno = $stmt->fetch();

      if ($responseGetAluno) {
        echo "Aluno já cadastrado.";
      } else {
        $registerAlunoQuery = "INSERT INTO `alunos` (`name`, `ra`, `password`) VALUES ('" . $name . "', " . $ra . ", '" . $password . "')";
        $stmt = $conn->prepare($registerAlunoQuery);
        $stmt->execute();

        $responseRegisterAluno = $stmt->fetch();

        if ($responseRegisterAluno) {
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
}

function putAluno($id, $name, $ra, $password)
{
  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
      $getAlunoQuery = "SELECT * FROM `alunos` WHERE `id` = " . $id;
      $stmt = $conn->prepare($getAlunoQuery);
      $stmt->execute();

      $responseGetAluno = $stmt->fetch();

      if ($responseGetAluno) {
        $updateAlunoQuery = "UPDATE `alunos` SET `name` = '" . $name . "', `ra` = " . $ra . ", `password` = '" . $password . "' WHERE `id` = " . $id;
        $stmt = $conn->prepare($updateAlunoQuery);
        $stmt->execute();

        $responseUpdateAluno = $stmt->fetch();

        if ($responseUpdateAluno) {
          echo "Erro ao atualizar aluno. Tente novamente";
        } else {
          echo "Aluno atualizado com sucesso.";
        }
      } else {
        return "Aluno não encontrado.";
      }
    } catch (PDOException $e) {
      return "Erro na consulta: " . $e->getMessage();
    }
  } else {
    return "Falha na conexão.";
  }
}
