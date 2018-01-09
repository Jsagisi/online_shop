<?php
session_start();
    include '../functions/dbConnection.php';
if($_SESSION["adminId"] == 2){
        header("Location: admin.php");
    }
    function addUser(){
        global $conn;
        $conn = getDBConnection("shop");
        
        $sql = "INSERT INTO user (
                adminId,
                email,
                id,
                password
                )
                VALUES (
                :adminId, :email, :id, :password
                )";
        $nameOfarray = array() ;
        $nameOfarray[':adminId']= 1;
        $nameOfarray[':email'] = $_GET['email'];    
        $nameOfarray[':id'] = $_GET['userId'];
        $nameOfarray[':password'] = $_GET['password'];    
        
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
        <form action = "main.php">
            <input type="submit" value = "Back">
        </form>
        <br>
        <br>
        <h1>Sign-Up!</h1>
        <br>
        <form>
            User Name: <input type="text" name="userId" />
            <br>
            Password: <input type="password" name="password" />
            <br/>
            Email: <input type="email" name="email"/>
          
          
            <br>
            
            <input type="submit" name="signUp" value="Sign Up"/>
            <?php
            if(isset($_GET['signUp'])){
                addUser();
                echo"The usuer was added successfully";
            }
            ?>
        </form>
    </body>
</html>