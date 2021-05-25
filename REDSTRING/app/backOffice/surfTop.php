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


<div class="surf">

    <div class="surf_top flex flex-ai-c">
        <div class="backArrow flex flex-jc-c flex-ai-c">
            <a class="flex flex-jc-c flex-ai-c" href="<?php echo $_SESSION['lastDest']; ?>"><img src="./assets/backArrow.png" alt=""></a>
        </div>

        <div class="current">
            <?php 
                if(isset($_SESSION['dest'])):
                ?>
                    <p><?php echo $_SESSION['dest'];
                    ?></p>
                <?php endif?>
        </div>

        <div class="searchBar flex flex-jc-fe">
            <form action="<?php echo $_SESSION['dest'] ?>.php" method="POST">
                <input type="text" placeholder="search.." name="searchQ">
                <button class="flex flex-ai-c flex-js-c" type="submit" name="<?php echo $_SESSION['search'] ?>"><img src="./assets/search.png" alt=""></button>
            </form>
        </div>

        <div class="addIcon flex flex-jc-fe flex-ai-c">
            <?php 
                if(isset($_SESSION['add'])):
                ?>
            <a class="flex flex-jc-fe flex-ai-c" href="
            <?php echo $_SESSION['add'];
            ?>">
            <img src="./assets/Add.png" alt=""></a>
        <?php endif?>    
    </div>
</div>

<script src="./js/main.js"></script>
</body>
</html>
