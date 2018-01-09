<?php

    include 'functions/dbConnection.php';
    $conn = getDBConnection("shop");
    $sql = "SELECT * FROM product";
    $stmt = $conn-> prepare($sql);
    $stmt -> execute(array("productId"=>$_GET['productId']));
    $items = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($items);
?>