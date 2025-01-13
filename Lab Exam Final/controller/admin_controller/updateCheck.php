<?php 
    session_start();
    require_once('../../model/adminModel.php');

    if (isset($_REQUEST['submit'])) {

        $id = trim($_REQUEST['id']);
        $name = trim($_REQUEST['name']);
        $phone = trim($_REQUEST['phone']);
        $password = trim($_REQUEST['password']);
        $repassword = trim($_REQUEST['repassword']);
        $username = trim($_REQUEST['username']);

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

        if (!empty($password)) {
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

        if (!isset($_SESSION['name_error']) && !isset($_SESSION['phone_error']) && !isset($_SESSION['password_error'])) {

            $status = updateUser($id, $name, $phone, $password);

            if ($status) {
                $_SESSION['form_success'] = "Update Successful!";
                header('location: ../../view/admin/update.php?username=' .  urlencode($username));
                exit();
            } else {
                $_SESSION['form_error'] = "Update Failed!";

                header('location: ../../view/admin/update.php?username=' . urlencode($username));
                exit();
            }
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;

            header('location: ../../view/admin/update.php?username=' . urlencode($username));
            exit();
        }
    } else {
        header('location: ../../view/admin/update.php?username=' . urlencode($username));
        exit();
    }
?>