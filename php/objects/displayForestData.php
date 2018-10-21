<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/27/16
 * Time: 9:43 AM
 */

include_once "../controller/Functions.php";

$forestId = $_POST["forestId"];

$obj = new Functions();
$obj->displayForestData($forestId);