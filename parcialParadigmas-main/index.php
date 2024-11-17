<?php
session_start(); // Asegúrate de que esto esté al inicio

$modulo = $_GET['modulo'] ?? 'index.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia Inmobiliaria</title>
  <link rel="stylesheet" href="mn_css/mn_styles.css">
  <link rel="stylesheet" href="mn_css/mn_carrusel.css">
  <link rel="stylesheet" href="mn_css/mn_listar_propiedades.css">
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar">
      <a href="index.php" class="logo">Inmobiliaria XYZ</a>
      <ul class="nav-links">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="index.php?modulo=ver_propiedades">Propiedades</a></li>
        <div class="auth-buttons">
    <?php if (!empty($_SESSION['nombre_usuario'])): ?>
        <li><a class="btn-manage" href="index.php?modulo=gestionar_propiedades">Gestionar</a></li> 
        <li><span class="user-greeting" style="color: lightblue;">Hola <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>, ID: <?php echo htmlspecialchars($_SESSION['id']); ?></span></li>
        <li><a class="btn-logout btn-register" href="index.php?modulo=procesar_login&salir=ok">SALIR</a></li>
    <?php else: ?>
        <li><a class="btn-login" href="index.php?modulo=procesar_login">Iniciar Sesión</a></li>
        <li><a class="btn-register" href="index.php?modulo=procesar_registro">Registrarse</a></li>
    <?php endif; ?>
</div>
    </nav>
  </header>
  <?php
  // Lógica para mostrar el contenido según el módulo
  switch ($modulo) {
      case 'ver_propiedades':
          include 'mn_modulos/mn_ver_propiedades.php'; // Archivo para mostrar las propiedades
          break;
      case 'procesar_login':
          include 'mn_modulos/mn_procesar_login.php';
          break;
      case 'procesar_registro':
          include 'mn_modulos/mn_procesar_registro.php';
          break;
    case 'gestionar_propiedades':
    include 'mn_modulos/mn_gestionar_propiedades.php';
    break;
      default:
          ?>
          <!-- Sección Inicio -->
          <section id="inicio" class="hero">
            <h1>Bienvenido a Inmobiliaria XYZ</h1>
            <p>Encuentra la casa de tus sueños con nosotros.</p>
          </section>

                    <?php
            include 'mn_modulos/mn_conexion.php'; // Incluye la conexión a la base de datos

            // Consulta para obtener todas las propiedades
            $sql = "SELECT * FROM propiedades WHERE destacada = 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result(); // Obtiene el resultado de la consulta

            $propiedades_destacadas = [];
            while ($row = $result->fetch_assoc()) { // Cambiar fetchAll por un bucle
                $propiedades_destacadas[] = $row; // Agrega cada fila al arreglo
            }
            ?>

<div class="info-inmobiliaria">
        <h2>¿Por qué elegirnos?</h2>
        <div class="info-cards">
            <div class="info-card">
                <h3>Asesoría Personalizada</h3>
                <p>Nuestro equipo de expertos está aquí para guiarle en cada paso del proceso, asegurando que encuentre la opción perfecta que se ajuste a sus necesidades y presupuesto.</p>
            </div>
            <div class="info-card">
                <h3>Variedad de Opciones</h3>
                <p>Ya sea que busque comprar, alquilar o invertir, tenemos una variedad de propiedades disponibles para satisfacer sus deseos.</p>
            </div>
            <div class="info-card">
                <h3>Transparencia y Confianza</h3>
                <p>Nos comprometemos a mantener una comunicación clara y transparente durante toda la transacción, garantizando su confianza y satisfacción.</p>
            </div>
        </div>
    </div>


            <!-- Sección de Propiedades Destacadas -->
            <section id="destacadas" class="destacadas">
                <h2>Propiedades Destacadas</h2>
                <div class="rotador">
                    <?php if (count($propiedades_destacadas) > 0): ?>
                        <?php foreach ($propiedades_destacadas as $index => $propiedad): ?>
                            <div class="rotador-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <h3><?php echo htmlspecialchars($propiedad['titulo']); ?></h3>
                                <p><?php echo htmlspecialchars($propiedad['descripcion']); ?></p>
                                <p><strong>Precio:</strong> $<?php echo htmlspecialchars($propiedad['precio']); ?></p>
                                <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($propiedad['ubicacion']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay propiedades destacadas en este momento.</p>
                    <?php endif; ?>
                </div>
                <button id="prev" onclick="mn_cambiarPropiedad(-1)">&#10094; Anterior</button>
                <button id="next" onclick="mn_cambiarPropiedad(1)">Siguiente &#10095;</button>
            </section>

          <?php
          break;
  }
  ?>

<script src="mn_js/mn_script.js"></script>

</body>
<footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Inmobiliaria XYZ. Todos los derechos reservados.</p>
            <p>Dirección: Siempreviva, 742, Springfield</p>
            <p>Teléfono: (123) 456-7890</p>
        </div>
    </footer>
</html>
