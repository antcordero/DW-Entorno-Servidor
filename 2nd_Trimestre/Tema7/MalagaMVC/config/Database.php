<?php
class Database
{
    private static ?PDO $instance = null;

    private string $host = 'localhost';
    private string $db_name = 'malaga_db';
    private string $username = 'root';
    private string $password = '';

    private function __construct()
    {
        try {
            //DSN de conexión a MySQL con charset utf8
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            self::$instance = new PDO($dsn, $this->username, $this->password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            new self();
        }
        return self::$instance;
    }
}
