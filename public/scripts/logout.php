<?php
/**
 * destroys the current user's session
 */
session_start();
session_destroy();
unset($_SESSION['loggedin']);
die(header('Location:/?logout'));