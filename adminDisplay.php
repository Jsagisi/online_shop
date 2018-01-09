<?php 

session_start();
include 'functions/dbConnection.php';
function printItems()
{
    global $conn;
    $conn = getDBConnection("shop");
    $itemSql = "SELECT * FROM product WHERE 1";
    
    // echo $itemSql;
    
    $statement = $conn->prepare($itemSql);
    $statement->execute();
    $items = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $items;
}
    
        $conn = getDBConnection("shop");
        $products = printItems();
        
        echo "<h2>Stats</h2>";
         echo "Total inventory price: ";
        $sql = "SELECT SUM(price) as totalprice
                FROM product";
                
        $stmt = $conn -> prepare($sql);
        $stmt -> execute ();
        
        $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $record) {
	        echo "$".$record['totalprice'];
        }
         echo "<br><br>Total unique items in Inventory: ";
        $sql = "SELECT count(quantity) as count
                FROM product";
                
        $stmt = $conn -> prepare($sql);
        $stmt -> execute ();
        
        $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $record) {
	        echo $record['count'];
        }
        echo "<br><br>Total items in Inventory: ";
        $sql = "SELECT SUM(quantity) as sum
                FROM product";
                
        $stmt = $conn -> prepare($sql);
        $stmt -> execute ();
        
        $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $record) {
	        echo $record['sum'];
        }
        echo"</br></br> Top 3 Most Expensive Items: </br>";
        
        $sql = "SELECT * 
                FROM  `product` 
                ORDER BY  `product`.`price` DESC 
                LIMIT 0 , 3";
                
        $stmt = $conn -> prepare($sql);
        $stmt -> execute ();
        
        $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $record) {
	        echo $record['productName'] . " - $".$record['price'];
	        echo "<br>";
        }
        
        echo "</br>Items grouped by type of clothing: </br>";
        $sql = "SELECT COUNT(type) as typesum, type
                FROM product
                GROUP BY type";
                $stmt = $conn -> prepare($sql);
               $stmt -> execute ();
        
        $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $record) {
	        echo $record['type'] . " - ".$record['typesum'];
	        echo "<br>";
        }
        echo"<h2>Inventory</h2>";
        echo "<table class= 'adminTable'>";
        echo "<tr>";
        echo "<th>Picture</th>";
        echo "<th>Product</th>";
        echo "<th>Price</th>";
        echo "<th>Amount Left</th>";
        echo "<th>Description</th>";
        echo "<th>Type</th>";
       
        echo "</tr>";
    
    foreach($products as $listed_item){
        echo "<tr>";
        echo "<form>";
        
        echo "<td><img src=" .$listed_item['imageLink']." height='50' width='50' />
        </td><td>" .$listed_item['productName'].
        "</td><td>$".$listed_item['price'].
        "</td><td>".$listed_item['quantity'].
        "</td><td>".$listed_item['description'].
        "</td><td>".$listed_item['type']."</td>";
        
        echo "<td>";
        echo "<a href='productUpdate.php?productId=".$listed_item['productId']."'>
                     <button type=\"button\" class=\"btn btn-default btn-lg\">
                     <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span> Update
                     </button></a>";
        echo "<a onclick=confirmDelete()  href='deleteProduct.php?productId=".$listed_item['productId']."'>
                     <button type=\"button\" class=\"btn btn-danger btn-lg\">
                     <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Delete
                     </button></a>";        
        echo "</form>";
        echo "</td>";
        
        echo"</tr>";
        
    }
    echo "</table><hr></br>";
    
?>