<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    
    if ($email == null) {
        echo "Email cannot be empty.";
    } else {
        $atFound = false;
        $dotFound = false;
        $atPosition = -1;
        $dotPosition = -1;
        $emailLength = strlen($email);

        // Manual validation for '@' and '.'
        for ($i = 0; $i < $emailLength; $i++) {
            if ($email[$i] == '@') {
                if ($atFound) {
                    // Multiple '@' symbols are not allowed
                    echo "Invalid email format: multiple '@' symbols.";
                    exit;
                }
                $atFound = true;
                $atPosition = $i;
            } elseif ($email[$i] == '.') {
                $dotFound = true;
                $dotPosition = $i;
            }
        }

        // Check if '@' and '.' exist and are in valid positions
        if (!$atFound || !$dotFound) {
            echo "Email must contain '@' and '.'.";
        } elseif ($atPosition == 0 || $atPosition > $dotPosition || $dotPosition == $emailLength - 1) {
            echo "Invalid email format.";
        } else {
            echo "Validation successful! Your email: $email";
        }
    }
} else {
    header("Location: 2.html");
}
?>
