<?php
    session_start();

    /* Executa o sair */
    $_SESSION['logado'] = false;
    header("location: index.php");