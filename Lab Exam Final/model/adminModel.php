<?php
    require_once('db.php');
    
    function getAllUsers() {
        $con = getConnection();
        $sql = "SELECT id, name, contact, username, role FROM Users WHERE role = 'author'";
        $result = mysqli_query($con, $sql);
        $users = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }

        return $users;
    }

    function addUser($name, $phone, $username, $password) {
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

    function updateUser($id, $name, $phone, $password = null) {
        $con = getConnection();

        if ($password !== null) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE Users SET name='$name', contact='$phone', password='$hashedPassword' WHERE id='$id'";
        } else {
            $sql = "UPDATE Users SET name='$name', contact='$phone' WHERE id='$id'";
        }

        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteUser($id){
        $con = getConnection();
        $sql = "DELETE FROM users where id=$id";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }

    function searchUsers($search) {
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE (id LIKE '%$search%' OR name LIKE '%$search%' OR contact LIKE '%$search%' OR username LIKE '%$search%') AND role != 'admin'";
        $result = mysqli_query($conn, $sql);
        $users = [];
        
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
    
        mysqli_close($conn);
        return $users;
    }
?>
