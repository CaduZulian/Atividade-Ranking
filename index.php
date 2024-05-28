<?php 
  session_start();

  if(isset($_SESSION["username"])) {
    header("Location:./Home");
  } else {
    header("Location:./Auth/Login");
  }
?>