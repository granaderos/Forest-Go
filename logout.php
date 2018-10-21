<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/27/16
 * Time: 12:45 PM
 */

session_start();

if(isset($_SESSION["userId"])) {
    session_unset();
    session_destroy();
}

header("Location: index.php");