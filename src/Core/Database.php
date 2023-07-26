<?php

namespace App\Core;

class Database
{
    private static $host = 'localhost';
    private static $dbname = 'car_location';
    private static $username = 'root';
    private static $password = '';
    private static $connection;

    public static function connect()
    {
        // on verifie si $connection a déjà été créer, si c'est pas le cas on la crée
        // desing pattern Singleton : permet d'eviter d'appeler une ressource inutilement  
        if (!isset(self::$connection)){

            try{
                self::$connection = new \PDO(
                    'mysql:host='.self::$host .';dbname=' . self::$dbname . ';charset=utf8',
                    self:: $username, 
                    self::$password,
                    [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION], 
                );
            }
            
            catch(\PDOException $e){
                die("Erreur de connection à la base de donnée". $e->getMessage());
            }
        }
            
       
    }

    static public function getConnection()
    {
        return self::$connection;
    }
}