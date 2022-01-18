function delegal(szulo, gyerek, mikor, mit) {
    function esemenyKezelo(esemeny) {
        let esemenyCelja = esemeny.target;
        let esemenyKezeloje = this;
        let legkozelebbiKeresettElem = esemenyCelja.closest(gyerek);

        if (esemenyKezeloje.contains(legkozelebbiKeresettElem)) {
            mit(esemeny, legkozelebbiKeresettElem);
        }
    }


    szulo.addEventListener(mikor, esemenyKezelo);
}
let singleIs = false;
let counter = 42;
let gameActive = false;
let activePlayer = 0;
let gameBoard = [];
let players = [
    {
        name: "Player1",
        color: "red",
        wins: 0,
        draws: 0,
        loses: 0
    },
    {
        name: "Player2",
        color: "yellow",
        wins: 0,
        draws: 0,
        loses: 0
    }
]
const input1 = document.querySelector('#player1');
const input2 = document.querySelector('#player2');
const newGame = document.querySelector('#new_game');
const rules = document.querySelector('#rules');
const game = document.querySelector('#game');
const gameTable = document.querySelector('#game_board')
const nameSaver = document.querySelector('#save_names');
const leiras = document.querySelector('#leiras');
const saveButton = document.querySelector('#save');
const loadingButton = document.querySelector('#loading');
const singleButton = document.querySelector('#single');



newGame.addEventListener('click', beginGame);
nameSaver.addEventListener('click', nameChanging);
rules.addEventListener('click', () => {
    leiras.innerHTML = `Üdvözöllek a connect four nevű játékomban!
    A játék célja: 4 ugyan olyan színű, korong összegyűjtése! Ez lehet vízszintesen, függőlegesen, és
    átlósan!
    Irányitás: A kiválasztott oszlopra kattintva az éppen adott játékos jön!`
})

save.addEventListener('click', saveGame);
loadingButton.addEventListener('click', load);
singleButton.addEventListener('click', singlePlayer);

for (let row = 0; row <= 5; row++) {
    const newRow = document.createElement('tr');
    for (let col = 0; col <= 6; col++) {
        const newCol = document.createElement('td');
        newCol.id = 'square_' + row + '_' + col;
        newCol.className = 'board_square';
        newRow.appendChild(newCol);
    }
    gameTable.appendChild(newRow);
}

delegal(gameTable, 'td', 'click', (esemeny, elem) => {
    let column = elem.cellIndex;
    console.log(column);
    drop(column);
})

function nameChanging() {
    players[0].name = input1.value;
    players[1].name = input2.value;
    window.alert('Names are saved!')
}

function beginGame() {
    gameActive = false;

    gameActive = true;
    gameTable.style.visibility = 'visible';
    leiras.innerHTML = "";
    input1.style.visibility = 'hidden';
    input2.style.visibility = 'hidden';
    nameSaver.style.visibility = 'hidden';
    document.body.style.backgroundImage = "url(https://wallpaperaccess.com/full/449903.jpg)"

    for (row = 0; row <= 5; row++) {
        gameBoard[row] = [];
        for (col = 0; col <= 6; col++) {
            gameBoard[row][col] = 0;
        }
    }


    drawBoard();
    activePlayer = 1;
    setUpTurn();
}

function singlePlayer() {
    gameActive = false;

    gameActive = true;
    singleIS = true;
    gameTable.style.visibility = 'visible';
    leiras.innerHTML = "";
    input1.style.visibility = 'hidden';
    input2.style.visibility = 'hidden';
    nameSaver.style.visibility = 'hidden';
    document.body.style.backgroundImage = "url(https://wallpaperaccess.com/full/449903.jpg)"

    for (row = 0; row <= 5; row++) {
        gameBoard[row] = [];
        for (col = 0; col <= 6; col++) {
            gameBoard[row][col] = 0;
        }
    }


    drawBoard();
    activePlayer = 1;
    setUpTurn();
}
function drawBoard() {
    checkForWin();
    for (col = 0; col <= 6; col++) {
        for (row = 0; row <= 5; row++) {
            document.getElementById('square_' + row + '_' + col).innerHTML = "<span class='piece player" + gameBoard[row][col] + "'></span>";
        }
    }
}

