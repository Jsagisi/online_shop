<?php
function getUserInfo($productId){
    include 'functions/dbConnection.php';
    $conn = getDBConnection("shop");
  
    $sql = "SELECT * FROM product WHERE productId = $productId";
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    return $record;
}
?>