<?php require("../includes/header.php"); ?>

<div class="small-12 columns">
    <h2>Submit an Idea</h2>

    <form id="submit-idea" method="post" action="../scripts/submitidea.php">
        <input type="text" required name="name" placeholder="Nikola Tesla"><label for="name">Name</label>
        <input type="email" required name="email" placeholder="genius@edisonsucks.com"><label for="email">Email</label>
        <input type="tel" required name="phone" placeholder="(555)555-5555"><label for="phone">Phone</label>
        <input type="text" required name="Invention" placeholder="Alternating Current"><label for="Invention">Invention Name</label>
        <textarea name="description" required placeholder="Edison offered to pay me good money to fix his problems with his DC motor, but I suspect he just wants me for my brain and won't actually pay me..."></textarea><label for="description">Description</label>
        <input type="file" class="custom-file-input" name="image" accept="image/*"><label for="image">Image</label>
        <button>Submit</button>
    </form>
</div>

<?php require("../includes/footer.php"); ?>
