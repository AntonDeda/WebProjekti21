<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require './controllers/PostController.php';

    $post = new PostController;

    if(isset($_GET['id'])) {
        $postId = $_GET['id'];
    }

    $post->destroy($postId);
?>
