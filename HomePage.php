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
			
            $stmt = $dbh->prepare("SELECT User_ID, email, password FROM user_profile WHERE email = ?" );
			$stmt->execute(array($email));
			$id = null;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {        
                $User_ID = $row['User_ID'];
                $passwordHash = $row['password'];
        }
		
		$siteSalt  = "group14";
		$saltedHash = hash('sha256', $password.$siteSalt);
		
		if ($passwordHash == $saltedHash && !is_null($User_ID)) {
			$_SESSION['User_ID'] = $User_ID; 
			header("Location:./HomePage.php");
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
  <form id="login-form">
    <label>Email <input type="text" name="email" id="email"></label>
    <label>Password<input type="password" name="password" id="password"></label>
    <input type="submit" class="submit" value="Login">
  </form>
</div>
</header>
<body>

<!-- ============ NAVIGATION BAR SECTION ============== -->

<!-- ============ ARTICLE ============== -->
<div id="myArticle" class="article">
<h1>Sign Up </h1>

<?php
if (isset($_POST) && count ($_POST) > 0) {
	$firstName = htmlspecialchars(ucfirst(trim($_POST["first_name"])));
	$lastName = htmlspecialchars(ucfirst(trim($_POST["last_name"])));
	$User_ID = htmlspecialchars(ucfirst(trim($_POST["User_ID"])));
	$major= htmlspecialchars(ucfirst(trim($_POST["major"])));
	$email = trim(strtolower($_POST["email"]));
	$psw = $_POST["psw"];
	$pswRepeat = $_POST["psw-repeat"];
	
	
	
	//check wheter user/email alerady exists
	$dbh = new PDO("mysql:host=localhost;dbname=group14", "group14", "since-WATER-MUCH-arms");
	$stmt = $dbh->prepare("SELECT User_ID, email, password FROM user_Profile WHERE email = ?" );
	$stmt->execute(array($email));
	$rowCount = $stmt->rowCount();
	if ($psw != $pswRepeat) { //in case Javascript is disabled.
		printf("<h2> Passwords do not match. </h2>");
	} else {
		if ($rowCount > 0) { 
			printf("<h2> An account already exists with the given email.</h2>");
		} else {
			$query = "INSERT INTO user_profile SET email = :email, first_name = :first_name, last_name = :last_name, User_ID = :User_ID, password = :psw";
			$stmt = $dbh->prepare($query);
			$siteSalt  = "group14";
			$saltedHash = hash('sha256', $psw.$siteSalt);	
			$affectedRows = $stmt->execute(array(':email' => $email, ':first_name' => $firstName, ':last_name' => $lastName, ':User_ID' => $User_ID, ':psw' => $saltedHash));
			
			if ($affectedRows > 0) {
					$insertId = $dbh->lastInsertId();
					printf("<h2> Welcome %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $firstName);
													 //logout first
								/*http://php.net/manual/en/function.session-unset.php*/
								session_unset();
								session_destroy();
								session_write_close();
								setcookie(session_name(),'',0,'/');
								session_regenerate_id(true);		
				}
			}
		}
	}
?>
<?php 

if (!isset($_POST) || count($_POST) == 0) { ?>
											<form method="post" id="sign-up">
											<div class="sign_up">
												<form>
													<input type="text" placeholder="First Name"  name="first_name" />
													<input type="text" placeholder="Last Name"   name="last_name"  />
												</form>
											<div class="details" >
												<input type="text" placeholder=" User ID" name="User_ID" ><br>
	
												<input type="text" placeholder=" Email" name="email" ><br>

												<select id="major" name="major">
													<option value="Select Major">Select Major</option>
													<option value="First Choice">First Choice</option>
													<option value="Second Choice">Second Choice</option>
													<option value="Third Choice">Third Choice</option>
													<option value="Fourth Choice">Fourth Choice</option>
												</select ><br>
	
												<input type="password" placeholder=" Password" name="psw" ><br>

												<input type="password" placeholder="Confirm Password" name="psw-repeat" ><br>
											</div>

											<div class="clearfix">
												<button type="submit" class="signup-btn">Create Account</button>
											</div>
											</div>
												</form>
<?php } ?>
												</div>
<!-- ============ FOOTER SECTION ============== -->
<footer>
<div id ="myfooter" class="footer">
</div>
 
  <script src="validation.js">
    </script>

</footer>
</body>
</html>