<?php 
    session_start();
    require_once('../model/userModel.php');

    if (isset($_REQUEST['submit'])) {

        $name = trim($_REQUEST['name']);
        $phone = trim($_REQUEST['phone']);
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        $repassword = trim($_REQUEST['repassword']);

        if (empty($name)) {
            $_SESSION['name_error'] = "Name is required!";
        } else {
            $valid = true;
        
            $parts = explode(' ', $name);
        
            foreach ($parts as $part) {
                if (empty($part) || $part[0] < 'A' || $part[0] > 'Z' || !ctype_alpha($part)) {
                    $valid = false;
                    break;
                }
            }      
            if (!$valid) {
                $_SESSION['name_error'] = "All Parts of Name must start with a capital letter and contain only alphabetic characters!";
            }
        }        

        if (empty($phone)) {
            $_SESSION['phone_error'] = "Phone number is required!";
        } else {
            if (strlen($phone) !== 11) {
                $_SESSION['phone_error'] = "Phone number must be exactly 11 digits long!";
            } elseif ($phone[0] !== '0') {
                $_SESSION['phone_error'] = "Phone number must start with '0'!";
            } elseif ($phone[1] !== '1') {
                $_SESSION['phone_error'] = "Phone number must start with '01'!";
            } elseif ($phone[2] < '3' || $phone[1] > '9') {
                $_SESSION['phone_error'] = "The third digit must be between '3' and '9'!";
            } else {
                for ($i = 0; $i < 10; $i++) {
                    if ($phone[$i] < '0' || $phone[$i] > '9') {
                        $_SESSION['phone_error'] = "Phone number must contain only digits!";
                        break;
                    }
                }
            }
        }
        
        // Username validation
        if (empty($username)) {
            $_SESSION['username_error'] = "No username given!";
        } else {
            $uNameInDB = checkuname($username);

            function forUname($username) {
                for ($i = 0; $i < strlen($username); $i++) {
                    $char = $username[$i];
                    if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char === '.' || $char === '_' || $char === ' ' || ($char >= '0' && $char <= '9'))) {
                        return false;
                    }
                }
                return true;
            }
        
            if ($uNameInDB == $username) {
                $_SESSION['username_error'] = "UserName already exists!";
            } 
        
            if (strlen($username) < 6) {
                $_SESSION['username_error'] = "UserName must contain at least 6 characters..!";
            }
        
            if (!forUname($username)) {
                $_SESSION['username_error'] = "User Name has not allowed characters..!";
            }
        }   

        if (empty($password)) {
            $_SESSION['password_error'] = "Password is required!";
        } else {
            $hasSpecialChar = false;
            for ($i = 0; $i < strlen($password); $i++) {
                if ($password[$i] === '@' || $password[$i] === '#' || $password[$i] === '$' || $password[$i] === '%') {
                    $hasSpecialChar = true;
                    break;
                }
            }

            if (strlen($password) < 8) {
                $_SESSION['password_error'] = "Password must be at least 8 characters long!";
            } elseif (!$hasSpecialChar) {
                $_SESSION['password_error'] = "Password must contain at least one special character (@, #, $, or %)!";
            } elseif ($password !== $repassword) {
                $_SESSION['password_error'] = "Passwords do not match!";
            }
        }

        if (!isset($_SESSION['name_error']) && !isset($_SESSION['phone_error']) && !isset($_SESSION['password_error']) && !isset($_SESSION['username_error'])) {

            $status = signup($name, $phone, $username, $password);

            if ($status) {
                $_SESSION['form_success'] = "Sign Up Successful!</br>Please Sign In to Continue.";
                header('location: ../view/signin.php');
                exit();
            } else {
                $_SESSION['form_error'] = "Sign Up Failed!";
                $_SESSION['name'] = $name;
                $_SESSION['phone'] = $phone;
                $_SESSION['username'] = $username;

                header('location: ../view/signup.php');
                exit();
            }
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            $_SESSION['username'] = $username;

            header('location: ../view/signup.php');
            exit();
        }
    } else {
        header('location: ../view/signup.php');
        exit();
    }
?>