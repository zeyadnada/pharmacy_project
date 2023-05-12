<?php
require_once __DIR__ . '/database/entry.php';
session_start();

$error = '';

if (isset($_POST['Register'])) {
  $name = $_POST['name'];
  $birth_date = $_POST['birth_date'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $is_exist = database_check_email($email);

  if ($is_exist > 0) {
    $error = 'duplicate email id';
  } else {
    database_add_user($name, $birth_date, $phone, $address, $email, $password, $gender);
    $_SESSION['user'] = $user;
    header("location: login.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="css/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">

      <form action="signUp.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required name="name">
          </div>
          <div class="birthPhone">
            <div class="input-box birth">
              <span class="details">Birth Date</span>
              <input type="date" placeholder="Enter your birth" required name="birth_date">
            </div>
            <div class="input-box">
              <span class="details">Phone</span>
              <input type="text" placeholder="Enter your phone" required name="phone">
            </div>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your address" required name="address">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" required name="email">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" required name="password">
          </div>
          <!-- <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div> -->

        </div>
        <select id="gender" class="form-select" name="gender">
          <option value="" hidden selected disabled>-- Select Gender --</option>
          <option value="MALE">MALE</option>
          <option value="FEMALE">FEMALE</option>

        </select>

        <div class="button">
          <input type="submit" value="Register" name="Register" id="Register">
          <span>Already have an account?</span>
          <a href="login.php">Log in</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>