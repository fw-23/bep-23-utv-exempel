<?php
require 'config.php';

session_start();

// Sidan syns endas om vi är inloggade, annars redirect => login.php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/**
 * ANVÄNDARINFO
 */
if (isset($_POST['firstname'])) {
    $stmt = $conn->prepare("
        UPDATE users SET
            firstname = ?,
            lastname = ?,
            updated_at = CURRENT_TIMESTAMP()
        WHERE id = ?
    ");
    $stmt->bind_param("ssi", 
        $_POST['firstname'], // John (string s)
        $_POST['lastname'], // Doe (string s)
        $_SESSION['user']['id'] // 2 (int i)
    );
    $stmt->execute();

    echo $stmt->affected_rows . " rader ändrade";

}



/**
 * PROFILBILD
 */
$profile_picture = "img/" . $_SESSION['user']['username'] . ".jpg"; // t.ex: img/fredde.jpg 
if (isset($_POST['submit_pic'])) {
    
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

/**
 * HÄMTA den inloggade användaren från databasen
 */
$stmt = $conn->prepare("SELECT * from users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user']['id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

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

    <p>
        <h4>Uppdatera din information</h4>

        <form method="POST">
            Förnamn: <input type="text" name="firstname" 
                value="<?php echo $user['firstname']; ?>"><br>

            Efternamn: <input type="text" name="lastname" 
                value="<?php echo $user['lastname']; ?>"><br>

            <input type="submit" value="Spara">

        </form>
    </p>
    <hr>
    <p>
    <form method="POST" enctype="multipart/form-data">
        Ladda upp profilbild: 
        <input type="file" name="bildfil"><br>
        <input type="submit" name="submit_pic" value="Ladda upp">
    </form>
    </p>

    
</body>
</html>