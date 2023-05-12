<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';

$id = $_GET['id'];
$notification = "";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    database_update_drug($id, $name, $quantity, $price);
    $notification = "Your data was updated successfully";
}

$drug = get_drug($id);


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
        <h2>Update Medicine Form</h2>
    </div>

    <form action="drug_update.php?id=<?= $id ?>" method="post" class="row g-3 containerForm__updatePharmaciestForm">
        <div class="col-md-10">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?= $drug['name'] ?>">
        </div>
        <div class="col-md-10">
            <label for="quantity" class="form-label">Quantity</label>
            <input required type="number" class="form-control" name="quantity" id="quantity" value="<?= $drug['quantity'] ?>">
        </div>

        <div class="col-md-10">
            <label for="price" class="form-label">Price</label>
            <input required type="number" class="form-control" name="price" id="price" value="<?= $drug['price'] ?>">
        </div>






        <div class="col-3">
            <input class="btn btn-primary" type="submit" value="UPDATE" name="update" id="update">
        </div>
        <div class="col-3">
            <a href="./mang_drug.php" class="btn btn-dark">BACK</a>
        </div </form>
</div>


<?php require_once __DIR__ . '/templates/footer.php' ?>