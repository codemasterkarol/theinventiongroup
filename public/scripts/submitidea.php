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


    function submitIdea($db, $invention){
        /**
         * Creates a query for inserting the new user into the database
         */

        $query = "INSERT INTO inventions (
            `userid`, `inv_name`, `description`, `image`
        ) VALUES (
            :userid, :inv_name, :description, :image
        )";

        /**
         * executes the query and returns an exception if it fails for some unknown god forsaken reason
         */
        try {

            $stmt = $db->prepare($query);
            $stmt->execute($invention);

            return true;
        } catch(PDOException $exception){
            error_log($exception->getMessage());
            return false;
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
     * Filters the invention title post
     */
    if (empty($_POST['inv_name'])) {
        $errors['inv_name'] = "Please enter your invention's name.";
    } else {
        $inventionName = filterTextInput($_POST['inv_name']);
    }

    /**
     * Filters the description post
     */
    if (empty($_POST['description'])) {
        $errors['description'] = "Please enter a description of your invention.";
    } else {
        $description = filterTextInput($_POST['description']);
    }


    /**
     * Filters the invention post
     */
    if (!empty($_POST['image'])) {
        $image = $_POST['image'];
    } else {
        $image = "";
    }



    /**
     * Checks for errors, sets them in session if exist
     * If not, sends the email and sets the success message
     */
    if (!empty($errors)) {
        $_SESSION['submission_errors'] = $errors;
    } else {
        $userid = intval($_SESSION['id']);
        // create array with submission values
        $invention = [
            'userid'        => $userid,
            'inv_name'      => $inventionName,
            'description'   => $description,
            'image'         => $image
        ];

        if(submitIdea($db, $invention)){
            $_SESSION['message'] = "Your submission has been sent! We will get back to you soon!";
            header('Location:http://' . $_SERVER['HTTP_HOST'] . '/submit'); exit;
        } else {
            $errors = "Sorry, there was an error completing your submission. Please try again later.";
            $_SESSION['submission_errors']['general'] = $errors;
            header('Location:http://' . $_SERVER['HTTP_HOST'] . '/submit'); exit;
        }
    }


} else {
    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/submit'); exit;
}