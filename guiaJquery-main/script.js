/* Nueva manera de programar JavaScript con jQuery.
let x = $(document);
x.ready(startEvent);

function startEvent() {
  let x;
  x = $("#button1");
  x.click(pressButton);
}

function pressButton() {
  alert("Boton presionado");
}
*/

/*   
2 - Selección de un elemento del documento mediante el id.
let x = $(document);
x.ready(startEvent);

function startEvent()() {
  let x = $("#title1");
  x.click(title1);
  x = $("#title2");
  x.click(title2);
}

function title1() {
  let x = $("#title1");
  x.css("color", "#800000");
  x.css("background-color", "##87CEEB"");
  x.css("font-family", "Arial");
}

function title2() {
  let x = $("#title2");
  x.css("color", "#800000");
  x.css("background-color", "#87CEEB");
  x.css("font-family", "Arial");
}*/

/* 3 Selección de elementos por el tipo de elementos.
let x = $(document);
x.ready(inEvent);

function inEvent() {
  let x = $("tr");
  x.click(fila);
}

function fila() {
  let x = $(this);
  x.css("background-color", "#87CEEB");
}
*/

/*	5 Selección de elementos utilizando los selectores CSS.
     let x = $(document);
        x.ready(inicializarEventos);

        function inicializarEventos() {
            let x = $("#tabla1 tr");
            x.click(cambiarColor);
        }

        function cambiarColor() {
            let x = $(this);
            x.css("background-color", "#ffff00"); // Cambiar el color de fondo a amarillo
        }
 */

/*
6 -       
let x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
$("#aumentar").click(cambiarTamanoFuente);
$("#disminuir").click(cambiarTamanoFuente);
$("#restablecer").click(cambiarTamanoFuente);
}

function cambiarTamanoFuente() {
let tamanoActual = parseFloat($(".descripcion").css("font-size"));

if ($(this).is("#aumentar")) {
$(".descripcion").css("font-size", (tamanoActual + 2) + "px"); // Aumentar tamaño
} else if ($(this).is("#disminuir")) {
$(".descripcion").css("font-size", (tamanoActual - 2) + "px"); // Disminuir tamaño
} else if ($(this).is("#restablecer")) {
$(".descripcion").css("font-size", "16px"); // Restablecer a tamaño original
}
}*/

/* 7
$(document).ready(function() {
$("#cambiar").click(cambiarContenidoTabla1);
});

function cambiarContenidoTabla1() {
$("#tabla1 td").text("-"); // Cambiar contenido de la primera tabla
}*/

/* 8
function cambiarHipervinculo(nuevaUrl, nuevoTexto) {
$("#miHipervinculo").attr("href", nuevaUrl); // Cambia la propiedad href
$("#miHipervinculo").text(nuevoTexto); // Cambia el texto del hipervínculo
}

function eliminarHipervinculo() {
$("#miHipervinculo").removeAttr("href"); // Elimina la propiedad href
$("#miHipervinculo").text("Hipervínculo Eliminado"); // Cambia el texto del hipervínculo
}
}
*/

/* 9
$(document).ready(function() {
$("#agregarClases").click(function() {
$("#miTabla thead").addClass("estilo-thead"); // Agregar clase al thead
$("#miTabla tbody").addClass("estilo-tbody"); // Agregar clase al tbody
});

$("#quitarClases").click(function() {
$("#miTabla thead").removeClass("estilo-thead"); // Quitar clase al thead
$("#miTabla tbody").removeClass("estilo-tbody"); // Quitar clase al tbody
});
});
  */

/* 10
$(document).ready(function() {
// Botón para mostrar el contenido de la cabecera
$("#mostrarCabecera").click(function() {
let contenidoCabecera = $("head").html(); // Obtener contenido del <head>
alert("Contenido de la Cabecera:\n" + contenidoCabecera);
});

// Botón para mostrar el contenido del cuerpo
$("#mostrarCuerpo").click(function() {
let contenidoCuerpo = $("body").html(); // Obtener contenido del <body>
alert("Contenido del Cuerpo:\n" + contenidoCuerpo);
});
});
*/

