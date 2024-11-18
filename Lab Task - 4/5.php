<?php
if (isset($_POST['submit'])) {
    $degrees = isset($_POST['degree']) ? $_POST['degree'] : [];

    // Manually count selected degrees
    $count = 0;
    for ($i = 0; $i < sizeof($degrees); $i++) {
        $count++;
    }

    if ($count < 2) {
        echo "Please select at least two degrees.";
    } else {
        echo "Validation successful! You selected: ";
        for ($i = 0; $i < $count; $i++) {
            echo $degrees[$i];
            if ($i < $count - 1) {
                echo ", ";
            }
        }
    }
} else {
    header("Location: 5.html");
}
?>
