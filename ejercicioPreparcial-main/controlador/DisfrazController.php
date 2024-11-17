<?php
require_once 'modelo/Disfraz.php';

class DisfrazController {
    private $disfrazModel;

    public function __construct($conn) {
        $this->disfrazModel = new DisfrazModel($conn);
    }

    public function mostrarDisfraces() {
        return $this->disfrazModel->obtenerTodos();
    }

    public function agregarDisfraz($nombre, $descripcion, $votos, $foto, $foto_blob) {
        return $this->disfrazModel->agregarDisfraz($nombre, $descripcion, $votos, $foto, $foto_blob);
    }

    public function votarDisfraz($id) {
        return $this->disfrazModel->incrementarVoto($id);
    }
}
?>
