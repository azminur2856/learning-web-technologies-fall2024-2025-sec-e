<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <script src="../../asset/js/updateCheck.js"></script>
  </head>
  <body>

    <?php
        include_once("dashboard.php"); 
        include_once('../../model/userModel.php');

        $user = getUserByUsername($_REQUEST['username']);
    ?>
    <h3 style="text-align: center">Dashboard</h3>
    <hr />
    <h2 align="center">Update Author (<?= $user['name']?>) Profile</h2>
    <table align="right" class="table-st" cellspacing="0" width="70%">
        <tr>
            <td>
                <form method="post" action="../../controller/admin_controller/updateCheck.php" onsubmit="return validateForm()">
                    <table align="center">
                        <tr>
                            <td></td>
                            <td id="errorTD" style="color: <?= isset($_SESSION['form_success']) ? 'green' : 'red'; ?>;">
                            <?= isset($_SESSION['form_error']) ? $_SESSION['form_error'] : ''; ?>
                            <?= isset($_SESSION['form_success']) ? $_SESSION['form_success'] : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>ID:</td>
                            <td><input type="text" name="id" value="<?=$user['id']?>" readonly /></td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" id="name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : (isset($user['name']) ? $user['name'] : ''); ?>" /> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td id="errorTD" style="color: red;">
                            <?= isset($_SESSION['name_error']) ? $_SESSION['name_error'] : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Contact:</td>
                            <td><input type="text" id="phone" name="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : (isset($user['contact']) ? $user['contact'] : ''); ?>" /> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td id="errorTD" style="color: red;">
                            <?= isset($_SESSION['phone_error']) ? $_SESSION['phone_error'] : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" value="<?=$user['username']?>" readonly /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" id="password" name="password" placeholder="(leave blank if unchanged)" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td id="errorTD" style="color: red;">
                            <?= isset($_SESSION['password_error']) ? $_SESSION['password_error'] : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Re-Password:</td>
                            <td><input type="password" id="repassword" name="repassword" placeholder="(leave blank if unchanged)" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Update" /></td>
                        </tr>
                    </table>
                </form>
            </td>
            <td>
                <table align="center" id="jsErrorUpdate">
                    <ul id="errorListUpdate"></ul>
                </table>
            </td>
        </tr>     
    </table>
    <?php
        unset($_SESSION['form_success']);
        unset($_SESSION['form_error']);
        unset($_SESSION['name_error']);
        unset($_SESSION['phone_error']);
        unset($_SESSION['password_error']);
        unset($_SESSION['name']);
        unset($_SESSION['phone']);
    ?>
  </body>
</html>