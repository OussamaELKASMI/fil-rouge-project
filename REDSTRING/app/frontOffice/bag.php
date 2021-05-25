<?php include_once "./header.php" ?>

<?php  
    $itemId = array_column($_SESSION['bag'], 'bookId');
    $itemsList = $conn->query("SELECT * FROM books");
    $totalPrice = 0;
?>

<div class="bagContainer flex">

<div class="items">
<?php 
    while($books = $itemsList->fetch_assoc()): 
        
        foreach($itemId as $id_book):
            if($books['id_book'] == $id_book):
            $totalPrice = $totalPrice +$books['price_book'];
    ?>
    <div class="items_item flex">
        <div class="image">
            <img src="../backOffice/assets/<?php echo $books['image_book']?>" alt="">
        </div>
        <div class="details">
            <div class="details_name">
                <p><?php echo $books['name_book']?></p>
            </div>
            <div class="details_price">
                <span>Price</span>
                <p>$<?php echo $books['price_book']?></p>
            </div>
        </div>
        <div class="actionBtns">
            <div class="actionBtns_delete">
                <a href="bag.php?delete=<?php echo $books['id_book']?>">Delete</a>
            </div>
            <div class="actionBtns_quantity">
                <form action="" method="GET">
                    <label for="quantity">Quantity: </label>
                    <input type="number" name="quantity" min="1">
                </form>
            </div>
        </div>
    </div>
    <?php 
endif; ?>
    <?php 
endforeach; ?>
<?php 
endwhile; ?>
</div>

<div class="totalPrice">
    <div class="price flex flex-jc-c">
        <?php 
            if(isset($_SESSION['bag'])):
                $count = count($_SESSION['bag'])
        ?>
        <p>SubTotal (<?php echo $count ?> item): <span id="price">$<?php echo $totalPrice?></span></p>
        <?php else: ?>
        <p>SubTotal (0 item): $0</p>
        <?php endif; ?>
    </div>
    <div class="goToCheckout flex flex-jc-c">
        <a href="">Proceed to checkout</a>
    </div>
</div>

</div>
