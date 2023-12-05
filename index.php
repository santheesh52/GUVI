<?php
    session_start();
	require("dbconfig.php");

	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
    	$query1="SELECT * FROM `userdetails` WHERE  `emailid`='".$email."'";
    	$result1=mysqli_query($dbc,$query1);
    	if(mysqli_num_rows($result1)>0)
    	{
			$row = $result1->fetch_assoc();
			if($_POST['password'] == $row['password']){
                $_SESSION['name'] = $row['name']; 
                $_SESSION['email'] = $email;               
				header('location:dashboard.php');
			}
			else
			{
				echo "<script type='text/javascript'>alert('Given Credentials are incorrect. Please try again');</script>";
			}
		}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login page</title>  

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="banner"><video src="video/back.mp4" autoplay loop muted ></video></div>
    <div class="con">
        <div class="center">
            <h1 class="h4  mb-4"><b>Login Page</b></h1>
        </div>
        <div class="move">
            <form class="user" action="#" method="POST">
            <div class="inputGroup inputGroup1">
            <input type="text" class="form-control form-control-user" id="email" name="email" autocomplete="off" onblur="validateEmail(this)"; placeholder="Enter mail id" required >  
            </div><br>
            <div class="inputGroup inputGroup2">
      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required></div><br>
            <button type="submit"  name="submit" id="submit" class="btn btn-primary btn-user btn-block" >Login</button>
            </form>
            <div class="centers">
            <a class="small" href="register.php">Click here to register</a>
        </div>
        <div class="size" id="msg"></div>
    </div>	
    </div>		
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>						 
<script>
	function validateEmail(obj)
		{
		var email = obj.value;
		if(email != ''){
		$.ajax({

		url:'ajax.php',

		type:'POST',

		data:'email='+email,

		success:function(data){
		//alert(data);
		var out=data.split(",")
		
		if(out[0] == 'success'){
		
		$('#msg').html(out[1]);

		$('#submit').attr('disabled',true);

		}else{
			$('#msg').html('');
			$('#submit').attr('disabled',false);

		}

		}

		});
		}
		}

	</script>


</body>



</html>