<?php

class BaseDeDonnee{
    
    public static function getConnexion(){
        
        $baseName = 'promotemyjam';
        $host = 'localhost';
        $login = '';
        $password = '';
    
        $pdo = new PDO('mysql:dbname=' .$baseName. ';host=' .$host, $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }

}