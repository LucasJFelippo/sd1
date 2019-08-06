<?php
    session_start();
    $_SESSION['user'] = $_COOKIE['user'];
    $_SESSION['email'] = $_COOKIE['email'];
    header('Location: ../arqform.html');
?>