<?php
include 'mn_conexion.php'; // Incluye la conexión a la base de datos

// Procesar el registro
if (isset($_POST['nombre']) && isset($_POST['clave'])) {
    // Verifico que no exista el usuario
    $sql = "SELECT * FROM usuarios WHERE nombre='" . $_POST['nombre'] . "'";
    $sql = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($sql) != 0) {
        echo "<script>alert('Error: el usuario ya existe en la BD.');</script>";
    } else {
        // Inserto el usuario nuevo
        $sql = "INSERT INTO usuarios (nombre, clave) VALUES ('" . $_POST['nombre'] . "', '" . password_hash($_POST['clave'], PASSWORD_DEFAULT) . "')";
        $sql = mysqli_query($conn, $sql);
        
        if (mysqli_error($conn)) {
            echo "<script>alert('Error: no se pudo insertar el registro');</script>";
        } else {
            echo "<script>alert('Registro insertado con éxito');</script>";
        }
    }
    // Limpio el POST    
    echo "<script>window.location='index.php?modulo=procesar_registro';</script>";
}
?>


<section id="registro" class="section">
    <h2>Registro</h2>
    <form action="index.php?modulo=procesar_registro" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>
        
        <button type="submit">Registrarse</button>
    </form>
</section>


