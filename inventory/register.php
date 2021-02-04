<?php  include('server.php'); 

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM items WHERE id=$id");
    $record = mysqli_fetch_array ($rec);
    $pName = $record['pName'];
	$pDescript = $record['pDescript'];
	$pDate = $record['pDate'];
	$pQuantity = $record['pQuantity'];
	$pStock = $record['pStock'];
	$product = $record['product'];
    $id = $record['id'];

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

<center><h1>Register</h1>

<form method="post" action="server.php" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name">
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" >
		</div>
		
		
		<center><div class="input-group">
            <button class="btn" type="submit" name="register" >Register</button>
        </form> <br>
            <a href="login.php">Back</a>
        
		</div>
    

</body>
</html>