<?php 
include_once('db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Form</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700" rel="stylesheet">
    <!---Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <!--Main stylesheet-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="form">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-attributes">
						<p>First Name:</p>
						<input type="text" name="first_name" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['first_name'])) {
								echo $error_msg['first_name'];
							} ?>
						</div>	
					</div>
					<div class="form-attributes">
						<p>Last Name:</p>
						<input type="text" name="last_name" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['last_name'])) {
								echo $error_msg['last_name'];
							} ?>
						</div>	
					</div>
					<div class="form-attributes">
						<p>Email:</p>
						<input type="email" name="email" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['email'])) {
								echo $error_msg['email'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Password:</p>
						<input type="password" name="password" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['password'])) {
								echo $error_msg['password'];
							} ?>
						</div>
					</div>

					<div class="form-attributes">
						<input type="submit" name="submit" class="submit_btn" value="Send" />
					</div>
				</form>
			</div>
		</div><!--/.col-md-12-->
	</div><!--/.row-->
</div><!--/.container-->


</body>
</html>

<?php 
if(isset($_POST['submit'])) {
	$first_name = $_POST['first_name'];
	if(empty($first_name)) {
		$error_msg['first_name'] = "First Name is Required";
	}
	else if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
		$error_msg['first_name'] = "Only letter is allowed";
	}

	$last_name = $_POST['last_name'];
	if(empty($last_name)) {
		$error_msg['last_name'] = "Last Name is Required";
	}
	else if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
		$error_msg['last_name'] = "Only letter is allowed";
	}

	$email = $_POST['email'];
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error_msg['email'] = "Email is Required";
	}

	$password = $_POST['password'];
	if(empty($password)) {
		$error_msg['password'] = "Password is Required";
	}

	$query = "INSERT INTO info(first_name,last_name,password,email) VALUES('$first_name','$last_name','$password','$email')";

	$run = mysqli_query($con,$query);

	if($run == TRUE) {
		echo "<script>alert('Data interted successfully')</script>";
	}

}

else {
	//header('location:login.php');
}


?>