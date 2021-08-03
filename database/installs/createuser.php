<?php
    require_once "../includes/conectaBD.php";

    /* Dados do usuário padrão */
    $nome = "Admin";
    $login = "admin";
    $email = "admin@gmail.com";
    $senha = sha1("12345");
    
    /* Código SQL para criar o usuário padrão */
    $sql = "INSERT INTO usuario(nome, login, email, senha) VALUES ('$nome', '$login', '$email', '$senha')";
    
    $result = mysqli_query($con, $sql);

    if(!$result){
        die("Erro ao salvar o usuário padrão no banco. ".mysqli_error($con));
    }else{
        echo "<h1>Usuário padrão cadastrado com sucesso!</h1>";
    }