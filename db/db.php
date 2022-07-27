<?php

class Database {
    public PDO $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'pwpb';

    public string $tablename;
    public function __construct()
    {
        $this->conn = new PDO("mysql:={$this->host};dbname={$this->dbname}",$this->user, $this->pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        if(!$this->conn){
            echo 'failed';
        }
    }
    public function query(string $q){
         return $this->conn->query($q)->fetchAll();
    }
}

$db = new Database();

?>