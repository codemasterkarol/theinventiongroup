<?php

    require_once('../scripts/common.php');

    if($_SESSION['loggedin'] === true) {
        require("../includes/header.php");
        require("scripts/members.php");
    ?>

        <div class="small-12 columns">
            <h2>Member's Area</h2>
            <h3>Welcome to the Member's Only Area, <?php echo $_SESSION['name']; ?>!</h3>
            <p>This is where you can check the status of your submissions!</p>

            <?php
                if(!empty($_SESSION['message'])){
                    echo '<p>' . $_SESSION['message'] . '</p>';
                    unset($_SESSION['message']);
                }
                if(!empty($_SESSION['inventions_messages']['message'])){
                    echo '<p>' . $_SESSION['inventions_messages']['message'] . '</p>';
                    unset($_SESSION['inventions_messages']['message']);
                }
                if(!empty($_SESSION['inventions_messages']['noinventions'])){
                    echo '<p>' . $_SESSION['inventions_messages']['noinventions'] . '</p>';
                    unset($_SESSION['inventions_messages']['noinventions']);
                }

                if(!empty($_SESSION['inventions'])) {
                    echo "
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Report</th>
                            </tr>
                        ";
                    foreach($_SESSION['inventions'] as $invention){
                        echo "<tr>
                            <td>{$invention['id']}</td>
                            <td>{$invention['inv_name']}</td>
                            <td>{$invention['description']}</td>
                            <td>{$invention['image']}</td>
                            <td>Coming Soon.</td>
                        </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>

    <?php  require ("../includes/footer.php");


    } else {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
        exit;
    }