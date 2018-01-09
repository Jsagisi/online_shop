<?php
session_start();
    
    if($_SESSION["adminIdentification"]==1){
        header("Location: main.php");
        include 'admin.php';
    }
    else{
        include 'functions/dbConnection.php';
        header("Location: admin.php");
        
        $dbConn = getDBConnection("shop");
        
        $sql = "DELETE FROM product
                WHERE productId = " . $_GET['productId'];
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();

        
    }


?>