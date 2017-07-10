<?php

namespace Example;

class Connection {
	
    private static $_instance = null;

    private function __construct(){}
    
    function __destruct(){}
    
	public function __clone()
    {
        return false;
    }
	
    public function __wakeup()
    {
        return false;
    }
	
    public static function get_instance()
	{
        if (!isset(self::$_instance)) {
            self::$_instance = new Connection();
        }
        return self::$_instance;
    }
	
    public function get_connection($database, $username, $password)
	{
        $connection = null;
        try {
            $connection = new \PDO('mysql:host=localhost;dbname='.$database, $username, $password);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
            
        } catch (PDOException $e) {
            throw $e;
        }
        catch(Exception $e) {
            throw $e;
        }
    }
	
}
