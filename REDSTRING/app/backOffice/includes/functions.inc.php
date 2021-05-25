<?php
// require_once "./db.inc.php";

// $pass = "oussa";

// $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

$booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));

// $booksDB->query("INSERT INTO admins (fullname_admin, email_admin, password_admin) VALUES('oussa', 'oussa@gmail.com', '$hashedPass')");

function takenEmailAdmin($booksDB, $email){
    $sql = "SELECT * FROM admins WHERE email_admin = ?;";
    $stmt = mysqli_stmt_init($booksDB);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../login?error=stmtfailed");
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

function loginAdmin($booksDB, $email, $password){
    $emailAdminExists = takenEmailAdmin($booksDB, $email);

    if($emailAdminExists == false){
        header("Location: ../login?error=wronglogin");
        exit();
    }

    $pwdAdminHashed = $emailAdminExists['password_admin'];

    $checkPwdAdmin = password_verify($password, $pwdAdminHashed);

    if($checkPwdAdmin == false){
        header("Location: ../login?error=wronglogin");
        exit();
    }
    else if($checkPwdAdmin == true){
        session_start();
        $_SESSION['emailAdmin'] = $emailAdminExists['email_admin'];
        header("Location: ../index.php");
        exit();
    }
}