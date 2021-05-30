<?php
	include('include/dbconnect.php');
	include('include/header.php');
	$id = $_REQUEST['id'];
	$result = $conn->query("SELECT * FROM yum_res WHERE res_id = '$id'");
	$rows = $result->fetch_assoc();
	$res_img=$rows['res_img'];
	if (empty($res_img)) {
		$res_img='noimgblack.jpg';
	}
	$res_pp=$rows['res_pp'];
	if (empty($res_pp)) {
		$res_pp='noimg.png';
	}
	if(isset($_POST['btn-search'])){
			$name=$_POST['search'];
			header("location:view_res.php?s_item=$name");
		}
?>
<html>
<head>
    <title>Restaurant Details</title>
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#1').click(function(){
    			document.getElementById('rating-msg').innerHTML='⭐I hate it';
    		});
    		$('#2').click(function(){
    			document.getElementById('rating-msg').innerHTML='⭐⭐Bad';
    		});
    		$('#3').click(function(){
    			document.getElementById('rating-msg').innerHTML='⭐⭐⭐Average';
    		});
    		$('#4').click(function(){
    			document.getElementById('rating-msg').innerHTML='⭐⭐⭐⭐Good';
    		});
    		$('#5').click(function(){
    			document.getElementById('rating-msg').innerHTML='⭐⭐⭐⭐⭐I love it';
    		});

    	});

    	function validateForm(){
		var error=0;
		var name=document.form.name.value;
		var email=document.form.email.value;
		var rating=document.form.rating.value;
		var review=document.form.review.value;


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

	if (rating=='') {
	document.getElementById('err-rating').innerHTML="* At least one rating must be selected";
	error++;
	}
	
	if(review.trim()==''){
		document.getElementById('err-review').innerHTML="*Review field can't be left empty";
		error++;
	}else{
		if(review.length<10 || review.length>500){
			document.getElementById('err-review').innerHTML="*The length of the review must be between 10 and 500.";
			error++;
		}
	}
	if(error>0){
		return false;
	}
}

			$(document).ready(function(){
    		$('#about-link').attr('style','color:tomato;');
    		$('#menu,#review,.reviews').hide();
    		$('#about-link').click(function(){
    			$('#about-link').attr('style','color:tomato;');
    			$('#menu-link,#review-link,#reviews-link').attr('style','color:black;');
    			$('#about').show();
    			$('#menu,#review,.reviews').hide();
    		});
    		$('#menu-link').click(function(){
    			$('#menu-link').attr('style','color:tomato;');
    			$('#about-link,#review-link,#reviews-link').attr('style','color:black;');
    			$('#menu').show();
    			$('#about,#review,.reviews').hide();
    		});
    		$('#review-link').click(function(){
    			$('#review-link').attr('style','color:tomato;');
    			$('#about-link,#menu-link,#reviews-link').attr('style','color:black;');
    			$('#review').show();
    			$('#about,#menu,.reviews').hide();
    		});
    		$('#reviews-link').click(function(){
    			$('#reviews-link').attr('style','color:tomato;');
    			$('#about-link,#menu-link,#review-link').attr('style','color:black;');
    			$('.reviews').show();
    			$('#about,#menu,#review').hide();
    		});
    	});    
    </script>
    <style type="text/css">
    	#res-nav{
    		margin-left: 30%;
    		margin: auto;
    	}
    	#res-nav ul{
    		list-style: none;

    	}
    	#res-nav li{
    		float: left;
    		padding: 20px;
    	}
    	#res-nav a{
    		cursor: pointer;
    		font-family: cursive;
    		font-size: 20px;
    	}
    	#res-nav a:hover{
    		color: tomato;
    	}	
    	span{
    		color: red;
    	}
    </style>
</head>
<body>
	<div style="height: auto;">
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li><a class="nav-link" href="index.php">Home</a></li>
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
	<div style="background-color: black; position: relative;">
	<div class="cover-img" style="height:375px; opacity:0.7;background-position: center center;background: url('<?php echo 'image/' . $res_img; ?>'); "></div>
		
		<div class="pp-img" style="position: absolute; bottom: 10%; left: 3%;">
			<img src="<?php echo 'image/' . $res_pp; ?>" height="150px" width="150px">
			<span style="color: white; float: right; font-size: 30px; letter-spacing: 4px;"><?php echo $rows['res_name']; ?><br> 
			<?php echo $rows['res_city']; ?></span>
			<div class="clr"></div>
		</div>
	</div>

