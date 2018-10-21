<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:04 PM
 */

    include_once "../controller/Functions.php";

    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $obj = new Functions();
    $obj->addUser($firstname, $lastname, $email, $password);