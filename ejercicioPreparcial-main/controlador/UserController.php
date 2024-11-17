<?php

require_once 'modelo/User.php';


class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn); // Asegúrate de que tienes un modelo UserModel
    }

    public function procesarLogin($username, $password) {
        // Aquí debes validar el inicio de sesión
        return $this->userModel->validarUsuario($username, $password);
    }
}
?>