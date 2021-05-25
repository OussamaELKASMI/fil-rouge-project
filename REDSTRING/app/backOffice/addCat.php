
<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<div class="addCatForm flex flex-fd-c flex-ai-c">
    <h1>Add new category</h1>
    <form class="flex flex-fd-c flex-jc-sa flex-ai-c" action="includes/process.inc.php" method="POST" >
        <input type="text" placeholder="name" name="categoryName">
        <button type="submit" name="addCategory">Add</button>
        <a href="./categories" class="cancelCategory">cancel</a>
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