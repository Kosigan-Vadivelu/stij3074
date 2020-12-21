<?php  include('server.php'); 

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db, "SELECT * FROM book WHERE id=$id");
    $record = mysqli_fetch_array ($rec);
    $title = $record['title'];
	$author = $record['author'];
	$price = $record['price'];
	$description = $record['description'];
	$publisher = $record['publisher'];
	$isbn = $record['isbn'];
    $id = $record['id'];

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


<table>
	<thead>
		<tr>
			<th>title</th>
			<th>author</th>
			<th>price</th>
			<th>description</th>
			<th>publisher</th>
			<th>isbn</th>
			<th colspan="6">Action</th>
		</tr>
	</thead>
	<tbody>
    <?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['author']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td><?php echo $row['publisher']; ?></td>
			<td><?php echo $row['isbn']; ?></td>
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

<form method="post" action="server.php" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $title; ?>">
		</div>
		<div class="input-group">
			<label>Author</label>
			<input type="text" name="author" value="<?php echo $author; ?>">
		</div>
		<div class="input-group">
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $price; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<label>publisher</label>
			<input type="text" name="publisher" value="<?php echo $publisher; ?>">
		</div>
		<div class="input-group">
			<label>isbn</label>
			<input type="text" name="isbn" value="<?php echo $isbn; ?>">
		</div>
		<div class="input-group">
        <?php if ($edit_state == false): ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php else: ?>
            <button class="btn" type="submit" name="update" >Update</button>
        <?php endif ?>
		</div>
    </form> 

</body>
</html>