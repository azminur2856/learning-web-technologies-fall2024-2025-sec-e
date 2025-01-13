<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
  </head>
  <body>

    <?php
        include_once("dashboard.php"); 
        include_once('../../model/userModel.php');
        $username = $_SESSION['adminUsername'];
        $user = getUserByUsername($username);
        if (!$user) {
            $_SESSION['data_error'] = "User not found!";
            exit;
        }
    ?>
    <h3 style="text-align: center">Dashboard</h3>
    <hr />
    <form>
      <table align="right" class="table-st" cellspacing="0" width="70%">
        <tr>
          <td></td>
          <td id="errorTD" style="color: red;" colspan="2" align="center">
            <?= isset($_SESSION['data_error']) ? $_SESSION['data_error'] : ''; ?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3" align="center" style="color: blue;">
            <h1>Welcome Home, <?= $user['name'] ?>!</h1>
          </td>
        </tr>
        <tr>
          <td colspan="3" align="center">
            <h2>User Type: <?= $user['role'] ?></h2>
          </td>
        </tr>
      </table>
      <?php
          unset($_SESSION['data_error']);
      ?>
    </form>
  </body>
</html>