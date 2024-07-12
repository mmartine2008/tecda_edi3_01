<?php
    require_once('config/config.php');

    class Model {

        private $db = null;

        function create_connection() {
            global $config;
        
            // Atencion: Modificar esto segun la instalacion:
            $host = $config['database']['host'];
            $userName = $config['database']['userName'];
            $password = $config['database']['password'];
            $database = $config['database']['databasename'];
            $port = $config['database']['port'];
            
            try {
                $dsn = "pgsql:host=$host;port=$port;dbname=$database;";
            
                return new PDO($dsn, $userName, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
            } catch (Exception $e) {
                debug_print_backtrace();
                var_dump($e);
                die(__FILE__.":".__LINE__);
            }
        
        } 
        
        function __construct() {
            $this->db = $this->create_connection();
        }

        function getDb() {
            return $this->db;
        }
    }