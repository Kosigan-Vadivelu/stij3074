<?php 
session_start();
$db = mysqli_connect($servername,$username,$passworddb,$dbname);
$servername = "sql304.epizy.com";
$username = "epiz_27068095";
$passworddb = "k9ZvTlB83q";
$dbname = "epiz_27068095_inventory";
$db = mysqli_connect($servername,$username,$passworddb,$dbname);
// session_start();
// $db = mysqli_connect('localhost', 'root', '', 'inventory');

	// initialize variables
	$id = 0;
	$pName = "";
	$pDescript = "";
	$pDate = "";
	$pQuantity = "";
	$pStock = "";
	$product = "";
	$edit_state = false;

	

	if (isset($_POST['save'])) {
		$pName = $_POST['pName'];
		$pDescript = $_POST['pDescript'];
		$pDate = $_POST['pDate'];
		$pQuantity = $_POST['pQuantity'];
		$pStock = $_POST['pStock'];
		$product = $_POST['product'];
		$filename = $_FILES["uploadfile"]["name"]; 
		$tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "image/".$filename; 
		
		$query = "INSERT INTO items (pName, pDescript, pDate, pQuantity, pStock, product, filename) VALUES ('$pName', '$pDescript', '$pDate', '$pQuantity', '$pStock', '$product', '$filename')"; 
		mysqli_query($db, $query); 
		if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      }
		$_SESSION['msg'] = "Data saved";
		header('location: index.php'); 
	}
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "INSERT INTO user (name, usename, password) VALUES ('$name', '$username', '$password')"; 
		mysqli_query($db, $query); 
		$_SESSION['msg'] = "Account Registered";
		header('location: register.php'); 
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$pName = $_POST['pName'];
		$pDescript = $_POST['pDescript'];
		$pDate = $_POST['pDate'];
		$pQuantity = $_POST['pQuantity'];
		$pStock = $_POST['pStock'];
		$product = $_POST['product'];

		mysqli_query($db, "UPDATE items  SET pName='$pName', pDescript='$pDescript', pDate='$pDate', pQuantity='$pQuantity', pStock='$pStock', product='$product' WHERE id=$id"); 
		$_SESSION['msg'] = "Address updated";
		header('location: index.php'); 
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM items  WHERE id=$id");
		$_SESSION['msg'] = "Content deleted!"; 
		header('location: index.php');
	}

	$results = mysqli_query($db, "SELECT * FROM items ");


?>