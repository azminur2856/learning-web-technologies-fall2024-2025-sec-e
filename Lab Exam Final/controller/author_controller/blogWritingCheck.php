<?php 
    session_start();
    require_once('../../model/authorModel.php');

    if (isset($_REQUEST['submit'])) {

        $id = trim($_REQUEST['authorId']);
        $title = trim($_REQUEST['title']);
        $content = trim($_REQUEST['content']);

        if (empty($title)) {
            $_SESSION['title_error'] = "Title is required!";
        }

        if (empty($content)) {
            $_SESSION['content_error'] = "Content is required!";
        }
        
        if (!isset($_SESSION['title_error']) && !isset($_SESSION['content_error'])) {

            $status = blogAdd($id, $title, $content);

            if ($status) {
                $_SESSION['form_success'] = "Successfuly post blog!";
                header('location: ../../view/author/blogWriting.php');
                exit();
            } else {
                $_SESSION['form_error'] = "Failed to post blog!";

                header('location: ../../view/author/blogWriting.php');
                exit();
            }
        } else {
            header('location: ../../view/author/blogWriting.php');
            exit();
        }
    } else {
        header('location: ../../view/author/blogWriting.php');
        exit();
    }
?>