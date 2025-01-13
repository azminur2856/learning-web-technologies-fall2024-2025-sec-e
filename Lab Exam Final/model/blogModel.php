<?php
    require_once('db.php');

    function getAllBlogPosts() {
        $con = getConnection();
        $sql = "SELECT BlogPosts.post_id, BlogPosts.title, BlogPosts.content, BlogPosts.created_at, BlogPosts.updated_at, Users.name AS author_name 
                FROM BlogPosts 
                INNER JOIN Users ON BlogPosts.author_id = Users.id 
                ORDER BY BlogPosts.created_at DESC";

        $result = mysqli_query($con, $sql);
        $posts = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts[] = $row;
            }
        }

        return $posts;
    }

    function getBlogPost($post_id) {
        $con = getConnection();
        $sql = "SELECT BlogPosts.title, BlogPosts.content, BlogPosts.created_at, BlogPosts.updated_at, Users.name AS author_name
                FROM BlogPosts
                INNER JOIN Users ON BlogPosts.author_id = Users.id
                WHERE BlogPosts.post_id = $post_id";
        
        $result = mysqli_query($con, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
    
        return null;
    }
    
?>