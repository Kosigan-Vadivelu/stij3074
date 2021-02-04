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


<table>
	<thead>
		<tr>
		<th> Image</th>
			<th>Product Name</th>
			<th>Product Description</th>
			<th>Receipt Date</th>
			<th>Product Quantity</th>
			<th>Stock Balance</th>
			<th>Product</th>
			<th colspan="6" style="text-align:center;">Action</th>
		</tr>
	</thead>
	<tbody>
    <?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		<td><img src="image/<?php echo $row['filename']; ?>" style="width:100px" alt="img"></td>
			<td><?php echo $row['pName']; ?></td>
			<td><?php echo $row['pDescript']; ?></td>
			<td><?php echo $row['pDate']; ?></td>
			<td><?php echo $row['pQuantity']; ?></td>
			<td><?php echo $row['pStock']; ?></td>
			<td><?php echo $row['product']; ?></td>
			<td>
            <a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>"  >Update</a>
			</td>
			<td>
            <a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>" >Delete</a>
			</td>
		</tr>
    <?php } ?>
    
    </tbody>
</table>


</body>
</html>

<html>
<body>
  <form method="GET" action="index.php">
    <input type="submit" name="back" value="Back" style="background-color:lightblue;"/>
  </form>
</body>
</html>