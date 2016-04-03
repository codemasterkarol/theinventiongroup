<?php session_start(); ?>
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
        <div class="auth">
            <?php if($_SESSION['loggedin']) { echo "<span>Welcome, " . $_SESSION['name'] . "!</span>"; ?>
                <a href="/members" class="button">Member's Area</a>
                <a href="/scripts/logout.php" class="button">Logout</a>
            <?php } else { ?>
                <a href="/register" class="button">Register</a>
                <a href="/login" class="button">Login</a>
            <?php } ?>
        </div>
        <div class="small-12 medium-4 columns">
            <a href="/"><img src="/assets/img/newlogo.svg" alt="The Invention Group"></a>
        </div>
        <div class="small-12 medium-8 columns">
            <?php require("nav.php"); ?>
        </div>
    </div>
</header>

<section id="content">
    <div class="row">