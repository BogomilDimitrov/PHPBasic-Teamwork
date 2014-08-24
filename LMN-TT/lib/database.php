<?php
//$host = DB_HOST;
//$username = DB_USER;
//$password = DB_PASS;
//$dbname = DB_NAME;
//
//try{
//    $db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
//}catch (PDOException $e){
//    echo($e -> getMessage());
//}


class Database{
    private static  $db = null;

    public function __construct(){
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASS;
        $dbname = DB_NAME;

        $db = new \PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        self::$db = $db;
    }
    public static function get_db() {
        return self::$db;
    }
}