<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CC Tabula rasa</title>
</head>
<body>
    <?php 
        for ($i=2; $i<10; $i++) {
            echo "<h4>$i:ans tabell</h4>";
            for ($j=1; $j<=12; $j++) {
                echo "<div>$j • $i = " . $j*$i . "</div>";
            }
        }
    ?>
</body>
</html>