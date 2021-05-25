<?php 

    // session_start();

    $id_book = 0;
    $name_book = "";
    $author_book = "";
    $image_book = "";
    $price_book = "";
    $description_book = "";
    $quantity_book = "";
    $type_book = "";
    $stock = "";


if(isset($_GET['sb'])){
        $id_book = $_GET['sb'];

        $bookData = $conn->query("SELECT * FROM books WHERE id_book=$id_book");
        
        $bookList = $bookData->fetch_array();

        $name_book = $bookList['name_book'];
        $author_book = $bookList['author_book'];
        $image_book = $bookList["image_book"];
        $price_book = $bookList['price_book'];
        $description_book = $bookList['description_book'];
        $quantity_book = $bookList['quantity_book'];
        $type_book = $bookList['type_book'];

        if($quantity_book < 1){
            $stock = "Out of Stock.";
        }else{
            $stock = "In Stock.";
        }

}

?>