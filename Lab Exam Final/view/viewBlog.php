<?php
    include_once "header.php";
    include_once('../model/blogModel.php');
    $posts = getAllBlogPosts();
?>

<html>
<head>
    <title>Blog</title>
    <style>
        .blog-post {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .blog-post h2 {
            margin: 0 0 10px;
        }
        .blog-post p {
            margin: 0;
        }
        .read-more {
            display: block;
            margin-top: 10px;
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <?php if (!empty($posts)) { ?>
            <?php foreach ($posts as $post) { ?>
                <div class="blog-post">
                    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($post['author_name']); ?></p>
                    <p><strong>Posted on:</strong> <?php echo htmlspecialchars($post['created_at']); ?></p>
                    <?php if (!empty($post['updated_at'])) { ?>
                        <p><strong>Updated on:</strong> <?php echo htmlspecialchars($post['updated_at']); ?></p>
                    <?php } ?>
                    <p><?php echo nl2br(htmlspecialchars(substr($post['content'], 0, 500))); ?>.....</p>
                    <a href="viewPost.php?post_id=<?php echo $post['post_id']; ?>" class="read-more">Read More</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No blog posts available.</p>
        <?php } ?>
    </div>
</body>
</html>

<?php
    include_once "footer.php";
?>


