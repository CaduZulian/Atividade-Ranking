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

  <title>Ranking | Cadastrar Atividade</title>
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
      <li><a href="#">Cadastrar atividade</a></li>
      <li><a href="../SubmitExam/">Registrar entrega</a></li>
      <li><a href="../Logout">Sair</a></li>
    </ul>
  </nav>

  <main>
    <section class="container">
      <h3>Cadastrar Atividade</h3>

      <form action="./backend.php" method="post" class="form">

        <div class="input">
          <label for="name">Nome</label>
          <input type="text" name="name" id="name" />
        </div>

        <div class="input">
          <label for="description">Descrição</label>
          <textarea name="description" id="description"></textarea>
        </div>

        <div class="input">
          <label for="maxValue">Nota máxima</label>
          <input type="number" name="maxValue" id="maxValue" />
        </div>

        <button type="submit" class="button-primary">
          Cadastrar
        </button>
      </form>

      <script>
        const form = document.querySelector('.form');

        form.addEventListener('submit', (event) => {
          const name = document.querySelector('#name').value;
          const description = document.querySelector('#description').value;
          const maxValue = document.querySelector('#maxValue').value;

          if (name === '' || description === '' || maxValue === '') {
            event.preventDefault();
            alert('Preencha todos os campos');
          } else if (maxValue < 0) {
            event.preventDefault();
            alert('Nota máxima deve ser maior que 0');
          } else if (maxValue > 10) {
            event.preventDefault();
            alert('Nota máxima deve ser menor que 10');
          }
        });
      </script>
    </section>
  </main>
</body>

</html>