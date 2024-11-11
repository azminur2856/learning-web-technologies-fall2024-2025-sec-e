<?php
    $array = [10, 20, 30, 40, 50];
    $search = 30;

    $found = false;
    foreach ($array as $element) {
        if ($element == $search) {
            $found = true;
            break;
        }
    }

    if ($found) {
        echo "Element $search found in the array.<br>";
    } else {
        echo "Element $search not found in the array.<br>";
    }
?>
