<?php
class Database {
    private string $host = "localhost";
    private string $db = "placement_db";
    private string $user = "root";
    private string $pass = "";
    public function connect(): PDO {
        return new PDO(
            "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4",
            $this->user, $this->pass,
            [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]
        );
    }
}
$db=(new Database())->connect();
?>