<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/../scripts/common.php");

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
    if (!empty($_FILES['image'])) {

        // Settings for file uploads
        $imageName = $_FILES['image']['name'];
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/uploads/' . $_SESSION['id'] . '/';

        if(!$_FILES['image']['type'] === "image/jpeg"){
            $errors['image'] = "Sorry, only jpeg images are allowed.";
        } elseif ($_FILES['image']['size'] > 3000000){
            $errors['image'] = "Sorry, your file exceeded our file size limit (3MB).";
        }
        if(empty($errors)) {
            if (!is_dir($uploaddir)) {
                if (!mkdir($uploaddir, 0777, true)) {
                    $_SESSION['message'] = "Sorry, we are unable to complete your submission at this time. Please try again later.";
                    die(header("Location:/submit"));
                }
            }
            // set number to append to file if it exists
            $i = 1;
            // if the file exists, it'll change the file name by appending a number
            while(file_exists($uploaddir . $imageName)) {
                // find the position of the last dot which is where the extension begins
                $extension_pos = strrpos($_FILES['image']['name'], '.');
                // I use the files attribute to get the raw file name instead of the already changed in
                // case the variable $imageName has already been changed
                $imageName = substr($_FILES['image']['name'], 0, $extension_pos) . "_{$i}" . substr($_FILES['image']['name'], $extension_pos);
                // increment $i
                $i++;
            };
            // reset $i
            $i = 1;
            $uploadfile = $uploaddir . basename($imageName);
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
            $image = "<img src='/assets/img/uploads/" . $_SESSION['id'] . '/' . $imageName . "'>";
        } else {
            $_SESSION['submission_errors'] = $errors;
            die(header("Location:/submit"));
        }
    }



    /**
     * Checks for errors, sets them in session if exist
     * If not, sends the email and sets the success message
     */
    if (!empty($errors)) {
        $_SESSION['submission_errors'] = $errors;
        die(header('Location:/submit'));
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
            die(header('Location:/members'));
        } else {
            $errors = "Sorry, there was an error completing your submission. Please try again later.";
            $_SESSION['submission_errors']['general'] = $errors;
            die(header('Location:/submit'));
        }
    }


} else {
    die(header('Location:/submit'));
}