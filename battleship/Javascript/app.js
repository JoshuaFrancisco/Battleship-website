document.addEventListener('DOMContentLoaded', () => {
  const playerGrid = document.querySelector('.grid-player');
  const computerGrid = document.querySelector('.grid-computer');
  const displayGrid = document.querySelector('.grid-display');
  const ships = document.querySelectorAll('.ship');
  const destroyer = document.querySelector('.destroyer-container');
  const submarine = document.querySelector('.submarine-container');
  const cruiser = document.querySelector('.cruiser-container');
  const battleship = document.querySelector('.battleship-container');
  const carrier = document.querySelector('.carrier-container');
  const startGameButton = document.querySelector('#start-game');
  const rotateShipsButton = document.querySelector('#rotate-ships');
  const turnDisplay = document.querySelector('#turn');
  const infoDisplay = document.querySelector('#info');
  const setupButtons = document.getElementById('setup-buttons');
  
  const userSquares = [];
  const computerSquares = [];
  const width = 10;

  let setHorizontal = true;
  let endGame = false;
  let currentPlayer = 'player';
  let playerNum = 0;
  let ready = false;
  let enemyReady = false;
  let allShipsPlaced = false;
  let hitsFired = -1;
  var timer;

  //ship array, setting size of ships.
  const arrayShips = [
    { name: 'destroyer',
      positions: [
        [0, 1],
        [0, width]
      ]},
    { name: 'submarine',
      positions: [
        [0, 1, 2],
        [0, width, width*2]
      ]},
    { name: 'cruiser',
      positions: [
        [0, 1, 2],
        [0, width, width*2]
      ]},
    { name: 'battleship',
      positions: [
        [0, 1, 2, 3],
        [0, width, width*2, width*3]
      ]},
    { name: 'carrier',
      positions: [
        [0, 1, 2, 3, 4],
        [0, width, width*2, width*3, width*4]
      ]},
  ]

   //Create a 10x10 grid board and gives each square an id 
  function createGameBoard(grid, squares) {
    for (let i = 0; i < width*width; i++) {
      const square = document.createElement('div');
      square.dataset.id = i;
      grid.appendChild(square);
      squares.push(square);
    }
  }

  //Generates user and computer grid
  createGameBoard(playerGrid, userSquares);
  createGameBoard(computerGrid, computerSquares);


  // Selection screen
  if (gameMode === 'singlePlayer') {
    startSinglePlayer();
  }

  // Single Player
  function startSinglePlayer() {
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = 0;
    timer = setInterval(setTime, 1000);
  
    function setTime() {
      ++totalSeconds;
      secondsLabel.innerHTML = pad(totalSeconds % 60);
      minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }
  
    function pad(val) {
      var valString = val + "";
      if (valString.length < 2) {
        return "0" + valString;
      } else {
        return valString;
      }
    }
    //Generate player ships
    generate(arrayShips[0]);
    generate(arrayShips[1]);
    generate(arrayShips[2]);
    generate(arrayShips[3]);
    generate(arrayShips[4]);

    startGameButton.addEventListener('click', () => {
      setupButtons.style.display = 'none';
      playGame();
    })
  }

  //Draw computer ships on computer grid in random location.
  function generate(ship) {
    let randomDirection = Math.floor(Math.random() * ship.positions.length);
    let current = ship.positions[randomDirection];
    if (randomDirection === 0) {
      direction = 1;
    }
    if (randomDirection === 1) {
      direction = 10;
    }
    let randomStart = Math.abs(Math.floor(Math.random() * computerSquares.length - (ship.positions[0].length * direction)));

    const takenSpace = current.some(index => computerSquares[randomStart + index].classList.contains('taken'));
    const rightEdge = current.some(index => (randomStart + index) % width === width - 1);
    const leftEdge = current.some(index => (randomStart + index) % width === 0);

    //Check to see that any ships do not overlap or protrude off the game grid
    if (!takenSpace && !rightEdge && !leftEdge) {
      current.forEach(index => computerSquares[randomStart + index].classList.add('taken', ship.name));
    }

    //else generate if there are no problems
    else {
      generate(ship);
    }
  }
  
  //Rotate the ships
  function rotate() {
  	//Rotates all ships back to vertical
    if (setHorizontal) {
      destroyer.classList.toggle('destroyer-container-vertical');
      submarine.classList.toggle('submarine-container-vertical');
      cruiser.classList.toggle('cruiser-container-vertical');
      battleship.classList.toggle('battleship-container-vertical');
      carrier.classList.toggle('carrier-container-vertical');
      setHorizontal = false;
      return;
    }
    //Rotates all ships back to horizontal
    if (!setHorizontal) {
      destroyer.classList.toggle('destroyer-container-vertical');
      submarine.classList.toggle('submarine-container-vertical');
      cruiser.classList.toggle('cruiser-container-vertical');
      battleship.classList.toggle('battleship-container-vertical');
      carrier.classList.toggle('carrier-container-vertical');
      setHorizontal = true;
      return;
    }
  }
  rotateShipsButton.addEventListener('click', rotate);

  //functions to move around player ship's
  ships.forEach(ship => ship.addEventListener('dragstart', dragStart));
  userSquares.forEach(square => square.addEventListener('dragstart', dragStart));
  userSquares.forEach(square => square.addEventListener('dragover', dragOver));
  userSquares.forEach(square => square.addEventListener('dragenter', dragEnter));
  userSquares.forEach(square => square.addEventListener('drop', dragDrop));

  let selectedShipNameWithIndex;
  let draggedShip;
  let draggedShipLength;

  ships.forEach(ship => ship.addEventListener('mousedown', (e) => {
    selectedShipNameWithIndex = e.target.id;
  }))

  function dragStart() {
    draggedShip = this;
    draggedShipLength = this.childNodes.length;
  }

  function dragOver(e) {
    e.preventDefault();
  }

  function dragEnter(e) {
    e.preventDefault();
  }

  //Ship is draggable and will be placed within the grid.
  function dragDrop() {
    let shipNameWithLastId = draggedShip.lastChild.id;
    let shipClass = shipNameWithLastId.slice(0, -2);
    let lastShipIndex = parseInt(shipNameWithLastId.substr(-1));
    let shipLastId = lastShipIndex + parseInt(this.dataset.id);

    //Do not allow ships to be placed on these specific spaces on the player's grid.
    const spacesNotAllowedHorizontal = [0,10,20,30,40,50,60,70,80,90,1,11,21,31,41,51,61,71,81,91,2,22,32,42,52,62,72,82,92,3,13,23,33,43,53,63,73,83,93];
    const spacesNotAllowedVertical = [99,98,97,96,95,94,93,92,91,90,89,88,87,86,85,84,83,82,81,80,79,78,77,76,75,74,73,72,71,70,69,68,67,66,65,64,63,62,61,60];
    
    let newSpacesNotAllowedHorizontal = spacesNotAllowedHorizontal.splice(0, 10 * lastShipIndex);
    let newSpacesNotAllowedVertical = spacesNotAllowedVertical.splice(0, 10 * lastShipIndex);

    selectedShipIndex = parseInt(selectedShipNameWithIndex.substr(-1));

    shipLastId = shipLastId - selectedShipIndex;

    if (setHorizontal && !newSpacesNotAllowedHorizontal.includes(shipLastId)) {
      for (let i=0; i < draggedShipLength; i++) {
        let directionClass;
        if (i === 0) directionClass = 'start';
        if (i === draggedShipLength - 1) directionClass = 'end';
        userSquares[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add('taken', 'horizontal', directionClass, shipClass);
      }
    }

    //As long as a ship isn't dragged out of bounds, or within any of the spaces not allowed array your ship will be placed on the grid
    //if they do meet those conditions they will not appear of the grid 
    else if (!setHorizontal && !newSpacesNotAllowedVertical.includes(shipLastId)) {
      for (let i=0; i < draggedShipLength; i++) {
        let directionClass;
        if (i === 0) directionClass = 'start';
        if (i === draggedShipLength - 1) directionClass = 'end';
        userSquares[parseInt(this.dataset.id) - selectedShipIndex + width*i].classList.add('taken', 'vertical', directionClass, shipClass);
      }
    } 
    else {
      return;
    }

    displayGrid.removeChild(draggedShip);
    if(!displayGrid.querySelector('.ship')) allShipsPlaced = true;
  }

  function playerReady(num) {
    let player = `.p${parseInt(num) + 1}`;
    document.querySelector(`${player} .ready`).classList.toggle('active');
  }

  //Single Player Mode
  function playGame() {
    if (endGame) return;
    if (currentPlayer === 'player') {
      turnDisplay.innerHTML = 'Players Turn';
      computerSquares.forEach(square => square.addEventListener('click', function(e) {
        hitsFired = square.dataset.id;
        revealSquare(square.classList);
      }))
    }
    if (currentPlayer === 'enemy') {
      turnDisplay.innerHTML = 'Opponents Turn';
      setTimeout(computerGo, 700);
    }
  }

  //Player Variables
  let playerDestroyerCount = 0;
  let playerSubmarineCount = 0;
  let playerCruiserCount = 0;
  let playerBattleshipCount = 0;
  let playerCarrierCount = 0;

  function revealSquare(classList) {
    const enemySquare = computerGrid.querySelector(`div[data-id='${hitsFired}']`);
    const obj = Object.values(classList);
    if (!enemySquare.classList.contains('hit') && currentPlayer === 'player' && !endGame) {
      if (obj.includes('destroyer')) {
        playerDestroyerCount++;
      }
      if (obj.includes('submarine')) { 
        playerSubmarineCount++;
      }
      if (obj.includes('cruiser')) {
        playerCruiserCount++;
      }
      if (obj.includes('battleship')) { 
        playerBattleshipCount++;
      }
      if (obj.includes('carrier')) {
        playerCarrierCount++;
      }
    }
    if (obj.includes('taken')) {
      enemySquare.classList.add('hit');
    } 
    else {
      enemySquare.classList.add('miss');
    }
    winCheck()
    currentPlayer = 'enemy';
    if(gameMode === 'singlePlayer') {
      playGame();
    }
  }

  let computerDestroyerCount = 0;
  let computerSubmarineCount = 0;
  let computerCruiserCount = 0;
  let computerBattleshipCount = 0;
  let computerCarrierCount = 0;


  function computerGo(square) {
    if (gameMode === 'singlePlayer') {
      square = Math.floor(Math.random() * userSquares.length);
    }
    if (!userSquares[square].classList.contains('hit')) {
      const hit = userSquares[square].classList.contains('taken');
      userSquares[square].classList.add(hit ? 'hit' : 'miss');
      if (userSquares[square].classList.contains('destroyer')) {
        computerDestroyerCount++
      }
      if (userSquares[square].classList.contains('submarine')) { 
        computerSubmarineCount++
      }
      if (userSquares[square].classList.contains('cruiser')) { 
        computerCruiserCount++
      }
      if (userSquares[square].classList.contains('battleship')) { 
        computerBattleshipCount++
      }
      if (userSquares[square].classList.contains('carrier')) { 
        computerCarrierCount++
      }
      winCheck();
    } 
    else if (gameMode === 'singlePlayer') {
      computerGo();
    }
    currentPlayer = 'player';
    turnDisplay.innerHTML = 'Players Turn';
  }

  //Check to see if player has sunken enough spaces on grid.
  function winCheck() {
    if (playerDestroyerCount === 2) {
      infoDisplay.innerHTML = `You've sunk the Opponent destroyer! (2)`;
      playerDestroyerCount = 10;
    }
    if (playerSubmarineCount === 3) {
      infoDisplay.innerHTML = `You've sunk the Opponent submarine! (3)`;
      playerSubmarineCount = 10;
    }
    if (playerCruiserCount === 3) {
      infoDisplay.innerHTML = `You've sunk the Opponent cruiser! (3)`;
      playerCruiserCount = 10;
    }
    if (playerBattleshipCount === 4) {
      infoDisplay.innerHTML = `You've sunk the Opponent battleship! (4)`;
      playerBattleshipCount = 10;
    }
    if (playerCarrierCount === 5) {
      infoDisplay.innerHTML = `You've sunk the Opponent carrier! (5)`;
      playerCarrierCount = 10;
    }
    if (computerDestroyerCount === 2) {
      infoDisplay.innerHTML = `Opponent has sunk your destroyer! (2)`;
      computerDestroyerCount = 10;
    }
    if (computerSubmarineCount === 3) {
      infoDisplay.innerHTML = `Opponent has sunk your submarine! (3)`;
      computerSubmarineCount = 10;
    }
    if (computerCruiserCount === 3) {
      infoDisplay.innerHTML = `Opponent has sunk your cruiser! (3)`;
      computerCruiserCount = 10;
    }
    if (computerBattleshipCount === 4) {
      infoDisplay.innerHTML = `Opponent has sunk your battleship! (4)`;
      computerBattleshipCount = 10;
    }
    if (computerCarrierCount === 5) {
      infoDisplay.innerHTML = `Opponent has sunk your carrier! (5)`;
      computerCarrierCount = 10;
    }

    //Win condition, to check if player or computer has sunk enough spaces on grid.
    if ((playerDestroyerCount + playerSubmarineCount + playerCruiserCount + playerBattleshipCount + playerCarrierCount) === 50) {
      infoDisplay.innerHTML = "Congratulations You've Won!!!";
      gameOver();
      clearInterval(timer);
      playerWin();
      getTime();
    }
    if ((computerDestroyerCount + computerSubmarineCount + computerCruiserCount + computerBattleshipCount + computerCarrierCount) === 50) {
      infoDisplay.innerHTML = `Your Opponent has Won...`;
      gameOver();
    }
  }

  function playerWin() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let div = document.getElementById("playerwin");
        div.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST","updateplayerinfo.php",true);
    xmlhttp.send();
  }

  function getTime() {
    var minutesLabel = document.getElementById("minutes").value;
    var secondsLabel = document.getElementById("seconds").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let div = document.getElementById("playerwin");
        div.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST","updatetime.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("minute="+minutesLabel+"&second="+secondsLabel+"");
  }

  function gameOver() {
    endGame = true;
    startGameButton.removeEventListener('click', playGame);
  }
})
