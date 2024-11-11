<html>
<head>
    <title>Shapes</title>
</head>
<body>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "* ";
                    }
                    echo "<br>";
                }
                ?>
            </td>
            <td>
                <?php
                for ($i = 3; $i >= 1; $i--) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "$j ";
                    }
                    echo "<br>";
                }
                ?>
            </td>
            <td>
                <?php
                $char = 'A';
                for ($i = 1; $i <= 3; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "$char ";
                        $char++;
                    }
                    echo "<br>";
                }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>



