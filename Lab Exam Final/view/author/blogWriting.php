<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Author Dashboard</title>
  </head>
  <body>

    <?php
        include_once("dashboard.php"); 
        include_once('../../model/userModel.php');
        $username = $_SESSION['authorUsername'];
        $user = getUserByUsername($username);
    ?>
    <h3 style="text-align: center">Dashboard</h3>
    <hr />
    <h2 align="center"> Write Blog</h2>  
    <form method="POST" action="../../controller/author_controller/blogWritingCheck.php">
        <table align="right" class="table-st" cellspacing="0" width="70%">
            <tr>
                <td></td>
                </td>
                <td id="errorTD" style="color: <?= isset($_SESSION['form_success']) ? 'green' : 'red'; ?>;">
                    <?= isset($_SESSION['form_error']) ? $_SESSION['form_error'] : ''; ?>
                    <?= isset($_SESSION['form_success']) ? $_SESSION['form_success'] : ''; ?>
                </td>
            <tr>
                <td></td>
                <td><input type="hidden" name="authorId" value="<?php echo $user['id']; ?>"></td>
            </tr>
            <tr>
                <td><label for="author">Author:</label></td>
                <td><input type="text" id="author" name="author" value="<?php echo $user['name']; ?>" readonly style="width: 100%;"></td>
            </tr>
            <tr>
                <td><label for="title">Blog Title:</label></td>
                <td><input type="text" id="title" name="title" style="width: 100%;"></td>
            </tr>
            <tr>
                <td></td>
                <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['title_error']) ? $_SESSION['title_error'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td><label for="content">Content:</label></td>
                <td><textarea id="content" name="content" style="width: 100%; height: 300px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td id="errorTD" style="color: red;">
                    <?= isset($_SESSION['content_error']) ? $_SESSION['content_error'] : ''; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="POST" />
                </td>
            </tr>
        </table>
    </form>
    <?php
        unset($_SESSION['form_error']);
        unset($_SESSION['form_success']);
        unset($_SESSION['title_error']);
        unset($_SESSION['content_error']);
    ?>
  </body>
</html>