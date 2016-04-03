<?php require("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Submit an Idea</h2>


    <?php if($_SESSION['loggedin']) {
        if(!empty($_SESSION['message'])) { echo '<p class="message">' . $_SESSION['message'] . '</p>'; unset($_SESSION['message']); }

        if(!empty($_SESSION['submission_errors']['message'])) { echo '<p class="error">' . $_SESSION['submission_errors']['message'] . '</p>'; unset($_SESSION['submission_errors']['message']); }

        ?>
        <form id="submit-idea" method="post" action="scripts/submitidea.php">
            <h4>Inventor Information</h4>
            <input type="text" required name="name" placeholder="Nikola Tesla"  <?php if(!empty($_SESSION['name'])){ echo "value='{$_SESSION['name']}'"; } ?>><label for="name">Name</label>
            <?php if(!empty($_SESSION['submission_errors']['name'])) { echo '<p class="error">' . $_SESSION['submission_errors']['name'] . '</p>'; unset($_SESSION['submission_errors']['name']);} ?>
            <input type="email" required name="email" placeholder="genius@edisonsucks.com"  <?php if(!empty($_SESSION['email'])){ echo "value='{$_SESSION['email']}'"; } ?>><label for="email">Email</label>
            <?php if(!empty($_SESSION['submission_errors']['email'])) { echo '<p class="error">' . $_SESSION['submission_errors']['email'] . '</p>'; unset($_SESSION['submission_errors']['email']);} ?>
            <h4>Invention Information</h4>
            <input type="text" required name="inv_name" placeholder="Alternating Current"><label for="inv_name">Invention Name</label>
            <?php if(!empty($_SESSION['submission_errors']['inv_name'])) { echo '<p class="error">' . $_SESSION['submission_errors']['inv_name'] . '</p>'; unset($_SESSION['submission_errors']['inv_name']);} ?>
            <textarea name="description" required placeholder="Edison offered to pay me good money to fix his problems with his DC motor, but I suspect he just wants me for my brain and won't actually pay me..."></textarea><label for="description">Description</label>
            <?php if(!empty($_SESSION['submission_errors']['description'])) { echo '<p class="error">' . $_SESSION['submission_errors']['description'] . '</p>'; unset($_SESSION['submission_errors']['description']);} ?>
            <input type="file" class="custom-file-input" name="image" accept="image/*"><label for="image">Image</label>
            <?php if(!empty($_SESSION['submission_errors']['image'])) { echo '<p class="error">' . $_SESSION['submission_errors']['image'] . '</p>'; unset($_SESSION['submission_errors']['image']);} ?>
            <h4>Billing Information</h4>
            o
            <input type="text" name="cc" placeholder="9999-9999-9999-9999"><label for="cc">Credit Card Number *</label>
            <input type="text" name="exp" placeholder="12/99"><label for="exp">Exp (MM/YY) *</label>
            <button>Submit</button>
        </form>

        <p class="disclaimer">* Please do not enter real financial information. This project is for educational purposes only, we are not offering a real service.<br>
            If you do enter your information you do so at your own risk. The information entered in financial related fields will not be stored nor processed.
        </p>
    <?php } else { ?>
        <h3>Hello Inventor!</h3>
        <p>Please <a href="/register">Register</a> to submit your idea today!</p>
        <h5>Register?? But, why?!</h5>
        <p>By registering for our site, you will gain access to the member's area where you can track your submissions!</p>
        <p><strong>Also!</strong> You won't have to submit all of your contact info again for future submissions!</p>
        <p>With your future submissions you'll be able to just enter your invention information and go!</p>
        <p class="text-center">So what are you waiting for?<br><a href="/register" class="button">Register Today!</a></p>
    <?php } ?>
</div>

<?php require("../includes/footer.php"); ?>