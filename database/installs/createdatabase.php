<?php

require_once "../includes/config.php";

$con = mysqli_connect(SERVIDOR, USUARIO, SENHA);

if(!$con){
    die("Erro ao conectar no banco ".mysqli_connect_error());
}

$sql = "CREATE DATABASE ".BD;

$result = mysqli_query($con, $sql);

if(!$result){
    die("Erro ao criar o banco ".mysqli_error($con));
}else{
    echo "Banco ".BD." criado com sucesso!";
}