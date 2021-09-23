<?php
    session_start();

    /* Executa o sair */
    unset($_SESSION['logado']);
    unset($_SESSION['login']);
    header("location: index.php");