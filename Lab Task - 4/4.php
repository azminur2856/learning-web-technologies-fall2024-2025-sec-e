<?php
if (isset($_POST['submit'])) {
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;

    if ($gender == null || $gender == "") {
        echo "Please select your gender.";
    } else {
        $isValid = false;

        // Manually validate the input value
        if ($gender == "male" || $gender == "female" || $gender == "other") {
            $isValid = true;
        }

        if ($isValid) {
            echo "Validation successful! You selected: $gender";
        } else {
            echo "Invalid gender selection.";
        }
    }
} else {
    header("Location: 4.html");
}
?>
