<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 2:11 PM
 */

    include_once "../controller/Functions.php";

    $forestId = $_POST["forestId"];
    $content = $_POST["content"];
    $title = $_POST["title"];
    $uniquePhotoName = "";

    $allowedImageType = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
    $allowedExtension = array("gif", "jpeg", "jpg", "png");
    $extension = end(explode(".", $_FILES["photo"]["name"]));
    if(in_array($_FILES["photo"]["type"], $allowedImageType) || in_array($extension, $allowedExtension)) {
        if($_FILES["photo"]["error"] > 0) {
            echo "Unable to upload image";
        } else {
            $uniquePhotoName = rand(0, 9999999999).".".$extension;
            move_uploaded_file($_FILES["photo"]["tmp_name"], "../../images/".$uniquePhotoName);
        }
    }

    $obj = new Functions();
    $obj->addReport($forestId, $title, $content, $uniquePhotoName);
    echo "this = :)";