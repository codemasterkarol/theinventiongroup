<?php $url = $_SERVER["REQUEST_URI"]; ?>

<nav>
    <ul class="menu">
        <li<?= ($url === '/about') ? ' class="active"' : ''; ?>><a href="about">About</a></li>
        <li<?= ($url === '/expertise') ? ' class="active"' : ''; ?>><a href="expertise">Expertise</a></li>
        <li<?= ($url === '/process') ? ' class="active"' : ''; ?>><a href="process">Process</a></li>
        <li<?= ($url === '/faq') ? ' class="active"' : ''; ?>><a href="faq">FAQ</a></li>
        <li<?= ($url === '/submit') ? ' class="active"' : ''; ?>><a href="submit">Submit an Idea</a></li>
        <li<?= ($url === '/contact') ? ' class="active"' : ''; ?>><a href="contact">Contact</a></li>
    </ul>
</nav>