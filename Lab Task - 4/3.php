<?php
if (isset($_POST['submit'])) {
    $dob = $_POST['dob'];

    if ($dob == null || $dob == "") {
        echo "Date of Birth cannot be empty.";
    } else {
        $day = "";
        $month = "";
        $year = "";
        $i = 0;
        $dobLength = strlen($dob);
        $hyphenCount = 0;

        // Extract the year, month, and day manually
        while ($i < $dobLength) {
            if ($dob[$i] == '-') {
                $hyphenCount++;
            } elseif ($hyphenCount == 0) {
                $year .= $dob[$i];
            } elseif ($hyphenCount == 1) {
                $month .= $dob[$i];
            } elseif ($hyphenCount == 2) {
                $day .= $dob[$i];
            }
            $i++;
        }

        // Convert strings to numbers
        $day = (int)$day;
        $month = (int)$month;
        $year = (int)$year;

        // Validate the year
        if ($year < 1953 || $year > 1998) {
            echo "Year must be between 1953 and 1998.";
        }
        // Validate the month
        elseif ($month < 1 || $month > 12) {
            echo "Month must be between 1 and 12.";
        }
        // Validate the day
        elseif ($day < 1 || $day > 31) {
            echo "Day must be between 1 and 31.";
        }
        // Additional validation for months with fewer than 31 days
        elseif (
            ($month == 4 || $month == 6 || $month == 9 || $month == 11) && $day > 30
        ) {
            echo "Day must be between 1 and 30 for the selected month.";
        }
        // Validation for February and leap year check
        elseif ($month == 2) {
            $isLeapYear = ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
            if (($isLeapYear && $day > 29) || (!$isLeapYear && $day > 28)) {
                echo "Invalid day for February.";
            } else {
                echo "Validation successful! Your Date of Birth: $dob";
            }
        } else {
            echo "Validation successful! Your Date of Birth: $dob";
        }
    }
} else {
    header("Location: 3.html");
}
?>
