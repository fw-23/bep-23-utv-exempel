<?php
$page_title = "Lektion 2 - PHP basics";
// array index: 0         1          2        3 ...
$veckodagar = ["söndag", "måndag", "tisdag", "onsdag", "torsdag", "fredag", "lördag"];

date_default_timezone_set("EET"); # Fixa tidszonen
$hour = date("H"); // timme (00-23)
$minute = date("i"); // minut (00-59)
$dow = date("w"); // veckodag 0-6 (0 = söndag)

if ($hour < 12) {
    $dygnstid = "förmiddag";
} else if ($hour <= 16) {
    $dygnstid = "eftermiddag";
} else {
    $dygnstid = "kväll";
}

// Pausräknare
if ($hour < 12) {
    // förmiddag
    $minutes_to_break = 60-$minute;
} else {
    // eftermiddag
    $minutes_to_break = 45-$minute;
}

?>
<!DOCTYPE html>
<html>
    <head><title><?php echo $page_title; ?></title></head>
    <body>
        <h3><?php echo $page_title; ?></h3>
        <?php 
            echo "<p>God $dygnstid, klockan är $hour:$minute
                och det är " . $veckodagar[$dow] . ".</p>";
            
            if ($minutes_to_break > 0) {
                echo "<p>Det är $minutes_to_break 
                    minuter till nästa paus.</p>";
            } else {
                echo "<p>Det är PAUS!</p>";
            }

            echo "<div>for-loop:</div><ul>";
            for ($i=1; $i<6; $i++) {
                echo "<li>$i</li>";
            }
            echo "</ul>";

            echo "<div>Nested for-loop:</div><ul>";
            // Yttre loop ($i)
            for ($i=1; $i<6; $i++) {
                echo "<li><b>$i: </b>";
                // Inre loop ($j)
                for ($j=1; $j<6; $j++) {
                    echo $j+$i ." ";
                }
                echo "</li>";
            }
            echo "</ul>";
        ?> 
        <div>while-loop:</div>
        <ul>
            <?php 
                $i = 1;
                while ($i < 6) {
                    echo "<li>$i</li>";
                    $i++;
                }
            ?>
        </ul>

    </body>
</html>