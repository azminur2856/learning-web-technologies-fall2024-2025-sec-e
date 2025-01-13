<?php
    include_once('../../controller/author_controller/authorSession.php');  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Author Dashboard</title>
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
                <a href="blogWriting.php">Write Blog</a>
              </li>
              <li class="dashboard-item">
                <a href="../../controller/signout.php?msg=author">Sign Out</a>
              </li>
            </ul>
          </td>
        </tr>
      </table>
    </from>
  </body>
</html>
