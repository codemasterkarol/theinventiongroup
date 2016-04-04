<?php require_once('credentials.php'); // pulls in my credentials for connecting to the database
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

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
    die(header('Location:/'));
}
// tells PDO to throw exceptions all over the place
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// tells PDO to return db rows using assoc array as default
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);
// tells the browser I am using UTF-8!
header('Content-Type: text/html; charset=utf-8');

session_start();