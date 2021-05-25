
<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<div class="home">

    <div class="home_middle flex flex-jc-sa flex-ai-c">
        <div class="conts flex flex-jc-c flex-ai-c">
            <a href="./includes/process.inc.php?destToBooks=<?php echo "products" ?>"><p>PRODUCTS</p></a>
        </div>
        <div class="conts flex flex-jc-c flex-ai-c">
            <a href="./includes/process.inc.php?destToCats=<?php echo "categories" ?>"><p>CATEGORIES</p></a>
        </div>
        <div class="conts flex flex-jc-c flex-ai-c">
            <a href="./includes/process.inc.php?destToClients=<?php echo "clients" ?>"><p>CLIENTS</p></a>
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
