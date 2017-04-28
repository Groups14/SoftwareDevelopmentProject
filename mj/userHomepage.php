<?php
	$username="group14";$password="since-WATER-MUCH-arms";$database="group14";$localhost="localhost";$conn;
	$conn=mysqli_connect($localhost,$username,$password,$database); 
?>
<!DOCTYPE html
<html>
<head>
	<TITLE>User Home Page</TITLE>
	<link href="Website.CSS" rel="stylesheet" type="text/css" />
			<script type= "text/javascript">
			function active(){
				var searchBar = document.getElementById('searchBar');
				
				if(searchBar.value == 'Search...'){
					searchBar.value = ''
					searchBar.placeholder = 'Search...'
				}
			}
			function inactive(){
				var searchBar = document.getElementById('searchBar');
				
				if(searchBar.value == ''){
					searchBar.value = 'Search...'
					searchBar.placeholder = ''
				}
			}
			</script>
</head>
<header>
<div id="header">
  <a href= "userTasks.php">My Tasks</a>
   <a href= "index.php">All Tasks</a>
   <a href= "banUser.php">Ban User</a>
   <a href= "logout.php">Logout</a>
  </div>
  <h1>Logo</h1>
  </div>
  </header>
<body>
		
			<form action = "userHomepage.php" method="POST">
				<input type="text" name= "q" id= "searchBar" placeholder="" value="Search..." maxlength= "25" autocomplete= "on" onMouseDown="active();" onBlur= "inactive();" /><input type="submit" id="searchBtn" value="Search"/>
				</form>
			<?php 
					if(isset($_POST['q'])){
    
					$searchq = $_POST['q'];
    
					$query = mysqli_query($conn,"SELECT * FROM task_profile
												WHERE user_ID LIKE'%$searchq%' OR Task_title LIKE '%$searchq%'");
                                       
						$count = mysqli_num_rows($query);
						if($count == 0){
						$output = 'There was no search result!';
						}
					else{
						while($row = mysqli_fetch_array($query)) {
            
							$Task_ID             = $row['Task_ID'];
							$user_ID             = $row['user_ID'];
							$Task_title          = $row['Task_title'];
							$claim_deadline      = $row['claim_deadline'];
							$completion_deadline = $row['completion_deadline'];
							$file_Format         = $row['file_Format'];
							$task_description    = $row['task_description'];
            
							echo '<p> ' ,$Task_title, ',<br/>'
										,$user_ID, ', ' 
										,$claim_deadline ,', ' 
										,$completion_deadline,', '
										,$task_description, ', ' 
										,$file_Format,'</p><br/>';
        }
    }
}
				 else if('$q' == 'Search...'){
					header('Location: userHomepage.php');
				}
	?>
	
</body>
</html>