<?php require_once __DIR__ . '/database/database.php';
require_once __DIR__ . '/templates/admin_security.php';
$search_by = '';
$search_for = '';

if (isset($_GET['search_by'], $_GET['search_for'])) {
    $search_by = $_GET['search_by'];
    $search_for = $_GET['search_for'];
    $drugs = search_drug($search_by, $search_for);
} else {
    $drugs = get_all_drugs();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    database_delete_drug($id);
    header('location: mang_drug.php');
    exit;
}
?>

<?php require_once __DIR__ . '/templates/header.php' ?>
<br>

<form action="mang_drug.php" method="get">

    <label for="search_by">search by</label>
    <select name="search_by" id="search_by">
        <option value="" hidden selected disabled>-- Select option --</option>
        <option <?php if ($search_by == 'name') echo 'selected' ?> value="name">Name</option>
        <option <?php if ($search_by == 'quantity') echo 'selected' ?> value="quantity">Quantity</option>



    </select>
    <label for="search_for">for</label>
    <input type="text" name="search_for" value="<?= $search_for ?>">
    <button type="submit" value="search">search</button>
    <a href="mang_drug.php">clear</a>
</form>
<br>
<br>

<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>

    <?php
    foreach ($drugs as $drug) : ?>
        <tr>
            <td><?= $drug['id'] ?></td>
            <td><?= $drug['name'] ?></td>
            <td><?= $drug['quantity'] ?></td>
            <td><?= $drug['price'] ?></td>

            <td>
                <a class="btn btn-info" href="./drug_update.php?id=<?= $drug['id'] ?>" role="button">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger" href="./mang_drug.php?id=<?= $drug['id'] ?>">
                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>

                </a>
            </td>
        </tr>
    <?php endforeach ?>

</table>
<?php require_once __DIR__ . '/templates/footer.php' ?>