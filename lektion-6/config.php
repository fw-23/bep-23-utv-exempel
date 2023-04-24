<?php
    $page_title = "Lektion 4";
    $show_ipsum = true;

    $valid_user = "fredde";
    $site_password = "b6550c4da17e50e7853706e9d80e657d9156cc0e";

    $db_server = "mysql.arcada.fi";
    $db_username = "welafred";
    $db_name = "welafred"; // databasens namn
    $db_password = "p32UVAGF8s";

    // Exempel enligt https://www.w3schools.com/php/php_mysql_connect.asp
    // Create connection
    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>