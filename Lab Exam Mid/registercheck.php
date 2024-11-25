<?php 
    session_start();
    
    if (isset($_REQUEST['submit'])) {
        $name = trim($_REQUEST['name']);
        $age = trim($_REQUEST['age']);
        $email = trim($_REQUEST['email']);
        $gender = trim($_REQUEST['gender']);
        $password = trim($_REQUEST['password']);
        $repassword = trim($_REQUEST['repassword']);

        if ($name == null || $age == null || $email == null || $gender == null || $password == null || $repassword == null) {
            echo "All fields are required! <a href='register.php'>Submit Again With Valid Data</a>";
        } 
        elseif ($password !== $repassword) {
            echo "Passwords do not match!";
        } 
        elseif (isset($_SESSION['users'][$email])) {
            echo "Email is already registered! <a href='login.html'>Login here</a>";
        } 
        else {
            $_SESSION['users'][$email] = [
                'name' => $name,
                'age' => $age,
                'email' => $email,
                'gender' => $gender,
                'password' => $password
            ];
            echo "Registration successful! <a href='login.html'>Login here</a>";
        }
    } else {
        header('location: register.php');
    }
?>
