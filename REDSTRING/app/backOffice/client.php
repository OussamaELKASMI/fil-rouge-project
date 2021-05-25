<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<?php include "./surfTop.php"?>

<div class="clientContainer flex">
    <?php 
        $booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));
        ?>

    <div class="image_client">
        <img src="./assets/clients/<?php echo $image_client?>" alt="">
    </div>

    <div class="details_client flex flex-fd-c">
        <div class="name_client flex flex-ai-c">
            <span>NAME OF THE BOOK: </span>
            <p><?php echo $name_client?></p>
        </div>

        <div class="prename_client flex flex-ai-c">
            <span>PRENAME OF THE BOOK: </span>
            <p><?php echo $prename_client?></p>
        </div>

        <div class="birthday_client flex flex-ai-c">
        <span>BIRTHDAY OF THE BOOK: </span>
            <p><?php echo $birthday_client?></p>
        </div>

        <div class="gender_client flex flex-ai-c">
            <span>GENDER OF THE BOOK: </span>
            <p><?php echo $gender_client?></p>
        </div>

        <div class="adress_client flex flex-ai-c">
            <span>ADRESS OF THE CLIENT: </span>
            <p><?php echo $adress_client?></p>
        </div>

        <div class="email_client flex flex-ai-c">
            <span>EMAIL OF THE CLIENT: </span>
            <p><?php echo $email_client?></p>
        </div>

        <div class="phone_client flex flex-ai-c">
            <span>PHONE NUMBER: </span>
            <p><?php echo $phone_client?></p>
        </div>

    </div>

    <div class="client_ud flex flex-ai-c flex-jc-sa">
    <div class="update">
                <a href="./addClient?editClient=<?php echo $id_client ?>">EDIT</a>
            </div>
            <div class="delete">
                <a href="./includes/process.inc.php?deleteClient=<?php echo $id_client ?>">DELETE</a>
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