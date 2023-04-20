<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend 2023</title>
</head>
<body>
    <h3>Backend-programmering 2023 (utvecklingstudier)</h3>
    <h2>Lektionsexempel</h2>

    <p>Källkoden till allt i denna katalog finns på <a href="https://github.com/fw-23/bep-23-utv-exempel">https://github.com/fw-23/bep-23-utv-exempel</a>
</p>

<?php
# Enkel array med heltal:
$lektioner = [1, 2, 3, 4, 5];

# Array som innehåller associativa arrays:
$code_challenges = [
    [ 'url' => 'CC-tabula-rasa/', 'name' => 'CC Tabula Rasa' ],
    [ 
        'url' => 'CC-feel-included/', 
        'name' => 'CC Feel Included' 
    ]
];
?>

<ul>
    <?php foreach($lektioner as $val) { 
        echo '<li><a href="lektion-' . $val . '/">Lektion ' . $val . '</a></li>';
    } ?>

    <!-- foreach med index med -->
    <?php foreach($code_challenges as $i => $cc) { 
        echo '<li><a href="' . $cc['url'] . '">' 
            . $i+1 . ': ' . $cc['name'] . '</a></li>';
    } ?>

</ul>
    
</body>
</html>