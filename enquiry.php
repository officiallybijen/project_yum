<?php
	include('include/dbconnect.php');
	include('include/header.php');
	if(isset($_POST['btn-search'])){
			$name=$_POST['search'];
			header("location:view_res.php?s_item=$name");
		}
?>
<html>
<head>
	<title>Contact Us</title>
	<style type="text/css">
		span{
			color: red;
		}
	</style>
	</style>
	<script type="text/javascript">
		function validateForm(){
		var error=0;
		var name=document.form.name.value;
		var email=document.form.email.value;
		var subject=document.form.subject.value;
		var details=document.form.details.value;

		if(name.trim()==''){
			document.getElementById('err-name').innerHTML="*Name field can't be left empty";
			error++;
		}else{
		if(name.length>20){
			document.getElementById('err-name').innerHTML="*Length of your name is too long.";
			error++;
		}
	}

	if(email.trim()==''){
		document.getElementById('err-email').innerHTML="*Email field can't be left empty";
		error++;
	}
	if(subject==''){
		document.getElementById('err-subject').innerHTML="*Please select at least one subject";
		error++;
	}

	if(details.trim()==''){
		document.getElementById('err-details').innerHTML="*Details field can't be left empty";
		error++;
	}else{
		if(details.length<10 || details.length>500){
			document.getElementById('err-details').innerHTML="*Length of the details must be between 10 and 500.";
			error++;
		}
	}


	if(error>0){
		return false;
	}
}

	</script>

</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li><a class="nav-link" href="index.php">Home</a></li>
				<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
				<li><a class="nav-link active" href="enquiry.php">Contact Us</a></li>
				<li><a class="nav-link" href="aboutus.php">About</a></li>	
			</ul>
			<span>
				<form class="d-flex" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
				<input class="form-control-sm me-2" type="search" name="search" placeholder="Search by food,city,restaurant"><button class="btn-sm btn-danger" name="btn-search">Search</button>
				</form>
			</span>		
	</nav>
	<div style="margin: auto;">
		<p style="font-size: 30px;padding: 20px;">Contact Us</p>
		<p style="padding-left: 20px;">* Please fill the form with the correct information</p>
	</div>
	<form name="form" class="form" method="post" onsubmit="return validateForm()" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
		<div class="col-10"><label>Name: </label><input class="form-control" type="text" name="name"><span id="err-name"></span></div>
		<div class="col-10"><label>Email: </label><input class="form-control" type="email" name="email"><span id="err-email"></span></div>
		<div class="col-3">
			<label>Subject: </label> 
			<select name="subject" class="form-control">
			<option value="">Please select one of the option below</option>
			<option value="Suggestions">Suggestions</option>
			<option value="Bugs">Bugs</option>	
			<option value="Add New">Add New Restaurant</option>
			<option value="Change">Change something in restaurant information</option>
			<option value="Other">Other</option>
			</select><span id="err-subject"></span></div>
		<div class="col-10"><label>Details: </label><textarea class="form-control" cols="100" rows="15" name="details"></textarea><span id="err-details"></span></div>
		<input type="reset" name="reset" class="link-button">  <input type="submit" name="submit" class="link-button">
	</form>	
</body>
</html>

<?php
	if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$subject=$_POST['subject'];
			$details=$_POST['details'];
			$sql="insert into yum_contact(con_name,con_email,subject,details) values('$name','$email','$subject','$details')";
			
			if($conn->query($sql)){
				echo "<script>alert('Your quiry has been submitted. Thank You!!!');</script>";
			}
			else{
				echo "<script>alert('There was a problem while submitting your query. Please try again later. Sorry for inconvenience.');</script>";
			}

	}
include('include/footer.php');
?>


