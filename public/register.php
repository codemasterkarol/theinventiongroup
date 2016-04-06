<?php require($_SERVER['DOCUMENT_ROOT'] . "/../includes/header.php");

    $formValues = [
        'name' => !empty($_SESSION['name']) ? $_SESSION['name'] : '',
        'email' => !empty($_SESSION['email']) ? $_SESSION['email'] : '',
        'address' => !empty($_SESSION['address']) ? $_SESSION['address'] : '',
        'city' => !empty($_SESSION['city']) ? $_SESSION['city'] : '',
        'state' => !empty($_SESSION['state']) ? $_SESSION['state'] : '',
        'zip' => !empty($_SESSION['zip']) ? $_SESSION['zip'] : '',
        'dayphone' => !empty($_SESSION['dayphone']) ? $_SESSION['dayphone'] : '',
        'evephone' => !empty($_SESSION['evephone']) ? $_SESSION['evephone'] : ''
    ];
    
    $errors = [
        'name' => !empty($_SESSION['registration_errors']['name']) ? "<p class='error'>" . $_SESSION['registration_errors']['name'] . "</p>" : '',
        'email' => !empty($_SESSION['registration_errors']['email']) ? "<p class='error'>" . $_SESSION['registration_errors']['email'] . "</p>" : '',
        'address' => !empty($_SESSION['registration_errors']['address']) ? "<p class='error'>" . $_SESSION['registration_errors']['address'] . "</p>" : '',
        'city' => !empty($_SESSION['registration_errors']['city']) ? "<p class='error'>" . $_SESSION['registration_errors']['city'] . "</p>" : '',
        'state' => !empty($_SESSION['registration_errors']['state']) ? "<p class='error'>" . $_SESSION['registration_errors']['state'] . "</p>" : '',
        'zip' => !empty($_SESSION['registration_errors']['zip']) ? "<p class='error'>" . $_SESSION['registration_errors']['zip'] . "</p>" : '',
        'dayphone' => !empty($_SESSION['registration_errors']['dayphone']) ? "<p class='error'>" . $_SESSION['registration_errors']['dayphone']  . "</p>": '',
        'evephone' => !empty($_SESSION['registration_errors']['evephone']) ? "<p class='error'>" . $_SESSION['registration_errors']['evephone'] . "</p>" : ''
    ];
?>



<div class="small-12 columns">
    <h2>Register</h2>
    <?php if (!empty($_SESSION['registration_errors']['userexists'])) {
        echo '<p class="error">' . $_SESSION['registration_errors']['userexists'] . '</p>';
        unset($_SESSION['registration_errors']['userexists']);
    }; ?>
    <form id="register" method="post" action="/scripts/register.php">
        <p>
            <input type="text" required name="name" placeholder="Nikola Tesla" value="<?= $formValues['name'] ?>" <?= !empty($_SESSION['registration_errors']['name']) ? 'class="error"': ''; ?>>
            <label for="name">Name</label>
        </p><?= $errors['name']; ?>
        <p>
            <input type="email" required name="email" placeholder="genius@edisonsucks.com" value="<?= $formValues['email'] ?>" <?= !empty($_SESSION['registration_errors']['email']) ? 'class="error"': ''; ?>>
            <label for="email">Email (will double as your username)</label>
        </p><?= $errors['email']; ?>
        <p>
            <input type="password" required name="password" placeholder="Password"><label for="email">Password</label>
        </p>
        <p>
            <input type="text" required name="address" placeholder="1234 Main St." value="<?= $formValues['address'] ?>"  <?= !empty($_SESSION['registration_errors']['address']) ? 'class="error"': ''; ?>>
            <label for="address">Street Address</label>
        </p><?= $errors['address']; ?>
        <div class="address-block">
            <div class="city">
                <input type="text" required name="city" placeholder="Madison" value="<?= $formValues['city'] ?>"  <?= !empty($_SESSION['registration_errors']['city']) ? 'class="error"': ''; ?>>
                <label for="city">City</label>
            </div>
             <div class="state">
                 <input type="text" required name="state" placeholder="WI" value="<?= $formValues['state'] ?>"  <?= !empty($_SESSION['registration_errors']['state']) ? 'class="error"': ''; ?>>
                 <label for="state">State</label>
             </div>
            <div class="zip">
                <input type="number" required name="zip" placeholder="53705" value="<?= $formValues['zip'] ?>"  <?= !empty($_SESSION['registration_errors']['zip']) ? 'class="error"': ''; ?>>
                <label for="zip">Zip</label>
            </div>
            <?= $errors['city']; ?>
            <?= $errors['state']; ?>
            <?= $errors['zip']; ?>
        </div>
        <div class="phone-block">
            <div>
                <input type="tel" required name="dayphone" placeholder="(555)555-5555" value="<?= $formValues['dayphone'] ?>" <?php if(!empty($_SESSION['registration_errors']['dayphone'])){echo " class='error'"; } ?>>
                <label for="dayphone">Daytime Phone</label><?= $errors['dayphone']; ?>
            </div>
            <div>
                <input type="tel" required name="evephone" placeholder="(555)555-5555" value="<?= $formValues['evephone'] ?>" <?php if(!empty($_SESSION['registration_errors']['evephone'])){echo " class='error'"; } ?>>
                <label for="evephone">Evening Phone</label><?= $errors['evephone']; ?>
            </div>
        </div>
        <p><button>Register</button></p>
    </form>
</div>

<?php
unset($_SESSION['registration_errors']);
require($_SERVER['DOCUMENT_ROOT'] . "/../includes/footer.php"); ?>
