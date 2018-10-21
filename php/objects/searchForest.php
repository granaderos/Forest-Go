<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/27/16
 * Time: 6:00 PM
 */

include_once "../controller/Functions.php";

$keyWord = $_POST["keyWord"];

$obj = new Functions();
$obj->searchForest($keyWord);