<?php 
include("include/connection.php");

if(isset($_POST["sign_up"]))
{

	// To recieve data from form
	 $name = test_input(mysqli_real_escape_string($con, $_POST['name']));
	 $pass = test_input(mysqli_real_escape_string($con, $_POST['password']));
	 $email = test_input(mysqli_real_escape_string($con, $_POST['email']));
	 $country = test_input(mysqli_real_escape_string($con, $_POST['country']));
	 $gender = test_input(mysqli_real_escape_string($con, $_POST['gender']));
	  $rand= rand(1,2) or die("Random fail");
}

//Function to validate data
function test_input($data) {
  		$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	$data = htmlentities($data);
 	 	return $data;
	}


//To validate name
	// if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
	// 	echo" <script>alert('Only letters and white space allowed')</script>";
	// 	echo "<script>window.open('login.php', '_self')</script>";
	// 	exit();
	// }

//To validate password
	// if (strlen($pass)<8) {
	// 	echo"<script>alert('Password should be minimum 8 characters!')</script>";
	// 	exit();
	// }

//To validate email
	// if (!filter_var($email, FILTER_VALIDATE_EMAIL &&) {
	// 	echo"<script>alert('Invalid email format!')</script>";
	// 	exit();
	// }

// To check email is already exist or not
	$check_email="SELECT * from users WHERE user_email='$email'";
	$run_email= mysqli_query($con, $check_email);
	$check= mysqli_num_rows($run_email);

	if ($check==1) {
		echo"<script>alert('Email alredy exist, please try again!')</script>";
		echo "<script>window.open('login.php', '_self')</script>";
		exit();
	}


// To give random profile picture for the user
	if($rand == 1)
	{
		$profile_pic = "Images/profile1.jpg";
	}else if($rand == 2){
		$profile_pic = "Images/profile2.jpg";
	}

	$sql = "INSERT INTO users (user_name,user_pass,user_email,user_profile,user_country,user_gender) VALUES ('{$name}', '{$pass}', '{$email}', '{$profile_pic}' ,'{$country}', '{$gender}')";


	$query= mysqli_query($con,$sql);

	if(isset($query)){
		echo"<script>alert('Congratulations $name, your account has been created successfully')</script>";
		echo "<script>window.open('login.php', '_self')</script>";
	}else{
		echo"<script>alert('Registration failed, try again!')</script>";
		echo "<script>window.open('login.php', '_self')</script>";
	}



?>