function drop(col) {
    if (!gameActive) {
        return
    }
    for (row = 5; row >= 0; row--) {
        if (gameBoard[row][col] == 0) {

            gameBoard[row][col] = activePlayer;
            counter--;
            drawBoard();

            if (!singleIs) {
                if (activePlayer == 1) {
                    activePlayer = 2;
                } else {
                    activePlayer = 1;
                }
            }

            setUpTurn();
            return true;
        }
    }
}

function setUpTurn() {
    if (gameActive) {
        document.getElementById('game_info').innerHTML = "Current Player: " + players[activePlayer - 1].name;

    }
}



function checkForWin() {

    //balrol jobbra
    for (let i = 1; i <= 2; i++) {
        for (let col = 0; col <= 3; col++) {
            for (let row = 0; row <= 5; row++) {
                if (gameBoard[row][col] == i) {
                    if ((gameBoard[row][col + 1] == i) && (gameBoard[row][col + 2] == i) && (gameBoard[row][col + 3] == i)) {
                        endGame(i);
                        return true;
                    }
                }
            }
        }
    }

    // fentröl lefele

    for (let i = 1; i <= 2; i++) {
        for (let col = 0; col <= 6; col++) {
            for (let row = 0; row <= 2; row++) {
                if (gameBoard[row][col] == i) {
                    if ((gameBoard[row + 1][col] == i) && (gameBoard[row + 2][col] == i) && (gameBoard[row + 3][col] == i)) {
                        endGame(i);
                        return true;
                    }
                }
            }
        }
    }

    // átlósan lefele
    for (let i = 1; i <= 2; i++) {
        for (let col = 0; col <= 3; col++) {
            for (let row = 0; row <= 2; row++) {
                if (gameBoard[row][col] == i) {
                    if ((gameBoard[row + 1][col + 1] == i) && (gameBoard[row + 2][col + 2] == i) && (gameBoard[row + 3][col + 3] == i)) {
                        endGame(i);
                        return true;
                    }
                }
            }
        }
    }

    // átlósan felfele
    for (let i = 1; i <= 2; i++) {
        for (let col = 0; col <= 3; col++) {
            for (let row = 3; row <= 5; row++) {
                if (gameBoard[row][col] == i) {
                    if ((gameBoard[row - 1][col + 1] == i) && (gameBoard[row - 2][col + 2] == i) && (gameBoard[row - 3][col + 3] == i)) {
                        endGame(i);
                        return true;
                    }
                }
            }
        }
    }
    if (counter === 0) {
        gameActive = false;
        players[0].draws++;
        players[1].draws++;
        document.querySelector('#game_info').innerHTML = "Its a draw! "
        counter = 42;
    }

}

function endGame(winningPlayer) {
    gameActive = false;
    input1.style.visibility = 'visible';
    input2.style.visibility = 'visible';
    nameSaver.style.visibility = 'visible';
    if (winningPlayer === 1) {
        players[0].wins++;
        players[1].loses++;
    } else if (winningPlayer === 2) {
        players[1].wins++;
        players[0].loses++;
    }
    document.querySelector('#game_info').innerHTML = "Winner: " + players[winningPlayer - 1].name;
}

function saveGame() {
    localStorage.setItem('players', JSON.stringify(players));
    localStorage.setItem('board', JSON.stringify(gameBoard));
    localStorage.setItem('activePlayer', JSON.stringify(activePlayer));
}

function load() {
    gameTable.style.visibility = 'visible';
    gameActive = true;
    players = JSON.parse(localStorage.getItem('players'));
    gameBoard = JSON.parse(localStorage.getItem('board'));
    activePlayer = JSON.parse(localStorage.getItem('activePlayer'));
    drawBoard();
}

function randomNumber(min, max) {
    return Math.random() * (max - min) + min;
}