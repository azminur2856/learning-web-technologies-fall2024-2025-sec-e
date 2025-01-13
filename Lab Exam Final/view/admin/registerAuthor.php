<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <script src="../../asset/js/signupCheck.js"></script>
  </head>
  <body>

    <?php
        include_once("dashboard.php"); 
        include_once('../../model/userModel.php');
    ?>
    <h3 style="text-align: center">Dashboard</h3>
    <hr />
    <h1 align="center">Register New Author</label></h1>
    <table align="right" class="table-st" cellspacing="0" width="70%">
      <tr>
        <td>
          <form
            action="../../controller/admin_controller/registerAuthorCheck.php"
            method="POST"
            onsubmit="return validateForm()"
          >
              <table>
                <!-- Form Error -->
                <tr>
                  <td></td>
                  <td id="errorTD" style="color: <?= isset($_SESSION['form_success']) ? 'green' : 'red'; ?>;">
                  <?= isset($_SESSION['form_error']) ? $_SESSION['form_error'] : ''; ?>
                  <?= isset($_SESSION['form_success']) ? $_SESSION['form_success'] : ''; ?>
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
                <!-- Register author by admin -->
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" name="submit" class="regButton" value="Register Author" />
                  </td>
                </tr>
              </table>
          </form>
        </td>
        <td>
          <table id="jsError">
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
      unset($_SESSION['form_success']);
    ?>
  </body>
</html>
