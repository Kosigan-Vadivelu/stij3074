
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
if($db->connect_error)
{
	echo "Failed to connect to server : ".$db->error;
}
if(isset($_POST['submit']))
{
	$username = $db->real_escape_string(stripslashes(@$_POST['username']));
	$password = $db->real_escape_string(stripslashes(@$_POST['password']));
	$name = $db->real_escape_string(stripslashes(@$_POST['name']));
	$sql_login = "SELECT * FROM user WHERE usename = '".$username."' AND password = '".$password."' ";
	if($result_login = $db->query($sql_login))
	{
		$rows_login = $result_login->fetch_array();
		if($total_login = $result_login->num_rows)
		{
          
			     	$_SESSION['user_id'] = $rows_login['no'];
					$_SESSION['name'] = $rows_login['username'];
					
			     	header('Location:index.php');
			     }else echo "You have entered wrong Username or Password";
	}else echo "Login Unsuccessful";
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
	
      
	  <h1 style="color:green;"> 
		  Welcome to Budget Convenient Mart
	  </h1> 
		
	  <h4> 
		 Inventory System 
	  </h4> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



<form id="form1" name="form1" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Username</label>
			<input id="username" type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input id="password" type="password" name="password" >
		</div>
		
		<center><div class="input-group">
        
            <button class="btn" type="submit" name="submit" >Login</button>
        <br>
            <a href="register.php">Register</a>
        
		</div>
    </form> 

</body>
</html>