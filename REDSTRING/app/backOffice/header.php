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

<?php include  "./navBar.php"?>

<?php include_once "./includes/db.inc.php" ?>
