<?php
require 'config.php';

session_start();

// ! = "not", alltså !isset() = not isset()
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$profile_picture = "img/" . $_SESSION['user']['username'] . ".jpg"; // t.ex: img/fredde.jpg 

if (isset($_POST['submit'])) {
    
    #var_dump($_FILES);
    $temp_file = $_FILES['bildfil']['tmp_name'];

    // Är det faktiskt en bild?
    if (!getimagesize($temp_file)) {
        echo "Filen är inte en valid bild!";

    } else if ($_FILES['bildfil']['type'] != "image/jpeg") {
        echo "Endast JPEG tack!"; 
    } else {
        $upload_status = move_uploaded_file($temp_file, $profile_picture);
        if (!$upload_status) {
            echo "Uppladdningen misslyckades!";
        }
    }

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
   
<body>
    <h2>Min profil</h2>
    <a href="index.php">Huvudsida</a><br>
    <img src="<?php echo $profile_picture; ?>" style="max-width: 100px;">

    <form method="POST" enctype="multipart/form-data">
        Ladda upp profilbild: 
        <input type="file" name="bildfil"><br>
        <input type="submit" name="submit" value="Ladda upp">

    </form>
    
</body>
</html>