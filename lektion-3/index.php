<?php
require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
</head>
<body>
    <h3><?php echo $page_title; ?></h3>

    <?php
        // Inkludering:
        require('lorem.php');
    ?>

    <!-- Uppdelat syntax: -->
    <?php if ($show_ipsum) { ?>

        <p>
            <?php 
                require 'ipsum.txt';
            ?>
        </p>

    <!-- uppdelningen forts.. -->
    <?php } else { ?>

        <p>
            <i>ipsum är false</i>
        </p>

    <!-- uppdelningen forts.. -->
    <?php } ?>



</body>
</html>