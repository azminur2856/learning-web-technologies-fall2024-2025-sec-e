<?php
    session_start();
    require_once('../model/userModel.php');

    if (isset($_REQUEST['submit'])) {
        $name = trim($_REQUEST['name']);
        $age = (int)trim($_REQUEST['age']);
        $gender = trim($_REQUEST['gender']);
        $password = trim($_REQUEST['password']);
        $email = trim($_REQUEST['email']);

        if (empty($name) || empty($age) || empty($gender) || empty($password) || empty($email)) {
            echo "All fields are required!";
            exit;
        }

        // Check if the user exists in the database
        $currentEmail = $_SESSION['useremail'];
        $user = getUserByEmail($currentEmail);

        if (!$user) {
            echo "User not found.";
            exit;
        }

        // Update the user data
        if (updateUser($currentEmail, $name, $age, $gender, $password, $email)) {
            // Update session email if it was changed
            if ($currentEmail !== $email) {
                $_SESSION['useremail'] = $email;
            }

            echo "Profile updated successfully!";
            header('location: ../view/home.php');
        } else {
            echo "Failed to update profile.";
        }
    } else {
        header('location: ../view/edit.php');
    }
?>
