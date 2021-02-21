<?php

class BaseDeDonnees{
    
    public static function getConnexion()
{
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $baseName = 'espace_membre';
        $host = 'localhost';
        $login = 'root';
        $password = '';
    
        $pdo = new PDO('mysql:dbname=' .$baseName. ';host=' .$host, $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}