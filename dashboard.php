<?php
	session_start();
	$sessionusername = $_SESSION['name'];
	$mail = $_SESSION['email'];
	$page = "Dashboard";
	require("header.php");

	$query = "SELECT `name`, `emailid`, `AGE`, `GENDER`, `phone`, `ADDRESS` FROM `userdetails` WHERE `emailid` = '".$mail."';";	
	$result = mysqli_query($dbc, $query);

	if(mysqli_num_rows($result)>0){
		$row = $result->fetch_assoc();
		$name = $row['name'];
		$emailid = $row['emailid'];
		$AGE = $row['AGE'];
		$GENDER = $row['GENDER'];
		$phone = $row['phone'];
		$ADDRESS = $row['ADDRESS'];
	}
	else{
		echo "<script type='text/javascript'>alert('Entry not present. Update your profile!!!');</script>";
		echo '<script>window.location="./profile.php";</script>';
	}
   
	
?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->

	<div class="card h-100">
<div class="card-body">
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<h6 class="mb-2 text-primary">Personal Details</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12"><br>
<div class="form-group">
<label for="fullName">Full Name</label>
<input type="text" class="form-control" name="FullName" placeholder="Enter full name" autocomplete="off" disabled value="<?php echo $name; ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12"><br>
<div class="form-group">
<label for="eMail">Email</label>
<input type="email" class="form-control" id="eMail" placeholder="Enter email ID" autocomplete="off" disabled value="<?php echo $emailid; ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="phone">Phone</label>
<input type="text" class="form-control" name="Phone" id="phone" placeholder="Enter phone number" autocomplete="off" disabled value="<?php echo $phone; ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="phone">Age</label>
<input type="text" class="form-control" name="Age" id="Age" placeholder="Enter phone age" autocomplete="off" disabled value="<?php echo $AGE; ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="website">Gender</label>
<input type="text" class="form-control" name="Gender" id="Gender" placeholder="Enter a Gender" disabled value="<?php echo $GENDER; ?>">
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
<div class="form-group">
<label for="phone">Address</label>
<input type="text" class="form-control" name="Address" id="Address" placeholder="Enter  address" disabled value="<?php echo $ADDRESS; ?>">
</div>
</div>
</div>

</div>
</div>
	<!--your content here -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<?php include("footer.php");?>