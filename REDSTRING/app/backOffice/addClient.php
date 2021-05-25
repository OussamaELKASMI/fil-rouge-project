<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<div class="addClientForm flex flex-fd-c flex-ai-c">
    <h1>Add new client</h1>
    <form action="includes/process.inc.php" method="POST" enctype="multipart/form-data" href="books">
            <input type="hidden" name="id_client" value="<?php echo $id_client;?>">
            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="name_client" placeholder="Name" value="<?php echo $name_client;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="prename_client" placeholder="Prename" value="<?php echo $prename_client;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="date" class="form-control" name="birthday_client" placeholder="      Birthday" value="<?php echo $birthday_client;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="gender_client" placeholder="Gender" value="<?php echo $gender_client;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="textarea" class="form-control" name="adress_client" placeholder="Adress" value="<?php echo $adress_client;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="email_client" placeholder="Email" value="<?php echo $email_client;?>">
            </div>

            <div class="input-group flex flex-ai-c" id="inpgroup">
                <input type="text" class="form-control" name="phone_client" placeholder="Phone number" value="<?php echo $phone_client;?>">
            </div>

            <div class="custom-file flex flex-jc-c" id="inpgroup">
                <input type="file" name="image_client" value="<?php echo $image_client;?>" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose image..</label>
            </div>

            <div class="cancelClient">
                <a href="./clients" name="cancelClient">Cancel</a>
            </div>

            <?php if($update == true):?>
                <button class="btn btn-primary" id="special" type="submit" name="updateClient">UPDATE</button>
            <?php else: ?>
            <button class="btn btn-primary" id="special" type="submit" name="addClient">ADD</button>
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