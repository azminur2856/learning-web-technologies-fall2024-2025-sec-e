<?php 
    session_start();
    require_once('../model/userModel.php');
    if (!isset($_SESSION['status'])) {
        header('location: ../view/login.php');
    }

    $email = $_SESSION['useremail'];
    $user = getUserByEmail($email);
    if (!$user) {
        echo "User not found.";
        exit;
    }
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
                <a href="editProfile.php">Edit Profile</a>
            </td>
            <td>
                <a href="userlist.php">User List</a>
            </td>
        <tr>
            <td>
                <a href="../controller/logout.php">Logout</a>
            </td>
            <td></td>
        </tr>
    </table>
</body>
</html>
