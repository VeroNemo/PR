<?php
include_once "classes/DB.php";

use Classes\DB;

$db = new DB("localhost", "root", "", "pr_database", "3306");

if(isset($_POST['submit'])) {
    $title = $_POST['inputTitleEdit'];
    if(!$_POST['inputFileImageEdit']) {
        $imagePath = $_POST['inputImageEdit'];
    } else $imagePath = "img/".$_POST['inputFileImageEdit'];
    $content = $_POST['textAreaContentEdit'];
    $perex = $_POST['inputPerexEdit'];
    $categoryId = $_POST['optionCategoryEdit'];
    $userId = $_POST['inputUserId'];
    $postId = $_POST['inputPostId'];

    $update = $db->updatePost($title, $perex, $content, $imagePath, $categoryId, $userId, $postId);

    if ($update) {
        header('Location: profile.php?id='.$userId.'');
    }
}
