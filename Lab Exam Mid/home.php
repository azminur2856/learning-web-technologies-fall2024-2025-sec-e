<?php 
    session_start();
    if (!isset($_SESSION['status'])) {
        header('location: login.php');
    }

    $user = $_SESSION['users'][$_SESSION['useremail']];
?>

<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome Home, <?= $user['name'] ?>!</h1>
    
    <table>
        <tr>
            <td>Name:</td>
            <td><?= $user['name'] ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?= $user['email'] ?></td>
        </tr>
        <tr>
            <td>Age:</td>
            <td><?= $user['age'] ?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?= $user['gender'] ?></td>
        </tr>
        <tr>
            <td>
                <a href="logout.php">Logout</a>
            </td>
            <td></td>
        </tr>
    </table>
</body>
</html>
