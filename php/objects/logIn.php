<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:05 PM
 */

    include_once "../controller/Functions.php";

    $email = $_POST["email"];
    $password = $_POST["password"];

    $obj = new Functions();
    $obj->logIn($email, $password);