<?php
session_start();
    
    include 'functions/dbConnection.php';
    
     if($_SESSION["adminIdentification"]== 1){
        header("Location: main.php");
    }
    
    
    function getItemInfo($productId){
    
    $conn = getDBConnection("shop");
    
  
    $sql = "SELECT * FROM product WHERE productId = $productId";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    return $record;
}
   
    
    
    
    

    
    
        if(isset($_GET['Submit'])){
            
        $conn = getDBConnection("shop");
       
        
        $sql = "UPDATE product 
                SET productName = :productName,
                    description = :description,
                    price = :price,
                    quantity = :quantity,
                    type = :type,
                    imageLink= :imageLink
                WHERE productId = :productId";
        $nameOfarray = array() ;
        $nameOfarray[':productId']= $_GET['productId'];
        $nameOfarray[':productName'] = $_GET['productName'];
        $nameOfarray[':description'] = $_GET['description'];    
        $nameOfarray[':price'] = $_GET['price'];
        $nameOfarray[':quantity'] = $_GET['amount'];
        $nameOfarray[':type'] = $_GET['category'];    
        $nameOfarray[':imageLink'] = $_GET['URL'];
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute($nameOfarray);
        
        
        echo"Succesfully Updated";
    }
    if(isset($_GET['productId'])){
        $userInfo = getItemInfo($_GET['productId']);
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form action='admin.php'>
            <input type="Submit" value="back">
        </form>
        <h1>Update Product</h1>
    
    <form method="GET">
       
        product Name: <input type="text" name="productName" maxlength="30" value="<?=$userInfo['productName']   ?>"/>
        <br>
        Description: <input type="text" name="description"value="<?=$userInfo['description']   ?>"/>
        <br>
        Price: <input type="text" name="price"value="<?=$userInfo['price']   ?>"/>
        <br>
        Quantity: <input type="text" name="amount"value="<?=$userInfo['quantity']   ?>"/>
        <br>
        Type: <input type="text" name="category"value="<?=$userInfo['type']   ?>"/>
        <br>
        image URL: <input type="text" name="URL"value="<?=$userInfo['imageLink']   ?>"/>
        
        <br>
        Product Id: <input type="text" name="productId"value="<?=$userInfo['productId']  ?>"/>
        <br>
        <input type="submit" name="Submit" value="Update"/>
        </form>
        
    </body>
</html>