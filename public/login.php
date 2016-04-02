<?php require("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Login</h2>

    <form id="login" method="post" action="scripts/login.php">
        <input type="text" required name="username" placeholder="Username"><label for="name">Username</label>
        <input type="password" required name="password" placeholder="Password"><label for="email">Password</label>
        <button>Login</button>
    </form>
</div>

<?php require("../includes/footer.php"); ?>
