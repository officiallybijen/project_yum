<?php
session_start();
	include('include/header.php');
	if(!isset($_SESSION['username'])){
		header('location: index.php');
	}
include("../include/dbconnect.php");
$id = $_REQUEST['id'];
if (empty($id)) {
    header("location:view_res.php");
}

$sql = "SELECT * FROM yum_res WHERE res_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($rs = $result->fetch_assoc()) {
        $name = $rs["res_name"];
        $status = $rs["res_status"];
        $email = $rs["res_email"];
        $city = $rs["res_city"];
        $desc=$rs["res_desc"];
        $old_pp = $rs["res_pp"];
        $old_cover = $rs["res_img"];
    }
}


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $desc=$_POST["desc"];

    
    $profile = $_FILES['photo_pp']['name'];
    if($profile==''){
        $profile=$old_pp;
    }
    $cover = $_FILES['photo_cover']['name'];
    if($cover==''){
        $cover=$old_cover;
    }

    move_uploaded_file($_FILES['photo_pp']['tmp_name'], '../image/'. $profile);
   
    move_uploaded_file($_FILES['photo_cover']['tmp_name'], '../image/'. $cover);
   





    $sql = "UPDATE yum_res SET res_name='$name',res_email='$email',res_city='$city',res_pp='$profile',res_img='$cover',res_desc='$desc' where res_id='$id'";

    if ($conn->query($sql) == TRUE) {
        echo "<script type= 'text/javascript'>alert('Record updated successfully');</script>";
        header('location:view_res.php');
    } else {
        echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}
?>


<html>

<head>
    <title>Edit</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <style type="text/css">
        span{
            color: red;
        }
        
    </style>
    <script type="text/javascript">
                function validateForm(){
                var error=0;
                var res_name=document.form.name.value;
                var email=document.form.email.value;
                var res_city=document.form.city.value;
                var res_about=document.form.desc.value;

                if(res_name.trim()==''){
                    document.getElementById('err-res_name').innerHTML="*Restaurant Name field can't be left empty";
                    error++;
                }else{
                if(res_name.length>20){
                    document.getElementById('err-res_name').innerHTML="*Length of restaurant name is too long.";
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
    <div style="padding: 10px;">
    <h5>Edit Restaurant</h5>
    <form class="form" name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="col-5">
                <label for="Name">Name: </label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"><span id="err-res_name"></span>
            </div>
            <div class="col-5">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>"><span id="err-email"></span>
            </div>
            <div class="col-5">
                <label>City:</label>
                <select class="form-select" name="city">
                    <?php
                         if($scity == 'Kathmandu'){
                               echo '<option value="Kathmandu" selected="selected">Kathmandu</option>';
                               echo '<option value="Pokhara">Pokhara</option>';
                               echo '<option value="Chitwan">Chitwan</option>';
                               echo '<option value="Dharan">Dharan</option>';
                        }elseif ($city=='Pokhara') {
                               echo '<option value="Kathmandu">Kathmandu</option>';
                               echo '<option value="Pokhara" selected="selected">Pokhara</option>';
                               echo '<option value="Chitwan">Chitwan</option>';
                               echo '<option value="Dharan">Dharan</option>';
                        }
                        elseif ($city=='Chitwan') {
                               echo '<option value="Kathmandu">Kathmandu</option>';
                               echo '<option value="Pokhara">Pokhara</option>';
                               echo '<option value="Chitwan" selected="selected">Chitwan</option>';
                               echo '<option value="Dharan">Dharan</option>';
                        }else{
                               echo '<option value="Kathmandu">Kathmandu</option>';
                               echo '<option value="Pokhara">Pokhara</option>';
                               echo '<option value="Chitwan">Chitwan</option>';
                               echo '<option value="Dharan" selected="selected">Dharan</option>';
                        }
                        ?>
                </select><span id="err-res_city"></span>
            </div>

            <div class="col-5">
                <label>Profile Image:</label>
                <input class="form-control" type="file" name="photo_pp"><br>
                 <?php
                    if($old_pp !=''){?>
                    <img src="<?php echo '../image/'.$old_pp;?>" width="100" height="100">
                <?php
                  }
                ?>      
            </div> 
            <div class="col-5">
                <label>Cover Image:</label>
                <input type="file" class="form-control" name="photo_cover"><br>
                <?php
                    if($old_cover !=''){?>
                    <img src="<?php echo '../image/'.$old_cover;?>" width="320" height="140">
                <?php
                  }
                ?>      
            </div> 

           	<div class="col-5">
                <label>Description:</label><br>
                <textarea class="form-control" name="desc" rows="15" cols="85"><?php echo $desc; ?></textarea><span id="err-res_about"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Submit">
                <input class="btn btn-success btn-sm" type="reset" name="reset" value="Reset">
            </div>
    </form>
</div>
</body>

</html>