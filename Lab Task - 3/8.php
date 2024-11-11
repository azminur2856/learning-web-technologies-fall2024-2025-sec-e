<html>
<head>
    <title>2D Array Shapes</title>
</head>
<body>
<?php
$array = [
    [1, 2, 3, 'A'],
    [1, 2, 'B', 'C'],
    [1, 'D', 'E', 'F']
];
?>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <?php
                for ($row = 0; $row < count($array); $row++) {
                    for ($col = 0; $col < count($array[$row]); $col++) {
                        if (is_int($array[$row][$col])) {
                            echo $array[$row][$col] . " ";
                        }
                    }
                    echo "<br>";
                }
                ?>
            </td>
            <td>
                <?php
                for ($row = 0; $row < count($array); $row++) {
                    for ($col = 0; $col < count($array[$row]); $col++) {
                        if (is_string($array[$row][$col])) {
                            echo $array[$row][$col] . " ";
                        }
                    }
                    echo "<br>";
                }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>



