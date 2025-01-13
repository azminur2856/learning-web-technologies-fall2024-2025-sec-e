<?php 
    session_start();
    require_once('../model/userModel.php');
    require_once('encryptionDecryption.php');

    if (isset($_REQUEST['submit'])) {
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);

        if (empty($username)) {
            $_SESSION['username_error'] = "Username cannot be empty!";
        } 

        if (empty($password)) {
            $_SESSION['password_error'] = "Password cannot be empty!";
        }

        if (!isset($_SESSION['username_error']) && !isset($_SESSION['password_error'])){
            $loginResult = signin($username, $password);

            if($loginResult['status']){
                if (isset($_POST['remember']) && $_POST['remember'] == '1') {
                    setcookie('user_name', encryptData($username), time() + (86400 * 30), "/"); // 30 days
                    setcookie('user_password', encryptData($password), time() + (86400 * 30), "/"); // 30 days
                } else {
                    setcookie('user_name', '', time() - 3600, "/"); // Expire
                    setcookie('user_password', '', time() - 3600, "/"); // Expire
                }
                if($loginResult['type'] === 'admin'){
                    $_SESSION['adminStatus'] = true;
                    $_SESSION['adminUsername'] = $username;
                    header('location: ../view/admin/viewDashboard.php');
                }elseif($loginResult['type'] === 'author'){
                    $_SESSION['authorStatus'] = true;
                    $_SESSION['authorUsername'] = $username;
                    header('location: ../view/author/viewDashboard.php');
                }
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['password_error'] = "Invalid username or password!";
                header('location: ../view/signin.php');
                exit();
            }
        } else {
            $_SESSION['username'] = $username;
            header('location: ../view/signin.php');
            exit();
        }
        } else {
        header('location: ../view/signin.php');
        exit();
    }
?>
