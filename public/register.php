<?php include("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Register</h2>

    <?php
        var_dump($_SESSION['registration_errors']);
        var_dump($_SESSION['registration_messages']);
    ?>

    <form id="register" method="post" action="scripts/register.php">
        <p><input type="text" required name="name" placeholder="Nikola Tesla"><label for="name">Name</label></p>
        <p><input type="email" required name="email" placeholder="genius@edisonsucks.com"><label for="email">Email (will double as your username)</label></p>
        <p><input type="password" required name="password" placeholder="Password"><label for="email">Password</label></p>
        <p><input type="text" required name="address" placeholder="1234 Main St."><label for="address">Street Address</label></p>
        <div class="address-block">
            <div class="city"><input type="text" required name="city" placeholder="Madison"><label for="city">City</label></div>
            <div class="state"><input type="text" required name="state" placeholder="WI"><label for="state">State</label></div>
            <div class="zip"><input type="number" required name="zip" placeholder="53705"><label for="zip">Zip</label></div>
        </div>
        <div class="phone-block">
            <div><input type="tel" required name="dayphone" placeholder="(555)555-5555"><label for="dayphone">Daytime Phone</label></div>
            <div><input type="tel" required name="evephone" placeholder="(555)555-5555"><label for="evephone">Evening Phone</label></div>
        </div>
        <p><button>Register</button></p>
    </form>
</div>

<?php include("../includes/footer.php"); ?>
