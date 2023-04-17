<?php
require 'config.php';

// Exempel enligt https://www.w3schools.com/php/php_mysql_connect.asp
// Create connection
$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Hämta användare
$result = $conn->query("SELECT * FROM users");

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

    <p><a href="login.php">» Login-form</a></p>
    
    <h3><?php echo $page_title; ?></h3>

    <h4>Användare:</h4>
    <ul>
    <?php while ($row = $result->fetch_assoc()) { ?>
      
      <li><?php echo $row['firstname'] . " " . $row['lastname']; ?> </li>

    <?php } ?>
    </ul>



</body>
</html>