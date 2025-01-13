<?php 
    session_start();
    require_once('../../model/adminModel.php');
    if(isset($_REQUEST['submit'])){
        $id = $_SESSION['delete_id'];
        $username = $_SESSION['delete_username'];
            $status = deleteUser($id);
            if($status){
                $_SESSION['success_delete'] = "User Deleted Successfully";
                unset($_SESSION['delete_id']);
                unset($_SESSION['delete_username']);
                header('location: ../../view/admin/userList.php');
            } else{
                $_SESSION['error_delete'] = "User Deletion Failed";
                unset($_SESSION['delete_id']);
                unset($_SESSION['delete_username']);
                header('location: ../../view/admin/delete.php?username=' . urlencode($username));              
            }
        } else{
            header('location: ../../view/signup.php');
    }
?>