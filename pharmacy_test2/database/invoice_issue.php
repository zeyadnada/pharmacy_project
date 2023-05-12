<!-- all functions related to  invoices  -->


<?php

function database_connection()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect('localhost', 'root', '', 'pharmacy');
    return $conn;
}
function create_invoice_number()
{
    $conn = database_connection();
    $result = mysqli_query($conn, 'select * from pharmacy.invoice');
    $invoice_rows = mysqli_num_rows($result);
    mysqli_close($conn);
    return $invoice_rows;
}

function medicines_name()
{
    $conn = database_connection();
    $result = mysqli_query($conn, 'select * from pharmacy.medicines where medicine_quantity > 0');
    $medicines_name = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
    return $medicines_name;
}
function get_medicine_by_name($medicine_name)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'select * from pharmacy.medicines where medicine_name = ?');
    mysqli_stmt_bind_param($stmt, 's', $medicine_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $medicine = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $medicine;
}
