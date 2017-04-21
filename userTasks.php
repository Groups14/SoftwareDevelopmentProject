<?php 
	if (!isset ($_SESSION)) {
		session_start();
      
      $User_ID  = $_SESSION['users_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="Website.CSS" rel="stylesheet" type="text/css" />
	<TITLE>Website</TITLE>
</head>

<!-- ============ HEADER SECTION ============== -->
<header>
<div id="header">
  <a href= "task.php">My Tasks</a>
   <a href= "index.php">All Tasks</a>
   <a href= "banUser.php">Ban User</a>
   <a href= "logout.php">Logout</a>
  </div>
  
<!-- ============ ARTICLE ============== -->

<div id="myArticle" class="article">
<h1>View My Tasks</h1>

<?php
  $username="group14";$password="since-WATER-MUCH-arms";$database="group14";$localhost="localhost";$conn;
	$conn=mysqli_connect($localhost,$username,$password,$database); 
	$query = mysqli_query($conn,"SELECT * FROM `task_profile` WHERE user_ID = '".$_SESSION['users_id']."'")
				or die("Failed to query database" .mysqli_error());
				while($row = mysqli_fetch_array($query)){
					$Task_ID = $row['Task_ID'];
					$user_ID = $row['user_ID'];
					$Task_title = $row['Task_title'];
					$claim_deadline = $row['claim_deadline'];
					$completion_deadline = $row['completion_deadline'];
					$file_Format = $row['file_Format'];
					
				echo '<h3>',$Task_title, '</h3><p><br>'
						   ,'User ID: ',$user_ID, ', ' 
						   ,'Claim deadline: ',$claim_deadline ,', ' 
						   ,'Completion deadline: ',$completion_deadline,'<br> '
						   ,'<a href= "task.php">View</a>','</p><br/>';
				}
         
?>


</div>

<!-- Footer -->
<footer id="footer">
						
</footer>
</body>
</html>