<?php
	$username="group14";$password="since-WATER-MUCH-arms";$database="group14";$localhost="localhost";$conn;
	$conn=mysqli_connect($localhost,$username,$password,$database); 
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
  <a href= "userTasks.php">My Tasks</a>
   <a href= "index.php">All Tasks</a>
   <a href= "banUser.php">Ban User</a>
   <a href= "logout.php">Logout</a>
   <a href= "flaggedTasks.php">Flagged Tasks</a>
  </div>
  <h1>Logo</h1>
  </div>
  
<!-- ============ ARTICLE ============== -->

<div id="myArticle" class="article">
<h1>View Flagged Tasks</h1>
<?php
	$query = mysqli_query($conn,"SELECT * FROM flagged_tasks");

				while($row = mysqli_fetch_array($query)){
					$Task_ID = $row['task_ID'];
					$user_ID = $row['user_ID'];
                $reason = $row['reason'];
                $Task_Title = $row['Task_Title'];
					
				echo 
						   '<h3>',$Task_Title, '</h3><p><br>'
                     ,'Task_ID: ',$Task_ID,'<br>'
						   ,'User ID: ',$user_ID, '<br>'
                     ,'reason:',$reason;
				}
			
	
?>
</div>

<!-- Footer -->
<footer id="footer">
						
</footer>
</body>
</html>