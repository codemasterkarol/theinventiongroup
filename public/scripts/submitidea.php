<?php
require_once("../../scripts/common.php");
/**
 * Created by PhpStorm.
 * User: karolbrennan
 * Date: 4/2/16
 * Time: 10:16 AM
 */

/**
 * Checks to ensure it's a legitimate post request
 * Moves on to process it, or else redirects back to the submission page.
 */
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // this is a legit post and you should go ahead and process this stuff below yo


    // Array to hold our errors
    $errors = [];

    /**
     * Filters and trims input then returns sanitized value
     * @param $input string data from form
     * @return string of sanitized data
     */
    function filterTextInput($input)
    {
        return htmlentities(trim($input), ENT_QUOTES);
    }

    /**
     * Filters and trims email input and returns sanitized email
     * @param $input string data from form
     * @return mixed either filtered email address
     */
    function filterEmailInput($input)
    {
        return filter_var(trim($input), FILTER_SANITIZE_EMAIL);
    }

    /**
     * Filters and ensures input is numeric only and returns value
     * @param $input string data from form
     * @return mixed numeric value
     */
    function filterNumericInput($input){
        return preg_replace('/\D/', '', $input);
    }


    function submitIdea(){
        /**
         * Creates a query for inserting the new user into the database
         */

        $query = "INSERT INTO submission (
            `name`, `email`, `address`, `city`, `state`, `zip`, `dayphone`, `evephone`, `password`
        ) VALUES (
            :name, :email, :address, :city, :state, :zip, :dayphone, :evephone, :password
        )";

        /**
         * executes the query and returns an exception if it fails for some unknown god forsaken reason
         */
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($newUser);

            return true;
        } catch(PDOException $exception){
            error_log($exception->getMessage());
            $errors = "Sorry, there was an error completing your registration. Please try again later.";
            $_SESSION['registration_errors']['general'] = $errors;
            header('Location:http://' . $_SERVER['HTTP_HOST'] . '/register'); exit;
        }
    }




    // This is where it actually starts doing stuff


    /**
     * Filters the name post item
     */
    if (empty($_POST['name'])) {
        $errors['name'] = "Please enter your name.";
    } else {
        $name = filterTextInput($_POST['name']);
    }

    /**
     * Filters the email address
     */
    if (empty($_POST['email'])) {
        $errors['email'] = "Please enter your email address.";
    } else {
        $email = filterEmailInput($_POST['email']);
        if (!$email) {
            $errors['email'] = "Please enter a valid email address.";
        }
    }

    /**
     * Filters the phone post item
     */
    if(empty($_POST['phone'])) {
        $errors['phone'] = "Please enter your phone number.";
    } else {
        $phone = filterNumericInput($_POST['phone']);
        if(strlen($phone) !== '10' ||  strlen($phone) !== '11') {
            $errors['phone'] = "Please enter a valid phone number.";
        }
    }

    /**
     * Filters the invention title post
     */
    if (empty($_POST['inv_name'])) {
        $errors['inv_name'] = "Please enter your invention's name.";
    } else {
        $message = filterTextInput($_POST['inv_name']);
    }

    /**
     * Filters the description post
     */
    if (empty($_POST['description'])) {
        $errors['description'] = "Please enter a description of your invention.";
    } else {
        $message = filterTextInput($_POST['description']);
    }



    /**
     * Checks for errors, sets them in session if exist
     * If not, sends the email and sets the success message
     */
    if (!empty($errors)) {
        $_SESSION['submission_errors'] = $errors;
    } else {

    }

    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/submit');
    exit;

} else {
    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/submit'); exit;
}