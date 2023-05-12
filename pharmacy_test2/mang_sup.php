<?php require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';
$search_by = '';
$search_for = '';

if (isset($_GET['search_by'], $_GET['search_for'])) {
    $search_by = $_GET['search_by'];
    $search_for = $_GET['search_for'];
    $suppliers = search_sup($search_by, $search_for);
} else {
    $suppliers = get_all_suppliers();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    database_delete_supplier($id);
    header('location: mang_sup.php');
    exit;
}
?>

<?php require_once __DIR__ . '/templates/header.php' ?>
<br>

<form action="mang_sup.php" method="get">

    <label for="search_by">search by</label>
    <select name="search_by" id="search_by">
        <option value="" hidden selected disabled>-- Select option --</option>
        <option <?php if ($search_by == 'name') echo 'selected' ?> value="name">Name</option>
        <option <?php if ($search_by == 'phone') echo 'selected' ?> value="phone">Phone</option>

    </select>
    <label for="search_for">for</label>
    <input type="text" name="search_for" value="<?= $search_for ?>">
    <button type="submit" value="search">search</button>
    <a href="mang_sup.php">clear</a>
</form>
<br>
<br>

<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Name</th>

        <th>Phone</th>
        <th>Address</th>
        <th>Drugs</th>

        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($suppliers as $supplier) : ?>
        <tr>
            <td><?= $supplier['id'] ?></td>
            <td><?= $supplier['name'] ?></td>
            <td><?= $supplier['phone'] ?></td>
            <td><?= $supplier['address'] ?></td>
            <td><?= $supplier['drugs'] ?></td>

            <td>
                <a class="btn btn-info" href="./sup_update.php?id=<?= $supplier['id'] ?>" role="button">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" href="./mang_sup.php?id=<?= $supplier['id'] ?>">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>

                </a>
            </td>
        </tr>
    <?php endforeach ?>

</table>
<?php require_once __DIR__ . '/templates/footer.php' ?>