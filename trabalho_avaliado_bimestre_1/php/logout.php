<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['email']);
    session_destroy();
    unset($_COOKIE['user']);
    unset($_COOKIE['email']);
    setcookie("user", null, -1, "/");
    setcookie("email", null, -1, "/");
    setcookie("status", true, time() + 5, "/");
    header('Location: ../');
?>