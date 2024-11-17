const board = document.getElementById("board");
const cells = document.querySelectorAll(".cell");
const message = document.getElementById("message");
const resetButton = document.getElementById("resetButton");

let currentPlayer = "";
let gameActive = false; // Cambiar a false inicialmente
let boardState = ["", "", "", "", "", "", "", "", ""];

// Función para lanzar la moneda
const flipCoin = () => {
  const coinFlip = Math.random() < 0.5 ? "cara" : "cruz"; // Lanzar la moneda
  if (coinFlip === "cara") {
    currentPlayer = "X"; // Jugador 1
    message.textContent = "Jugador 1 (X) empieza. ¡Buena suerte!";
  } else {
    currentPlayer = "O"; // Jugador 2
    message.textContent = "Jugador 2 (O) empieza. ¡Buena suerte!";
  }
  gameActive = true; // Activar el juego
};

// Función para manejar el clic en la celda
const handleCellClick = (index) => {
  if (boardState[index] !== "" || !gameActive) return;

  boardState[index] = currentPlayer;
  cells[index].textContent = currentPlayer;

  checkWinner();
};

// Función para verificar si hay un ganador
const checkWinner = () => {
  const winningConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];

  for (let condition of winningConditions) {
    const [a, b, c] = condition;
    if (
      boardState[a] &&
      boardState[a] === boardState[b] &&
      boardState[a] === boardState[c]
    ) {
      message.textContent = `¡Jugador ${currentPlayer} gana!`;
      gameActive = false;
      return;
    }
  }

  if (!boardState.includes("")) {
    message.textContent = "¡Es un empate!";
    gameActive = false;
  }

  currentPlayer = currentPlayer === "X" ? "O" : "X";
};

// Función para reiniciar el juego
const resetGame = () => {
  gameActive = false; // Cambiar a false al reiniciar
  currentPlayer = "";
  boardState = ["", "", "", "", "", "", "", "", ""];
  message.textContent = "";
  cells.forEach((cell) => {
    cell.textContent = "";
  });
  flipCoin(); // Lanzar la moneda al reiniciar
};

// Asignar eventos a las celdas
cells.forEach((cell, index) => {
  cell.addEventListener("click", () => handleCellClick(index));
});

// Asignar evento al botón de reiniciar
resetButton.addEventListener("click", resetGame);

// Lanzar la moneda al cargar la página
window.onload = flipCoin;
