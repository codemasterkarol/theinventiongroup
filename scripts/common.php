<?php
/**
 * Created by PhpStorm.
 * User: karolbrennan
 * Date: 3/31/16
 * Time: 9:26 PM
 */

// pulls in my credentials for connecting to the database
require_once('credentials.php');

// Here is the variables needed for connecting:
// $username = '';
// $password = '';
// $dbname = '';
// $host = 'localhost';
$dsn = 'mysql:dbname='.$dbname.';host=' . $host.';charset=utf8';

// let's try connecting to the database.
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    $_SESSION['general_error'] = "Sorry, we could not complete your request at this time.";
    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/'); exit;
}
// tells PDO to throw exceptions all over the place
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// tells PDO to return db rows using assoc array as default
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);
// tells the browser I am using UTF-8!
header('Content-Type: text/html; charset=utf-8');

session_start();