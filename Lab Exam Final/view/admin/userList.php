<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <script src="../../asset/js/search.js"></script>
  </head>
  <body>

    <?php
        include_once("dashboard.php"); 
        include_once('../../model/userModel.php');
        include_once('../../model/adminModel.php');
        $users = getAllUsers();
    ?>
    <h3 style="text-align: center">Dashboard</h3>
    <hr />
    <table align="right" class="table-st" cellspacing="0" width="70%">
        <tr>
            <td>
                <h2 align="center">User List</h2>
                <table align="center">
                    <tr>
                        <td>
                            <input type="text" name="search" id="search" placeholder="Search by ID/NAME/CONTACT NO/USERNAME" style="width: 400px;" onkeyup="searchUser()">
                        </td>
                    </tr>
                </table>
                <table align="center" border=1>
                    <tr>
                        <th colspan="6" id="errorTD" style="color: green;">
                            <?= isset($_SESSION['success_delete']) ? $_SESSION['success_delete'] : ''; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contract No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    <tbody id="userTableBody">
                        <?php 
                            foreach ($users as $user) { 
                        ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?=$user['name'] ?></td>
                            <td><?=$user['contact'] ?></td>
                            <td><?=$user['username'] ?></td>
                            <td><?=$user['role'] ?></td>
                            <td>
                                <a href="update.php?username=<?=$user['username']?>"> UPDATE </a> |
                                <a href="delete.php?username=<?=$user['username']?>"> DELETE </a> 
                            </td>  
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </td>
        </tr>     
    </table>
    <?php 
        unset($_SESSION['success_delete']); 
    ?>
  </body>
</html>