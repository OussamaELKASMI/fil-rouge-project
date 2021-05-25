
<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<?php 
    $booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));

    if(isset($_POST['searchCats'])){
        $searchQ = $_POST['searchQ'];

        $categoriesData = $booksDB->query("SELECT * from categories WHERE name_category LIKE '%$searchQ%'");

        // $_SESSION['lastDest'] = "./categories.php";

    }
    else{
        $categoriesData = $booksDB->query("SELECT * FROM categories") or die($booksDB->error);
    }    
?> 

<div class="categories">

    <?php include "./surfTop.php"?>

    <div class="categories_middle flex flex-jc-sa flex-ai-c" style="height: 40vh">

        <?php 
        while($categoriesList = $categoriesData->fetch_assoc()): ?>

        <div class="conts flex flex-jc-c flex-ai-c">
            <div class="deleteCategory">
                <form action="includes/process.inc.php" method="GET">
                    <a href="./includes/process.inc.php?deleteCat=<?php echo $categoriesList['id_category']; ?>"><img src="./assets/delete.png" alt=""></a>
                </form>
            </div>
            <p><?php echo $categoriesList['name_category']?></p>
        </div>

        <?php 
        endwhile?>
    </div>
   
</div>

<?php else:
    header("Location: ./login");
    exit();
endif;
?>

<script src="./js/main.js"></script>
</body>
</html>

