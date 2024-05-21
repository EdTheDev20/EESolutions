<?php
class Database{
protected $servername;
protected $username;
protected $password;
private static $instance=NULL;

public static function getInstance($servername='127.0.0.1:3306',$username='root',$password='') {

    if (!isset(self::$instance)) {
        try {
            self:: $instance = new PDO("mysql:host=$servername;
            dbname=eesolutions"
            ,$username
            ,$password);
            self:: $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    return self::$instance;
}

}






?>