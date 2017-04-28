<html><head>
		<title>Group 14</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
	<body class="">

		<!-- Content -->
			<div id="content" style="min-height: 2252px;">
				<div class="inner">
					
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
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar" style="min-height: 2252px;">

				
					

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current"><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Latest Post</a></li>
							<li><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Archives</a></li>
							<li><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">About Me</a></li>
							<li><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Contact Me</a></li>
						</ul>
					</nav>

				<!-- Search -->
					<section class="box search">
						<form method="post" action="#">
							<input type="text" class="text" name="search" placeholder="Search">
						</form>
					</section>

				
					

				
					

				
					

				<!-- Calendar -->
					<section class="box calendar">
						<div class="inner">
							<table>
								<caption>July 2014</caption>
								<thead>
									<tr>
										<th scope="col" title="Monday">M</th>
										<th scope="col" title="Tuesday">T</th>
										<th scope="col" title="Wednesday">W</th>
										<th scope="col" title="Thursday">T</th>
										<th scope="col" title="Friday">F</th>
										<th scope="col" title="Saturday">S</th>
										<th scope="col" title="Sunday">S</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="4" class="pad"><span>&nbsp;</span></td>
										<td><span>1</span></td>
										<td><span>2</span></td>
										<td><span>3</span></td>
									</tr>
									<tr>
										<td><span>4</span></td>
										<td><span>5</span></td>
										<td><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">6</a></td>
										<td><span>7</span></td>
										<td><span>8</span></td>
										<td><span>9</span></td>
										<td><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10</a></td>
									</tr>
									<tr>
										<td><span>11</span></td>
										<td><span>12</span></td>
										<td><span>13</span></td>
										<td class="today"><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">14</a></td>
										<td><span>15</span></td>
										<td><span>16</span></td>
										<td><span>17</span></td>
									</tr>
									<tr>
										<td><span>18</span></td>
										<td><span>19</span></td>
										<td><span>20</span></td>
										<td><span>21</span></td>
										<td><span>22</span></td>
										<td><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">23</a></td>
										<td><span>24</span></td>
									</tr>
									<tr>
										<td><a href="#" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</a></td>
										<td><span>26</span></td>
										<td><span>27</span></td>
										<td><span>28</span></td>
										<td class="pad" colspan="3"><span>&nbsp;</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>

				<!-- Copyright -->
					<ul id="copyright">
						<li>© Untitled.</li><li>Design: <a href="http://html5up.net" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	
<div id="titleBar"><a href="#sidebar" class="toggle"></a><span class="title"><a href="#">Upload</a>

</span>

</div>

		<?php } ?>
</body>


</html>