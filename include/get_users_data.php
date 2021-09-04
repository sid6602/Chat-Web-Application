<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

 
<?php
	$con = mysqli_connect("localhost","root","","mychat");
	$user ="SELECT * from users";
	$run_user = mysqli_query($con,$user);

	while ($row_user=mysqli_fetch_array($run_user)) {
	   $user_id =$row_user['user_id'];
	   $user_name =$row_user['user_name'];
	   $user_profile =$row_user['user_profile'];
	   $login = $row_user['log_in'];

	echo"
     <li>
     <div class='chat-left-img'>
     <img src='$user_profile'>
     </div>
     <div class='chat-left-detail'>
     <p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
     if($login =='online'){
     echo"<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
 }else{
 	echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
 }
 "
 </div>
 </li>
 ";
   }
?>

</body>
</html>