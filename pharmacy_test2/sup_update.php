<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';

$id = $_GET['id'];
$notification = "";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $drugs = $_POST['drugs'];


    database_update_supplier($id, $name, $phone, $address, $drugs);
    $notification = "Your data was updated successfully";
}

$supplier = get_supplier($id);


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
        <h2>Update supplier Form</h2>
    </div>

    <form action="sup_update.php?id=<?= $id ?>" method="post" class="row g-3 containerForm__updatePharmaciestForm">
        <div class="col-md-5">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?= $supplier['name'] ?>">
        </div>
        <div class="col-md-5">
            <label for="address" class="form-label">Address</label>
            <input required type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="<?= $supplier['address'] ?>">
        </div>
        <div class="col-md-5">
            <label for="phone" class="form-label">Phone</label>
            <input required type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="<?= $supplier['phone'] ?>">
        </div>

        <div class="col-md-5">
            <label for="drugs" class="form-label">Drugs</label>
            <input required type="text" class="form-control" name="drugs" id="drugs" placeholder="drugs" value="<?= $supplier['drugs'] ?>">
        </div>









        <div class="col-3">
            <input class="btn btn-primary" type="submit" value="UPDATE" name="update" id="update">
        </div>
        <div class="col-3">
            <a href="./mang_sup.php" class="btn btn-dark">BACK</a>
        </div </form>
</div>


<?php require_once __DIR__ . '/templates/footer.php' ?>