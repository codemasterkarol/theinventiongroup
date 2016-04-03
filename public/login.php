<?php require("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Login</h2>

    <?php if($_SESSION['login_errors']){
        echo '<p class="error">' . $_SESSION['login_errors'] . '</p>';
    } session_destroy(); unset($_SESSION);?>
    <form id="login" method="post" action="scripts/login.php">
        <input type="text" required name="email" placeholder="Username"><label for="email">Username (email address)</label>
        <input type="password" required name="password" placeholder="Password"><label for="password">Password</label>
        <button>Login</button>
    </form>
</div>

<?php require("../includes/footer.php"); ?>
