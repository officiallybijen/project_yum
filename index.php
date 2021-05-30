<?php include("include/dbconnect.php");
	  include('include/header.php');
	  $result = $conn->query("select * from yum_res order by res_id desc limit 3");	    
		if(isset($_POST['btn-search'])){
			$name=$_POST['search'];
			header("location:view_res.php?s_item=$name");
		}
		?>
<html>
<head>
	<title>Yummandu</title>
	<style type="text/css">
		.heading{
			font-size: 25px;
			font-family: cursive;
			padding: 20px;
		}
	</style>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li><a class="nav-link active" href="index.php">Home</a></li>
				<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
				<li><a class="nav-link" href="enquiry.php">Contact Us</a></li>
				<li><a class="nav-link" href="aboutus.php">About</a></li>	
			</ul>
			<span>
				<form class="d-flex" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
				<input class="form-control-sm me-2" type="search" name="search" placeholder="Search by food,city,restaurant"><button class="btn-sm btn-danger" name="btn-search">Search</button>
				</form>
			</span>		
	</nav>
	<section id="showcase" style="background: url('image/banner1.jpg');
	height: 400px;
	width: 1349px;
	background-position: right center;
	position: relative;
	margin:auto;
	overflow: hidden;">
	
	</section>
	<div class="container" style="width: 1348px;margin: 	auto;">
		
	<div id="main">
		<p class="heading" style="font-size: 30px;padding-bottom: 20px; border-bottom: 1px solid;">Welcome To Yummandu</p>
		
	</div>
	<div style="padding: 20px;">
	<p class="heading">Recently Added Restaurants</p>
	<?php  
		while ($rows = $result->fetch_assoc()) { 
			$res_pp=$rows['res_pp'];
			if (empty($res_pp)) {
			$res_pp='noimg.png';
			}
			$res_name=$rows['res_name'];
			$res_city=$rows['res_city'];
			?>
		<center><div class="pp-block">
		<a href="res_details.php?id=<?php echo $rows['res_id']; ?>"><img src="<?php echo 'image/'.$res_pp; ?>" alt="profile picture" height="200px" width="250px" ></a>	
		<div style="padding: 15px;">
		<p><a style="font-size: 20px;text-decoration: none; color: black;" href="res_details.php?id=<?php echo $rows['res_id']; ?>"><?php echo $res_name; ?></a></p>
		<p><?php echo $res_city;?></p>		
		</div>

		</div></center>
	<?php
		}
	?></div>
	
	<div class="clr"></div>
	<div style="padding: 20px;">
	<p class="heading">Top Rated Restaurant</p>
	<?php  
		$result = $conn->query("select * from yum_res order by rating_total/rating_count desc limit 3");
		while ($rows = $result->fetch_assoc()) { 
			if ($rows['rating_count']!=0){
			$res_pp=$rows['res_pp'];
			if (empty($res_pp)) {
			$res_pp='noimg.png';
			}
			$res_name=$rows['res_name'];
			$res_city=$rows['res_city'];
			?>
		<div class="pp-block" style="">
		<center><a href="res_details.php?id=<?php echo $rows['res_id']; ?>"><img class="fade-in" src="<?php echo 'image/'.$res_pp; ?>" alt="profile picture" height="200px" width="250px" ></a>	
		
		<div style="padding: 15px;">
		<p><a style="font-size: 20px;text-decoration: none; color: black;" href="res_details.php?id=<?php echo $rows['res_id']; ?>"><?php echo $res_name; ?></a></p>
		<p><?php echo $res_city;?></p>		
		</div></div></center>
	<?php
		}}
	?></div>



	<div class="clr"></div>
	</div>
	<div style="background:url('image/aboutus.jpg'); background-repeat: no-repeat; background-position: center bottom;width: 100%;margin: auto;font-size: 20px; padding-top: 20px; height: 500px; position: relative;" >
			<p style="font-size: 30px;padding-bottom: 20px;padding-left: 2%;"><a style="text-decoration: none; color: white;" href="aboutus.php">About Yummandu</a></p>
		
		<p style="position: absolute; top: 60px; left: 30px; color: white; width: 45%; line-height: 2.3em; font-size: 20px;  ">
			Yummandu started as the project for the college. Yummandu is site where you can view different restaurant. You may view reviews of the restaurant and also if you want you may give your own reviews. You can also view different . . . . <a class="link-button" href="aboutus.php">Read More</a>
	</div>
		<div class="clr"></div>
		<?php include('include/footer.php');?>
</body>
</html>