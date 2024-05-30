<?php 
  session_start();

  if(isset($_SESSION["username"])) {
    header("Location:./pages/Home");
  } else {
    header("Location:./pages/Auth/Login");
  }
?>