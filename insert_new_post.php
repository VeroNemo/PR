<?php
include_once "classes/DB.php";

use Classes\DB;

$db = new DB("localhost", "root", "", "pr_database", "3306");

if(isset($_POST['submit'])) {
    $title = $_POST['inputTitle'];
    $imagePath = "img/" . $_POST['inputImage'];
    $content = $_POST['textAreaContent'];
    $perex = $_POST['inputPerex'];
    $categoryId = $_POST['optionCategory'];
    $userId = $_POST['inputUserId'];

    $insert = $db->insertPost($title, $perex, $content, $imagePath, $categoryId, $userId);

    if ($insert) {
        header('Location: profile.php?id='.$userId.'');
    }
}
