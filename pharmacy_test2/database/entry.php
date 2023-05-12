<!-- all functions related to login and signup -->

<?php

function database_connection()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect('localhost', 'root', '', 'pharmacy');
    return $conn;
}


//  this function take email and password from  
//user and check in data base is it' exist or not 
//if exist it return the specific user if not it return null.

function db_authenticate($email, $password)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, '
        select * from pharmacy.pharmacist where email = ?
        and password = ?
    ');
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $user;
}

function database_add_user($name, $birth_date, $phone, $address, $email, $password, $gender)
{
    $conn = database_connection();
    $stmt = mysqli_prepare($conn, 'insert into pharmacy.pharmacist(name,birth_date,phone,address,email,password,gender)
    VALUES (?,?,?,?,?,?,?)');
    mysqli_stmt_bind_param($stmt, 'sssssss', $name, $birth_date, $phone, $address, $email, $password, $gender);
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
    // $patient=mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $number;
}
