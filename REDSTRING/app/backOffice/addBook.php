<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<div class="addBookForm flex flex-fd-c flex-ai-c">
    <h1>Add new book</h1>
    <form action="includes/process.inc.php" method="POST" enctype="multipart/form-data" href="books">
            <input type="hidden" name="id_book" value="<?php echo $id_book;?>">
            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="name_book" placeholder="Name" value="<?php echo $name_book;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="author_book" placeholder="Author" value="<?php echo $author_book;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="number" class="form-control" name="price_book" placeholder="      Price" value="<?php echo $price_book;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="number" class="form-control" name="quantity_book" placeholder="      Quantity" value="<?php echo $quantity_book;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="textarea" class="form-control" name="description_book" placeholder="Description" value="<?php echo $description_book;?>">
            </div>

            <div class="custom-file flex flex-jc-c" id="inpgroup">
                <input type="file" name="image_book" value="<?php echo $image_book;?>" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose image..</label>
            </div>

            <div class="cancelBook">
                <a href="./books" name="cancelBook">Cancel</a>
            </div>

            <?php if($update == true):?>
                <button class="btn btn-primary" id="special" type="submit" name="updateBook">UPDATE</button>
            <?php else: ?>
            <button class="btn btn-primary" id="special" type="submit" name="addBook">ADD</button>
            <?php endif?>
        </form>
</div>


<script src="./js/main.js"></script>
</body>
</html>

<?php else:
    header("Location: ./login");
    exit();
endif;
?>