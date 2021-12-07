<?php
include_once "classes/DB.php";

use Classes\DB;

$db = new DB("localhost", "root", "", "pr_database", "3306");

if(isset($_POST['submit'])) {
    $firstName = $_POST['inputFirstName'];
    $lastName = $_POST['inputLastName'];
    $email = $_POST['inputEmail'];
    $phone = $_POST['inputPhoneNumber'];
    $address = $_POST['inputAddress'];
    $city = $_POST['inputCity'];
    $country = $_POST['inputCountry'];
    $zip = $_POST['inputPostcode'];
    $photoName = $_POST['optionPhotoName'];
    $size = $_POST['optionFormatSize'];
    if(isset($_POST['checkFrame']) == 0) $frame = 0;
    else $frame = 1;

    $insert = $db->insertOrder($firstName, $lastName, $phone, $email, $address, $zip, $city, $country, $photoName, $size, $frame);

    if ($insert) {
        header('Location: store.php');
    }
}