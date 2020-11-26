<?php
include_once("dbconnect.php");

//get data first
$id = $_GET['id'];
$name = $_GET['name']; 
$price = $_GET['price'];
$quantity = $_GET['quantity'];
$calories = $_GET['calories'];

try{
    $sql = "INSERT INTO menu (id, name, price, quantity, calories)
    VALUES ('$id', '$name', '$price','$quantity','$calories')";
    $conn->exec($sql);
    echo "<script> alert('New Record created successfully')</script>";
    
  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Error')</script>";
    echo "<script> window.location.replace('orderForm.html') </script>;";
  }
  
  $conn = null;

?>
