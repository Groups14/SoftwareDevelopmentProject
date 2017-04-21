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
  </div>
  <h1>Logo</h1>
  </div>
  
<!-- ============ ARTICLE ============== -->

<div id="myArticle" class="article">
<h1>View Tasks</h1>
<?php

   if (!isset($_POST)||count($_POST)>0){
                            $claimedTaskID = ($_POST['taskID']); 
                            $claimedUserID = ($_POST['userID']);
							$ClaimedTask_ID = (int)($claimedTaskID . $claimedUserID);
                            $query2 =  mysqli_query($conn,"INSERT INTO `claimed_tasks` (`task_ID`, `user_ID`, `ClaimedTask_ID`) VALUES ('$claimedTaskID', '$claimedUserID','$ClaimedTask_ID' );");
							$queryThree = mysqli_query($conn,"DELETE FROM `task_profile` WHERE `task_ID` = $claimedTaskID");
   }else{
	$query = mysqli_query($conn,"SELECT * FROM task_profile ORDER BY claim_deadline ASC");

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
						   ,'<a href= "task.php">Claim this task</a>','</p><br/>'
						   ,'<button onclick="myFunction()">Flag Task</button>'
						   ,'<script>
								function myFunction() {
									var person = prompt("Please enter reason for flagging");
    
										if (person != null) {
											document.getElementById("demo").innerHTML =
											"Task has been flagged";
										}
								}
							</script>';
							function change() // no ';' here
{
							var elem = document.getElementById("myButton1");
							if (elem.value=="Close Curtain") elem.value = "Open Curtain";
							else elem.value = "Close Curtain";
}
							?>     
                            <form action = "" method="POST">
                               <input type ="hidden" name="taskID" value= "<?php echo $Task_ID; ?>" />
                               <input type ="hidden" name="userID" value = "<?php echo $user_ID; ?>"/>
                               <input onClick="change()" type="submit" name="submit" value="Claim this task"/>
                            </form>
                   <?php }

				}
			
	
?>
</div>

<!-- Footer -->
<footer id="footer">
						
</footer>
</body>
</html>