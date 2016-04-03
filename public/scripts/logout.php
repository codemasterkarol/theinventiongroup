<?php
/**
 * Created by PhpStorm.
 * User: karolbrennan
 * Date: 4/2/16
 * Time: 10:17 AM
 */
/**
 * destroys the current user's session
 */
session_start();
session_unset();
$_SESSION['message'] = "You have successfully logged out.";
header('Location:http://' . $_SERVER['HTTP_HOST'] . '/'); exit;