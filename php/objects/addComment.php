<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:05 PM
 */

    include_once "../controller/Functions.php";

    $dataId = $_POST["dataId"];
    $comment = $_POST["comment"];

    $obj = new Functions();
    $obj->addComment($dataId, $comment);