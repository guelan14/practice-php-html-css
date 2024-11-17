<?php 
include("includes/conexion.php");
conectar();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla Fachera</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Aquí va el encabezado</h1>
    </header>
    
    <div class="contenedor">
        <section>
          
            <h2>modulo1</h2>
            <p>Aquí puede ir un poco de texto</p>
            <?php
            if(isset($_GET['modulo']))
            {
                include ('modulos/'.$_GET['modulo'].'.php');
            }
            else
            {
                ?>
                <h2>Bienvenido a nuestra página</h2>
                <p>Este es el contenido principal de la página. Aquí puedes colocar cualquier información relevante.</p>
                <?php
            }
            ?>
            
        </section>
        <aside>
            <p>Modulos</p>
            <div class="modulos">
                <a href="?modulo=modulo"><button>Modulo 1</button></a>
        
            </div>
        </aside>
    </div>

    <footer>
        <p>Este es el pie de página</p>
    </footer>
</body>

</html>
