<?php

if(isset($_POST['signUp'])){
    
    $name = $_POST['name'];
    $prename = $_POST['prename'];
    $birthday = $_POST['birthday'];
    $adress = $_POST['adress'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['rpassword'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $prename, $birthday, $gender, $phone, $email, $password, $rPassword) !== false){
        header("Location: ../signup?error=emptyinput");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("Location: ../signup?error=invalidemail");
        exit();
    }   

    if(umachedPasswords($password, $rPassword) !== false){
        header("Location: ../signup?error=unmachedpassword");
        exit();
    }

    if(takenEmail($conn, $email) !== false){
        header("Location: ../signup?error=emailtaken");
        exit();
    }

    createClient($conn, $name, $prename, $birthday, $gender, $adress, $phone, $email, $password);
}
else{
    header("Location: ../signup");
    exit();
}