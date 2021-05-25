
<?php
    include_once "./header.php";
    if(isset($_SESSION['emailAdmin'])):
    ?>

<?php include "./surfTop.php"?>

<div class="clientsContainer">
    <?php 
        $booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));

        if(isset($_POST['searchClient'])){
            $searchQ = $_POST['searchQ'];
    
            $result = $booksDB->query("SELECT * from clients WHERE name_client LIKE '%$searchQ%' || prename_client LIKE '%$searchQ%'");
    
            // $_SESSION['lastDest'] = "./books.php";
    
        }
        else{
            $result = $booksDB->query("SELECT * FROM clients") or die($booksDB->error);
        }
        ?>

    <?php 
    while($clientsArray = $result->fetch_assoc()): ?>

    <div class="clientsContainer_client">
        <div class="clientsContainer_client_image flex flex-jc-c">
            <a href="./client?c=<?php echo $clientsArray['id_client']; ?>">
                <img src="./assets/clients/<?php echo $clientsArray['image_client'];?>" alt="">
            </a>
        </div>

        <div class="clientsContainer_client_fullName">
            <p><?php echo $clientsArray['name_client'];?> <?php echo $clientsArray['prename_client'];?></p>
        </div>

        <div class="clientsContainer_client_email">
            <p><?php echo $clientsArray['email_client'];?></p>
        </div>

        <div class="clientsContainer_client_ud flex flex-ai-c flex-jc-sa">
            <div class="update">
                <a href="./addClient?editClient=<?php echo $clientsArray['id_client']; ?>"><img src="./assets/update.png" alt=""></a>
            </div>
            <div class="delete">
                <a href="./includes/process.inc.php?deleteClient=<?php echo $clientsArray['id_client']; ?>"><img src="./assets/delete.png" alt=""></a>
            </div>
        </div>

    </div>
    <?php endwhile?>
</div>

<script src="./js/main.js"></script>
</body>
</html>

<?php else:
    header("Location: ./login");
    exit();
endif;
?>