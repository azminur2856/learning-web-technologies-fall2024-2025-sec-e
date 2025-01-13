<?php
    include_once('../../controller/admin_controller/adminSession.php');  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
  </head>
  <body>
    <from>
      <table align="left" width="30%">
        <tr>
          <td>
            <ul>
              <li class="dashboard-item">
                <a href="viewDashboard.php">Dashboard</a>
              </li>
              <li class="dashboard-item">
                <a href="registerAuthor.php">Register Author</a>
              </li>
              <li class="dashboard-item">
                <a href="userList.php">Update/Delete/Search</a>
              </li>
              <li class="dashboard-item">
                <a href="../../controller/signout.php?msg=admin">Sign Out</a>
              </li>
            </ul>
          </td>
        </tr>
      </table>
    </from>
  </body>
</html>
