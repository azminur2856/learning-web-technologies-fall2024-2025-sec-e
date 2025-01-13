<?php
    require_once('../../model/adminModel.php');

    if (isset($_GET['query'])) {
        $search = $_GET['query'];
        $users = searchUsers($search);

        if (!empty($users)) { 
            foreach ($users as $user) {
                echo "<tr>
                        <td>{$user['id']}</td>
                        <td>{$user['name']}</td>
                        <td>{$user['contact']}</td>
                        <td>{$user['username']}</td>
                        <td>{$user['role']}</td>
                        <td>
                            <a href='update.php?username={$user['username']}'> UPDATE </a> |
                            <a href='delete.php?username={$user['username']}'> DELETE </a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='6' style='text-align: center;'>No users found</td>
                </tr>";
        }
    }
?>
