<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<h3>Formulario de Edad</h3>
<form action="" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" required><br><br>

    <input type="submit" value="Enviar">
</form>


<form action="pagina2.php" method="post">
    Ingrese primer valor:
    <input type="text" name="valor1">
    <br>
    Ingrese segundo valor:
    <input type="text" name="valor2">
    <br>
    <input type="radio" name="radio1" value="suma">sumar
    <br>
    <input type="radio" name="radio1" value="resta">restar
    <br>
    <input type="submit" name="operar">
  </form>

  <form action="" method="POST">
    <label for="nombre_deportes">Nombre: </label>
    <input type="text" id ="nombre_deportes" name="nombre_deportes" required> <br><br>
    <p>Deportes que practica: </p>
    <input type="checkbox" id="futbol" name="deportes[]" value="Futbol">
    <label for="futbol">Fútbol</label><br>

    <input type="checkbox" id="basket" name="deportes[]" value="Baloncesto">
    <label for="basket">Baloncesto</label><br>

    <input type="checkbox" id="tenis" name="deportes[]" value="Tenis">
    <label for="tenis">Tenis</label><br>

    <input type="checkbox" id="voley" name="deportes[]" value="Voley">
    <label for="voley">Voley</label><br>

    <input type="submit" name="ejercicio" value="Enviar Deportes">
    </form>


<?php
//EJERCICIO 4 
function mostrarNumeroAleatorio() {
  // Generar un número aleatorio entre 1 y 100
  $num = rand(1, 100);
  
  // Mostrar el número generado
  echo "<p>El número generado es: <strong>$num</strong></p>";

  // Verificar si es menor, igual o mayor a 50
  if ($num < 50) {
      echo "<p>El número es menor a 50.</p>";
  } elseif ($num == 50) {
      echo "<p>El número es igual a 50.</p>";
  } else {
      echo "<p>El número es mayor a 50.</p>";
  }
}

//EJERCICIO 5
$dia = 2; //Se declara una variable de tipo integer.
$sueldo = 7.3; //Se declara una variable de tipo double.
$nombre = "migue"; //Se declara una variable de tipo string.
$exite = true; //Se declara una variable boolean.
echo "Variable entera:";
echo $dia;
echo "<br>";
echo "Variable double:";
echo $sueldo;
echo "<br>";
echo "Variable string:";
echo $nombre;
echo "<br>";
echo "Variable";

//EJERCICIO 6
function variableString(){
  $anio = 2024;
  $dia = 16;
  $mes = 10;
  $fecha = $anio."/".$mes."/".$dia;
  echo "<h2>Fecha: </h2>";
  echo "La fecha es: $fecha";
  echo "<br> <hr>";

}

//EJERCICIO 7
$valor = rand(1, 3);
$texto = "";

if ($valor == 1) {
  $texto = "uno";
} elseif ($valor == 2) {
  $texto = "dos";
} elseif ($valor == 3) {
  $texto = "tres";
}
echo "<h1>El número generado es: $texto</h1>";

//EJERCICIO 8
$i =1;
echo "<h2>Tabla de multiplicar del 2 - Usando for</h2>";
for ($i = 1; $i <= 10; $i++) {
    $resultado = 2 * $i;
    echo "2 x $i = $resultado<br>";
}

$i = 1; 
while ($i <= 10) {
    $resultado = 2 * $i;
    echo "2 x $i = $resultado<br>";
    $i++; // Incremento
}


$i = 1; 
do {
    $resultado = 2 * $i;
    echo "2 x $i = $resultado<br>";
    $i++; // Incremento
} while ($i <= 10);

//EJERCICIO 8
function procesarFormulario() {
  // Verificar que los datos del formulario estén presentes
  if (isset($_POST['nombre']) && isset($_POST['edad'])) {
      $nombre = $_POST['nombre'];
      $edad = $_POST['edad'];

      // Mostrar los datos ingresados
      echo "<h2>Resultado</h2>";
      echo "<p>Nombre: <strong>$nombre</strong></p>";
      echo "<p>Edad: <strong>$edad</strong></p>";

      // Verificar si la persona es mayor o menor de edad
      if ($edad >= 18) {
          echo "<p>$nombre es mayor de edad.</p>";
      } else {
          echo "<p>$nombre es menor de edad.</p>";
      }
  }
  echo "<br> <hr>";
}
// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  procesarFormulario();
}

//EJERCICIO 10
if ($_REQUEST['radio1'] == "suma") {
  $suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
  echo "La suma es:" . $suma;
} else {
  if ($_REQUEST['radio1'] == "resta") {
    $resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
    echo "La resta es:" . $resta;
  }
}

//EJERCICIO 11
function procesarDeportes(){
  if(isset($_POST['nombre_deportes']) && isset($_POST['deportes'])){
    $nombre = $_POST['nombre_deportes'];
    $deportes = $_POST['deportes'];
    $cantidad_deportes = count($deportes);

    echo "<h3>Resultado de los Deportes</h3>";
    echo "<p>Nombre: <strong>$nombre</strong></p>";
    echo "<p>Cantidad de deportes practicados: <strong>$cantidad_deportes</strong></p>";
    echo "<p>Deportes practicados:</p><ul>";

    // Iterar a través de cada deporte y mostrarlo
    foreach ($deportes as $deporte) {
        echo "<li>$deporte</li>"; // Muestra cada deporte como un elemento de lista
    }
    
    echo "</ul>"; // Cierra la lista
  }
}



mostrarNumeroAleatorio();
variableString();

?>
</body>
</html>