<?php
include 'mn_conexion.php'; // Incluye la conexión a la base de datos

// Consulta para obtener todas las propiedades
$sql = "SELECT * FROM propiedades";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result(); // Obtén el resultado

?>

<h2>Lista de Propiedades</h2>
<div class="property-list">
    <?php while ($propiedad = $result->fetch_assoc()): ?> <!-- Usamos fetch_assoc() en un bucle while -->
        <div class="property-item">
            <h3><?php echo htmlspecialchars($propiedad['titulo']); ?></h3>
            <p><?php echo htmlspecialchars($propiedad['descripcion']); ?></p>
            <p><strong>Precio:</strong> $<?php echo htmlspecialchars($propiedad['precio']); ?></p>
            <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($propiedad['ubicacion']); ?></p>
        </div>
    <?php endwhile; ?>
</div>
