<?php
if (isset($_POST['submit'])) {
    $bloodGroup = isset($_POST['blood_group']) ? $_POST['blood_group'] : "";

    if ($bloodGroup == "") {
        echo "Please select your blood group.";
    } else {
        $validBloodGroups = ["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"];
        $isValid = false;

        for ($i = 0; $i < count($validBloodGroups); $i++) {
            if ($bloodGroup == $validBloodGroups[$i]) {
                $isValid = true;
                break;
            }
        }

        if ($isValid) {
            echo "Validation successful! Your blood group is: $bloodGroup";
        } else {
            echo "Invalid blood group selected.";
        }
    }
} else {
    header("Location: 6.html");
}
?>
