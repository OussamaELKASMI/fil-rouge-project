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

<div class="navigation">
    <div class="navigation_navBar flex flex-ai-c flex-jc-sb">
        <div class="navigation_navbar_title">
            <a href="./index.php"><h1>Admin area</h1></a>
        </div>

        <div class="navigation_navBar_websitePreview flex flex-ai-c flex-jc-sb">
        <?php 
                if(isset($_SESSION['emailAdmin'])):
            ?>
            <a href="#"><h3>website</h3></a>
            <a id="logoutAdmin" href="./includes/logout.inc.php">Log out</a>
            <?php 
                else:
            ?>
            <a href="#"><h3>website</h3></a>
            <?php 
                endif;
            ?>        
        </div>
    </div>
</div>

<script src="./js/main.js"></script>
</body>
</html>