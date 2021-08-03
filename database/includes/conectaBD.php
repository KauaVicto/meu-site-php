<?php
session_start();

require_once "config.php";

/* Conecta ao banco de dados */
$con = mysqli_connect(SERVIDOR, USUARIO, SENHA, BD);

if(!$con){
    die("Houve um erro na conexão com o banco! ".mysqli_connect_error());
}