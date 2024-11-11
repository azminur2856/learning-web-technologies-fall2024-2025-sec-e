<?php
    $num1 = 10;
    $num2 = 20;
    $num3 = 15;

    if ($num1 > $num2 && $num1 > $num3) {
        echo "Largest number is: $num1<br>";
    } elseif ($num2 > $num3) {
        echo "Largest number is: $num2<br>";
    } else {
        echo "Largest number is: $num3<br>";
    }
?>
