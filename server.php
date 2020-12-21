<?php 
session_start();
$db = mysqli_connect($servername,$username,$passworddb,$dbname);
$servername = "sql304.epizy.com";
$username = "epiz_27068095";
$passworddb = "k9ZvTlB83q";
$dbname = "epiz_27068095_bookdepo";
$db = mysqli_connect($servername,$username,$passworddb,$dbname);

	// initialize variables
	$id = 0;
	$title = "";
	$author = "";
	$price = "";
	$description = "";
	$publisher = "";
	$isbn = "";
	$edit_state = false;

	

	if (isset($_POST['save'])) {
		$title = $_POST['title'];
		$author = $_POST['author'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$publisher = $_POST['publisher'];
		$isbn = $_POST['isbn'];
		
		$query = "INSERT INTO book (title, author, price, description, publisher, isbn) VALUES ('$title', '$author', '$price', '$description', '$publisher', '$isbn')"; 
		mysqli_query($db, $query); 
		$_SESSION['msg'] = "Data saved";
		header('location: index.php'); 
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$publisher = $_POST['publisher'];
		$isbn = $_POST['isbn'];

		mysqli_query($db, "UPDATE book  SET title='$title', author='$author', price='$price', description='$description', publisher='$publisher', isbn='$isbn' WHERE id=$id"); 
		$_SESSION['msg'] = "Address updated";
		header('location: index.php'); 
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM book  WHERE id=$id");
		$_SESSION['msg'] = "Content deleted!"; 
		header('location: index.php');
	}

	$results = mysqli_query($db, "SELECT * FROM book ");


?>