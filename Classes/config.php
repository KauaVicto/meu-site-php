<?php

/* Configuração do banco de dados */

class Banco {
    private static $servidor = 'localhost';
    private static $user = 'root';
    private static $senha = '';
    private static $database = 'sistemalogin';

    public static function getServidor(){
        return self::$servidor;
    }
    public static function getUser(){
        return self::$user;
    }
    public static function getSenha(){
        return self::$senha;
    }
    public static function getDatabase(){
        return self::$database;
    }
}
