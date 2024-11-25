<?php 
    session_start();
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }
?>

<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Register</h1>
    <form method="post" action="registercheck.php">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="" /></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="age" value="" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="" /></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male" /> Male
                    <input type="radio" name="gender" value="Female" /> Female
                    <input type="radio" name="gender" value="Other" /> Other
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value="" /></td>
            </tr>
            <tr>
                <td>Re-enter Password:</td>
                <td><input type="password" name="repassword" value="" /></td>
            </tr>
            <tr>
                <td>
                    <a href="login.php">Login</a>
                </td>
                <td>
                    <input type="submit" name="submit" value="Register" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
