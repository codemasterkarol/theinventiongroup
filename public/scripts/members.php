<?php

// create an array to hold errors
$errors = [];

/**
 * Finds any inventions by the currently logged in user
 * @param $db
 * @param $userid
 * @return bool
 */
function findInventions($db, $userid){
    $query = "SELECT * FROM inventions WHERE `userid` = :userid";
    $query_params = array('userid' => $userid);
    try {
        $stmt = $db->prepare($query);
        $stmt->execute($query_params);
        $result = $stmt->fetchAll();

        if($result){
            return $result;
        } else {
            return false;
        }
    } catch(PDOException $exception) {
        error_log($exception->getMessage());
        die("Sorry, we could not complete your request at this time. Please try again later.");
    }
}

// checks to see if the user is logged in or not
// then proceeds with either finding inventions or throwing error
if(!empty($_SESSION['loggedin'])){
    if(!empty($_SESSION['id'])){
        // sets userid
        $userid = intval($_SESSION['id']);

        $inventions = findInventions($db, $userid);

        if($inventions != false) {
            $_SESSION['message'] = "Hey! We found some inventions for you!";
            $_SESSION['inventions'] = $inventions;
        } else {
            $errors['message'] = "You don't have any inventions yet! Why not <a href='/submit'>submit one</a>?";
        }
    } else {
        $errors['message'] = "You don't have any inventions yet! Why not <a href='/submit'>submit one</a>?";
    }
}

// sends any existing errors to the session
if(!empty($errors)){
    $_SESSION['inventions_messages'] = $errors;
}