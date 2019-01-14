<?php 

if(isset($_POST['submit'])) {
	$first_name = $_POST['first_name'];
	if(empty($first_name)) {
		$error_msg['first_name'] = "First Name is Required";
	}

	$last_name = $_POST['last_name'];
	if(empty($last_name)) {
		$error_msg['last_name'] = "Last Name is Required";
	}
	$email = $_POST['email'];
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error_msg['email'] = "Email is Required";
	}

	$password = $_POST['password'];
	if(empty($password)) {
		$error_msg['password'] = "Password is Required";
	}

	$mobile_no = $_POST['mobile_no'];
	if(empty($mobile_no)) {
		$error_msg['mobile_no'] = "Mobile Number is Required";
	}

	$dob = $_POST['dob'];
	if(empty($dob)) {
		$error_msg['dob'] = "Date of birth is Required";
	}

	$url = $_POST['website_url'];
	if(!filter_var($url,FILTER_VALIDATE_URL)) {
		$error_msg['website_url'] = "URL is Required";
	}

	$select = $_POST['select_one'];
	if($select == "") {
		$error_msg['select_one'] = "Option Must be selected";
	}

	$comment = $_POST['comment'];
	if(empty($comment)) {
		$error_msg['comment'] = "Comment must be needed";
	}

	$img = $_FILES['img']['name'];
	$img_tmp = $_FILES['img']['tmp_name'];
}

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
							<?php if(isset($_POST['first_name'])) {
								echo $error_msg['first_name'];
							} ?>
						</div>	
					</div>
					<div class="form-attributes">
						<p>Last Name:</p>
						<input type="text" name="last_name" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($_POST['last_name'])) {
								echo $error_msg['last_name'];
							} ?>
						</div>	
					</div>
					<div class="form-attributes">
						<p>Email:</p>
						<input type="email" name="email" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($_POST['email'])) {
								echo $error_msg['email'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Password:</p>
						<input type="password" name="password" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($_POST['password'])) {
								echo $error_msg['password'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Mobile No:</p>
						<input type="text" name="mobile_no" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($_POST['mobile_no'])) {
								echo $error_msg['mobile_no'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Date Of Birth:</p>
						<input  type="text" name="dob" id="datepicker" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($_POST['dob'])) {
								echo $error_msg['dob'];
							} ?>
						</div>
					</div>

					<div class="form-attributes">
						<p>Website:</p>
						<input type="url" name="website_url" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($_POST['website_url'])) {
								echo $error_msg['website_url'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Gender:</p>
						<span>Male:</span> <input type="radio" name="gender" value="male" />
						<span>Female:</span> <input type="radio" name="gender" value="female" />
					</div>
					<div class="form-attributes">
						<select name="select_one">
							<option value="">Please Select</option>
							<option value="Option 1">Option 1</option>
							<option value="Option 2">Option 2</option>
							<option value="Option 3">Option 3</option>
						</select>

						<div class="error_msg">
							<?php if(isset($_POST['select_one'])) {
								echo $error_msg['select_one'];
							} ?>
						</div>
					</div>

					<div class="form-attributes">
						<p>Select:</p>
						<span>Red:</span> <input type="checkbox" name="checkbox_1" value="" />
						<span>Blue:</span> <input type="checkbox" name="checkbox_2" value="" />
						<span>Green:</span> <input type="checkbox" name="checkbox_3" value="" />
						<span>Yellow:</span> <input type="checkbox" name="checkbox_4" value="" />
					</div>

					<div class="form-attributes">
						<p>File/Image Upload:</p>
						<input type="file" name="img" value="" />
					</div>

					<div class="form-attributes">
						<p>Comment:</p>
						<textarea rows="5" cols="40" name="comment" placeholder="" /></textarea>
						<div class="error_msg">
							<?php if(isset($_POST['comment'])) {
								echo $error_msg['comment'];
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--  Flatpickr  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

<script src="main.js"></script>

</body>
</html>