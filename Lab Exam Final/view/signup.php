<?php include_once "header.php"; session_start(); ?>

<html lang="en">
  <head>
    <title>Sign Up</title>
    <script src="../asset/js/signupCheck.js"></script>
  </head>  

  <body>
  <h1 align="center">Sign Up</label></h1>
    <table align="center" width="100%">
      <tr>
        <td>
          <form
            action="../controller/signupCheck.php"
            method="POST"
            onsubmit="return validateForm()"
          >
              <table align="center">
                <!-- Form Error -->
                <tr>
                  <td></td>
                  <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['form_error']) ? $_SESSION['form_error'] : ''; ?>
                  </td>
                </tr>
                <!-- Name -->
                <tr>
                  <td>Name:</td>
                  <td id="ff">
                    <input type="text" id="name" name="name" value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>" />
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['name_error']) ? $_SESSION['name_error'] : ''; ?>
                  </td>
                </tr>
                <!-- Contract Number -->
                <tr>
                  <td>Contract No:</td>
                  <td id="ff">
                    <input
                      type="text"
                      id="phone"
                      name="phone"
                      placeholder="01XXXXXXXXX"
                      maxlength="11"
                      value="<?= isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>"
                    />
                  </td>
                  <tr>
                  <td></td>
                  <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['phone_error']) ? $_SESSION['phone_error'] : ''; ?>
                  </td>
                </tr>
                <!-- Userame -->
                <tr>
                  <td>Userame:</td>
                  <td id="ff">
                    <input type="text" id="username" name="username" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>" />
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['username_error']) ? $_SESSION['username_error'] : ''; ?>
                  </td>
                </tr>
                </tr>
                <!-- Password -->
                  <td>Password:</td>
                  <td id="ff">
                    <input type="password" id="password" name="password" />
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['password_error']) ? $_SESSION['password_error'] : ''; ?>
                  </td>
                </tr>
                <!-- Re-enter Password -->
                <tr>
                  <td>Re-enter Password:</td>
                  <td id="ff">
                    <input type="password" id="repassword" name="repassword" />
                  </td>
                </tr>
                <!-- Submit and Sign Up -->
                <tr>
                  <td>
                    <a href="signin.php">Sign In</a>
                  </td>
                  <td>
                    <input type="submit" name="submit" class="regButton" value="Sign Up" />
                  </td>
                </tr>
              </table>
          </form>
        </td>
        <td>
          <table align="center" id="jsError">
              <ul id="errorList"></ul>
          </table>
        </td>
      </tr>
    </table>
    <?php
      unset($_SESSION['form_error']);
      unset($_SESSION['name']);
      unset($_SESSION['name_error']);
      unset($_SESSION['phone']);
      unset($_SESSION['phone_error']);
      unset($_SESSION['username']);
      unset($_SESSION['username_error']);
      unset($_SESSION['password_error']);
    ?>
  </body>
</html>

<?php include_once "footer.php"; ?>
