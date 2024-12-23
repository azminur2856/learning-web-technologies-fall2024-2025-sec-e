<?php

    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'userregistration');
        return $con;
    }

    /*function login($email, $password){
        $con = getConnection();
        $sql = "select * from users where email='{$email}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            return true;
        }else{
            return false;
        }
    }*/

    function login($email, $password){
        $con = getConnection();
        $sql = "SELECT * FROM Users WHERE email = '{$email}' AND password = '{$password}'";
        $result = mysqli_query($con, $sql);
        if($result && mysqli_num_rows($result) > 0){
            return true; // Successful login
        } else {
            return false; // Invalid credentials
        }
    }
    

    function addUser($name, $age, $email, $gender, $password){
        $con = getConnection();
        $sql = "INSERT INTO users (name, age, email, gender, password) VALUES ('{$name}', {$age}, '{$email}', '{$gender}', '{$password}')";
        if(mysqli_query($con, $sql)){
            return true;
        } else{
            return false;
        }
    }

    function isEmailRegistered($email){
        $con = getConnection();
        $sql = "SELECT * FROM Users WHERE email = '{$email}'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            return true; // Email is already registered
        } else {
            return false; // Email is not registered
        }
    }
    
    function getUserByEmail($email){
        $con = getConnection();
        $sql = "SELECT * FROM Users WHERE email = '{$email}'";
        $result = mysqli_query($con, $sql);
        if($result && mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        } else {
            return null; // No user found
        }
    }

    function updateUser($currentEmail, $name, $age, $gender, $password, $email) {
        $con = getConnection();
        $sql = "UPDATE Users SET name='{$name}', age={$age}, gender='{$gender}', password='{$password}', email='{$email}' WHERE email='{$currentEmail}'";
        return mysqli_query($con, $sql);
    }

    function getAllUsers() {
        $con = getConnection();
        $sql = "SELECT id, name AS username, email FROM Users";
        $result = mysqli_query($con, $sql);
        $users = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }

        return $users;
    }

    function getUser($id){
        $con = getConnection();
        $sql = "select * from users where id='{$id}'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
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
?>