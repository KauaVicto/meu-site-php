<?php
    session_start();

    /* Executa o sair */
    unset($_SESSION['logado']);
    header("location: index.php");