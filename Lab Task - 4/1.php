<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    if ($name == null || $name == "") {
        echo "Name cannot be empty.";
    } else {
        $charCount = 0;
        $wordCount = 0;
        $startsWithLetter = false;
        $isValid = true;

        // Manual checks
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];

            // Count words by detecting spaces
            if ($char == ' ') {
                if ($charCount > 0) {
                    $wordCount++;
                    $charCount = 0; // Reset for the next word
                }
            } else {
                // Check if the first character is a letter
                if ($i == 0 && (($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z'))) {
                    $startsWithLetter = true;
                }

                // Check for valid characters (letters, '.', '-', or space)
                if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char == '.' || $char == '-' || $char == ' ')) {
                    $isValid = false;
                }

                $charCount++;
            }
        }

        // Increment word count for the last word if there's no trailing space
        if ($charCount > 0) {
            $wordCount++;
        }

        // Validations
        if ($wordCount < 2) {
            echo "Name must contain at least two words.";
        } elseif (!$startsWithLetter) {
            echo "Name must start with a letter.";
        } elseif (!$isValid) {
            echo "Name can contain only letters, periods, dashes, and spaces.";
        } else {
            echo "Validation successful! Welcome, $name!";
        }
    }
} else {
    header("Location: 1.html");
}
?>
