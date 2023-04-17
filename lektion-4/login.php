<?php
    session_start();

    // användardnamn och lösenords-hash finns i config
    require_once("config.php");

    #var_dump($_POST);

    // Om "namn" finns i $_POST och "namn" är $valid_user
    if (isset($_POST["namn"]) 
        && $_POST["namn"] == $valid_user
        && sha1($_POST["password"]) == $site_password) {
        // Plocka ut namn ur $_POST och spara i $_SESSION
        $_SESSION['visitor_name'] = $_POST["namn"];
    
    // Om "namn" finns i $_POST men "namn" är INTE $valid_user
    } else if (isset($_POST["namn"])) {
        echo 'Fel användarnamn eller lösenord, försök igen!';
    }

    if (isset($_POST["logout"])) {
        session_unset();
    }

?>

<!DOCTYPE html>
<html>
    <body>
       
        <?php if (isset($_SESSION['visitor_name'])) { ?>
            
            <h1>Välkommen <?php echo $_SESSION['visitor_name']; ?></h1>
            
            <!-- Utloggning -->
            <form method="post">
                <input type="hidden" name="logout" value="1">
                <input type="submit" value="Logga ut">

            </form>

        <?php } else { ?>
            <!-- ingen sessionsvariabel: inloggning -->
            <p>Logga in på webbsidan!</p>
            <form method="POST">
                
                <input type="text" name="namn" placeholder="Användarnamn"><br>
                <input type="password" name="password" placeholder="Lösenord">
                <input type="submit" value="OK">

            </form>
        <?php } ?>

 

    </body>
</html>