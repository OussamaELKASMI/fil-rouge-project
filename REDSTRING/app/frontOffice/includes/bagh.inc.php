<?php

if(isset($_POST['addToBag'])){
    if(isset($_SESSION['bag'])){
        $bookIdArray = array_column($_SESSION['bag'], "bookId");
        // print_r($bookIdArray);
        
        if(in_array($_POST['bookId'], $bookIdArray)){
            echo "<script>alert('book already added to bag!')</script>";
        }
        else{
            $count = count($_SESSION['bag']);
            $booksArray = array(
                'bookId'=>$_POST['bookId']
            );

            $_SESSION['bag'][$count] = $booksArray;
            // print_r($_SESSION['bag']);
        }
    }
    else{
        $booksArray = array(
            'bookId'=>$_POST['bookId']
        );

        $_SESSION['bag'][0] = $booksArray;
        // print_r($_SESSION['bag']);
    }
}

if(isset($_GET['delete'])){
    $id_book = $_GET['delete'];
    foreach($_SESSION['bag'] as $key=>$value){
        if($value['bookId'] == $id_book){
            unset($_SESSION['bag'][$key]);
            echo "<script>window.location = 'bag.php'</script>";
        }
    }
}
