<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back Office</title>
    <link rel="stylesheet" type="text/css" href="../../dist/styles.css?v=<?php echo time();?>"> 
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once "./includes/process.inc.php"?>

<?php include_once "./includes/db.inc.php" ?>

<div class="signupForm flex flex-fd-c flex-ai-c flex-jc-c">
    <h1>Log In</h1>
    <form action="./includes/login.inc.php" method="post" class="flex flex-fd-c flex-ai-c">
        
        <div class="email">
            <input type="text" name="emailAdmin" placeholder="Email...">
        </div>

        <div class="password">
            <input type="password" name="passwordAdmin" placeholder="Password...">
        </div>

        <div class="signUp">
            <button type="submit" name="logInAdmin">Log In</button>
        </div>
    </form>

    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
            }
        }
    ?>
</div>

