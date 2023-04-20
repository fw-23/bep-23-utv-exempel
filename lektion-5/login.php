<?php
    // databas-connection startas i config.php
    require_once("config.php");
    session_start();

    #var_dump($_POST);

    // Om "namn" och "password" finns i $_POST (har skickats via formuläret)
    if (isset($_POST["username"]) && isset($_POST["password"])) {

        // Räkna ut hash av inmatat lösenord "abc123" => "3rdq3qdqdqdqd3sacfda"
        $password_hash = sha1($_POST["password"]); 

        // mysqli prepared statement
        $stmt = $conn->prepare("
            SELECT * FROM users 
            WHERE username = ? AND password = ?
        ");
        // Vi binder två teckensträngar ("ss") till två variabler i 
        // samma ordning som frågetecknen i själva SQL-koden ovan
        $stmt->bind_param("ss", $_POST["username"], $password_hash);
        // Kör queryn
        $stmt->execute();
        // Hämta resultat och spara i $result
        $result = $stmt->get_result();

        // Om result innehåller 1 rad var användarnamn och lösenord rätt!
        if ($result->num_rows == 1) {
            $_SESSION['user'] = $result->fetch_assoc();

            // Redirect till huvudsidan om inloggning lyckas
            header("Location: index.php");

        } else {
            echo "Fel användarnamn eller lösenord";
        }
    }

    if (isset($_POST["logout"])) {
        session_unset();
    }
?>

<!DOCTYPE html>
<html>
    <body>

        <!-- ingen sessionsvariabel: inloggning -->
        <h2>Logga in på webbsidan!</h2>
        <a href="index.php">Huvudsida</a>
        <form method="POST">
            
            <input type="text" name="username" placeholder="Användarnamn"><br>
            <input type="password" name="password" placeholder="Lösenord">
            <input type="submit" value="OK">

        </form>

    </body>
</html>