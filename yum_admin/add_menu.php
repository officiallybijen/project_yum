<?php 
	session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	
	include('../include/dbconnect.php');
	$id=$_REQUEST['id'];
	if(empty($id)){
		header('location:view_res.php');
	}

	if(isset($_GET['msg'])){
	$msg=$_GET['msg'];
    if($msg !=''){
    echo "<script>alert('$msg');</script>";
    }}

	if(isset($_POST['submit'])){
		$res_id=$_POST['res_id'];
 		$food=$_POST['foodname'];
 		$price=$_POST['price'];
 		$sql="insert into yum_menu(res_id,food,price) values ('$res_id','$food',$price)";
 		if($conn->query($sql)){
 			$message="Food item added sucessfully.";
 			header("Location: add_menu.php?id=$res_id&msg=$message"); 	
 		}
 		else
 		{
 			$message="Unable to add food item";
 			header("Location: add_menu.php?id=$res_id&msg=$message"); 
 		}
 		
 	}
 ?>
 <html>
 <head>
 	<title>Menu</title>
 	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<style type="text/css">
 		span{
 			color: red;	
 		}
 	</style>
 	<script language="javascript">
 		function validateForm(){
 			var error=0;
 			var foodname=document.form.foodname.value;
 			var price=document.form.price.value;

 			if(foodname.trim()==''){
			document.getElementById('err-foodname').innerHTML="*Food name field can't be left empty";
			error++;
			}else{
			if(foodname.length>20){
			document.getElementById('err-foodname').innerHTML="*Length of food name is too long.";
			error++;
			}
			}


			if(price.trim()==''){
			document.getElementById('err-price').innerHTML="*Price field can't be left empty";
			error++;
			}

			if(error>0){
			return false;
			}
		}


		function confirm_delete(){
		var $report=confirm("Are you sure you want to delete this food item!!!");
		return $report;
}
</script>
 </head>
 <body>
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
			<li><a class="nav-link" href="add_res.php">Add Restaurant</a></li>
			<li><a class="nav-link" href="view_review.php">Reviews</a></li>
			<li><a class="nav-link" href="view_enquiry.php">Enquiries</a></li>
		</ul>
		<span>
			<a class="nav-link float-right text-muted" href="logout.php">Logout</a>
		</span>
	</nav>	
	<div style="padding: 10px;">
 	<?php
 	$sqlView="select * from yum_menu where res_id='$id'";
 	$result=$conn->query($sqlView);
 	?>
 	<table class="table table-striped table-hover table-dark table-bordered" style="width: 25%;">
 	<tr>
 		<th>Food</th>
 		<th>Price</th>
 		<th>Action</th>
 	</tr>
 	<?php
 	while ($row=$result->fetch_assoc()) {
 	?>	
 	<tr>
 		<td><?php echo $row['food'];?></td>
 		<td><?php echo $row['price'];?></td>
 		<td>
 			<a href="del_menu.php?id=<?php echo $row['menu_id'];?>" onClick="return confirm_delete()"><button style="margin: 3px;" class="btn btn-danger btn-sm">Delete</button></a>
 		</td>
 	</tr>

 	<?php 
 		}
 	?>
 	</table>

 	<form name="form" class="form" onsubmit="return validateForm()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 		<div class="col-5"><label>Food Name: </label><input class="form-control" type="text" name="foodname"><span id="err-foodname"></span></div>
 		<div class="col-5"><label>Price: </label><input class="form-control" type="text" name="price"><span id="err-price"></span></div>
 		<div ><input type="hidden" name="res_id" value="<?php echo $id;?>"></div>
 		
 		<input style="margin-top: 5px;" class="btn btn-primary btn-sm" type="submit" name="submit">
 	</form>
 	</div>
 </body>
 </html>


