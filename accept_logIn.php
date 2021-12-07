<?php
include_once "classes/DB.php";

use Classes\DB;

$db = new DB("localhost", "root", "", "pr_database", "3306");

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $userId = $db->checkLogInInformation($email, $passwd);

    if (!($userId == null)) {
        header("Location: add_post.php?id=".$userId);
    }
}
