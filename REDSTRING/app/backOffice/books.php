
<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<?php include "./surfTop.php"?>

<div class="booksContainer flex">
    <?php 
        $booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));

        if(isset($_POST['searchBooks'])){
            $searchQ = $_POST['searchQ'];
    
            $result = $booksDB->query("SELECT * from books WHERE name_book LIKE '%$searchQ%'");
        }
        else{
            $result = $booksDB->query("SELECT * FROM books") or die($booksDB->error);
        }
        ?>

    <?php 
    while($booksArray = $result->fetch_assoc()): ?>

    <div class="booksContainer_book">
        <div class="booksContainer_book_image flex flex-jc-c">
            <a href="./book?b=<?php echo $booksArray['id_book']; ?>">
                <img src="./assets/<?php echo $booksArray['image_book']?>" alt="">
            </a>
        </div>

        <div class="booksContainer_book_title">
            <p><?php echo $booksArray['name_book']?></p>
        </div>

        <div class="booksContainer_book_author">
            <p><?php echo $booksArray['author_book']?></p>
        </div>

        <div class="booksContainer_book_price flex flex-jc-fe flex-ai-c">
            <p><?php echo $booksArray['price_book']?>$</p>
        </div>

        <div class="booksContainer_book_ud flex flex-ai-c flex-jc-sa">
            <div class="update">
                <a href="./addBook?editBook=<?php echo $booksArray['id_book']; ?>"><img src="./assets/update.png" alt=""></a>
            </div>
            <div class="delete">
                <a href="./includes/process.inc.php?deleteBook=<?php echo $booksArray['id_book']; ?>"><img src="./assets/delete.png" alt=""></a>
            </div>
        </div>

    </div>
    <?php endwhile?>
</div>

<script src="./js/main.js"></script>
</body>
</html>

<?php else:
    header("Location: ./login");
    exit();
endif;
?>