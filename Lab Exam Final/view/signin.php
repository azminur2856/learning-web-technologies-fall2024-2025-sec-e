<?php include_once "header.php"; session_start(); ?>
<?php require_once('../controller/encryptionDecryption.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
  </head>
  <body>
    <h1 align="center">Sign In</h1>
    <form method="post" action="../controller/signinCheck.php">
      <table align="center">
        <tr>
          <td></td>
          <td style="color: green" colspan="2" align="center">
            <?php echo isset($_SESSION['form_success']) ? $_SESSION['form_success'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td>Username:</td>
          <td>
            <input type="text" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : (isset($_COOKIE['user_name']) ? decryptData($_COOKIE['user_name']) : ''); ?>" />
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="color: red;">
            <?php echo isset($_SESSION['username_error']) ? $_SESSION['username_error'] : ''; ?>
          </td> 
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <input type="password" name="password" value="<?php echo isset($_COOKIE['user_password']) ? decryptData($_COOKIE['user_password']) : ''; ?>" />
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="color: red;">
            <?php echo isset($_SESSION['password_error']) ? $_SESSION['password_error'] : ''; ?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="checkbox" name="remember" value="1" <?php echo isset($_COOKIE['user_name']) ? 'checked' : ''; ?> /> Remember Me
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="Login" />
          </td>
      </table>
      <?php
        unset($_SESSION['form_success']);
        unset($_SESSION['username_error']);
        unset($_SESSION['password_error']);
        unset($_SESSION['username']);
      ?>
    </form>
  </body>
</html>
<?php include_once "footer.php"; ?>

