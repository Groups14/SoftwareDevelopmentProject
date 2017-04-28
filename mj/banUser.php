<?php 
	if (!isset ($_SESSION)) {
		session_start();
}
?>
<html><head>
		<title>Group 14</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<?php
$servername = "localhost";
$username = "group14";
$password = "since-WATER-MUCH-arms";
$dbname = "group14";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT User_id, first_name, last_name FROM user_profile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> User id: ". $row["User_id"]. " - Name: ". $row["first_name"]. " " . $row["last_name"] . "<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?> 
<?php
$servername = "localhost";
$username = "group14";
$password = "since-WATER-MUCH-arms";
$dbname = "group14";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if(!$conn){
		echo"unable to connect to database";
	}
	else {
			echo"you are connected\n";
	}
 
			if (!isset($_POST)||count($_POST)>0){
			$banId = $_POST['banId'];
			$banReason = stripslashes($_POST['banReason']);

			$query =  mysqli_query($conn,"INSERT INTO `banned_users`(`user_ID`, `Moderator_ID`, `reason`)
			VALUES ('$banId','".$_SESSION['users_id']."','$banReason');");
			$queryTwo = mysqli_query($conn,"DELETE FROM `user_profile` Where User_ID = '$banId'");
			if($query) {
				echo "Added to database";
			}
			else {
				echo "Not Added to database";
			}
				
		}
	else{
?> 
	<body class="">you are connected
	

		<!-- Content -->
			<div id="content" style="min-height: 1976px;">
				<div class="inner">
					
					<div class="header">
						<h1 >Ban a User</h1>
					</div>
						<br>	
			<form action="" method = "post">
			<form method="post" target="">
			Please enter the ID below of the person you wish to ban.
				<input type="number" name="banId" id="banid" style="width: 200px"><br>
			Please enter your reason for banning this person.	
				<input type="text" name="banReason" id="banReason" style="width: 200px"><br>
				<input type="submit" value="Ban User">
			</form>
								
				</div>
			</div>
		<?php include(__DIR__."/templates/sidebar.php") ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	
<div id="titleBar"><a href="#sidebar" class="toggle"></a><span class="title"></span>

</div>
<?php } ?>
		</body>
</html>