
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
<h1>Tasks </h1>
<?php
    if (isset($_GET["Task_ID"])) {
        $task_id = $_GET["Task_ID"];
	    try {
            $dbh = new PDO("mysql:host=localhost;dbname=group14", "group14", "since-WATER-MUCH-arms");
            $stmt = $dbh->prepare("SELECT Task_title, task_description FROM `task_profile` WHERE Task_ID=:Task_ID" );
            $stmt->bindValue(':Task_ID', $task_id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                printf("<h2> %s </h2> <p> %s </p>\n", $row["Task_title"], $row["task_description"]);
            } else {
                printf("Item not found.");
            }
        
		

        } catch (PDOException $exception) {
            printf("Connection error: %s", $exception->getMessage());
	
        }
    }

?>
	<ul class="actions small">
	<?php
		if (!isset ($_SESSION)) {
			session_start();
		}
							
		if (isset($_SESSION["user_ID"]) && $_SESSION["user_ID"] != ''){ 
	?>
	<?php } 
	echo $_GET['link'];
	?>
		<li><a href="#" class="claim-btn">Claim Task</a></li>
			<li><a href="./index.php" class="back-btn">Back</a></li>
	</ul>

</div>									

<!-- Footer -->
<footer id="footer">
						
</footer>

</body>
</html>