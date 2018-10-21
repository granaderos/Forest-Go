<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/27/16
 * Time: 8:42 PM
 */

include_once "../controller/Functions.php";

$dataId = $_POST["dataId"];

$obj = new Functions();
$obj->verifyData($dataId);