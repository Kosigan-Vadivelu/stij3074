<?php  include('server.php'); 

if(!isset($_SESSION['user_id']))
{
	header('Location:login.php');
}
if(@$_GET['action']=="logout")
{
	unset($_SESSION['user_id']);
	header('Location:login.php');
}
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
    $filename = $record['filename'];

}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
	background-color: #EAEDED ;
}
</style>


    <title></title>
	<body style="text-align:center;"> 
	
	<h3> 
		 Inventory System 
	  </h3> 
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
    
    
    </tbody>
</table>

<form method="post" action="server.php" enctype="multipart/form-data" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Product Name</label>
			<input type="text" name="pName" value="<?php echo $pName; ?>">
		</div>
		<div class="input-group">
			<label>Product Description</label>
			<input type="text" name="pDescript" value="<?php echo $pDescript; ?>">
		</div>
		<div class="input-group">
			<label>Receipt Date</label>
			<input type="date" name="pDate" value="<?php echo $pDate; ?>">
		</div>
		<div class="input-group">
			<label>Product Quantity</label>
			<input type="text" name="pQuantity" value="<?php echo $pQuantity; ?>">
		</div>
		<div class="input-group">
			<label>Stock Balance</label>
			<input type="text" name="pStock" value="<?php echo $pStock; ?>">
		</div>
		<div class="input-group">
			<label>Product</label>
			<input type="text" name="product" value="<?php echo $product; ?>">
		</div>
		<div class="input-group">
		<label>Image</label>
		<input type="file" name="uploadfile" value="<?php echo $filename; ?>" /> 
		
		<center><div class="input-group">
        <?php if ($edit_state == false): ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php else: ?>
            <button class="btn" type="submit" name="update" >Update</button>
        <?php endif ?>
		<br>
		<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a>
		</div>
    </form> 

</body>
</html>

<html>
<body>
  <form method="GET" action="display.php">
    <input type="submit" name="display" value="Display Items"/>
  </form>
</body>
</html>

<html>
<body>
  <form method="GET" action="search.php">
    <input type="submit" name="search" value="Search Items"/>
  </form>
</body>
</html>