<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Concurso de disfraces de Halloween</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#disfraces-list">Ver Disfraces</a></li>
            <li><a href="#registro">Registro</a></li>
            <li><a href="#login">Iniciar Sesión</a></li>
            <li><a href="#admin">Panel de Administración</a></li>
        </ul>
    </nav>
    <header>
        <h1>Concurso de disfraces de Halloween</h1>
    </header>
    <main>
        <?php 
        require_once 'controlador/DisfrazController.php';
        require_once 'database/conexion.php';
        
        $disfrazController = new DisfrazController($conn);
        $disfraces = $disfrazController->mostrarDisfraces();    
        ?>


        <section id="disfraces-list" class="section">
            <!-- Aquí se mostrarán los disfraces -->
        <?php if (!empty($disfraces)): ?>
        <?php foreach ($disfraces as $disfraz): ?>
            <div class="disfraz">
                <h2><?php echo htmlspecialchars($disfraz['nombre']); ?></h2>
                <p><?php echo htmlspecialchars($disfraz['descripcion']); ?></p>
                <p><img src="imagenes/<?php echo htmlspecialchars($disfraz['foto']); ?>" width="100%"></p>
                <button class="votar" data-id="<?php echo $disfraz['id']; ?>">Votar</button>
            </div>
            <hr>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No hay disfraces disponibles.</p>
        <?php endif; ?><!--
            <div class="disfraz">
                <h2>Disfraz 1</h2>
                <p>Descripción del Disfraz 1</p>
                <p><img src="imagenes/fondo.jpg" width="100%"></p>
                <button class="votar">Votar</button>
            </div>
            <hr>
            <div class="disfraz">
                <h2>Disfraz 2</h2>
                <p>Descripción del Disfraz 2</p>
                <p><img src="imagenes/fondo.jpg" width="100%"></p>
                <button class="votar">Votar</button>
            </div> 
             Repite la estructura para más disfraces -->
        
        </section>
        <section id="registro" class="section">
            <h2>Registro</h2>
            <form action="procesar_registro.php" method="POST">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Registrarse</button>
            </form>
        </section>
        <?php
require_once 'database/conexion.php';
require_once 'controlador/UserController.php';

// Crear instancia del controlador de usuarios
$userController = new UserController($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] === 'login') {
    // Procesar el inicio de sesión
    $username = $_POST['login-username'];
    $password = $_POST['login-password'];

    $mensaje = $userController->procesarLogin($username, $password);
    if (isset($mensaje)) {
        echo $mensaje; // Muestra el mensaje de error si es necesario
    }
} else { ?>
    <section id="login" class="section">
            <h2>Iniciar Sesión</h2>
            <form action="index.php?action=login" method="POST">
                <label for="login-username">Nombre de Usuario:</label>
                <input type="text" id="login-username" name="login-username" required>
                
                <label for="login-password">Contraseña:</label>
                <input type="password" id="login-password" name="login-password" required>
                
                <button type="submit">Iniciar Sesión</button>
            </form>
        </section>
<<?php }?>
        
        <section id="admin" class="section">
        <h2>Panel de Administración</h2>
            <form action="index.php?action=login" method="POST">
                <label for="login-username">Nombre de Usuario:</label>
                <input type="text" id="login-username" name="login-username" required>
                
                <label for="login-password">Contraseña:</label>
                <input type="password" id="login-password" name="login-password" required>
                
                <button type="submit">Iniciar Sesión</button>
            </form>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>
</html>
