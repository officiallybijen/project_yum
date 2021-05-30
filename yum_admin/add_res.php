<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	include('../include/dbconnect.php');
?>
<html>
<head>
	<title>Add New Restaurant</title>	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script type="text/javascript">
		function validateForm(){
		var error=0;
		var res_name=document.form.res_name.value;
		var res_owner=document.form.res_owner.value;
		var email=document.form.res_email.value;
		var res_city=document.form.res_city.value;
		var res_about=document.form.res_about.value;

		if(res_name.trim()==''){
			document.getElementById('err-res_name').innerHTML="*Restaurant Name field can't be left empty";
			error++;
		}else{
		if(res_name.length>20){
			document.getElementById('err-res_name').innerHTML="*Length of restaurant name is too long.";
			error++;
		}
	}
		if(res_owner.trim()==''){
			document.getElementById('err-res_owner').innerHTML="*Owner Name field can't be left empty";
			error++;
		}else{
		if(res_owner.length>20){
			document.getElementById('err-res_owner').innerHTML="*Length of owner name is too long.";
			error++;
		}
	}

	if(email.trim()==''){
		document.getElementById('err-email').innerHTML="*Email field can't be left empty";
		error++;
	}
	if(res_city==''){
		document.getElementById('err-res_city').innerHTML="*Please select at least one city";
		error++;
	}

	if(res_about.trim()==''){
		document.getElementById('err-res_about').innerHTML="*About restaurant field can't be left empty";
		error++;
	}else{
		if(res_about.length<200 || res_about.length>3000){
			document.getElementById('err-res_about').innerHTML="*Length of about restaurant must be between 200 and 3000.";
			error++;
		}
	}
	if(error>0){
		return false;
	}
}

	</script>
	<style type="text/css">
		span{
			color: red;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
			<li><a class="nav-link active" href="add_res.php">Add Restaurant</a></li>
			<li><a class="nav-link" href="view_review.php">Reviews</a></li>
			<li><a class="nav-link" href="view_enquiry.php">Enquiries</a></li>
		</ul>
		<span>
			<a class="nav-link float-right text-muted" href="logout.php">Logout</a>
		</span>
	</nav>
	<div style="padding: 10px;"> 
	<h5>Add Restaurant</h5>
	<form name="form" class="form" onsubmit="return validateForm()" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
		<div class="col-5"><label>Restaurant Name:</label><input class="form-control" type="text" name="res_name"><span id="err-res_name"></span></div>
		<div class="col-5"><label>Owner Name:</label><input class="form-control" type="text" name="res_owner"><span id="err-res_owner"></span></div>
		<div class="col-5"><label>Location:</label> 
		<select class="form-select" name="res_city">
			<option value="">Please select any one option</option>
			<option value="Kathmandu">Kathmandu</option>
			<option value="Pokhara">Pokhara</option>
			<option value="Chitwan">Chitwan</option>
			<option value="Dharan">Dharan</option>
		</select><span id="err-res_city"></span></div>
		<div class="col-5"><label>Email:</label><input class="form-control" type="email" name="res_email"><span id="err-email"></span></div>
		<div class="col-5"><label>Profile Image:</label><input class="form-control" type="file" name="res_pp">

		<label>Cover Image:</label><input class="form-control" type="file" name="res_cover"></div>
		<div class="col-5">
				<label>About Restaurant:</label><textarea class="form-control" rows="15" cols="100" name="res_about"></textarea><span id="err-res_about"></span>
		</div>		
		<button class="btn btn-primary btn-sm" name="submit">Submit</button>
		<button class="btn btn-success btn-sm" type="reset">Reset</button>
	</form>
	</div>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
			$name=$_POST['res_name'];
			$owner=$_POST['res_owner'];
			$city=$_POST['res_city'];
			$email=$_POST['res_email'];
			$about=$_POST['res_about'];

			$profile=$_FILES['res_pp']['name'];



			$cover=$_FILES['res_cover']['name'];

			move_uploaded_file($_FILES['res_pp']['tmp_name'], '../image/' . $profile);
			move_uploaded_file($_FILES['res_cover']['tmp_name'], '../image/' . $cover);

        	$sql="insert into yum_res(res_name,res_owner,res_city,res_email,res_desc,res_pp,res_img) values ('$name','$owner','$city','$email','$about','$profile','$cover')";
        	if($conn->query($sql)){
        		header("location:view_res.php?msg=New restaurant added sucessfully!!!");
        	}
        	else{
        		header("location:view_res.php?msg=New restaurant added sucessfully!!!");
        	}
        }	

?>
