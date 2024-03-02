<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="bankroll">Bank: 500 Token</div>
    <div id="board-message"></div>
    <div id="card-min" class="board__card"></div>
    <div id="card-max" class="board__card"></div>
    <div id="card-guessed" class="board__card"></div>
    <form id="bet-form">
        <input type="number" id="bet-input" placeholder="Enter bet amount">
        <button type="submit">Bet</button>
    </form>
    <button id="bet-play">Play</button>
    <button id="bet-again" style="display: none;">Play Again</button>

    <script src="script.js" defer></script>
</body>
</html>
