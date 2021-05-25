<?php include_once "./header.php" ?>

<?php  
    $itemId = array_column($_SESSION['bag'], 'bookId');
    $itemsList = $conn->query("SELECT * FROM books");
    $totalPrice = 0;
?>

<div class="bagContainer flex">

<div class="items flex flex-ai-fs">
<?php 
    while($books = $itemsList->fetch_assoc()): 
        
        foreach($itemId as $id_book):
            if($books['id_book'] == $id_book):
            $totalPrice = $totalPrice +$books['price_book'];
    ?>
    <div class="items_item flex flex-ai-c">
        
        <div class="details flex flex-ai-c">
            <div class="details_name" style="margin:0;">
                <p><?php echo $books['name_book']?></p>
            </div>
            <div class="details_price flex flex-ai-c">
                <p>$<?php echo $books['price_book']?></p>
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

<div class="totalPrice" >
    <div class="price flex flex-jc-c" style="height: 20vh">
        <?php 
            if(isset($_SESSION['bag'])):
                $count = count($_SESSION['bag'])
        ?>
        <input id="totalPrice" type="hidden" value="<?php echo $totalPrice ?>">
        <p>Total to pay: <span id="price">$<?php echo $totalPrice?></span></p>
        <p id="freeshipping" style="color:#007600">Free shipping</p>
        <?php else: ?>
        <p>SubTotal (0 item): $0</p>
        <?php endif; ?>
    </div>
    <div id="paypalBtn" class="goToCheckout flex flex-jc-c" style="margin-top: 3vh">
        <!-- <a href="">Place your order</a> -->
    </div>
</div>

</div>

<script src="https://www.paypal.com/sdk/js?client-id=AVkK48JpeTjKf4H-84klz9sBqF_PpA0WK3VUChjUvaGQE_QhF8Ca0k83NP_xYlS5jdo4u0MhE-g1ggLp&disable-funding=credit,card
"></script>
<script src="./js/index.js"></script>

