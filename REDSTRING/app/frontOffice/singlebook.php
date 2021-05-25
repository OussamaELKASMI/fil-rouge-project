<?php include_once "./header.php" ?>

<?php $booksData = $conn->query("SELECT * FROM books"); ?>

<div class="storeSingleBook flex flex-ai-c flex-jc-c">

    <div class="storeSingleBook_book flex">
        <div class="storeSingleBook_book_image">
            <img src="../backOffice/assets/<?php echo $image_book?>" alt="">
        </div>

        <div class="storeSingleBook_book_details">
            <div class="name">
                <p><?php echo $name_book ?></p>
            </div>

            <div class="author">
                <p>by <?php echo $author_book ?>.</p>
            </div>

            <div class="description flex flex-ai-c">
                <span>About The Book: </span>
                <p><?php echo $description_book ?>.</p>
            </div>

            <div class="bookOptions">
                <div class="type">
                    <p><?php echo $type_book ?></p>
                </div>

                <div class="price">
                    <p>$<?php echo $price_book ?></p>
                </div>
            </div>

            <div class="quantity">
                <span><?php echo $stock ?></span>
            </div>

            <div class="actionBtns flex flex-ai-c flex-jc-sb">
                <div class="buyNow">
                    <p>Buy Now</p>
                </div>

                <div class="addToBag">
                    <form method = "POST">
                        <button type="submit" name="addToBag">
                            Add to Bag
                        </button>
                        <input type="hidden" name="bookId" value="<?php echo $id_book ?>">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include_once "footer.php" ?>
