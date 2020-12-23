<?php
$pageName = 'logout';

session_start();

unset($_SESSION['user']);

header('Location: login.php');
