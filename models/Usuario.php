<?php
// models/Usuario.php

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    // Propiedades del objeto Usuario
    public $id;
    public $nombre;
    public $correo;
    public $password;
    public $rol; // 'comprador' o 'vendedor'

    // Constructor estándar para enlazar la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo usuario
    public function registrar() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, correo, password, rol) VALUES (:nombre, :correo, :password, :rol)";
        
        $stmt = $this->conn->prepare($query);

        // Limpiar datos para evitar inyecciones o caracteres rotos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $this->rol = htmlspecialchars(strip_tags($this->rol));

        // Encriptar la contraseña antes de guardarla
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        // Vincular valores
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":password", $password_hash);
        $stmt->bindParam(":rol", $this->rol);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para buscar un usuario por su correo electrónico y validar login
    public function loginPorCorreo() {
        $query = "SELECT id_usuario, nombre, password, rol FROM " . $this->table_name . " WHERE correo = :correo LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $this->correo = htmlspecialchars(strip_tags($this->correo));
        $stmt->bindParam(":correo", $this->correo);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        return false;
    }
}
?>