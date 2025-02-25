let timeLeft = 60;
let score = 0; 
let currentWord = '';
let gameInterval; 
let isGameRunning = false; 

const words = [
    'teacher', 'doctor', 'engineer', 'artist', 'scientist',
    'firefighter', 'police officer', 'chef', 'architect', 'lawyer',
    'pilot', 'mechanic', 'nurse', 'farmer', 'musician',
    'actor', 'journalist', 'designer', 'plumber', 'electrician'
];
  

const startButton = document.getElementById('startButton'); 
const wordDisplay = document.getElementById('wordDisplay');
const scoreDisplay = document.getElementById('score'); 
const timeDisplay = document.getElementById('timeLeft'); 
const summary = document.getElementById('summary'); 
const finalScore = document.getElementById('finalScore'); 

let typedWord = ''; 

function startGame() {
    if (isGameRunning) return; 
    isGameRunning = true; 
    timeLeft = 60; 
    score = 0; 
    scoreDisplay.textContent = score; 
    timeDisplay.textContent = timeLeft;
    summary.classList.add('hidden'); 
    typedWord = ''; 
    showNewWord(); 
    startTimer(); 
}

function startTimer() {
    gameInterval = setInterval(() => {
        timeLeft--; 
        timeDisplay.textContent = timeLeft; 
        if (timeLeft <= 0) { 
            clearInterval(gameInterval); 
            endGame();
        }
    }, 1000); 
}

function showNewWord() {
    currentWord = words[Math.floor(Math.random() * words.length)]; 
    wordDisplay.textContent = currentWord; 
    typedWord = ''; 
}

function checkWord(input) {
    let displayHTML = ''; 
    let mismatchCount = 0; 

    for (let i = 0; i < currentWord.length; i++) {
        if (i < input.length) { 
            if (input[i] === currentWord[i]) {
                displayHTML += `<span class="correct">${currentWord[i]}</span>`;
            } else {
                mismatchCount++;
                displayHTML += `<span class="incorrect">${currentWord[i]}</span>`;
            }
        } else {
            displayHTML += `<span>${currentWord[i]}</span>`;
        }
    }
    wordDisplay.innerHTML = displayHTML; 

    if (input === currentWord) { 
        score++; 
        scoreDisplay.textContent = score; 
        setTimeout(() => {
            showNewWord(); 
        }, );
    }

    if (mismatchCount > 2) { 
        score = Math.max(score - 1, 0); 
        scoreDisplay.textContent = score; 
        setTimeout(() => {
            showNewWord(); 
        }, );
    }
}

function endGame() {
    isGameRunning = false; 
    wordDisplay.textContent = ''; 
    summary.classList.remove('hidden'); 
    finalScore.textContent = score; 
}

document.addEventListener('keydown', (event) => {
    if (!isGameRunning) return;

    
    if (event.key === 'Backspace') {
        typedWord = typedWord.slice(0, -1);
    } 
    
    else if (event.key === 'Enter') {
        checkWord(typedWord); 
    } 
    
    else if (/^[a-z]$/.test(event.key)) {
        typedWord += event.key.toLowerCase();
        checkWord(typedWord);
    }
});

startButton.addEventListener('click', startGame);
