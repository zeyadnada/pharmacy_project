<?php
require_once __DIR__ . '/templates/pharmacist_security.php';

require_once __DIR__ . '/database/invoice_issue.php';
$user = $_SESSION['user'];

// get the next invoice number
$invoice_number = create_invoice_number();
$invoice_number += 1;

// get all medicines name to put it in datalist
$medicines_name_for_data_list = medicines_name();
$total_medicine_price = 0;
if (isset($_POST['medicines_name'], $_POST['medicine_quantity'])) {
    $selected_medicine_name = $_POST['medicines_name'];
    $medicine = get_medicine_by_name($selected_medicine_name);
    $medicine_price = $medicine['medicine_price'];
    $selected_medicine_quantity = $_POST['medicine_quantity'];
    $total_medicine_price = ($selected_medicine_quantity * $medicine_price);
}






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
    <script>
        function addMedicineRow() {

            let row = ` <tr id="medicine_rows__row">
            <td>
            <input class="form-control" list="medicines_name" name="medicines_name">
            <datalist id="medicines_name"> 
            <?php foreach ($medicines_name_for_data_list as $medicine_name_for_data_list) : ?>
            option value="<?= $medicine_name_for_data_list['medicine_name'] ?>">
            <?php endforeach ?>
            </datalist>
            </td>
            <td> <input class="form-control" type="number" name="medicine_quantity" required> </td>
            <td> <input class="form-control" type="text" name="one_medicine_total_price"> </td>
            <td> <button class="btn btn-danger" type="button" name="removeRow" id="removeRow" onclick="removeMedicineRow();">Remove</button> </td>
            </tr>`;

            document.getElementById('medicine_rows__row').insertRow().innerHTML = row;

        }

        function removeMedicineRow() {

            let row = document.getElementById("medicine_rows__row");
            let totalRowCount = row.rows.length;
            row.deleteRow(totalRowCount - 1);


        }
    </script>
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
                        <i class="fa-solid fa-house fa-beat" style="color: #ffffff;"></i>
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

            <form class="invoice_content" method="post">
                <div class="invoice_content__head row g-3">
                    <div class="col-md-6">
                        <label for="pharmacist_name" class="form-label">Pharmacist Name</label>
                        <input type="text" class="form-control" id="pharmacist_name" value="<?= $user['name'] ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="invoice_number" class="form-label">Invoice Number:</label>
                        <input type="number" class="form-control" id="invoice_number" value="<?= $invoice_number ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Customer Name:</label>
                        <input type="text" class="form-control" id="customer_name">
                    </div>
                    <div class="col-md-6">
                        <label for="customer_phone" class="form-label"> Customer Phone:</label>
                        <input type="text" class="form-control" id="customer_phone">
                    </div>
                    <div class="the_total_price col-md-3">
                        <label for="the_total_price" class="form-label">Invoice Price:</label>

                        <input class="form-control" type="number" name="the_total_price" id="the_total_price" required> </td>
                    </div>
                </div>
                <br>
                <hr>
                <div class="invoice_content__body">
                    <button class="btn btn-warning float-end me-5" type="button" name="addRow" id="addRow" onclick="addMedicineRow();">ADD</button>


                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Medicine Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </thead>


                        <tbody id="medicine_rows__row">
                            <tr>

                                <td>
                                    <input class="form-control" list="medicines_name" name="medicines_name">
                                    <datalist id="medicines_name">
                                        <?php foreach ($medicines_name_for_data_list as $medicine_name_for_data_list) : ?>

                                            <option value="<?= $medicine_name_for_data_list['medicine_name'] ?>" selected>
                                            <?php endforeach ?>

                                    </datalist>


                                </td>
                                <td> <input class="form-control" type="number" name="medicine_quantity" required> </td>
                                <td> <input class="form-control" type="text" name="one_medicine_total_price" value="<?= $total_medicine_price ?>" required> </td>

                                <td> <button class="btn btn-danger" type="button" name="removeRow" id="removeRow" onclick="removeMedicineRow();">Remove</button> </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

                <div class="submit_buttoon">
                    <input class="btn btn-success" type="submit" value="Submit" name="submit">
                </div>
            </form>




        </div>

    </div>




</body>

</html>