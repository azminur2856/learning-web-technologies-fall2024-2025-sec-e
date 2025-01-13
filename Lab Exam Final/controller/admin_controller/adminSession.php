<?php
    session_start();
    if (!isset($_SESSION['adminStatus'])) {
        header('location: ../../view/signin.php');
    }
?>