<!-- this page to secure admin from normal users "pharmasists"
 to write any page related to the admim in URL to access it . -->
 
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}
$user = $_SESSION['user'];

if ($user['email'] !== 'zeyadn35@gmail.com' && $user['password'] !== '1234') {
    header("location: P_home.php");
    exit;
}
