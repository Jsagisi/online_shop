<?php
session_start();  //start or resume an existing session

include 'functions/dbConnection.php';

$conn = getDBConnection("shop");

$username = $_POST['username'];
$password = sha1($_POST['password']);   //hash("sha1",$_POST['password']);

//USE NAMEDPARAMETERS TO PREVENT SQL INJECTION
//$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$sql = "SELECT * FROM user WHERE id = :id AND password = :password";

$namedParameters[':id'] = $username;
$namedParameters[':password'] = $password;


$statement = $conn->prepare($sql);
$statement->execute($namedParameters);
$record = $statement->fetch(PDO::FETCH_ASSOC);

//print_r($record);

 if (empty($record)) { //wrong credentials
     
     echo "Wrong username or password";
     
 } else {
     
     $_SESSION["userName"] = $record['id'];
     $_SESSION["adminIdentification"] = $record['adminId'];

   
     header("Location: main.php"); //redirect to the main admin program
     
 }


?>