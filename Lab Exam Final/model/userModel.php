<?php
    require_once('db.php');

    function checkuname($username){
        $con = getConnection();
        $sql = "SELECT * FROM Users WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            return true;
        } else {
            return false;
        }
    }

    function signup($name, $phone, $username, $password) {
        $con = getConnection();
    
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        $userSql = "INSERT INTO Users (name, contact, username, password, role) 
                    VALUES ('{$name}', '{$phone}', '{$username}', '{$hashedPassword}', 'author')";
    
        if(mysqli_query($con, $userSql)){
            return true;
        } else{
            return false;
        }
    }
    
    // User Sign In
    function signin($username, $password) {
        $con = getConnection();

        $sql = "SELECT * FROM users WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                return [
                    'status' => true,
                    'type' => $user['role'],
                ];
            } else {
                return ['status' => false];
            }
        } else {
            return ['status' => false];
        }
    }
?>
