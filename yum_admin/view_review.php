<?php
	session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	include('../include/dbconnect.php');
	$sql="SELECT * FROM yum_comments";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reviews</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li><a class="nav-link" href="view_res.php">View Restaurant</a></li>
			<li><a class="nav-link" href="add_res.php">Add Restaurant</a></li>
			<li><a class="nav-link active" href="view_review.php">Reviews</a></li>
			<li><a class="nav-link" href="view_enquiry.php">Enquiries</a></li>
		</ul>
		<span>
			<a class="nav-link float-right text-muted" href="logout.php">Logout</a>
		</span>
	</nav>
	<div style="padding: 10px;">
	<?php
		$result=$conn->query($sql);
		if($result->num_rows<=0){
			echo "No reviews to display";
		}else{?>
			<table class="table table-striped table-hover table-dark table-bordered">
				<tr>
					<th>Comment Id</th>
					<th>Username</th>
					<th>User Email</th>
					<th>Comment</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php 
					while($rows=$result->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $rows['cmt_id'];?></td>
						<td><?php echo $rows['user_name'];?></td>
						<td><?php echo $rows['user_email'];?></td>
						<td><?php echo $rows['comment'];?></td>
						<td>
							<?php if($rows['status']==0){?>
								<p>Not Published</p>	
							<?php 
								}else{ 
							?>
							<p>Published</a></p>
       						<?php } ?>
						</td>
						<td>
						<p><a href="changestatus.php?id=<?php echo $rows['cmt_id'];?>"><button class="btn btn-success btn-sm">Edit</button></a></p>	
						</td>
					</tr>
				<?php 
					}
				?>
			</table></div>
	<?php	
		}
	?>
</body>
</html>