<?php 
	if (!isset ($_SESSION)) {
		session_start();
      
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
<?php
    
  if (isset($_POST["email"]) && isset($_POST["password"]) && trim($_POST["email"]) !='' && trim($_POST["password"]) != ''  ){
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=group14", "group14", "since-WATER-MUCH-arms");
			
            $email = trim(strtolower($_POST["email"]));
            $password = $_POST["password"];	
			$passwordHash = "";
			
            $stmt = $dbh->prepare("SELECT user_ID, email, password FROM user_profile WHERE email = ?" );
			$stmt->execute(array($email));
			$User_ID = null;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {        
                $User_ID = $row['user_ID'];
                $passwordHash = $row['password'];
        }
		
		$siteSalt  = "group14";
		$saltedHash = hash('sha256', $password.$siteSalt);
		
		if ($passwordHash == $saltedHash && !is_null($User_ID)) {
			$_SESSION['users_id'] = $User_ID; 
			header("Location:./userTasks.php");
         
		} else {
			printf("<h2> Password incorrect or account not found. </h2>");
			
		}

    } catch (PDOException $exception) {
        printf("Connection error: %s", $exception->getMessage());
	
    }

    }
?>					
<div id="header">
  <h1>Logo</h1>
  <form action="login.php" method="POST" id="login-form">
    <label>Email <input type="text" name="email" id="email"></label>
    <label>Password<input type="password" name="password" id="password"></label>
    <input type="submit" class="submit" value="Login">
  </form> 
 
</div>


</header>
<body>

<!-- ============ ARTICLE ============== -->


<!-- ============ FOOTER SECTION ============== -->
<footer>
<div id ="myfooter" class="footer">
</div>
 
  <script src="validation.js">
    </script>

</footer>
</body>
</html>