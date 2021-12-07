<?php
include_once "classes/DB.php";

use Classes\DB;

$db = new DB("localhost", "root", "", "pr_database", "3306");

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert = $db->insertMessage($name, $email, $message);

    if ($insert) {
        header('Location: index.php');
    }
}
