<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Invention Group</title>
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/foundation.min.css">
    <link rel="stylesheet" href="/assets/css/foundation-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
</head>

<header>
    <div class="row">
        <div class="small-12 columns text-right">
            <?php if($_SESSION['loggedin']) { ?>
            <a href="/members">Members Area</a> | <a href="/scripts/logout.php"></a>
            <?php } else { ?>
            <a href="/register">Register</a> | <a href="/login">Login</a>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="small-12 medium-4 columns">
            <a href="/"><img src="/assets/img/newlogo.svg" alt="The Invention Group"></a>
        </div>
        <div class="small-12 medium-8 columns">
            <?php include("nav.php"); ?>
        </div>
    </div>
</header>

<section id="content">
    <div class="row">