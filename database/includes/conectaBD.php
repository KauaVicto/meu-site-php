<?php
session_start();

require_once "Classes/config.php";

/* Conecta ao banco de dados */
$con = mysqli_connect(Banco::getServidor(), Banco::getUser(), Banco::getSenha(), Banco::getDatabase());

if(!$con){
    die("Houve um erro na conexão com o banco! ".mysqli_connect_error());
}