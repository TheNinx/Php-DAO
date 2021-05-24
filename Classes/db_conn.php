<?php


class db_conn
{
    private static $instance;

    public static function getConn(){

        if(!isset(self::$instance )){

            self::$instance = new PDO('mysql:host=localhost;dbname=clientes', 'root','');

        }

        return self::$instance;
    }

}