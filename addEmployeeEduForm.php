<?php
session_start();
if(!$_SESSION['user'])  
{  
    header("Location: index.php");
} 
$uname = $_SESSION['username'];

if(isset($_POST['userProfileID']))
$userProfileID = $_POST['userProfileID'];


?>
		<html>
		<title>
			LinkedInR
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="stylesheet.css">
		<style>
		#header-wrap {
    position: fixed;
    height: auto;
    width: 100%;
    z-index: 100
}
		</style>

<script>
onerror = errorHandler
function errorHandler(message, url, line)
{
out = "Sorry, an error was encountered.\n\n";
out += "Error: " + message + "\n";
out += "URL: " + url + "\n";
out += "Line: " + line + "\n\n";
out += "Click OK to continue.\n\n";
alert(out);
return true;
}
</script>

		<body>
		<div id="header-wrap" class="w3-container">
   <div  class=" w3-center w3-serif w3-teal"><h2><strong>Education</strong></h2></div>
   <button class="w3-btn w3-ripple w3-right"><a href="logout.php">Logout</a>
   <button class="w3-btn w3-ripple w3-right"><a href="jobPortal.php">Apply for Jobs</a>
   <button class="w3-btn w3-ripple w3-right"><a href="connectUsers.php">Connections</a>
   <button class="w3-btn w3-ripple w3-right"><a href="storyBoard.php">Story Board</a>
   <button class="w3-btn w3-ripple w3-right"><a href="employeeProfile.php">Home</a></button>
</div>

  <?php

echo <<<_END
<br><br><br>
<br><br><br>
		<div class="row">
		<form action="addEmployeeEInfoHandler.php" class="form-horizontal" method="POST">
	        <label>University: </label>
	        <input type="text" class="input" name="university" required><br/>
		</div>
	    <div class="row">
	        <label>College: </label>
	        <input class="input" name="college" type="text" size="30" required/><br><br>
	    </div>
	    <div class="row form-group">
	        <label class="control-label col-sm-2">Degree:</label>
	        <input class="input" name="degree" type="text" required/><br><br>
	    </div>
	    <div class="row">
	        <label>GPA: </label>
			<input type="number" name="GPA" min='0' max='4' required><br><br>
		</div>
		 <div class="row">
	        <label>Start Date:</label>
	        <input class="input" name="empEduJobStart" type="date" required/><br><br>
	    </div>
	    <div class="row">
	        <label>End Date: (leave this field if you are currently studying)</label>
			<input type="date" name="empEduJobEnd">
		</div>
_END;

if(!(isset($_GET['param1']) && isset($_GET['param2'])))
{	
   echo <<<_END
   <input type="hidden" name="actionEvent" value="IUEduD"/>
_END;
}

if(isset($_GET['param1']) && isset($_GET['param2']))
{
	$param1 = $_GET['param1'];
	$param2 = $_GET['param2'];
	
	echo <<<_END
	<input type="hidden" name="actionEvent" value="$param1">
	<input type="hidden" name="eduID" value="$param2">
_END;
}

echo <<<_END
		 <div class="row">
		    <input type="hidden" name="whatEmpSectionIsBeingAdded" value="EDU">
_END;
            if(isset($_POST['userProfileID']))
			{
				echo <<<_END
				<input type="hidden" name="userProfileID" value="$userProfileID">
_END;
			}
			
echo <<<_END
			<input type="submit" value="Add">
		</div>
_END;


echo <<<_END
</form>	
<form action="employeeProfile" method="post">
<input type="submit" value="cancel">
</form>
</body> 
</html>
_END;

?>