<?php 
    session_start();

    if (isset($_REQUEST['submit'])) {
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if ($email == null || $password == null) {
            echo "Email/Password cannot be empty!";
        } elseif (isset($_SESSION['users'][$email]) && $_SESSION['users'][$email]['password'] === $password) {
            $_SESSION['status'] = true;
            $_SESSION['username'] = $_SESSION['users'][$email]['name'];
            $_SESSION['useremail'] = $email;

            if (isset($_POST['remember']) && $_POST['remember'] == '1') {
                setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 days
                setcookie('user_password', $password, time() + (86400 * 30), "/"); // 30 days
            }

            header('location: home.php');
        } else {
            echo "Invalid email or password!";
        }
    } else {
        header('location: login.php');
    }
?>
