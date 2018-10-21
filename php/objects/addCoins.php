<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/27/16
 * Time: 9:02 AM
 */

include_once "../controller/Functions.php";

$userId = $_POST["userId"];

$obj = new Functions();
$obj->addCoins($userId);