<?php
	include('include/dbconnect.php');
	include('include/header.php');
	$result = $conn->query("select * from yum_res");
?>

<html>
<head>
	<title>View Restaurant List</title>   
	<link rel="stylesheet" type="text/css" href="style.cs">
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li><a class="nav-link" href="index.php">Home</a></li>
				<li><a class="nav-link active" href="view_res.php">View Restaurant</a></li>
				<li><a class="nav-link" href="enquiry.php">Contact Us</a></li>
				<li><a class="nav-link" href="aboutus.php">About</a></li>	
			</ul>
			<span>
				<form class="d-flex" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
				<input class="form-control-sm me-2" type="search" name="search" placeholder="Search by food,city,restaurant"><button class="btn-sm btn-danger" name="btn-search">Search</button>
				</form>
			</span>		
	</nav>
	<div style="margin: auto;width: 1348px;">	
	<?php  
		if (isset($_REQUEST['s_item'])) {
				$name=$_REQUEST['s_item'];

			}
		if(isset($_POST['btn-search'])){
			$name=$_POST['search'];

		}


		if (isset($name)) {
			$sql="select * from yum_res left join yum_menu on yum_res.res_id=yum_menu.res_id where res_name like '%$name%' OR res_city like '%$name%' OR res_desc like '%$name%' OR food like '%$name%'";
		}
			
		
		else{
		$sql="select * from yum_res";	
		}
		$result = $conn->query($sql);
		if ($result->num_rows<=0) {
			echo "No Match Found";
		}
		while ($rows = $result->fetch_assoc()) { 
			$id=$rows['res_id'];	
			$res_pp=$rows['res_pp'];
			if (empty($res_pp)) {
			$res_pp='noimg.png';
			}
			$res_name=$rows['res_name'];
			$res_city=$rows['res_city'];
			?>
		<div class="pp-block">
		<a href="res_details.php?id=<?php echo $id; ?>"><img src="<?php echo 'image/'.$res_pp; ?>" alt="profile picture" height="200px" width="250px" ></a>	
		<div style="padding: 15;"><p><a style="font-size: 20px;text-decoration: none; color: black;" href="res_details.php?id=<?php echo $rows['res_id']; ?>"><?php echo $res_name; ?></a></p>
		<p><?php echo $res_city;?></p></div>		
		</div>
	<?php
		}
	?></div>
	 <div class="clr"></div>
	 <?php include('include/footer.php');?>

</body>	
</html>
