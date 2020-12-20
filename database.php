<?php
class Database
{
    
     private static $dbHost="gestioncinema.c3lddd3hzr18.eu-west-3.rds.amazonaws.com";
     private static $dbName="GestionCinema";
     private static $dbUser="admin";
     private static $dbUserPassword="fD102004";
    
    private static $connection=null;
    
    public static function connect()
    {
            try
        {
                self::$connection=new PDO("mysql:host=" . self::$dbHost .";dbname=" . self::$dbName,self::$dbUser,self::$dbUserPassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
        }
           catch(PDOException $e)
           {
               die($e->getMessage());
           }
           return self::$connection;
    }
        
    public static function disconnect()
        {
            self::$connection=null;
        }
    
    
}

 Database::connect();

?>


