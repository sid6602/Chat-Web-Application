<!DOCTYPE html>

<?php
session_start();
include("find_friends_function.php");
if(!isset($_SESSION['user_email'])){
	header("location: ../login.php");
}
else{
?>

<html>
<head>
	<title>Search for Friends</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../CSS/find_people.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="#">
			<?php
				$user =$_SESSION['user_email'];
				$get_user = "SELECT * FROM users where user_email='$user'";
				$run_user= mysqli_query($con, $get_user);
				$row = mysqli_fetch_assoc($run_user);

				$user_name=$row['user_name'];
				echo "<a class='navbar-brand' href='../home.php?user_name=$user_name'>MyChat</a>";
			?>
		</a>
		<ul class="navbar-nav">
		<li><a style="color: white; text-decoration: none; font-size: 20px;" href="../account_settings.php">Setting</a></li>
		</ul>
	</nav><br>

	<div class="row">
		
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-4">
			<form class="Search_form" action="">
				<input type="text" name="Search_query" placeholder="Search Friend" autocomplete="off" required>
				<button class="btn" type="submit" name="Search_btn" style="color: white;">Search</button>
			</form>
		</div>
		<div class="col-sm--4">
			
		</div>

	</div><br><br>
	<?php search_user(); ?>
</body>
</html>

<?php  }  ?>