<?php require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';
$search_by = '';
$search_for = '';

if (isset($_GET['search_by'], $_GET['search_for'])) {
    $search_by = $_GET['search_by'];
    $search_for = $_GET['search_for'];
    $pharmacists = search_pharmacist($search_by, $search_for);
} else {
    $pharmacists = get_all_pharmacists();
}
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    database_delete_pharmacist($id);
    header('location: manage_pharmacist.php');
    exit;
}
?>

<?php require_once __DIR__ . '/templates/header.php' ?>
<br>

<form action="manage_pharmacist.php" method="get">

    <label for="search_by">search by</label>
    <select name="search_by" id="search_by">
        <option value="" hidden selected disabled>-- Select option --</option>
        <option <?php if ($search_by == 'name') echo 'selected' ?> value="name">Name</option>
        <option <?php if ($search_by == 'phone') echo 'selected' ?> value="phone">Phone</option>
        <option <?php if ($search_by == 'email') echo 'selected' ?> value="national_id">EMAIL</option>

    </select>
    <label for="search_for">for</label>
    <input type="text" name="search_for" value="<?= $search_for ?>">
    <button type="submit" value="search">search</button>
    <a href="manage_pharmacist.php">clear</a>
</form>
<br>
<br>

<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Birth_Date</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Sallary</th>
        <th>Gender</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($pharmacists as $pharmacist) : ?>
        <tr>
            <td><?= $pharmacist['ID'] ?></td>
            <td><?= $pharmacist['name'] ?></td>
            <td><?= $pharmacist['birth_date'] ?></td>
            <td><?= $pharmacist['phone'] ?></td>
            <td><?= $pharmacist['address'] ?></td>
            <td><?= $pharmacist['salary'] ?></td>
            <td><?= $pharmacist['gender'] ?></td>
            <td>
                <a class="btn btn-info" href="./pharmacist_update.php?ID=<?= $pharmacist['ID'] ?>" role="button">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" href="./manage_pharmacist.php?ID=<?= $pharmacist['ID'] ?>">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>

                </a>
            </td>
        </tr>
    <?php endforeach ?>

</table>
<?php require_once __DIR__ . '/templates/footer.php' ?>