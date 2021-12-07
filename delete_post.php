<?php
include_once "classes/DB.php";

use Classes\DB;

if(isset($_GET['post-id'])) {
    $db = new DB("localhost", "root", "", "pr_database", "3306");
    $userId = $_GET['user-id'];
    $postId = $_GET['post-id'];

    $delete = $db->deletePost($postId);

    if ($delete) {
        header('Location: profile.php?id='.$userId.'');
    }
}
