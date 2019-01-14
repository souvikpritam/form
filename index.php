<?php 
$gender = "";
$checkbox = "";
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

	else if (strlen($password) <= 8) {
		$error_msg['password'] = "Password must be atleast 8 digits";
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
	if($select == "NULL") {
		$error_msg['select_one'] = "Option Must be selected";
	}

	$gender = $_POST['gender'];
	if(empty($gender)) {
		$error_msg['gender'] = "Gender is Required";
	}

	$gender = $_POST['checkbox'];
	if(empty($checkbox)) {
		$error_msg['checkbox'] = "Checkbox is Required";
	}

	$comment = $_POST['comment'];
	if(empty($comment)) {
		$error_msg['comment'] = "Comment must be needed";
	}

	$img = $_FILES['img']['name'];
	$img_tmp = $_FILES['img']['tmp_name'];
	$img_type = $_FILES['img']['type'];
	$img_size = $_FILES['img']['size'];
	if($img) {
		if(($img_size <= 1024*1024) && (($img_type == "image/png") || ($img_type == "image/jpeg"))) {
			move_uploaded_file($img_tmp, "uploads/".$img);
		}
		else {
			$error_msg['img'] = "Please upload image png format and max 1MB";
		}
	}

	else {
		$error_msg['img'] = "File is required";
	}
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
						<p>Mobile No:</p>
						<input type="text" name="mobile_no" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['mobile_no'])) {
								echo $error_msg['mobile_no'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Date Of Birth:</p>
						<input  type="text" name="dob" id="datepicker" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['dob'])) {
								echo $error_msg['dob'];
							} ?>
						</div>
					</div>

					<div class="form-attributes">
						<p>Website:</p>
						<input type="url" name="website_url" value="" placeholder="" />
						<div class="error_msg">
							<?php if(isset($error_msg['website_url'])) {
								echo $error_msg['website_url'];
							} ?>
						</div>
					</div>
					<div class="form-attributes">
						<p>Gender:</p>
						<span>Male:</span> <input type="radio" name="gender" value="male" <?php if(isset($gender) && ($gender == "male")) echo "checked";?> />
						<span>Female:</span> <input type="radio" name="gender" value="female" <?php if(isset($gender) && ($gender == "female")) echo "checked";?> />
						<div class="error_msg">
							<?php if(isset($error_msg['gender'])) {
								echo $error_msg['gender'];
							} ?>
						</div>

					</div>
					<div class="form-attributes">
						<select name="select_one">
							<option value="NULL">Please Select</option>
							<option value="Option 1">Option 1</option>
							<option value="Option 2">Option 2</option>
							<option value="Option 3">Option 3</option>
						</select>

						<div class="error_msg">
							<?php if(isset($error_msg['select_one'])) {
								echo $error_msg['select_one'];
							} ?>
						</div>
					</div>

					<div class="form-attributes">
						<p>Select:</p>
						<span>Red:</span> <input type="checkbox" name="checkbox" value="check1" <?php if(isset($checkbox) && ($checkbox == "check1")) echo "checked";?> />
						<span>Blue:</span> <input type="checkbox" name="checkbox" value="check2" <?php if(isset($checkbox) && ($checkbox == "check2")) echo "checked";?> />
						<span>Green:</span> <input type="checkbox" name="checkbox" value="check3" <?php if(isset($checkbox) && ($checkbox == "check3")) echo "checked";?> />
						<span>Yellow:</span> <input type="checkbox" name="checkbox" value="check4" <?php if(isset($checkbox) && ($checkbox == "check4")) echo "checked";?> />

						<div class="error_msg">
							<?php if(isset($error_msg['checkbox'])) {
								echo $error_msg['checkbox'];
							} ?>
						</div>
					</div>

					<div class="form-attributes">
						<p>File/Image Upload:</p>
						<input type="file" name="img" value="" />
						<div class="error_msg">
							<?php if(isset($error_msg['img'])) {
								echo $error_msg['img'];
							} ?>
					</div>

					<div class="form-attributes">
						<p>Comment:</p>
						<textarea rows="5" cols="40" name="comment" placeholder="" /></textarea>
						<div class="error_msg">
							<?php if(isset($error_msg['comment'])) {
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