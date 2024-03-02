document.addEventListener('DOMContentLoaded', () => {
    const game = {
        bankroll: 500,
        cards: [2, 3, 4, 5, 6, 7, 8, 9, 10, 'Knave', 'Queen', 'King', 'As'],
        minValue: 0,
        maxValue: 12,
        elements: () => {
            game.bankAmount = document.querySelector('#bankroll');
            game.buttonPlay = document.querySelector('#bet-play');
            game.buttonPlayAgain = document.querySelector('#bet-again');
            game.formBet = document.querySelector('#bet-form');
            game.betInput = document.querySelector('#bet-input');
            game.cardLeft = document.querySelector('#card-min');
            game.cardRight = document.querySelector('#card-max');
            game.cardMiddle = document.querySelector('#card-guessed');
            game.boardMessage = document.querySelector('#board-message');
        },
        randomInteger(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        },
        getTwoNumbers(min, max) {
            let number1 = game.randomInteger(min, max);
            let number2 = game.randomInteger(min, max);

            if (number1 == number2) {
                number2 = game.randomInteger(min, max);
            }
            return {
                min: Math.min(number1, number2),
                max: Math.max(number1, number2),
                random: '?',
            };
        },
        randomizeCard() {
            game.valuesCards = game.getTwoNumbers(game.minValue, game.maxValue);
        },
        animateTurnOver(elements) {
            let firstFlipAnimation = `board__card--flip-1`;
            let secondFlipAnimation = `board__card--flip-2`;

            if (elements === 'dealCards') {
                game.cardLeft.classList.add(secondFlipAnimation);
                game.cardRight.classList.add(secondFlipAnimation);
                game.cardMiddle.classList.add(firstFlipAnimation);
            } else if (elements === 'reshuffledCard') {
                game.cardMiddle.classList.add(secondFlipAnimation);
                game.cardLeft.classList.add(firstFlipAnimation);
                game.cardRight.classList.add(firstFlipAnimation);
                let soundCardDeal = new Audio('audio/dealing-card.wav');
                soundCardDeal.play();
            } else {
                game.cardMiddle.classList.add(secondFlipAnimation);
                let soundCardFlip = new Audio('audio/card-flip.wav');
                soundCardFlip.play();
            }
        },
        displayCards() {
            game.hideCard();

            game.animateTurnOver('dealCards');
            setTimeout(() => {
                game.cardLeft.classList.add(
                    `board__card--${game.cards[game.valuesCards.min]}`
                );
                game.cardRight.classList.add(
                    `board__card--${game.cards[game.valuesCards.max]}`
                );
            }, 200);
        },
        turnOverGuessingCard() {
            game.valuesCards.random = game.randomInteger(
                game.minValue,
                game.maxValue
            );
            game.cardRight.classList.remove(`board__card--flip-2`);
            game.cardLeft.classList.remove(`board__card--flip-2`);

            setTimeout(() => {
                game.cardMiddle.className = `board__card board__card--${
                    game.cards[game.valuesCards.random]
                }`;
            }, 340);
            game.animateTurnOver();
        },
        showBetForm() {
            game.buttonPlayAgain.style.display = 'none';
            game.buttonPlay.style.display = 'none';
            game.formBet.style.display = 'block';
        },
        showPlayAgain() {
            game.formBet.style.display = 'none';
            game.buttonPlayAgain.style.display = 'block';
        },
        handleActionPlayer() {
            game.buttonPlay.addEventListener('click', () => {
                game.launch();
                game.showBetForm();
            });
            game.buttonPlayAgain.addEventListener('click', () => {
                game.showBetForm();
                game.animateTurnOver('reshuffledCard');
                game.launch();
            });
            game.formBet.addEventListener('submit', (event) => {
                event.preventDefault();
                game.handleError(event.target[0].value);
            });
        },
        handleError(amount) {
            if (amount > game.bankroll) {
                game.handleMessage('Impossible to bet, insufficient token');
            } else if (amount <= 0) {
                game.handleMessage('Please bet a number greater than zero');
            } else {
                game.handleResult(amount);
                game.showPlayAgain();
            }
        },
        handleResult(betValue) {
            game.turnOverGuessingCard();
            let cardMin = game.valuesCards.min;
            let cardMax = game.valuesCards.max;
            let cardRandom = game.valuesCards.random;

            if (cardRandom > cardMin && cardRandom < cardMax) {
                let doubledGain = betValue * 2;
                game.bankroll += doubledGain;
                game.handleMessage(
                    `Well done you have won ${doubledGain} Token !`
                );
            } else if (cardRandom === cardMin || cardRandom === cardMax) {
                let threefoldGain = betValue * 3;
                game.bankroll += threefoldGain;
                game.handleMessage(
                    `Perfect! Tripled bet ${threefoldGain} Token added`
                );
            } else {
                game.bankroll -= betValue;
                game.handleMessage(
                    `Unlucky, you lost ${betValue} Token !`
                );
            }
            game.handleBankRoll();
        },
        handleMessage(text) {
            game.boardMessage.textContent = text;
        },
        handleBankRoll() {
            game.bankAmount.textContent = `Bank: ${game.bankroll} Token`;
        },
        hideCard() {
            game.cardLeft.className = 'board__card board__card--undefined';
            game.cardRight.className = 'board__card board__card--undefined';
            game.cardMiddle.className = 'board__card board__card--undefined';
        },
        launch() {
            game.handleMessage('');
            game.randomizeCard();
            game.displayCards();
            game.handleBankRoll();
        },
        init() {
            game.elements();
            game.hideCard();
            game.handleActionPlayer();
        },
    };

    game.init();
});
