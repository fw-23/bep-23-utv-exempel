<?php
require 'config.php';

session_start();

if (isset($_POST["logout"])) {
  session_unset();
}

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

  <?php if (isset($_SESSION['user'])) { 
    // Hämta användare
    $result = $conn->query("SELECT * FROM users ");
    ?>
      
      <h1>Välkommen <?php echo $_SESSION['user']['firstname']; ?></h1>
      <a href="profile.php">Användarprofil</a>

      <!-- Utloggning -->
      <form method="post">
          <input type="hidden" name="logout" value="1">
          <input type="submit" value="Logga ut">

      </form>

      <h4>Användare:</h4>
      <ul>
      <?php while ($row = $result->fetch_assoc()) { ?>
        
        <li>
          <img src="img/<?php echo $row['username']; ?>.jpg" style="max-width: 50px;">

          <?php echo $row['firstname'] . " " . $row['lastname']; ?> 

        </li>

      <?php } ?>
      </ul>

  <?php } else { ?>
    <h1>Välkommen till webbsidan</h1>
    <p><a href="login.php">Klicka här för att logga in!</a></p>
  <?php } ?>
    
    





</body>
</html>