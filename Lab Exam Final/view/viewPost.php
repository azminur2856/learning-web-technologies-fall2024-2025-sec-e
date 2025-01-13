<?php
    include_once "header.php";
    include_once('../model/blogModel.php');

    if (isset($_GET['post_id'])) {
        $post_id = intval($_GET['post_id']);
        $post = getBlogPost($post_id);

        if ($post) {
?>
<html>
<head>
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <style>
        .blog-post {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px auto;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-width: 800px;
        }
        .blog-post h1 {
            margin-bottom: 10px;
        }
        .blog-post p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="blog-post">
        <h1><?php echo htmlspecialchars($post['title']); ?></h1>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($post['author_name']); ?></p>
        <p><strong>Posted on:</strong> <?php echo htmlspecialchars($post['created_at']); ?></p>
        <?php if (!empty($post['updated_at'])) { ?>
            <p><strong>Updated on:</strong> <?php echo htmlspecialchars($post['updated_at']); ?></p>
        <?php } ?>
        <div>
            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        </div>
    </div>
</body>
</html>
<?php
        } else {
            echo "<p>Post not found.</p>";
        }
    } else {
        echo "<p>Invalid post ID.</p>";
    }

    include_once "footer.php";
?>
