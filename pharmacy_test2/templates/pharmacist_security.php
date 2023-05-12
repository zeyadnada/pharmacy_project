<!-- this page to secure normal users "pharmacists" from admins 
 to write any page related to the pharmacists in URL to access it . -->

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}
$user = $_SESSION['user'];

if ($user['email'] === 'zeyadn35@gmail.com' && $user['password'] === '1234') {
    header("location: home.php");
    exit;
}
