<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scrollable Text</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="mechanics.css">
  <style>
    .fontx {
      margin-top: 600px; /* Adjust margin top as needed */
      margin-left: 100px;
      margin-bottom: auto;
      text-align: justify;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="scrollable-text">
    <p class="fontx">The player starts with 500¥ as starter money. The player must place a minimum bet to play the game. 
      Two random cards are drawn from a deck of cards, and their values are revealed to the player. Additionally, a third card is drawn, but its value remains hidden. The player is presented with the option to choose between DEAL or NO DEAL. If the player chooses DEAL: The player predicts whether the value of the third card will fall between the values of the first two drawn cards. If the third card's value is between the first two, the player wins and earns money based on their bet. If not, the player loses their bet. 
    </p>

    <form action="mechanics1.php" method="post">
      <button type="submit" class="button-form">NEXT</button>
    </form>
    
    
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
