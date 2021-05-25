<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<?php include "./surfTop.php"?>

<div class="bookContainer flex">

    <div class="image_book">
        <img src="./assets/<?php echo $image_book?>" alt="">
    </div>

    <div class="details_book flex flex-fd-c">
        <div class="name_book flex flex-ai-c">
            <span>NAME OF THE BOOK: </span>
            <p><?php echo $name_book?></p>
        </div>

        <div class="author_book flex flex-ai-c">
            <span>AUTHOR OF THE BOOK: </span>
            <p><?php echo $author_book?></p>
        </div>

        <div class="description_book flex flex-ai-c">
        <span>DESCRIPTION OF THE BOOK: </span>
            <p><?php echo $description_book?></p>
        </div>

        <div class="price_book flex flex-ai-c">
            <span>PRICE OF THE BOOK: </span>
            <p><?php echo $price_book?></p>
        </div>

        <div class="quantity_book flex flex-ai-c">
            <span>QUANTITY AVAILABLE: </span>
            <p><?php echo $quantity_book?></p>
        </div>
    </div>

    <div class="book_ud flex flex-ai-c flex-jc-sa">
    <div class="update">
                <a href="./addBook?editBook=<?php echo $id_book ?>">EDIT</a>
            </div>
            <div class="delete">
                <a href="./includes/process.inc.php?deleteBook=<?php echo $id_book ?>">DELETE</a>
            </div>
    </div>
</div>

<script src="./js/main.js"></script>
</body>
</html>

<?php else:
    header("Location: ./login");
    exit();
endif;
?>