<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../styles/globalStyle.css" />
  <link rel="stylesheet" href="./styles.css" />

  <title>Ranking | Home</title>
</head>

<body>
  <nav class="navBar">
    <span class="welcome">
      <?php
      session_start();

      if (!isset($_SESSION["username"])) {
        header("Location:../Auth/Login");
      } else {
        echo "Bem-vindo, " . $_SESSION["username"];
      }
      ?>
    </span>

    <h1 class="logo">
      <a href="#">
        FAI Ranking
      </a>
    </h1>

    <ul class="links">
      <li><a href="../RegisterExam">Cadastrar atividade</a></li>
      <li><a href="../SubmitExam/">Registrar entrega</a></li>
      <li><a href="../Logout">Sair</a></li>
    </ul>
  </nav>

  <main>
      <section class="container">
        <h3>Ranking</h3>

        <table>
          <thead>
            <tr>
              <th>Nome</th>
              <th>RA</th>
              <th>Pontos</th>
              <th>Pontuação Total</th>
              <th>Atividades Entregues</th>
              <th>Atividades Pendentes</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once("../../controller/entregaAtividade/index.php");

            $entregas = getEntregas();

            foreach ($entregas as $entrega) {
              echo "<tr>";
              echo "<td>" . $entrega['name'] . "</td>";
              echo "<td>" . $entrega['ra'] . "</td>";
              echo "<td>" . $entrega['points'] . "</td>";
              echo "<td>" . $entrega['totalPoints'] . "</td>";
              echo "<td>" . $entrega['submits'] . "</td>";
              echo "<td>" . $entrega['pendings'] . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
  </main>
</body>

</html>