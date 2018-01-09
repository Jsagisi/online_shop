<?php
    function getDBConnection($dbname){
        
    foreach (glob("../vendor/*.php") as $filename)
    {
        include $filename;
    }
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
  
    
    $servername = getenv('DATABASE_HOST');
    $username = getenv('USER_NAME');
    $password = getenv('DATABASE_PASSWORD');
    $database = getenv('DATABASE_NAME');
    $dbport = getenv('DATABASE_PORT');
    
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    }
?>