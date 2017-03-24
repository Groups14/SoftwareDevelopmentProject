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
			echo"your code has been saved into the database";
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
			$query = INSERT INTO `task_profile`(`Task_ID`, `user_ID`, `Task_title`, `task_type`,`brief_description`,`page_count`, `word_count`, `claim_deadline`, `completion_deadline`, `time_created`, `task_description`, `file_Format`)
			VALUES (,15170756,$TaskTitle,$TaskType,$BriefDescription,[value-6],[value-7],[value-8],[value-9],[value-10])
			
			
			/*(user_ID, Task_title, page_count, word_count, claim_deadline, completion_deadline, time_created, task_description, file_Format);
			Values ('$TaskTitle', '$TaskType', '$BriefDescription', '$Tags', '$NoOfPages', '$NoOfWords', '$DeadlineToClaim', '$DeadlineToSubmit');*/
			mysqli_query($conn,"INSERT INTO `task_tags`(`task_ID`, `tag_ID`) VALUES (1,2)");
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
					<option value="MScThesis">MSc thesis</option>
					<option value="BScDissertation">BSc dissertation</option>
					<option value="projectReport">project report</option>
					<option value="PhDThesis">PhD thesis</option>
					<option value="Assignment">Assignment</option>
					<option value="ConferenceResearchPaper">Conference Research Paper</option>
			</select><br>
			
			<label for="BriefDescription">Brief Description</label>
			<input type="text" name="BriefDescription" value="max 200 words" style="width: 350px"></br>
			
			<label for="Tags">Tags</label>
			<select name = "Tags">
					<option value="Computer">Computer</option>
					<option value="HTML">HTML</option>
					<option value="project-report">project-report</option>
					<option value="cs4014">cs4014</option>
			</select><br>
			
			<label for="NoOfPages">No Of Pages</label>
			<input type="text" name="NoOfPages"  value="" style="width: 100px">
			
			<label for="NoOfWords"> No Of Words</label>
			<input type="text" name="NoOfWords"  value="" style="width: 100px"></br>
			
			<label for="SourceFileFormat">Source File Format</label><br>
			<input type="radio" name="docx" value="docx" checked>.docx
			<input type="radio" name="doc" value="doc">.doc
			<input type="radio" name="open office" value="open office">.open office</br>
			<input type="radio" name="tex" value="tex">.tex
			<input type="radio" name="pdf" value="pdf">.pdf<br>
			<input type="submit" value="open"><br>
			
			<label for="DeadlineToClaim">Deadline to Claim</label>
			<input type="date" name="claimDate">
			
			<label for="DeadlineToSubmit">Deadline to Submit</label>
			<input type="date" name="submitDate"><br>
			
			<input type="submit" value="CreateTask">
			<input type="reset">
			
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