<!-- Nav bar for res details -->
	<div id="res-nav"><ul>
		<li><a id="about-link">About</a></li>
		<li><a id="menu-link">Menu</a></li>
		<li><a id="reviews-link">Reviews</a></li>
		<li><a id="review-link">Give Review</a></li>
	</ul></div><div class="clr" style="padding-bottom: 10px;border-top:2px solid black;"></div>



	<div style="padding: 30px;">
		<div class="res_details">		
			
			<div id="about">
			<h3>About</h3>
			<p><?php echo $rows['res_desc']; ?></p>
			</div>
	</div>
			<div id="menu">
			<h3>Menu</h3>
		<table class="table table-striped table-hover table-dark table-bordered" style="width: 25%;">
				<tr>
					<th>Food</th>
					<th>Price(Rs)</th>
				</tr>
			<?php 
			$result = $conn->query("SELECT * FROM yum_menu WHERE res_id = '$id'");
			while($rows = $result->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $rows['food']; ?></td>
				<td><?php echo $rows['price']; ?></td>
			</tr>			
			<?php
			}
			?>
		</table>
		<p>*Above mentioned price and the food items may change later.</p>
		</div>



		</div>	
	</div>


	<div id="review" class="res_details" style="background-color: #b8cef2;padding: 30px;">
	<h3>Give a review:</h3>
	<p style="font-size: 12px; font: cursive;">Please be respectful with your comments. Otherwise your review won't be published. Thank you!!!</p>
	<form name="form" class="form" onsubmit="return validateForm()" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<!-- do styling for review section  -->
		<label for="name">Name:</label>
		<input type="text" name="name"><span id="err-name"></span>
		<label for="email">Email:</label>
		<input type="email" name="email"><span id="err-email"></span>
		

		<label for="rating">Rating:</label>
		<input type="radio" name="rating" id="1" value="1">1
  		<input type="radio" name="rating" id="2" value="2">2
  		<input type="radio" name="rating" id="3" value="3">3
  		<input type="radio" name="rating" id="4" value="4">4
  		<input type="radio" name="rating" id="5" value="5">5  <span id="err-rating"></span><br><span style="font-size: 20px;padding: 5px;padding-left:0;width: 20%;color: #7b0f94;" id="rating-msg"></span>  		
  			
  	
		<label for="review">Review:</label>
		<textarea rows="10" cols="55" name="review"></textarea><span id="err-review"></span><br>
		<input class="link-button" type="submit" name="submit">
		<input class="link-button" type="reset" name="reset">
	</form>
   </div>

   
   		<?php 
   			$sql="SELECT user_name,comment,status,rating FROM yum_comments where res_id = '$id' and status = 1";
   			$result=$conn->query($sql);
   			if($result->num_rows<=0){
   			?>
   			<div class="reviews" class="res_details" style="margin-bottom: 50px;padding: 10px;">
   				<p>No comment to display</p>
   			</div>
   			<?php
   			}else{?>
   				
   			<div class="reviews" style="margin-bottom: 50px;padding: 30px;margin-top: 0;padding-top: 0;">
   				<h3>Reviews:</h3>
   				<?php
   				while ($rows=$result->fetch_assoc()) {
   					if(!$rows['status']==0){
   					?>
   	
   					
   					<div style="margin: 10px;margin-bottom: 3px;border-right: 6px solid red;background-color: #b8cef2;">
   						<p style="font-family: cursive;"><b><?php echo $rows['user_name'];?></b></p>
   						<?php 
   						switch ($rows['rating']) {
   							case 1:
   								echo "⭐";
   								break;
   							case 2:
   								echo "⭐⭐";
   								break;
   							case 3:
   								echo "⭐⭐⭐";
   								break;
   							case 4:
   								echo "⭐⭐⭐⭐";
   								break;
   							case 5:
   								echo "⭐⭐⭐⭐⭐";
   								break;			
   							default:
   								echo "how we here";
   								break;
   						}

   						?><br>	
   						<p style="font-family: cursive;"><?php echo $rows['comment'];?></p>
   					</div>
   				<?php 
   				}
   			}
   			}
   		?></div>
  

	<!-- php code for sending the comment data to db -->
	<?php
		
		


		if (isset($_POST['submit'])) {
			$id=$_GET['id'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$rating=$_POST['rating'];
			$cmt=$_POST['review'];
			

			$sqlRate="SELECT rating_total,rating_count FROM yum_res WHERE res_id='$id'";
			$result=$conn->query($sqlRate);
			while ($rows=$result->fetch_assoc()) {
				$total=$rows['rating_total'];
				$count=$rows['rating_count'];		
			}




			$sqlDup="SELECT res_id,user_email FROM yum_comments WHERE res_id='$id' AND user_email='$email'";
			$result=$conn->query($sqlDup);

			if($result->num_rows>0){
				echo "<script>alert('Comment has already been submitted using this email for this restaurant.');</script>";
			}
			else{
				$sql="INSERT INTO yum_comments(res_id,user_name,user_email,comment,rating) VALUES ('$id','$name','$email','$cmt','$rating')";
				$new_total=$total+$rating;
				$new_count=$count+1;

				$sql4="update yum_res set rating_total='$new_total',rating_count='$new_count' where res_id='$id'";
				if($conn->query($sql) && $conn->query($sql4)){
				echo "<script>alert('Your comment has been submitted.May take few days before it appears in the page. Thank You!');</script>";

				

			}	
			}
		}

	?>
</div>	
	<div class="clr"></div>
    <?php include('include/footer.php'); ?>

</body>
</html>
