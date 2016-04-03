<?php require("../includes/header.php");?>
<div class="small-12 columns">

    <?php
    if($_SESSION['message'] || isset($_GET['logout'])) { ?>
        <p class="message">
            <?php
            if(!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            if(!empty($_GET['logout'])) {
                echo "You have successfully logged out!";
            }

            if(!empty($_SESSION['general_error'])) {
                echo $_SESSION['general_error'];
                unset($_SESSION['general_error']);
            }
            ?></p>
    <?php } ?>

    <div class="calltoaction">
        <p class="tagline">We Help Get Your New Idea Off the Ground</p>
        <p class="description">If you have a new invention idea, our team can help you make sure that you are very successful when it comes time to sell your new product. We have been consulting with inventors for over 30 years and we can make sure you are successful, too.</p>
        <p class="action"><a class="actionbtn" href="/submit">Submit an Idea Now!</a></p>
    </div>
</div>
</div>
<div class="row features">

    <div class="small-12 medium-4 columns">
       <a href="about"><div class="feature">
               <img src="/assets/img/findmoney.svg" alt="Find money">
            <p>We find interested parties to provide funding for your project.</p>
        </div></a>
    </div>
    <div class="small-12 medium-4 columns">
        <a href="expertise"><div class="feature">
                <img src="/assets/img/factory.svg" alt="Hand money">
            <p>We find companies to develop and distribute your invention.</p>
        </div></a>
    </div>
    <div class="small-12 medium-4 columns">
        <a href="process"><div class="feature">
                <img src="/assets/img/handmoney.svg" alt="Hand money">
            <p>We give you a generous royalty fee for all of your sales.</p>
        </div></a>
    </div>

</div>
<div class="row">
    <div class="small-12 columns">
        <div class="calltoaction">
            <h3>Our Guarantee</h3>
            <p>We'll put your invention through a thorough evaluation to make sure there's enough interest and the product is ready for market. If our evaluation determines that your invention is a viable product, you only pay us when we license a deal for you.</p>
            <p class="action"><a href="/submit" class="actionbtn">Click here to request your free invention evaluation!</a></p>
        </div>
    </div>
</div>

<div class="row">
<?php require("../includes/footer.php"); ?>