<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" type="text/css" href="../../dist/styles.css?v=<?php echo time();?>"> 
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    
</head>
<body>

<?php include_once "./includes/db.inc.php" ?>
<?php include_once "./includes/routingh.inc.php" ?>
<?php include_once "./includes/bagh.inc.php" ?>

<!-- <?php ?> -->


<div class="storeNavBar flex flex-ai-c">
        <div class="storeNavBar_logo">
            <a href="./store">
                <h1>B-FRIEND</h1>
            </a>
        </div>

        <div class="storeNavBar_links flex flex-ai-c">
            <a href="">Store</a>
            <a href="">About</a>
            <a href="">Contact</a>
        </div>

        <div class="storeNavBar_acount flex flex-ai-c flex-jc-sb">
            <?php 
                if(isset($_SESSION['email'])):
            ?>
            <a id="logout" href="./includes/logout.inc.php">Log out</a>
            <a href="./profile">Profile</a>
            <a id="bag" href="./bag">Bag</a>
            <?php 
                if(isset($_SESSION['bag'])):
                    $count = count($_SESSION['bag']);
            ?>
            <span id="bagItems" class="flex flex-ai-c flex-jc-c"><?php echo $count;?></span>
            <?php 
                else:
            ?>
            <span id="bagItems" class="flex flex-ai-c flex-jc-c">0</span>
            <?php 
                endif;
            ?>
            <?php 
                else:
            ?>
            <a href="./login">Log in</a>
            <a href="./signup">Sign up</a>
            <?php 
                endif;
            ?>
        </div>
    </div>

    <div class="storeNavigation flex flex-ai-c">
        <div class="storeNavigation_menu flex flex-ai-c flex-jc-sb">
            <img src="./assets/icons/menu.png" alt="">
            <p>Books</p>
        </div>

        <div class="storeNavigation_collections flex flex-ai-c flex-jc-sb">
            <a href="./newarrivals.html">New arrivals</a>
            <a href="./bestsellers.html">bestsellers</a>
        </div>

        <div class="storeNavigation_searchBar">
            <input type="text" placeholder="Search book...">
        </div>
    </div>