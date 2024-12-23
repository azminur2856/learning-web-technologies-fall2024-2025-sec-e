<?php
    session_start();
    require_once('../model/userModel.php');

    if(!isset($_SESSION['status'])){
        header('location: login.html');  
    }

    $users = getAllUsers();
?>

<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
        <h2>User List</h2>    
        <a href="home.php"> Back </a> | 
        <a href="../controller/logout.php"> logout </a>

        <br>

        <table border=1>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php 
                foreach ($users as $user) { 
            ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?=$user['username'] ?></td>
                <td><?=$user['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?=$user['id']?>"> EDIT </a> |
                    <a href="delete.php?id=<?=$user['id']?>"> DELETE </a> 
                </td>  
            </tr>

            <?php } ?>
        </table>
</body>
</html>
