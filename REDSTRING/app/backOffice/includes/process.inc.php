<?php
    
    $update = false;
    $currentDest = "$_SERVER[REQUEST_URI]";

    $id_book = 0;
    $name_book = "";
    $author_book = "";
    $image_book = "";
    $price_book = "";
    $description_book = "";
    $quantity_book = "";

    $id_client = 0;
    $name_client = "";
    $prename_client = "";
    $birthday_client = "";
    $gender_client = "";
    $adress_client = "";
    $email_client = "";
    $phone_client = "";
    $image_client = "";

    
    $booksDB = new mysqli('localhost', 'root', '', 'bestbooks') or die(mysqli_error($booksDB));
    

    if(isset($_GET['destToBooks'])){
        session_start();
        $_SESSION['dest'] = "books";
        $_SESSION['add'] = "./addBook";
        $_SESSION['search'] = "searchBooks";


        // $_SESSION['lastDest'] = "./index.php";

        header("Location: ../books");
        die();
    }

    if(isset($_GET['destToCats'])){
        session_start();
        $_SESSION['dest'] = "categories";
        $_SESSION['add'] = "./addCat";
        $_SESSION['search'] = "searchCats";

        // $_SESSION['lastDest'] = "./index.php";

        header("Location: ../categories");
        die();
    }

    if(isset($_GET['destToClients'])){
        session_start();
        $_SESSION['dest'] = "clients";
        $_SESSION['add'] = "./addClient";

        // $_SESSION['lastDest'] = "./index.php";

        header("Location: ../clients");
        die();
    }


    if(isset($_POST['addCategory'])){
        $categoryName = $_POST["categoryName"];
        
        $booksDB->query("INSERT INTO categories (name_category) VALUES('$categoryName')");

        // $_SESSION['lastDest'] = "./categories.php";

        header("Location: ../categories");

    }

    if(isset($_GET['deleteCat'])){
        $categoryId = $_GET["deleteCat"];

        $booksDB->query("DELETE FROM categories WHERE id_category=$categoryId") or die($mysqli->error());

        header("Location: ../categories");

    }


    if(isset($_POST['addBook'])){

        $upload_dir = './assets/';

        $name_book = $_POST["name_book"];
        $author_book = $_POST["author_book"];
        $image_book = $_FILES["image_book"]["name"];
        $price_book = $_POST["price_book"];
        $quantity_book = $_POST["quantity_book"];
        $description_book = $_POST["description_book"];
        
        $booksDB->query("INSERT INTO books (name_book, author_book, image_book, price_book, description_book, quantity_book) VALUES('$name_book', '$author_book', '$image_book', '$price_book', '$description_book', '$quantity_book')")
        or die($booksDB->error);
        
        $tmp_name = $_FILES["image_book"]["tmp_name"];
        move_uploaded_file($tmp_name, "$upload_dir$image_book");

        $_SESSION['message'] = "Book added sucessfully!";
        $_SESSION['msg_type'] = "primary";

        // $_SESSION['lastDest'] = "./index.php";

        header("Location: ../books");
    }

    if(isset($_GET['deleteBook'])){
        $bookId = $_GET["deleteBook"];

        $booksDB->query("DELETE FROM books WHERE id_book=$bookId") or die($mysqli->error());

        header("Location: ../books");

    }

    if(isset($_GET['editBook'])){
        $id_book = $_GET['editBook'];
        $dataResult = $booksDB->query("SELECT * FROM books WHERE id_book=$id_book") or die($booksDb->error());
        
        $row = $dataResult->fetch_array();

        $name_book = $row['name_book'];
        $author_book = $row['author_book'];
        $image_book = $row['image_book'];
        $price_book = $row['price_book'];
        $quantity_book = $row['quantity_book'];
        $description_book = $row['description_book'];
        $update = true;

        // $_SESSION['lastDest'] = "./books.php";
        

    }

    if(isset($_POST['updateBook'])){
        $id_book = $_POST['id_book'];
        $name_book = $_POST["name_book"];
        $author_book = $_POST["author_book"];
        // $image_book = $_POST["image_book"];
        $price_book = $_POST["price_book"];
        $quantity_book = $_POST['quantity_book'];
        $description_book = $_POST["description_book"];


        $booksDB->query("UPDATE books SET name_book='$name_book', author_book='$author_book', price_book='$price_book', quantity_book='$quantity_book', description_book='$description_book' WHERE id_book=$id_book")
        or die($booksDB->error);

        // $_SESSION['message'] = "Book updated sucessfully!";
        // $_SESSION['msg_type'] = "warning";

        header("Location: ../books");
    }


    if(isset($_GET['b'])){
        $id_book = $_GET['b'];
        $dataResult = $booksDB->query("SELECT * FROM books WHERE id_book=$id_book") or die($booksDb->error());
        
        $row = $dataResult->fetch_array();

        $name_book = $row['name_book'];
        $author_book = $row['author_book'];
        $image_book = $row["image_book"];
        // $image_book = $row['image_book'];
        $price_book = $row['price_book'];
        $description_book = $row['description_book'];
        $quantity_book = $row['quantity_book'];

        $update = true;
        
        // $_SESSION['lastDest'] = "./books.php";

    }

    //CLIENT STUFF

    if(isset($_POST['addClient'])){

        $upload_dir = '../assets/';

        $image_client = $_FILES["image_client"]["name"];
        $name_client = $_POST["name_client"];
        $prename_client = $_POST["prename_client"];
        $birthday_client = $_POST["birthday_client"];
        $gender_client = $_POST["gender_client"];
        $adress_client = $_POST["adress_client"];
        $email_client = $_POST["email_client"];
        $phone_client = $_POST["phone_client"];
        
        $booksDB->query("INSERT INTO clients (image_client, name_client, prename_client, birthday_client, gender_client, adress_client, email_client, phone_client) VALUES('$image_client', '$name_client', '$prename_client', $birthday_client, '$gender_client', '$adress_client', '$email_client', '$phone_client')")
        or die($booksDB->error);
        
        $tmp_name = $_FILES["image_client"]["tmp_name"];
        move_uploaded_file($tmp_name, "$upload_dir$image_client");

        header("Location: ../clients");
    }

    if(isset($_GET['deleteClient'])){
        $clientId = $_GET["deleteClient"];

        $booksDB->query("DELETE FROM clients WHERE id_book=$clientId") or die($mysqli->error());

        header("Location: ../clients");

    }

    if(isset($_GET['editClient'])){
        $id_client = $_GET['editClient'];
        $dataResult = $booksDB->query("SELECT * FROM clients WHERE id_client=$id_client") or die($booksDB->error());
        
        $row = $dataResult->fetch_array();

        $name_client = $row['name_client'];
        $prename_client = $row['prename_client'];
        $birthday_client = $row['birthday_client'];
        $gender_client = $row['gender_client'];
        $adress_client = $row['adress_client'];
        $email_client = $row['email_client'];
        $phone_client = $row['phone_client'];
        $image_client = $row['image_client'];

        $update = true;

        // $_SESSION['lastDest'] = "./books.php";
        

    }

    if(isset($_POST['updateClient'])){

        $upload_dir = '../assets/clients/';

        $id_client = $_POST['id_client'];
        $name_client = $_POST["name_client"];
        $prename_client = $_POST["prename_client"];
        $birthday_client = $_POST["birthday_client"];
        $gender_client = $_POST["gender_client"];
        $adress_client = $_POST['adress_client'];
        $email_client = $_POST["email_client"];
        $phone_client = $_POST["phone_client"];
        $image_client = $_FILES["image_client"]["name"];


        $booksDB->query("UPDATE clients SET image_client='$image_client', name_client='$name_client', prename_client='$prename_client', birthday_client='$birthday_client', gender_client='$gender_client', adress_client='$adress_client', email_client='$email_client', phone_client='$phone_client' WHERE id_client=$id_client")
        or die($booksDB->error);

        $tmp_name = $_FILES["image_client"]["tmp_name"];
        move_uploaded_file($tmp_name, "$upload_dir$image_client");

        // $_SESSION['message'] = "Book updated sucessfully!";
        // $_SESSION['msg_type'] = "warning";

        header("Location: ../clients");
    }


    if(isset($_GET['c'])){
        $id_client = $_GET['c'];
        $dataResult = $booksDB->query("SELECT * FROM clients WHERE id_client=$id_client") or die($booksDb->error());
        
        $row = $dataResult->fetch_array();

        $name_client = $row['name_client'];
        $prename_client = $row['prename_client'];
        $birthday_client = $row["birthday_client"];
        $gender_client = $row['gender_client'];
        $adress_client = $row['adress_client'];
        $email_client = $row['email_client'];
        $phone_client = $row['phone_client'];
        $image_client = $row['image_client'];

        $update = true;
        
        // $_SESSION['lastDest'] = "./books.php";

    }

















    if($currentDest == "/REDSTRING/app/backOffice/books" || $currentDest == "/REDSTRING/app/backOffice/categories" || $currentDest == "/REDSTRING/app/backOffice/clients"){
        $_SESSION['lastDest'] = "./index";
    }
    elseif($currentDest == "/REDSTRING/app/backOffice/book?b=$id_book"){
        $_SESSION['lastDest'] = "./books";
    }
    elseif($currentDest == "/REDSTRING/app/backOffice/client?c=$id_client"){
        $_SESSION['lastDest'] = "./clients";
    }
?>