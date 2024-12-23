<?php
    session_start();
    require_once('../model/userModel.php');
    if(!isset($_SESSION['status'])){
        header('location: login.html');  
    }

    if(isset($_REQUEST['id'])){
        echo $_REQUEST['id'];
    }

    $user = getUser($_REQUEST['id']);
    $_SESSION['update_id'] = $_REQUEST['id'];
?>

<html>
<head>
    <title>Edit Page</title>
</head>
<body>
        <h2>Edit Profile</h2>
        <form method="post" action="../controller/update.php" enctype=""> 
            Name: <input type="text" name="name" value="<?=$user['name']?>" /> <br>
            Age: <input type="number" name="age" value="<?=$user['age']?>" /><br>
            Gender: 
            <select name="gender">
                <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= $user['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
            </select><br>
            Password: <input type="password" name="password" value="<?=$user['password']?>" /><br>
            Email: <input type="email" name="email" value="<?=$user['email']?>" /><br>
            <input type="submit" name="submit" value="Submit" />
        </form>
</body>
</html>
