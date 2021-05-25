<?php

require_once "./db.inc.php";

function emptyInputSignup($name, $prename, $birthday, $gender, $phone, $email, $password, $rPassword){
    $result;
    if(empty($name) || empty($prename) || empty($birthday) || empty($gender) || empty($phone) || empty($email) || empty($password) || empty($rPassword)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function umachedPasswords($password, $rPassword){
    $result;
    if($password !== $rPassword){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function takenEmail($conn, $email){
    $sql = "SELECT * FROM clients WHERE email_client = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createClient($conn, $name, $prename, $birthday, $gender, $adress, $phone, $email, $password){
    $sql = "INSERT INTO clients (name_client, prename_client, birthday_client, gender_client, adress_client, phone_client, email_client, password_client) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $prename, $birthday, $gender, $adress, $phone, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../signup?error=none");
    exit();
}

function emptyInputLogin($email, $password){
    $result;
    if(empty($email) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function loginClient($conn, $email, $password){
    $emailExists = takenEmail($conn, $email);

    if($emailExists == false){
        header("Location: ../login?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists['password_client'];

    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd == false){
        header("Location: ../login?error=wronglogin");
        exit();
    }
    else if($checkPwd == true){
        session_start();
        $_SESSION['email'] = $emailExists['email_client'];
        header("Location: ../store.php");
        exit();
    }
}
