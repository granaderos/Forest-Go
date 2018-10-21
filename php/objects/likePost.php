<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:05 PM
 */

    include_once "../controller/Functions.php";

    $postId = $_POST["postId"];

    $obj = new Functions();
    $obj->likePost($postId);