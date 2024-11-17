<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para agregar un usuario con contraseña cifrada
    public function agregarUsuario($nombre, $clave) {
        $claveCifrada = password_hash($clave, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, clave) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nombre, $claveCifrada);
        return $stmt->execute();
    }

    public function validarUsuario($username, $password) {
        // Consulta para obtener el usuario
        $sql = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si el usuario existe
        if ($usuario = $result->fetch_assoc()) {
            // Verificar la contraseña ingresada
            if (password_verify($password, $usuario['clave'])) {
                return $usuario; // Retorna los datos del usuario si la validación es correcta
            }
        }
        return null; // Retorna null si no hay coincidencia
    }
}
?>