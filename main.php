<?php
session_start();

   
    
    if($_SESSION["adminIdentification"] == 2){
        header("Location: admin.php");
    }
    else{
    
    function displayGreeting(){
        $userName = $_SESSION["userName"];
        if($_SESSION["adminIdentification"] == 1 ){
          
            echo $userName;
        }
        else{
            echo "Guest";
        }
    }
    
    function showLogout(){
        if($_SESSION["adminIdentification"] == 1 ){
        echo "<form action='logout.php'>";
        echo "<input type='submit' value='Logout'/>"; 
        echo "</form>";
        
        }
        else{
        echo "<form action='login.html'>";
        echo "<input type='submit' value='Login'/>";
        echo "</form>";
        echo "<form action='signup.php'>";
        echo "<input type='submit' value='Sign-Up'/>";
        echo "</form>";
           
        }
    }
        
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <title> </title>
           <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style>
        #wrapper{
            text-align:center;
        }
    </style>
    <div id="wrapper">
    <?=showLogout()?>
    <br>
    <br>
    <div class = "jumbotron text-center">
    <h1>Jason's Limited Goods</h1>
    <h3>Welcome <?=displayGreeting()?></h3>
    
    <style>
        #imgLink{
            width: 100px;
            height: 100px;
        }
    </style>
    <body>
        <form>
        <input type="text" name="searchProduct"/>
        <br>
        <input type="submit" value="Search"/>
        <br>
        <br>
        </form>
        
        <h2>Items</h2>
        <?php include 'productsDisplay.php'?>
        </div>
       
    </body>
</html>