<?php
    session_start();
    require_once('../model/userModel.php');
    if(!isset($_SESSION['status'])){
        header('location: login.php');  
    }

    $user = getUser($_REQUEST['id']);
    $_SESSION['delete_id'] = $_REQUEST['id'];
?>

<html>
<head>
    <title>DELETE USER</title>
</head>
<body>
        <h2>Delete User</h2>
        <form method="post" action="../controller/confirmDelete.php" enctype=""> 
            <table border=1 cellspacing=0>
                <tr>
                    <td>
                        Name: <?=$user["name"]?>
                    </td>
                    <td>
                        Password: <?=$user["password"]?>
                    </td>
                    <td>
                        Email: <?=$user["email"]?>
                    </td>
                </tr>
            </table>
            <hr>
            <input type="submit" name="submit" value="Confirm Deletion" />
        </form>
        <br>
        <a href="userlist.php">Cancel</a>
</body>
</html>