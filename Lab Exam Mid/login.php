<html lang="en">
  <head>
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <form method="post" action="logincheck.php">
      <table>
        <tr>
          <td>Email:</td>
          <td>
            <input
              type="email"
              name="email"
              value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>"
            />
          </td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <input
              type="password"
              name="password"
              value="<?php echo isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : ''; ?>"
            />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="checkbox" name="remember" value="1"
            <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>
            /> Remember Me
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="Login" />
          </td>
        </tr>
      </table>
    </form>
    <a href="register.php">Register here</a>
  </body>
</html>
