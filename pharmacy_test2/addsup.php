<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';
$error = '';
$notification = '';

if (isset($_POST['add_supplier'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $drugs = $_POST['drugs'];
    $is_exist = database_check_name($name);

    if ($is_exist > 0) {
        $error = 'Suzpplier Already Exist';
    } else {
        database_add_supplier($name,$phone,$address,$drugs);
        $notification = 'supplier Added Successfully';
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
        <h2>ADD Supplier Form</h2>
    </div>

    <form class="row g-3 containerForm__updatePharmaciestForm" action="addsup.php" method="post">
        <div class="col-md-5">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            <?php if ($error !== '') : ?>
                <div class="alert alert-danger" role="alert">
                <?= $error ?>
                </div>
            <?php endif ?>
        </div>
        <div class="col-md-5">
            <label for="address" class="form-label">Address</label>
            <input required type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
        </div>
        <div class="col-md-5">
            <label for="phone" class="form-label">Phone</label>
            <input required type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
        </div>
        <!-- .................................. -->
        <div class="col-md-5">
            <label for="drugs" class="form-label">Drugs</label>
            <input required type="text" class="form-control" id="drugs" name="drugs" placeholder="Drug1 Name,Drug2 Name,....">
        </div>

        <!-- .................................. -->
        <div class="col-3">
            <button type="submit" class="btn btn-primary" name="add_supplier">ADD</button>
        </div>
        <div class="col-3">
            <a href="./mana_sup.php" class="btn btn-dark">BACK</a>
        </div </form>
</div>
<?php require_once __DIR__ . '/templates/footer.php' ?>