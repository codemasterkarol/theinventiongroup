<?php
require_once("../../scripts/common.php");
/**
 * Created by PhpStorm.
 * User: karolbrennan
 * Date: 4/2/16
 * Time: 10:17 AM
 */
/**
 * destroys the current user's session
 */
session_unset();
session_destroy();
$_SESSION['loggedin'] = false;
header('Location:http://' . $_SERVER['HTTP_HOST'] . '/'); exit;