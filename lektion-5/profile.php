<?php
require 'config.php';

session_start();

// ! = "not", alltså !isset() = not isset()
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Användarprofil</title>
</head>
    <h2>Min profil</h2>
<body>
    
</body>
</html>