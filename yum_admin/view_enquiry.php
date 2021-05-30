<?php
	session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
    include('../include/dbconnect.php');   	
?>

<html>
<head>
	<title>View Enquiry</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
			<li><a class="nav-link" href="add_res.php">Add Restaurant</a></li>
			<li><a class="nav-link" href="view_review.php">Reviews</a></li>
			<li><a class="nav-link active" href="view_enquiry.php">Enquiries</a></li>
		</ul>
		<span>
			<a class="nav-link float-right text-muted" href="logout.php">Logout</a>
		</span>
	</nav>
	<div style="padding: 10px;">
	<?php
	     
		 $sql="select * from yum_contact; ";
    	 $result=$conn->query($sql);
    	 if($result->num_rows<=0){
    		echo "no enquiries to display";
    		}else{	
	?>
	<table class="table table-striped table-hover table-dark table-bordered">
	<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Details</th>
		</tr>
<?php
	 while($rows = $result->fetch_assoc()){
	 ?>

	<tr>
		<td><?php echo $rows['con_name'];?></td>
		<td><?php echo $rows['con_email'];?></td>
		<td><?php echo $rows['subject'];?></td>
		<td><?php echo $rows['details'];?></td>
	</tr>
	

<?php
	}}
?>   </div> 	
</table>
</body>
</html>
