<?php
session_start();

    if($_SESSION["adminIdentification"]== 1){
        header("Location: main.php");
    }
    include 'functions/dbConnection.php';
    $conn= getDBConnection("shop");
    
    function addProduct(){
        global $conn;
        
        $sql = "INSERT INTO product (
                productId,
                productName,
                description,
                price,
                quantity,
                type,
                imageLink
                )
                VALUES (:productId, :productName, :description, :price, :quantity,
                :type, :imageLink)";
        $nameOfarray = array() ;
        $nameOfarray[':productId'] = $_GET['productId'];    
        $nameOfarray[':productName'] = $_GET['productName'];
        $nameOfarray[':description'] = $_GET['description'];    
        $nameOfarray[':price'] = $_GET['price'];
        $nameOfarray[':quantity'] = $_GET['amount'];
        $nameOfarray[':type'] = $_GET['category'];    
        $nameOfarray[':imageLink'] = $_GET['URL'];
    
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute($nameOfarray);
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form action='admin.php'>
            <input type="submit" value = "back">
        </form>
        <h1>Add Product</h1>
    
    <form>
        product Id: <input type="text" name="productId" />
        <br>
        product Name: <input type="text" name="productName"/>
        <br>
        Description: <input type="text" name="description"/>
        <br>
        Price: <input type="text" name="price"/>
        <br>
        Quantity: <input type="text" name="amount"/>
        <br>
        Type: <input type="text" name="category"/>
        <br>
        image URL: <input type="text" name="URL"/>
        <br>
      
        <input type="submit" name="Add"/>
        </form>    
        <?php
            if (isset($_GET['Add'])){
                addProduct();
                echo"The product was added successfully";
            }
            ?>
    
    </body>
</html>