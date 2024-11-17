<?php
require_once 'database/conexion.php';

class DisfrazModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerTodos() {
        $sql = "SELECT id, nombre, descripcion, foto FROM disfraces WHERE eliminado = 0";
        $result = $this->conn->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function incrementarVoto($id) {
        $sql = "UPDATE disfraces SET votos = votos + 1 WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function agregarDisfraz($nombre, $descripcion, $votos, $foto, $foto_blob) {
        $sql = "INSERT INTO disfraces (nombre, descripcion, votos, foto, foto_blob) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        
        // Ligando parámetros
        $stmt->bind_param("ssiss", $nombre, $descripcion, $votos, $foto, $foto_blob);

        // Ejecutar la consulta y verificar si se insertó correctamente
        if ($stmt->execute()) {
            return true; // o puedes devolver el ID del nuevo disfraz
        } else {
            return false; // o manejar el error
        }
    }
}
?>
