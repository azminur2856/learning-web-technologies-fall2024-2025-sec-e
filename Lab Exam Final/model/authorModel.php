<?php
    require_once('db.php');

    function blogAdd($author_id, $title, $content) {
        $con = getConnection();
    
        $blogSql = "INSERT INTO BlogPosts (author_id, title, content) VALUES ('{$author_id}', '{$title}', '{$content}')";
    
        if (mysqli_query($con, $blogSql)) {
            return true;
        } else {
            return false;
        }
    }
?>