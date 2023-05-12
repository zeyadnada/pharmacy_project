<!-- all functions related to pharmacist , supliers or medicines -->

<?php
function database_connection()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect('localhost', 'root', '', 'pharmacy');
    return $conn;
}
function get_all_pharmacists()
{
    $conn = database_connection();
    $result = mysqli_query($conn, 'select * from pharmacy.pharmacist');
    $pharmacists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
    return $pharmacists;
}

function database_update_pharmacist($id, $name, $birth_date, $phone, $address, $salary, $gender)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, "update pharmacy.pharmacist SET name = ?, birth_date = ?, phone = ?, address = ?, salary = ?, gender = ? where ID=?");
    mysqli_stmt_bind_param($stmt, 'ssssisi', $name, $birth_date, $phone, $address, $salary, $gender, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


function database_delete_pharmacist($id)
{
    $conn = database_connection();
    mysqli_query($conn, "delete from pharmacy.pharmacist where ID =$id");
    mysqli_close($conn);
}
function get_pharmacist($id)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.pharmacist where ID = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pharmacist = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $pharmacist;
}

function database_add_pharmacist($name, $birth_date, $phone, $address, $salary, $gender, $email, $password)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'insert into pharmacy.pharmacist(name,birth_date,phone,address,salary,gender,email,password)
    VALUES (?,?,?,?,?,?,?,?)');
    mysqli_stmt_bind_param($stmt, 'ssssisss', $name, $birth_date, $phone, $address, $salary, $gender, $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}



function database_check_email($email)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.pharmacist where email = ?');
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $number = mysqli_num_rows($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $number;
}


//search function
function search_pharmacist($search_by, $search_for)
{
    $conn = database_connection();
    if ($search_by == 'name') {
        $stmt = database_search_pharmacist_by_name($conn, $search_for);
    }
    if ($search_by == 'email') {
        $stmt = database_search_pharmacist_by_email($conn, $search_for);
    }
    if ($search_by == 'phone') {
        $stmt = database_search_pharmacist_by_phone($conn, $search_for);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $patients;
}


function database_search_pharmacist_by_name($conn, $name)
{
    $name = '%' . $name . '%';
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.pharmacist where name like ?');


    mysqli_stmt_bind_param($stmt, 's', $name);

    return $stmt;
}

function database_search_pharmacist_by_email($conn, $email)
{
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.pharmacist where email = ?');
    mysqli_stmt_bind_param($stmt, 's', $email);

    return $stmt;
}
function database_search_pharmacist_by_phone($conn, $phone)
{
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.pharmacist where phone = ?');
    mysqli_stmt_bind_param($stmt, 's', $phone);

    return $stmt;
}


// .....................................................................................>......................................
// ...............................suppliers.............................................>...............................................
// .....................................................................................>......................................
// .....................................................................................>......................................
// ...............................suppliers.............................................>...............................................
// .....................................................................................>......................................

function database_check_name($name)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.suppliers where name = ?');
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $number = mysqli_num_rows($result);
    // $patient=mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $number;
}


function database_add_supplier($name, $phone, $address, $drugs)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'insert into pharmacy.suppliers(name,phone,address,drugs)
    VALUES (?,?,?,?)');
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $phone, $address, $drugs);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


function get_all_suppliers()
{
    $conn = database_connection();
    $result = mysqli_query($conn, 'select * from pharmacy.suppliers');
    $suppliers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $patients =mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $suppliers;
}


function database_delete_supplier($id)
{
    $conn = database_connection();
    mysqli_query($conn, "delete from pharmacy.suppliers where ID =$id");
    mysqli_close($conn);
}


function database_update_supplier($id, $name, $phone, $address, $drugs)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, "update pharmacy.suppliers SET name = ?, phone = ?, address = ?,drugs=? where id=?");
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $phone, $address, $drugs, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function get_supplier($id)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.suppliers where id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $supplier = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $supplier;
}


function search_sup($search_by, $search_for)
{
    $conn = database_connection();
    if ($search_by == 'name') {
        $stmt = database_search_sup_by_name($conn, $search_for);
    }
    if ($search_by == 'phone') {
        $stmt = database_search_sup_by_phone($conn, $search_for);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $patients;
}

function database_search_sup_by_name($conn, $name)
{
    $name = '%' . $name . '%';
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.suppliers where name like ?');


    mysqli_stmt_bind_param($stmt, 's', $name);

    return $stmt;
}
function database_search_sup_by_phone($conn, $phone)
{
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.suppliers where phone = ?');
    mysqli_stmt_bind_param($stmt, 's', $phone);

    return $stmt;
}



// .....................................................................................>......................................
// ...............................drugs /.............................................>...............................................
// .....................................................................................>......................................
// .....................................................................................>......................................
// ...............................medicen.............................................>...............................................
// .....................................................................................>......................................

function database_add_drugs($name, $quantity, $price)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'insert into pharmacy.druges(name,quantity,price)
    VALUES (?,?,?)');
    mysqli_stmt_bind_param($stmt, 'sid', $name, $quantity, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function database_check_name_drug($name)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.druges where name = ?');
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $number = mysqli_num_rows($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $number;
}


function search_drug($search_by, $search_for)
{
    $conn = database_connection();
    if ($search_by == 'name') {
        $stmt = database_search_drug_by_name($conn, $search_for);
    }
    if ($search_by == 'quantity') {
        $stmt = database_search_drug_by_quantity($conn, $search_for);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $patients;
}
function database_search_drug_by_name($conn, $name)
{
    $name = '%' . $name . '%';
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.druges where name like ?');


    mysqli_stmt_bind_param($stmt, 's', $name);

    return $stmt;
}
function database_search_drug_by_quantity($conn, $quantity)
{
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.druges where quantity = ?');
    mysqli_stmt_bind_param($stmt, 's', $quantity);

    return $stmt;
}

function get_all_drugs()
{
    $conn = database_connection();
    $result = mysqli_query($conn, 'select * from pharmacy.druges');
    $pharmacists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $patients =mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $pharmacists;
}

function database_delete_drug($id)
{
    $conn = database_connection();
    mysqli_query($conn, "delete from pharmacy.druges where id =$id");
    mysqli_close($conn);
}

function get_drug($id)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.druges where id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pharmacist = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $pharmacist;
}

function database_update_drug($id, $name, $quantity, $price)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, "update pharmacy.druges SET name = ?,quantity = ?,price = ? where id=?");
    mysqli_stmt_bind_param($stmt, 'siii', $name, $quantity, $price, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
