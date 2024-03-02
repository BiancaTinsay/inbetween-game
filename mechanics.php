<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scrollable Text</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">
  <div class="scrollable-text">
    <h3>How to Play?</h3>
    <p>The player starts with 500¥ as starter money. The player must place a minimum bet to play the game.<br>
      Two random cards are drawn from a deck of cards, and their values are revealed to the player.<br>
      Additionally, a third card is drawn, but its value remains hidden.<br>
      <br>
      The player is presented with the option to choose between DEAL or NO DEAL.
      <br>If the player chooses DEAL:
      <br>The player predicts whether the value of the third card will fall between the values of the first two drawn cards. If the third card's value is between the first two, the player wins and earns money based on their bet. If not, the player loses their bet.
      <br>
      <br>If the player chooses NO DEAL:
      <br>A portion of the player's current money is deducted.
      <br>
      <br>If the first two cards drawn have the same value, the player has the option to choose between HIGHER or LOWER.
      <br>If the player chooses HIGHER:
      <br>The player predicts whether the value of the third card will be higher than the value of the first two cards. If correct, the player wins the JACKPOT prize. If incorrect, the player loses their bet.
      <br>
      <br>If the player chooses LOWER:
      <br>The player predicts whether the value of the third card will be lower than the value of the first two cards. If correct, the player wins and earns money based on their bet. If incorrect, the player loses their bet.
    </p>

    <form action="logic.php" method="post">
      <button type="submit" class="btn btn-primary">Play Game</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
