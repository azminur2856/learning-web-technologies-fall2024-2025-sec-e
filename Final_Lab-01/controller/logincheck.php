<?php 
    session_start();
    require_once('../model/userModel.php');
    
    if (isset($_REQUEST['submit'])) {
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);
        $status = login($email, $password);

        if ($email == null || $password == null) {
            echo "Email/Password cannot be empty!";
        } elseif ($status) {
            $_SESSION['useremail'] = $email;
            $_SESSION['status'] = true;

            if (isset($_POST['remember']) && $_POST['remember'] == '1') {
                setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 days
                setcookie('user_password', $password, time() + (86400 * 30), "/"); // 30 days
            }

            header('location: ../view/home.php');
        } else {
            echo "Invalid email or password! <a href='../view/login.php'>Login</a>";
        }
    } else {
        header('location: ../view/login.php');
    }
?>
