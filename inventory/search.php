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
    <title>BookDepo</title>
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

<?php
error_reporting(0);
?>

<form method="post" action=""  >
		<div class="input-group">
			<label>Search</label>
			<input type="text" name="search" >
		</div>
		
		
		<center><div class="input-group">
            <input type="submit" name="submit" value="Search">
		<br>
		</div>
    </form> 
	<?php
$search_value=$_POST["search"];

if($db->connect_error){
    echo 'Connection Faild: '.$db->connect_error;
    }else{
        $sql="select * from items where pName like '%$search_value%'";

        $res=$db->query($sql);

        while($row=$res->fetch_assoc()){ ?>
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
			
		</tr>
	</thead>
	<tbody>
	<tr>
		<td><img src="image/<?php echo $row['filename']; ?>" style="width:100px" alt="img"></td>
			<td><?php echo $row['pName']; ?></td>
			<td><?php echo $row['pDescript']; ?></td>
			<td><?php echo $row['pDate']; ?></td>
			<td><?php echo $row['pQuantity']; ?></td>
			<td><?php echo $row['pStock']; ?></td>
			<td><?php echo $row['product']; ?></td>
			
		</tr>
    </tbody>
</table>

     <?php       }       

        }
		?>
</body>
</html>

<html>
<body>
  <form method="GET" action="index.php">
    <input type="submit" name="back" value="Back" style="background-color:lightblue;"/>
  </form>
</body>
</html>