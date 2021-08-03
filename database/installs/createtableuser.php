<?php
    require_once "../includes/conectaBD.php"; /* Conecta ao banco de dados */

    /* Código SQL para criar a tabela usuário */
    $sql = "CREATE TABLE usuario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(40),
        email VARCHAR(40),
        login VARCHAR(15) NOT NULL,
        senha VARCHAR(100) NOT NULL
    )";

    $result = mysqli_query($con, $sql);

    if(!$result){
        die("Erro ao criar a tabela de usuário ".mysqli_error($con));
    }else{
        echo "<h2>Tabela usuário criado com sucesso!</h2>";
    }
