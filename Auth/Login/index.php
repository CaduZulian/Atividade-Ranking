<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION["username"])) {
  header("Location:../../Home");
}
?>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../Config/defaultStyle.css" />
  <link rel="stylesheet" href="./styles.css" />

  <title>Ranking | Login</title>
</head>

<body>
  <main class="container">
    <form action="./" method="post" class="form">
      <h1>Login</h1>

      <div class="input">
        <label for="ra">RA</label>
        <input type="number" name="ra" id="ra" />
      </div>

      <div class="input">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" />
        <a href="../ResetPassword" target="_blank" rel="noopener noreferrer">
          Esqueci minha senha
        </a>
      </div>

      <button type="submit" class="button-primary" style="margin-top: 1rem">
        Login
      </button>

      <div class="line">
        <hr />

        <span>Não possui usuário?</span>

        <hr />
      </div>

      <a href="../Register" class="button-secondary">Cadastrar</a>
    </form>

    <script>
      const form = document.querySelector('.form');

      form.addEventListener('submit', (event) => {
        const ra = document.querySelector('#ra').value;
        const password = document.querySelector('#password').value;

        if (ra === '' || password === '') {
          event.preventDefault();
          alert('Preencha todos os campos');
        }
      });
    </script>
  </main>
</body>

</html>