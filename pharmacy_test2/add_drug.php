<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';
$error = '';
$notification = '';

if (isset($_POST['add_drug'])) {
    $name = $_POST['name']; 
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
   
   $is_exist = database_check_name_drug($name);

    if ($is_exist > 0) {
        $error = 'drug already exist';
    } else {
        database_add_drugs($name,$quantity,$price);
        $notification = 'Medicine Added Successfully';
    }
   
   

}
?>
<?php require_once __DIR__ . '/templates/header.php' ?>


<div class="containerForm">
    <?php if ($notification !== '') : ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <h3><?= $notification ?></h3>

        </div>
    <?php endif ?>
    <div class="containerForm__header">
        <h2>ADD Medicines Form</h2>
    </div>

    <form class="row g-3 containerForm__updatePharmaciestForm" action="add_drug.php" method="post">
        <div class="col-md-10">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                 <?php if ($error !== '') : ?>
                    <div class="alert alert-danger" role="alert">
                         <?= $error ?>
                    </div>
                <?php endif ?>



        </div>

        <div class="col-md-10">
            <label for="quantity" class="form-label">Quantity</label>
            <input required type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">

        </div>
        
        <div class="col-md-10">
            <label for="price" class="form-label">Price</label>
            <input required type="number" class="form-control" id="price" name="price" placeholder="Enter price">
         
        </div>



        <div class="col-3">
            <button type="submit" class="btn btn-primary" name="add_drug">ADD</button>
        </div>
        <div class="col-3">
            <a href="./mang_drug.php" class="btn btn-dark">BACK</a>
        </div </form>
</div>
<?php require_once __DIR__ . '/templates/footer.php' ?>