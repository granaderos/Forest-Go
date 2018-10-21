<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 12:05 AM
 */

    include_once "../controller/Functions.php";

    $dataId = $_POST["dataId"];

    $obj = new Functions();
    $obj->displayLikers($dataId);