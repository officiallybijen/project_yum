<?php 
	include('include/header.php');
	if(isset($_POST['btn-search'])){
			$name=$_POST['search'];
			header("location:view_res.php?s_item=$name");
		}

?>
<html>
<head>
	<title>About Us</title>
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li><a class="nav-link" href="index.php">Home</a></li>
				<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
				<li><a class="nav-link" href="enquiry.php">Contact Us</a></li>
				<li><a class="nav-link active" href="aboutus.php">About</a></li>	
			</ul>
			<span>
				<form class="d-flex" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
				<input class="form-control-sm me-2" type="search" name="search" placeholder="Search by food,city,restaurant"><button class="btn-sm btn-danger" name="btn-search">Search</button>
				</form>
			</span>		
	</nav>
	<div style="padding: 10px;">
		<p style="font-size: 30px;padding: 10px;border-bottom: 2px solid black;text-align: center;">About</p>
		<p style="padding-top: 20px;text-align: center;">Yummandu started as the project for the college. Yummandu is site where you can view different restaurant. You may view reviews of the restaurant and also if you want you may give your own reviews. You can also view different menu available for the restaurant and their prices.<br>
		My name is Bijen, responsible for the development of this site. 
 		</p>
	</div>
<?php include('include/footer.php');?>
</body>
</html>


