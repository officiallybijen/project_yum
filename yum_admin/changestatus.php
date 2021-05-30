<?php
	session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
	include('../include/dbconnect.php');
	$cmtid=$_REQUEST['id'];	
	$sql="SELECT * FROM yum_comments WHERE cmt_id='$cmtid'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Status</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<dir style="padding: 10px;">
    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    	<input type="text" name="id" value="<?php echo $cmtid;?>" hidden>
    	<p>Change the status of the review given by <u style="color: green;"><?php echo $row['user_name'];?></u> </p><select name="status">
    		 <?php    		   
            	if($row['status'] == 0){
                    echo '<option value="0" selected="selected">Unpublish</option>';
                    echo '<option value="1">Publish</option>';
            	}else{
                echo '<option value="0">Unpublish</option>';
                echo '<option value="1" selected="selected">Publish</option>';
           	 }
             ?>
    	</select>
    	<button class="btn btn-primary btn-sm" name="submit">Submit</button>
    </form>
    </dir>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
		$status=$_POST['status'];
		$sql="update yum_comments set status='$status' where cmt_id='$cmtid'";
		if($conn->query($sql)){
			header('location: view_review.php?msg=Status updated succesfully;');
		}else{
			echo "<script>alert('Problem faced while updating status');</script>";
		}
	}
?>