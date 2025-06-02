<?php
$welcome = $_SESSION['user']['email'] ?? "Guest";
view("index.view.php", ['heading' => 'home', 'welcome' => $welcome]);
