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
</head>

<body>
    <div style="text-align: center;">
        <h2>Welcome to In Between Card Game!</h2>
        <h3>New to the game? Do you need to read the mechanics?</h3>
        <form method="post">
            <button type="submit" name="read_mechanics" value="yes">Yes</button>
            <button type="submit" name="read_mechanics" value="no">No</button>
        </form>
    </div>
</body>

</html>