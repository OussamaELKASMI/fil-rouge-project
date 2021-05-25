<?php

if(isset($_POST['logInAdmin'])){
    $email = $_POST['emailAdmin'];
    $password = $_POST['passwordAdmin'];

    // require_once './db.inc.php';
    $booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));

    require_once './functions.inc.php';

    loginAdmin($booksDB, $email, $password);

}
else{
    header("Location: ../login");
    exit();
}