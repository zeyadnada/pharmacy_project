<?php
require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';
$error = '';
$notification = '';

if (isset($_POST['add_pharmaciest'])) {
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_exist = database_check_email($email);

    if ($is_exist > 0) {
        $error = 'duplicate email';
    } else {
        database_add_pharmacist($name, $birth_date, $phone, $address, $salary, $gender, $email, $password);
        $notification = 'Pharmacist Added Successfully';
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
        <h2>ADD Pharmaciest Form</h2>
    </div>

    <form class="row g-3 containerForm__updatePharmaciestForm" action="add_pharmaciest.php" method="post">
        <div class="col-md-5">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="col-md-5">
            <label for="birth_date" class="form-label">birth_date</label>
            <input required type="date" class="form-control" id="birth_date" name="birth_date">
        </div>
        <div class="col-10">
            <label for="address" class="form-label">Address</label>
            <input required type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
        </div>
        <div class="col-5">
            <label for="email" class="form-label">Email</label>
            <input required type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <?php if ($error !== '') : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif ?>
        </div>
        <div class="col-5">
            <label for="password" class="form-label">Password</label>
            <input required type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <div class="col-md-5">
            <label for="phone" class="form-label">Phone</label>
            <input required type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
        </div>
        <div class="col-md-3">
            <label for="gender" class="form-label">Gender</label>
            <select required id="gender" class="form-select" name="gender">
                <option value="" hidden selected disabled>-- Select Gender --</option>
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>

            </select>
        </div>

        <div class="col-md-2">
            <label for="salary" class="form-label">salary</label>
            <input required type="number" class="form-control" id="salary" name="salary" placeholder="Enter salary">
        </div>


        <div class="col-3">
            <button type="submit" class="btn btn-primary" name="add_pharmaciest">ADD</button>
        </div>
        <div class="col-3">
            <a href="./manage_pharmacist.php" class="btn btn-dark">BACK</a>
        </div </form>
</div>
<?php require_once __DIR__ . '/templates/footer.php' ?>