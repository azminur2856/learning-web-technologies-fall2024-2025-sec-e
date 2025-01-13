<?php
    session_start();
    if (!isset($_SESSION['authorStatus'])) {
        header('location: ../../view/signin.php');
    }
?>