<?php

require_once __DIR__ . '/database/entry.php';

session_start();

// if (isset($_SESSION['user'])) {
//     header("location: home.php");
//     exit;
// }
$error = "";
$email = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = db_authenticate($email, $password);
    if ($user === null) {
        $error = "Wrong email or password";
    } else if ($user['email'] === 'zeyadn35@gmail.com' && $user['password'] === '1234') {
        $_SESSION['user'] = $user;
        header("location: home.php");
        exit;
    } else {
        $_SESSION['user'] = $user;
        header("location: P_home.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <div class="container">
        <div class="error-message">
            <?php if ($error !== '') : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Login Failed!</h4>
                    <h3><?= $error ?></h3>

                </div>
            <?php endif ?>
        </div>
        <div class="title">Login</div>
        <div class="content">
            <form action="login.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" required name="email" id="password" value="<?= $email ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" required name="password" id="password">
                    </div>

                </div>

                <div class="button">
                    <input type="submit" name="login" value="LOGIN">
                    </input>
                    <span>Don't have an account?</span>
                    <a href="signUp.php">Sign Up</a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>