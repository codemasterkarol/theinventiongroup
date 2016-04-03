<?php
    if(!isset($_SESSION['loggedin'])) {
        session_destroy();
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/'); exit;
    } else {
        session_start();
        require("../includes/header.php");
?>

    <div class="small-12 columns">
        <h2>Member's Area</h2>
        <h3>Welcome to the Member's Only Area, <?php echo $_SESSION['name']; ?>!</h3>
        <p>This is where you can check the status of your submissions!</p>
    </div>

<?php }

require ("../includes/footer.php");