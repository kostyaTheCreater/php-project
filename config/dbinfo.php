<?php
    namespace config;
    use \PDO;

    class DBInfo{
        private $conn;

        function __construct(){
            try{
                $this->conn = new PDO(
                    "mysql:host=localhost;port=3306;dbname=usersdb", 
                    "root", 
                    "compile1"
                );
            }catch(PDOexception $e){
                die($e->getMessage());
            }
        }

        public function getConn(){
            return $this->conn;
        }
    }

?>