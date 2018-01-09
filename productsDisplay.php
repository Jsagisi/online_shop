<?php
session_start();

function printItems()
{
    include 'functions/dbConnection.php';
    $conn = getDBConnection("shop");
    $itemSql = "SELECT * FROM product WHERE 1";
    
    // echo $itemSql;
    
        if(!empty($_GET['searchProduct'])){
            // echo $itemSql;
            // echo "<br>";
            $itemSql .= " AND productName LIKE '%" .$_GET['searchProduct']. "%'";
            
        }
    $statement = $conn->prepare($itemSql);
    $statement->execute();
    $items = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $items;
}
function getItemInfo($productId){
    global $conn;
    $sql = "SELECT * FROM product WHERE productId = $productId";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $record;
}
    

    $products = printItems();
    
        echo "<table class= 'productTable'>";
        echo "<tr>";
        echo "<th>Picture</th>";
        echo "<th>Product</th>";
        echo "<th>Price</th>";
        echo "<th>Amount Left</th>";
        echo "<th>Description</th>";
        echo "<th>Type</th>";
        echo "<th>Quantity</th>";
       
        echo "</tr>";
    
    foreach($products as $listed_item){
        echo "<tr>";
        echo "<form action='shopping_cart.php'>";
        
        echo "<td><img src=" .$listed_item['imageLink']." height='100' width='100' />
        </td><td>" .$listed_item['productName'].
        "</td><td>$".$listed_item['price'].
        "</td><td>".$listed_item['quantity'].
        "</td><td>".$listed_item['description'].
        "</td><td>".$listed_item['type']."</td><td><form><input type='text' size='1' id='amount'/></td>";
        
        echo "<td>";
        echo "<input type= 'hidden' name='productId' value='".$listed_item['productId']."'>";
        echo "<input type ='submit' value='Add to Cart'>";
        echo "</form>";
        echo "</td>";
        
        echo"</tr>";
        
    }
    echo "</table><hr></br>";
    


?>


<script>
    function displayItemInfo(productId){
       
        $.ajax({

            type: "GET",
            url: "products.php",
            dataType: "json",
            data: { "id": productId},
            success: function(data,status) {
              //alert(data);
              $("#productId").html(data.name + "<br>" +
                                 "<img src=" + data.imageLink +" />"
                                 +"<br> " + data.price + data.description);
            },
            complete: function(data,status) { //optional, used for debugging purposes
             // alert(status);
            }
        
        });//ajax
        
    }
</script>


