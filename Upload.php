<!DOCTYPE html>
<html>
	<head>
	<title>Create Task</title>
		<link href="DaithiCSS.css" rel="stylesheet" type="text/css">
	</head>
	<?php
	$username="group14";$password="since-WATER-MUCH-arms";$database="group14";$localhost="localhost";$conn;
	$conn=mysqli_connect($localhost,$username,$password,$database);
	if(!$conn){
		echo"unable to connect to database";
	}
	else {
			echo"you are connected\n";
	}
	
	//@mysqli_select_db($database) or die( "Unable to select database");
	
	//mysql_close();
	
		if (!isset($_POST)||count($_POST)>0){
			$TaskTitle = stripslashes($_POST['TaskTitle']);
			$TaskType = stripslashes($_POST['taskType']);
			$BriefDescription = stripslashes($_POST['BriefDescription']);
			$Tags = stripslashes($_POST['Tags']);
			$NoOfPages = stripslashes($_POST['NoOfPages']);
			$NoOfWords = stripslashes($_POST['NoOfWords']);
			//$SourceFileFormat = $_POST['SourceFileFormat'];
			$DeadlineToClaim = stripslashes($_POST['claimDate']);
			$DeadlineToSubmit = stripslashes($_POST['submitDate']);
			/*echo $TaskTitle;
			echo $TaskType;
			echo $BriefDescription;
			echo $Tags;
			echo $NoOfPages;
			echo $NoOfWords;
			//echo $SourceFileFormat;
			echo $DeadlineToClaim;
			echo $DeadlineToSubmit;*/
			/*INSERT INTO task_profile */
			//$query = "INSERT INTO `task_profile`(`Task_ID`, `user_ID`, `Task_title`, `page_count`, `word_count`, `claim_deadline`, `completion_deadline`, `time_created`, `task_description`, `file_Format`)
			//VALUES (,15170756,$TaskTitle,$NoOfPages,$NoOfWords,$DeadlineToClaim,$DeadlineToSubmit,,$BriefDescription,2)";
			
			
			/*(user_ID, Task_title, page_count, word_count, claim_deadline, completion_deadline, time_created, task_description, file_Format);
			Values ('$TaskTitle', '$TaskType', '$BriefDescription', '$Tags', '$NoOfPages', '$NoOfWords', '$DeadlineToClaim', '$DeadlineToSubmit');*/
			//mysqli_query($conn,"INSERT INTO `task_tags`(`task_ID`, `tag_ID`) VALUES (2,3)");
			$query =  mysqli_query($conn,"INSERT INTO `task_profile` (`Task_ID`, `user_ID`, `Task_title`, `page_count`, `word_count`, `claim_deadline`, `completion_deadline`, `time_created`, `task_description`, `file_Format`)
			VALUES (NULL, '15170756', '$TaskTitle', '$NoOfPages', '$NoOfWords', '$DeadlineToClaim', '$DeadlineToSubmit', CURRENT_TIMESTAMP, '$BriefDescription', '2');");
			if($query) {
				echo "Added to database";
			}
			else {
				echo "Not Added to database";
			}
				
		}
		else {
	?>
	<body>
	<div class="header" id="headerB">
			<h1>Header</h1>
	</div>
	
	<div id= "myArticle" class="article">
		<form action="" method = "post">
		<form method="post" target="">
			<label for="TaskTitle">Task Title</label>
			<input type="text" name="TaskTitle" id="TaskTitle" style="width: 200px"><br>
			
			<label for="TaskType">Task Type</label>
			<select name = "taskType">
					<option name="MScThesis"value="1">MSc thesis</option>
					<option name="BScDissertation" value="2">BSc dissertation</option>
					<option name="projectReport"value="3">project report</option>
					<option name="PhDThesis"value="4">PhD thesis</option>
					<option name="Assignment"value="5">Assignment</option>
					<option name="ConferenceResearchPaper"value="6">Conference Research Paper</option>
			</select><br>
			
			<label for="BriefDescription">Brief Description</label>
			<input type="text" name="BriefDescription" value="max 200 words" style="width: 350px"></br>
			
			<label for="Tags">Tags</label>
			<select name = "Tags">
					<option value="Computer">Computer</option>
					<option value="HTML">HTML</option
					<option value="project-report">project-report</option>
					<option value="cs4014">cs4014</option>
			</select><br>
			
			<label for="NoOfPages">No Of Pages</label>
			<input type="number" name="NoOfPages"  value="" style="width: 100px">
			
			<label for="NoOfWords"> No Of Words</label>
			<input type="number" name="NoOfWords"  value="" style="width: 100px"></br>
			
			<label for="SourceFileFormat">Source File Format</label><br>
			<input type="radio" name="fileFormat" value="1" >.docx
			<input type="radio" name="fileFormat" value="2">.doc
			<input type="radio" name="fileFormat" value="3">.open office</br>
			<input type="radio" name="fileFormat" value="4">.tex
			<input type="radio" name="fileFormat" value="5">.pdf<br>
			
			<label for="DeadlineToClaim">Deadline to Claim</label>
			<input type="date" name="claimDate">
			
			<label for="DeadlineToSubmit">Deadline to Submit</label>
			<input type="date" name="submitDate"><br>
			
			<input type="submit" value="CreateTask">
			<input type="reset"><br>
			
			<input type="file" id="myFileInput" />
			<input type="button"
			onclick="document.getElementById('myFileInput').click()" 
			value="Select a File" />
		</form>
		</div>
		
		
		<div class="footer" id="footerB">
			<p>Footer</p>
		</div>
		<?php } ?>
	</body>
</html>	