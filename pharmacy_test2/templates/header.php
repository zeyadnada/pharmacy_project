<!-- the standard layout of any page related to admin -->


<?php
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/standard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- <nav>
        <div class="navbar">

        </div>
    </nav> -->
    <div class="main">
        <div class="aside">
            <div class="aside__logo">
                <img src="images/pngwing.com_2.png" alt="">
            </div>
            <h3 class="aside__text">Dr.<?= $user['name'] ?></h3>

            <div class="aside__buttonsBox">
                <div class="aside__buttonsBox__button">
                    <a href="./home.php" class="aside__buttonsBox__button__main">
                        <i class="fa-solid fa-house fa-beat" style="color: #ffffff;"></i>
                        <span>Home</span>
                    </a>
                </div>

                <div class="aside__buttonsBox__button">
                    <a href="./purchase.php" class="aside__buttonsBox__button__main">
                        <i class="fa-solid fa-bag-shopping fa-beat" style="color: #ffffff;"></i>
                        <span>purchase</span>
                    </a>
                </div>


                <div class="aside__buttonsBox__button">

                    <a class="aside__buttonsBox__button__main" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                        <i class="fa-solid fa-user-nurse fa-beat"></i>
                        <span>Pharmaciest</span>
                    </a>
                    <div class="collapse" id="collapse1">
                        <div class="aside__buttonsBox__button__second">
                            <a href="./add_pharmaciest.php">Add Aharmaciest</a> <br>
                            <a href="./manage_pharmacist.php">Manage Pharmaciest</a>
                        </div>
                    </div>

                </div>
                <div class="aside__buttonsBox__button">

                    <a class="aside__buttonsBox__button__main" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                        <i class="fa-solid fa-kit-medical fa-beat" style="color: #ffffff;"></i>
                        <span>medicines</span>
                    </a>
                    <div class="collapse" id="collapse2">
                        <div class="aside__buttonsBox__button__second">
                            <a href="add_drug.php">Add medicines</a> <br>
                            <a href="mang_drug.php">Manage medicines</a>
                        </div>
                    </div>

                </div>
                <div class="aside__buttonsBox__button">

                    <a class="aside__buttonsBox__button__main" data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                        <i class="fa-solid fa-truck-medical fa-beat" style="color: #ffffff;"></i> <span>Suppliers</span>
                    </a>
                    <div class="collapse" id="collapse3">
                        <div class="aside__buttonsBox__button__second">

                            <a href="./addsup.php">
                                <span>Add Suppliers</span>
                            </a> <br>
                            <a href="mang_sup.php">Manage Suppliers</a>
                        </div>
                    </div>

                </div>
                <div class="aside__buttonsBox__button">
                    <a href="./logout.php" class="aside__buttonsBox__button__main">
                        <i class="fa-solid fa-right-from-bracket fa-beat" style="color: #ffffff;"></i>
                        <span>log out</span>
                    </a>
                </div>
            </div>


        </div>
        <div class="body container">