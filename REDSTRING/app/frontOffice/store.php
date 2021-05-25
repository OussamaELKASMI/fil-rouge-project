<?php include_once "header.php" ?>

<?php $booksData = $conn->query("SELECT * FROM books"); ?>

    
    <div class="storeBooks flex">

        <?php 
        while($booksList = $booksData->fetch_assoc()): ?>

        <div class="storeBooks_book">

            <div class="storeBooks_book_image flex flex-jc-c">
                <a href="./singlebook?sb=<?php echo $booksList['id_book'] ?>">
                    <img src="../backOffice/assets/<?php echo $booksList['image_book']?>" alt="">
                </a>
            </div>

            <div class="storeBooks_book_name">
                <p><?php echo $booksList['name_book']?></p>

            </div>

            <div class="storeBooks_book_author">
                <p>by <?php echo $booksList['author_book']?></p>
            </div>

            <div class="storeBooks_book_price flex flex-jc-fe flex-ai-c">
                <p><?php echo $booksList['price_book']?>$</p>
            </div>

        </div>
        <?php 
            endwhile?>
    </div>

<?php include_once "footer.php" ?>
    