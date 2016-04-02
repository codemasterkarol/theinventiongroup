<?php include("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Contact Us</h2>

    <form id="contact" method="post" action="scripts/contacts.php">
        <input type="text" name="Name" placeholder="Nikola Tesla" required><label for="name">Name</label>
        <input type="email" name="Email" placeholder="genius@edisonsucks.com" required><label for="email">Email</label>
        <textarea name="message" placeholder="Gosh, I wish I had heard of you guys, that jerk Edison stole all of my ideas. You guys could have surely helped secure my patents!" required></textarea><label for="message">Message</label>
        <button>Send!</button>
    </form>
</div>

<?php include("../includes/footer.php"); ?>
