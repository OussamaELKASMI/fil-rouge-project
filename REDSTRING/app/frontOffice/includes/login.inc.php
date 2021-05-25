<?php

if(isset($_POST['logIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    loginClient($conn, $email, $password);

}
else{
    header("Location: ../login");
    exit();
}

