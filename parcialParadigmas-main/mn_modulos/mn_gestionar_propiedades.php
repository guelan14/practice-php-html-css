<?php
include 'mn_modulos/mn_conexion.php'; // Incluye la conexión a la base de datos

// Crear una propiedad
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ubicacion = $_POST['ubicacion'];
    $destacada = isset($_POST['destacada']) ? 1 : 0; // Verifica si el checkbox está marcado

    // Consulta para insertar una nueva propiedad
    $sql = "INSERT INTO propiedades (titulo, descripcion, precio, ubicacion, destacada) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsd", $titulo, $descripcion, $precio, $ubicacion, $destacada);
    if ($stmt->execute()) {
        echo "<p>Propiedad creada exitosamente.</p>";
    } else {
        echo "<p>Error al crear la propiedad: " . $conn->error . "</p>";
    }
}


// Eliminar una propiedad
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
    $id_propiedad = $_POST['id_propiedad'];

    // Consulta para eliminar una propiedad
    $sql = "DELETE FROM propiedades WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_propiedad);
    if ($stmt->execute()) {
        echo "<p>Propiedad eliminada exitosamente.</p>";
    } else {
        echo "<p>Error al eliminar la propiedad: " . $conn->error . "</p>";
    }
}

// Consulta para obtener todas las propiedades (para mostrar en la lista)
$sql = "SELECT * FROM propiedades";
$result = $conn->query($sql);
?>

<h2>Gestionar Propiedades</h2>

<!-- Formulario para crear una nueva propiedad -->
<form method="POST">
    <h3>Crear Propiedad</h3>
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>
    
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea>
    
    <label for="precio">Precio:</label>
    <input type="number" name="precio" required>
    
    <label for="ubicacion">Ubicación:</label>
    <input type="text" name="ubicacion" required>
    
    <label for="destacada">¿Es destacada?</label>
    <input type="checkbox" name="destacada" value="1"> <!-- Checkbox para destacada -->

    <button type="submit" name="crear">Crear Propiedad</button>
</form>

<!-- Lista de propiedades con opción para eliminar -->
<h3>Eliminar Propiedad</h3>
<ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li>
            <?php echo htmlspecialchars($row['titulo']); ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id_propiedad" value="<?php echo $row['id']; ?>">
                <button type="submit" name="eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta propiedad?');">Eliminar</button>
            </form>
        </li>
    <?php endwhile; ?>
</ul>
