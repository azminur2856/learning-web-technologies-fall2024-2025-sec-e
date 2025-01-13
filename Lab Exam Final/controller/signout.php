<?php
    session_start(); 
    if($_GET['msg']=="admin"){

        unset($_SESSION['adminStatus']);
        unset($_SESSION['adminUsername']);

        header('location: ../view/signin.php');

    } elseif($_GET['msg']=="author"){

        unset($_SESSION['authorStatus']);
        unset($_SESSION['authorUsername']);

        header('location: ../view/signin.php');

    }
?>