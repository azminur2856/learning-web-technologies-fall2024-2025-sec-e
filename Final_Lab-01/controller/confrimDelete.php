<?php 
    session_start();
    require_once('../model/userModel.php');
    if(isset($_REQUEST['submit'])){
            $status = deleteUser($_SESSION['delete_id'], $username, $password, $email);
            if($status){
                header('location: ../view/userlist.php');
                unset($_SESSION['delete_id']);
            } else{
                echo "an error occured";
                ?>
                <a href="../view/userlist.php"> Return to Userlist </a>
<?php
                
            }
        }

    else{
        header('location: ../view/signup.html');
    }

?>