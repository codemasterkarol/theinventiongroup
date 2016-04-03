<?php session_start();
/**
 * Created by PhpStorm.
 * User: karolbrennan
 * Date: 4/2/16
 * Time: 10:16 AM
 */

/**
 * Checks to ensure it's a legitimate post request
 * Moves on to process it, or else redirects back to the contact page.
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
     * Filters the message post
     */
    if (empty($_POST['message'])) {
        $errors['message'] = "Please enter your message.";
    } else {
        $message = filterTextInput($_POST['message']);
    }

    /**
     * Checks for errors, sets them in session if exist
     * If not, sends the email and sets the success message
     */
    if (!empty($errors)) {
        $_SESSION['contact_errors'] = $errors;
    } else {
        $to = 'codemasterkarol@gmail.com';
        $subject = "Invention Group: New Contact Form Message";
        $headers = "From: {$name} <{$email}>";
        $body  = "New contact from: {$name}\n";
        $body .= "Subject: {$subject}\n";
        $body .= "Message: {$message}";

        mail($to, $subject, $body, $headers);
        http_response_code(200);
        $_SESSION['message'] = "Your message has been sent successfully!";
    }

    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/contact');
    exit;

} else {
    header('Location:http://' . $_SERVER['HTTP_HOST'] . '/contact'); exit;
}