<?php 
    session_start();
    require_once('../model/userModel.php');
    if (isset($_REQUEST['submit'])) {
        $name = trim($_REQUEST['name']);
        $age = trim($_REQUEST['age']);
        $email = trim($_REQUEST['email']);
        $gender = trim($_REQUEST['gender']);
        $password = trim($_REQUEST['password']);
        $repassword = trim($_REQUEST['repassword']);
        $emailStatus = isEmailRegistered($email);

        if ($name == null || $age == null || $email == null || $gender == null || $password == null || $repassword == null) {
            echo "All fields are required! <a href='../view/signup.html'>Submit Again With Valid Data</a>";
        } 
        elseif ($password !== $repassword) {
            echo "Passwords do not match!";
        } 
        elseif ($emailStatus) {
            echo "Email is already registered! <a href='../view/signup.html'>Sign Up</a>";
        } 
        else {
            $status = addUser($name, $age, $email, $gender, $password);
            if($status){
                header('location: ../view/login.php');
            } else{
                header('location: ../view/signup.html');
            }
        }
    } else {
        header('location: ../view/signup.html');
    }
?>