<?php 
// Classe pour la connexion à la base de données
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "base2";
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie à la base de données.";
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        return $this->conn;
    }

    public function close() {
        $this->conn = null;
    }
}


?>