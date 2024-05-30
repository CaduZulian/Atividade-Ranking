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

  <title>Ranking | Registrar Entrega</title>
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
      <a href="../Home">
        FAI Ranking
      </a>
    </h1>

    <ul class="links">
      <li><a href="../RegisterExam/">Cadastrar atividade</a></li>
      <li><a href="#">Registrar entrega</a></li>
      <li><a href="../Logout">Sair</a></li>
    </ul>
  </nav>

  <main>
    <section class="container">
      <h3>Registrar Entrega</h3>

      <form action="./backend.php" method="post" class="form">

        <div class="input">
          <label for="aluno">Aluno que entregou</label>
          <select name="aluno" id="aluno">
            <?php
            include_once("../../controller/aluno/index.php");

            $alunos = getAlunos();

            foreach ($alunos as $aluno) {
              echo "<option value='" . $aluno['id'] . "'>" . $aluno['name'] . "</option>";
            }
            ?>
          </select>
        </div>

        <div class="input">
          <label for="atividade">Atividade entregue</label>
          <select name="atividade" id="atividade">
            <?php
            include_once("../../controller/atividade/index.php");

            $atividades = getAtividades();

            foreach ($atividades as $atividade) {
              echo "<option value='" . $atividade['id'] . "'>" . $atividade['name'] . "</option>";
            }
            ?>
          </select>
        </div>

        <div class="input">
          <label for="grade">Nota</label>
          <input type="number" name="grade" id="grade" />
        </div>

        <div class="input">
          <label for="comments">Observações</label>
          <textarea name="comments" id="comments"></textarea>
        </div>

        <button type="submit" class="button-primary">
          Cadastrar
        </button>
      </form>

      <script>
        const form = document.querySelector('.form');

        form.addEventListener('submit', (event) => {
          const aluno = document.querySelector('#aluno').value;
          const atividade = document.querySelector('#atividade').value;
          const grade = document.querySelector('#grade').value;
          const comments = document.querySelector('#comments').value;

          if (aluno === '' || atividade === '' || grade === '' || comments === '') {
            event.preventDefault();
            alert('Preencha todos os campos');
          } else if (grade < 0) {
            event.preventDefault();
            alert('Nota deve ser maior que 0');
          } else if (grade > 10) {
            event.preventDefault();
            alert('Nota deve ser menor que 10');
          }
        });
      </script>
    </section>
  </main>
</body>

</html>