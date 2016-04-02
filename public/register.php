<?php require("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Register</h2>
    <?php if (isset($_SESSION['registration_errors']['userexists'])) { echo '<p class="error">' . $_SESSION['registration_errors']['userexists'] . '</p>';}; ?>
    <form id="register" method="post" action="scripts/register.php">
        <p><input type="text" required name="name" placeholder="Nikola Tesla"><label for="name">Name</label></p>
        <?php if($_SESSION['registration_errors']['name']) { echo '<p class="error">' . $_SESSION['registration_errors']['name'] . '</p>';} ?>
        <p><input type="email" required name="email" placeholder="genius@edisonsucks.com"><label for="email">Email (will double as your username)</label></p>
        <?php if($_SESSION['registration_errors']['email']) { echo '<p class="error">' . $_SESSION['registration_errors']['email'] . '</p>';} ?>
        <p><input type="password" required name="password" placeholder="Password"><label for="email">Password</label></p>
        <?php if($_SESSION['registration_errors']['password']) { echo '<p class="error">' . $_SESSION['registration_errors']['password'] . '</p>';} ?>
        <p><input type="text" required name="address" placeholder="1234 Main St."><label for="address">Street Address</label></p>
        <?php if($_SESSION['registration_errors']['address']) { echo '<p class="error">' . $_SESSION['registration_errors']['address'] . '</p>';} ?>
        <div class="address-block">
            <div class="city"><input type="text" required name="city" placeholder="Madison"><label for="city">City</label></div>
            <?php if($_SESSION['registration_errors']['city']) { echo '<p class="error">' . $_SESSION['registration_errors']['city'] . '</p>';} ?>
            <div class="state"><input type="text" required name="state" placeholder="WI"><label for="state">State</label></div>
            <?php if($_SESSION['registration_errors']['state']) { echo '<p class="error">' . $_SESSION['registration_errors']['state'] . '</p>';} ?>
            <div class="zip"><input type="number" required name="zip" placeholder="53705"><label for="zip">Zip</label></div>
            <?php if($_SESSION['registration_errors']['zip']) { echo '<p class="error">' . $_SESSION['registration_errors']['zip'] . '</p>';} ?>
        </div>
        <div class="phone-block">
            <div><input type="tel" required name="dayphone" placeholder="(555)555-5555"><label for="dayphone">Daytime Phone</label></div>
            <?php if($_SESSION['registration_errors']['dayphone']) { echo '<p class="error">' . $_SESSION['registration_errors']['dayphone'] . '</p>';} ?>
            <div><input type="tel" required name="evephone" placeholder="(555)555-5555"><label for="evephone">Evening Phone</label></div>
            <?php if($_SESSION['registration_errors']['evephone']) { echo '<p class="error">' . $_SESSION['registration_errors']['evephone'] . '</p>';} ?>
        </div>
        <p><button>Register</button></p>
    </form>
</div>

<?php require("../includes/footer.php"); ?>
