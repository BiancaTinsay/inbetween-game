<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['read_mechanics']) && $_POST['read_mechanics'] === 'yes') {
        $_SESSION['read_introduction'] = true;
        header("Location: mechanics.php");
        exit;
    } elseif (isset($_POST['read_mechanics']) && $_POST['read_mechanics'] === 'no') {
        $_SESSION['read_introduction'] = true;
        header("Location: logic.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>
    <link rel="stylesheet" href="intro.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap" rel="stylesheet">
</head>

<body>
    <div style="text-align: center;">
        <h3>New to the game?
        <br>
        Do you need to read the mechanics?</h3>
        <form method="post">
            <button type="submit" name="read_mechanics" value="yes">Yes</button>
            <button type="submit" name="read_mechanics" value="no">No</button>
        </form>
    </div>
</body>

</html>
