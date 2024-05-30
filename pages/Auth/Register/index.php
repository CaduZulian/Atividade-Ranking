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
  <link rel="stylesheet" href="../../../styles/globalStyle.css" />
  <link rel="stylesheet" href="./styles.css" />

  <title>Ranking | Cadastre-se</title>
</head>

<body>
  <main class="container">
    <form action="./backend.php" method="post" class="form">
      <h1>Cadastre-se</h1>

      <div class="input">
        <label for="ra">Informe seu RA</label>
        <input type="number" name="ra" id="ra" />
      </div>

      <div class="input">
        <label for="username">Informe seu Nome</label>
        <input type="text" name="username" id="username" />
      </div>

      <div class="input">
        <label for="password">Informe sua Senha</label>
        <input type="password" name="password" id="password" />
      </div>

      <div class="input">
        <label for="confirm_password">Confirme sua Senha</label>
        <input type="password" name="confirm_password" id="confirm_password" />
      </div>

      <button type="submit" class="button-primary" style="margin-top: 1rem">
        Cadastrar
      </button>
    </form>

    <script>
      const form = document.querySelector('.form');

      form.addEventListener('submit', (event) => {
        const ra = document.querySelector('#ra').value;
        const username = document.querySelector('#username').value;
        const password = document.querySelector('#password').value;
        const confirm_password = document.querySelector('#confirm_password').value;

        if (ra === '' || username === '' || password === '' || confirm_password === '') {
          event.preventDefault();
          alert('Preencha todos os campos');
        } else if (password.length < 6) {
          event.preventDefault();
          alert('Senha deve ter no mínimo 6 caracteres');
        } else if (password !== confirm_password) {
          event.preventDefault();
          alert('Senhas não conferem');
        }
      });
    </script>
  </main>
</body>

</html>