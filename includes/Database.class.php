<?php
    class Database{
        private $host = 'localhost:8889';
        private $user = 'test';
        private $password = 'test';
        private $database = 'code_pills';

        public function getConnection(){
            $hostDB = "mysql:host=".$this->host.";dbname=".$this->database.";";

            try{
                $connection = new PDO($hostDB,$this->user,$this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $connection;
            } catch(PDOException $e){
                die("ERROR: ".$e->getMessage());
            }

        }
    }


?>