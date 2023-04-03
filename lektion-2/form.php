<!DOCTYPE html>
<html>
    <body>
        <?php
            // Vi kollar först att "namn" finns i $_POST
            if (isset($_POST["namn"])) {
                
                // Plocka ut namn ur $_POST:
                $visitor_name = $_POST["namn"];

                // Skriv ut namnet på sidan:
                echo "<h4>Hej $visitor_name!</h4>";
            }
        ?>

        <!-- Formulär -->
        <form method="POST"><!-- ingen action, skickar till denna sida-->
            Skriv ditt namn:
            <input type="text" name="namn">
            <input type="submit" value="OK">

        </form>

    </body>
</html>