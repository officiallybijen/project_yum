<?php
	session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	include('../include/dbconnect.php');
	
	if(isset($_GET['msg'])){
	$msg=$_GET['msg'];
    if($msg !=''){
    echo "<script>alert('$msg');</script>";
    }}

	$sql="select * from yum_res";
	$result=$conn->query($sql);
	
?>
<html>
<head>
	<title>View Restaurant</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li><a class="nav-link active" href="view_res.php">View Restaurant</a></li>
			<li><a class="nav-link" href="add_res.php">Add Restaurant</a></li>
			<li><a class="nav-link" href="view_review.php">Reviews</a></li>
			<li><a class="nav-link" href="view_enquiry.php">Enquiries</a></li>
		</ul>
		<span>
			<a class="nav-link float-right text-muted" href="logout.php">Logout</a>
		</span>
	</nav>
	<?php 
		if($result->num_rows<=0) {
			echo "no record to display";
		}
		else{
	?>
	<div style="padding: 10px;">
	<table class="table table-striped table-hover table-dark table-bordered">
		<tr>
			<th>Name</th>
			<th>Owner</th>
			<th>Email</th>
			<th>City</th>
			<th>Details</th>
			<th>Action</th>
		</tr>
		<?php  
			while ($rows=$result->fetch_assoc()) {
		?>
		<tr>
			<td><?php echo $rows['res_name']; ?></td>
			<td><?php echo $rows['res_owner']; ?></td>
			<td><?php echo $rows['res_email']; ?></td>			
			<td><?php echo $rows['res_city']; ?></td>
			<td><?php echo $rows['res_desc']; ?></td>
			<td>
				<a href="edit_res.php?id=<?php echo $rows['res_id']; ?>"><button style="margin: 3px;" class="btn btn-success btn-sm" style="color: blue;">Edit</button></a>
				<a href="del_res.php?id=<?php echo $rows['res_id']; ?>" onClick="return confirm_delete()"><button style="margin: 3px;" class="btn btn-danger btn-sm">Delete</button></a> 
				<a href="add_menu.php?id=<?php echo $rows['res_id']; ?>"><button style="margin: 3px;" class="btn btn-primary btn-sm" style="color: blue;">Menu</button></a>
			</td>
		</tr>
		<?php
			}
		?>
		
	</table>
</div>
			
<?php }
?>			
</body>
</html>

<script language="javascript">
	function confirm_delete(){
		var $report=confirm("Are you sure you want to delete this record!!!");
		return $report;
}
</script>