/* 11
$(document).ready(inicializarEventos);

function inicializarEventos() {
    let x = $("strong");
    x.click(ocultarPalabra);
}

function ocultarPalabra() {
    $(this).hide(); // Ocultar la palabra que fue presionada
}
*/

/*
12
$(document).ready(function () {
// Evento mouseover para cambiar el color al pasar el mouse
$("td").mouseover(function () {
$(this).css("background-color", "yellow");
});

// Evento mouseout pero sin cambiar el color al salir
$("td").mouseout(function () {
});
});
*/

/*13
$(document).ready(function() {
// Al pasar el mouse sobre las celdas
$("td").hover(
function() {
$(this).css("background-color", "yellow"); // Cambiar el color de fondo a amarillo
},
function() {
$(this).css("background-color", ""); // Regresar al color original
}
);
});*/

/*13
$(document).ready(function () {
  // Cambiar color de fondo al pasar el mouse
  $(".link").hover(
    function () {
      $(this).css("background-color", "#add8e6"); // Color de fondo al pasar el mouse
    },
    function () {
      $(this).css("background-color", "#f0f0f0"); // Color de fondo original
    }
  );
});*/

/* 14
$(document).ready(function () {
  // Evento mousemove dentro del div
  $("#miDiv").mousemove(function (event) {
    let x = event.pageX - $(this).offset().left;
    let y = event.pageY - $(this).offset().top;
    $("#mensaje").text("Coordenadas dentro del div: X=" + x + " Y=" + y);
  });

  // Detectar cuando el mouse sale del div
  $("#miDiv").mouseout(function () {
    $("#mensaje").text("El mouse no está dentro del div.");
  });
});
*/

/* 15
$(document).ready(function () {
// Evento mousedown para cambiar el color cuando se presiona
$(".boton").mousedown(function () {
$(this).css("background-color", "yellow");
});

// Evento mouseup para regresar al color original cuando se suelta
$(".boton").mouseup(function () {
$(this).css("background-color", "lightblue");
});
});
*/

/* 16
$(document).ready(function() {
const tamañoOriginal = { width: 800, height: 70 };
const tamañoRedimensionado = { width: 250, height: 250 };

let esRedimensionado = false;

// Manejar el doble clic
$("#miDiv").dblclick(function() {
if (esRedimensionado) {
$(this).animate({
width: tamañoOriginal.width + 'px',
height: tamañoOriginal.height + 'px'
});
} else {
$(this).animate({
width: tamañoRedimensionado.width + 'px',
height: tamañoRedimensionado.height + 'px'
});
}
esRedimensionado = !esRedimensionado; // Alternar el estado
});
});*/

/* 17
let x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
  let x = $("#buscar");
  x.focus(resaltado);
}

function resaltado() {
  let x = $("#buscar");
  x.attr("value", ""); 
}*/

/* 18
$(document).ready(function () {
// Evento blur para detectar cuando se pierde el foco
$("#campoTexto").blur(function () {
let x = $(this);
let cadena = x.val();
// Si la cadena está vacía, mostrar el alert
if (cadena.length == 0) {
alert("No ingresó datos");
}
});
});*/

/* 20
$(document).ready(function() {
$("#ocultar").click(function() {
    $("#recuadro").hide(); 
});

$("#mostrar").click(function() {
    $("#recuadro").show(); 
});
*/

/* 21
$(document).ready(function() {
$("#bloque1").click(function() {
$(this).fadeOut(1000, function() { // Ocultar bloque1 con decoloración
$("#bloque2").fadeIn(1000); // Mostrar bloque2 lentamente
});
});
});*/

/* 22
$(document).ready(function() {
$("#bloque1").click(function() {
$(this).css("opacity", "0.20"); // Cambiar opacidad de inmediato
$(this).hide(); // Ocultar bloque1
$("#bloque2").show(); // Mostrar bloque2
});
});*/

/* 24
$(document).ready(function() {
$("#resaltar").click(function() {
// Recorrer todos los enlaces
$("a").each(function() {
var enlace = $(this).attr("href");
// Verificar si el enlace contiene ".ar"
if (enlace.indexOf(".ar") !== -1) {
$(this).addClass("resaltado"); // Agregar la clase resaltado
}
});
});
});*/
