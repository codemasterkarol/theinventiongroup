<?php
require_once("../../scripts/common.php");

/**
 * Checks to ensure it's a legitimate post request
 * Moves on to process it, or else redirects back to the login page.
 */
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // this is a legit post and you should go ahead and process this stuff below yo

    // Array for storing error messages
    $errors = [];

    /**
     * Filters and trims email input and returns sanitized email
     * @param $input string data from form
     * @return mixed either filtered email address
     */
    function filterEmailInput($input){
        return filter_var(trim($input), FILTER_SANITIZE_EMAIL);
    }

    /**
     * Hashes the user's password for storing into the database
     * Will return false if it fails, otherwise will return the hashed password
     * @param $password
     * @return bool|string
     */
    function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Verifies password input with the hashed password
     * @param $password
     * @param $hash
     * @return bool
     */
    function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    /**
     * Logs the user in after ensuring that the user exists and the password matches
     * @param $db
     * @param $email
     */
    function login($db, $email){
        $query = "SELECT * FROM users WHERE `email` = :email";
        $query_params = array('email' => $email);
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($query_params);
            $row = $stmt->fetch();

            if($row){
                if(verifyPassword($_POST['password'],$row['password'])) {
                    // set logged in bool and message
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['loggedin'] = true;
                    $_SESSION['message'] = "You have successfully logged in!";
                    // redirect
                    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/'); exit;
                } else {
                    $errors['message'] = "Sorry, we could not find that username/password combination.
                        Please try again.";
                    $_SESSION['login_errors'] = $errors;
                    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/login'); exit;
                }
            }
        } catch(PDOException $exception) {
            error_log($exception->getMessage());
            $errors['message'] = "Sorry, we could not complete your request at this time. Please try again later.";
            $_SESSION['login_errors'] = $errors;
            header('Location:http://' . $_SERVER['HTTP_HOST'] . '/login'); exit;
        }
    }



    // Here is where we start processing stuff.

    /**
     * Filters the email address and ensures it doesn't exist already in the DB
     * If it does, it will throw an error and return the user to the form
     */
    if(empty($_POST['email'])){
        $errors['email'] = "Please enter your email address.";
    } else {
        $email = filterEmailInput($_POST['email']);
        if(!$email){
            $errors['email'] = "Please enter a valid email address.";
        }
    }


    /**
     * Filters the password post item
     */
    if(empty($_POST['password'])){
        $errors['password'] = "Please enter your password.";
    }


    /**
     * This checks for login errors
     * If any are found, it will redirect to the login form
     * If none are found, it will process the login.
     */
    if(empty($errors)) {
        login($db, $email);
    } else {
        $_SESSION['login_errors'] = $errors;
        header('Location:http://' . $_SERVER['HTTP_HOST'] . '/login'); exit;
    }


}  else {
    error_log($exception->getMessage());
    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/login'); exit;
}