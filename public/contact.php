<?php session_start(); require($_SERVER['DOCUMENT_ROOT'] . "/../includes/header.php");

$formValues = [
    'name' => !empty($_SESSION['name']) ? $_SESSION['name'] : '',
    'email' => !empty($_SESSION['email']) ? $_SESSION['email'] : '',
    'message' => !empty($_SESSION['message']) ? $_SESSION['message'] : ''
];

$errors = [
    'name' => !empty($_SESSION['contact_errors']['name']) ? "<p class='error'>" . $_SESSION['contact_errors']['name'] . "</p>" : '',
    'email' => !empty($_SESSION['contact_errors']['email']) ? "<p class='error'>" . $_SESSION['contact_errors']['email'] . "</p>" : '',
    'message' => !empty($_SESSION['contact_errors']['message']) ? "<p class='error'>" . $_SESSION['contact_errors']['message'] . "</p>" : ''
];
?>

<div class="small-12 columns">
    <h2>Contact Us</h2>
    <?php if(!empty($_SESSION['message'])) { echo '<p class="message">' . $_SESSION['message'] . '</p>'; unset($_SESSION['message']); } ?>

    <form id="contact" method="post" action="/scripts/contact.php">
        <input type="text" name="name" placeholder="Nikola Tesla" <?php if(!empty($_SESSION['name'])){ echo "value='{$_SESSION['name']}'"; } ?> required><label for="name">Name</label>
        <?php if(!empty($_SESSION['contact_errors']['name'])) { echo '<p class="error">' . $_SESSION['contact_errors']['name'] . '</p>'; unset($_SESSION['contact_errors']['name']);} ?>

        <input type="email" name="email" placeholder="genius@edisonsucks.com" <?php if(!empty($_SESSION['email'])){ echo "value='{$_SESSION['email']}'"; } ?> required><label for="email">Email</label>
        <?php if(!empty($_SESSION['contact_errors']['email'])) { echo '<p class="error">' . $_SESSION['contact_errors']['email'] . '</p>'; unset($_SERVER['contact_errors']['email']);} ?>

        <textarea name="message" placeholder="Gosh, I wish I had heard of you guys, that jerk Edison stole all of my ideas. You guys could have surely helped secure my patents!" required></textarea><label for="message">Message</label>
        <?php if(!empty($_SESSION['contact_errors']['message'])) { echo '<p class="error">' . $_SESSION['contact_errors']['message'] . '</p>'; unset($_SESSION['contact_errors']['email']);} ?>

        <button>Send!</button>
    </form>
</div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/../includes/footer.php"); ?>
