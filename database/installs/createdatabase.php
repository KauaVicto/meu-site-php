<?php

require_once "../../Classes/config.php";

/* Conecta ao servidor */
$con = mysqli_connect(Banco::getServidor(), Banco::getUser(), Banco::getSenha());

if(!$con){
    die("Erro ao conectar no banco ".mysqli_connect_error());
}

/* Código SQL para criar o banco de dados */
$sql = "CREATE DATABASE ".Banco::getDatabase();
$result = mysqli_query($con, $sql);

if(!$result){
    die("Erro ao criar o banco ".mysqli_error($con));
}else{
    echo "Banco ".Banco::getDatabase()." criado com sucesso!";
}