<!-- the standard layout of any page related to Pharmacists -->


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



    <!-- start add and remove rows -->
    <!-- <script>
        function addMedicineRow() {

            let row = ` <tr id="medicine_rows__row">
                            <td> <input class="form-control" type="text" name="medidine_name" required> </td>
                            <td> <input class="form-control" type="text" name="medidine_quantity" required> </td>
                            <td> <input class="form-control" 2 type="text" name="medidine_total" required> </td>
                            <td> <button class="btn btn-danger" type="button" name="removeRow" id="removeRow" onclick="removeMedicineRow()">REMOVE</button> </td>
                        </tr>`;

            document.getElementById('medicine_rows__row').insertRow().innerHTML = row;

        }

        function removeMedicineRow() {

            let row = document.getElementById("medicine_rows__row");
            let totalRowCount = row.rows.length;
            row.deleteRow(totalRowCount - 1);


        }
    </script> -->
    <!-- end add and remove rows -->

    <title>Document</title>
</head>

<body>

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
                    <a href="./P_invoice.php" class="aside__buttonsBox__button__main">
                        <i class="fa-solid fa-file-invoice fa-beat" style="color: #ffffff;"></i>
                        <span>Invoice</span>
                    </a>
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

            <h1>Welcome Back Dr /<?= $user['name'] ?></h1>