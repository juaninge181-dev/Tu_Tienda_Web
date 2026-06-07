<?php
// config/conexion.php

class Database {
    private $host = "localhost";
    private $db_name = "tu_tienda_web"; // Así llamaremos a la base de datos en phpMyAdmin
    private $username = "root";         // Usuario por defecto en XAMPP
    private $password = "";             // Contraseña vacía por defecto en XAMPP
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Configurar para que muestre errores si algo sale mal
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Forzar codificación UTF-8 para evitar problemas con acentos o la Ñ
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión a la base de datos: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>