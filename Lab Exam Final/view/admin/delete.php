<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
  </head>
  <body>

    <?php
        include_once("dashboard.php"); 
        include_once('../../model/userModel.php');

        $user = getUserByUsername($_REQUEST['username']);
        $_SESSION['delete_id'] = $user['id'];
        $_SESSION['delete_username'] = $user['username'];
    ?>
    <h3 style="text-align: center">Dashboard</h3>
    <hr />
    <table align="right" class="table-st" cellspacing="0" width="70%">
        <tr>
            <td>
                <h2 align="center">Delete Author (<?= $user['name']?>) Profile</h2>
                <form method="post" action="../../controller/admin_controller/confirmDelete.php" enctype=""> 
                    <table align="center">
                        <tr>
                            <td id="errorTD" style="color: red;">
                            <?= isset($_SESSION['error_delete']) ? $_SESSION['error_delete'] : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ID: <?=$user["id"]?>
                            </td>
                        </tr>
                        <tr>                            
                            <td>
                                Name: <?=$user["name"]?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contact: <?=$user["contact"]?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Username: <?=$user["username"]?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Role: <?=$user["role"]?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                            <input type="submit" name="submit" value="Confirm Deletion" />
                            </td>
                        </tr>
                    </table>
                </form>                
            </td>
        </tr>     
    </table>
    <?php
        unset($_SESSION['error_delete']);
    ?>
  </body>
</html>