<?php
	session_start();
	include('../include/dbconnect.php');
	if(isset($_SESSION['username'])){
		header('location:view_res.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body style="background: url('abc.jpg');">
	<div style="border-radius: 100px;background-color: white;opacity: 0.7;padding: 50px; margin: auto; margin-top: 100px;height: 300px;width: 450px;">
	<h2 style="text-align: center;">Login</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
		<label>Username:</label><input class="form-control" type="text" name="ad_username">
		<br>
		<label>Password: </label><input class="form-control" type="password" name="ad_pass">	
		</div>
		<center><button class="btn btn-success" name="submit">Login</button></center>
	</form>
	
	
</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		$user=$_POST['ad_username'];
		//put name and welcome '?name'
		$pass=$_POST['ad_pass'];
		$sql="SELECT * FROM yum_admin WHERE admin_name='$user' AND admin_password = '$pass'";
		$result=$conn->query($sql);
		if($result->num_rows>0){
			$_SESSION['username']=$user;
			header('location:view_res.php');
		}
		else{
			echo "<script>alert('Login Unsucecssfull. Username or password is incorrect. ');</script>";
		}
	}
?>


