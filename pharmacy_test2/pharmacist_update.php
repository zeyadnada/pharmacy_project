<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';

$id = $_GET['ID'];
$notification = "";

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];

    database_update_pharmacist($id, $name, $birth_date, $phone, $address, $salary, $gender);
    $notification = "Your data was updated successfully";
}

$pharmacist = get_pharmacist($id);


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
        <h2>Update Pharmaciest Form</h2>
    </div>

    <form action="pharmacist_update.php?ID=<?= $id ?>" method="post" class="row g-3 containerForm__updatePharmaciestForm">
        <div class="col-md-5">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?= $pharmacist['name'] ?>">
        </div>
        <div class="col-md-5">
            <label for="birth_date" class="form-label">birth_date</label>
            <input required type="date" class="form-control" name="birth_date" id="birth_date" value="<?= $pharmacist['birth_date'] ?>">
        </div>
        <div class="col-10">
            <label for="address" class="form-label">Address</label>
            <input required type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" value="<?= $pharmacist['address'] ?>">
        </div>
        <div class="col-md-5">
            <label for="phone" class="form-label">Phone</label>
            <input required type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="<?= $pharmacist['phone'] ?>">
        </div>
        <div class="col-md-3">
            <label for="gender" class="form-label">Gender</label>
            <select required name="gender" id="gender" class="form-select">
                <option>MALE</option>
                <option>FEMALE</option>

            </select>
        </div>

        <div class="col-md-2">
            <label for="salary" class="form-label">salary</label>
            <input required type="number" class="form-control" name="salary" id="salary" placeholder="Enter salary" value="<?= $pharmacist['salary'] ?>">
        </div>

        <div class="col-3">
            <input class="btn btn-primary" type="submit" value="UPDATE" name="update" id="update">
        </div>
        <div class="col-3">
            <a href="./manage_pharmacist.php" class="btn btn-dark">BACK</a>
        </div </form>
</div>


<?php require_once __DIR__ . '/templates/footer.php' ?>