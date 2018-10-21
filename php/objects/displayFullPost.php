<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 12:01 AM
 */

    include_once "../controller/Functions.php";

    $postId = $_POST["postId"];

    $obj = new Functions();
    $obj->displayFullPost($postId);