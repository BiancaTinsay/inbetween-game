<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Between Card Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css"> 
</head>
<body>

<?php
session_start();

?>


<div class="container">

<?php
function generateRandomCard($drawnCards) {
    do {
        $card = mt_rand(2, 14);
    } while (in_array($card, $drawnCards));
    return $card;
}

function displayCardImage($cardNumber) {
    $imagePath = "img/";

    $cardImages = array(
        2 => "2.png",
        3 => "3.png",
        4 => "4.png",
        5 => "5.png",
        6 => "6.png",
        7 => "7.png",
        8 => "8.png",
        9 => "9.png",
        10 => "10.png",
        11 => "jack.png",
        12 => "queen.png",
        13 => "king.png",
        14 => "1.png"
    );

    if (array_key_exists($cardNumber, $cardImages)) {
        $imageName = $cardImages[$cardNumber];
        echo "<img src='" . $imagePath . $imageName . "' alt='Card $cardNumber' width='170' height='240'>";
    } else {
        echo "Invalid card number";
    }
}


function displayCards($card1, $card2) {
    displayCardImage($card1);
    displayCardImage($card2);
    echo "<br>";
}

function playGame($bet, &$totalPoints) {
    if (!isset($_SESSION['round'])) {
        $_SESSION['round'] = 1;
    }

    $drawnCards = array();
    $round = $_SESSION['round'];

    echo "<div style='text-align: center;'>"; 
        
    echo "Round " . $round . "<br>";
    echo "Current Balance: " . $totalPoints . "<br>"; // Display current balance
    
    $card1 = generateRandomCard($drawnCards);
    $card2 = generateRandomCard($drawnCards);

    displayCards($card1, $card2);

    if ($card1 == $card2) {
        echo "<form method='post'>";
        echo "<input type='hidden' name='card1' value='$card1'>";
        echo "<input type='hidden' name='card2' value='$card2'>";
        echo "<input type='hidden' name='bet' value='$bet'>";
        echo "<button type='submit' name='option' value='HIGHER'>HIGHER</button>";
        echo "<button type='submit' name='option' value='LOWER'>LOWER</button>";
        echo "</form>";
    } else {
        if ($round < 10) {
            echo "<form method='post'>";
            echo "<input type='hidden' name='card1' value='$card1'>";
            echo "<input type='hidden' name='card2' value='$card2'>";
            echo "<input type='hidden' name='bet' value='$bet'>";
            echo "<button type='submit' name='option' value='DEAL'>DEAL</button>";
            echo "<button type='submit' name='option' value='NODEAL'>NO DEAL</button>";
            echo "</form>";
        }
    }

    echo "</div>"; 

    if (isset($_POST['option'])) {
        $thirdCard = generateRandomCard($drawnCards);
        displayCardImage($thirdCard);
        echo "<br><br>";

        if ($_POST['option'] == "HIGHER" || $_POST['option'] == "LOWER") {
            if (($thirdCard > $card1 && $_POST['option'] == "HIGHER") || ($thirdCard < $card1 && $_POST['option'] == "LOWER")) {
                echo "Congratulations for winning the JACKPOT! <br>";
                $totalPoints += $bet + ($bet * 2); // Earn 20% of the bet
            } else {
                echo "Sorry, you LOSE the round!<br>";
                $totalPoints -= $bet + ($bet * 0.2); // Lose 20% of the bet
            }
        } elseif ($_POST['option'] == "DEAL" || $_POST['option'] == "NODEAL") {
            if ($_POST['option'] == "DEAL") {
                $totalPoints += $bet + ($bet * 0.2); // Earn 20% of the bet
                echo "Congratulations, you won the round!";

            } else {
                echo "Sorry, you LOSE the round!<br>";
                $totalPoints -= $bet + ($bet * 0.1); // Lose 20% of the bet
            }
        }

        $_SESSION['round']++; // Move this line outside the condition

        if ($_SESSION['round'] > 10) {
            echo "<div>Game Over!</div>";
            echo "<div>Total Points: $totalPoints</div>";
            echo "<form method='post'><button type='submit' name='restart'>Restart Game</button></form>";
            unset($_SESSION['round']);
            unset($_SESSION['totalPoints']);
        }


    }
}

echo "<div style='text-align: center;'>"; 
echo "Welcome to In Between Card Game!<br>";

$totalPoints = 0;
if (isset($_SESSION['totalPoints'])) {
    $totalPoints = $_SESSION['totalPoints'];
}

if (isset($_POST['bet'])) {
    $bet = intval($_POST['bet']);
} else {
    $bet = 0; 
}

echo "<form method='post' class='bet-form'>";
echo "<label for='bet' class='bet-label'>Enter your bet:</label>";
echo "<input type='number' id='bet' name='bet' min='1' class='bet-input'>";
echo "<button type='submit' class='bet-button'>Start Game</button>";
echo "</form>";

if (isset($_POST['restart'])) {
    unset($_SESSION['round']);
    unset($_SESSION['totalPoints']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bet'])) {
    playGame($bet, $totalPoints);
    $_SESSION['totalPoints'] = $totalPoints;
}

echo "</div>"; 
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>