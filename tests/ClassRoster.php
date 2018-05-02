<html>
	

<?php # Script 9.5 - ClassRoster.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Class Roster';
include ('includes/header.html');

// Check for form submission:

// echo $_SERVER['REQUEST_METHOD'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //remember the difference between post and get?

	require ('./mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for course information:
	if (empty($_POST['course_name'])) {  //$_POST is a global variable. empty() method determines whether a variable is considered to be empty.
		$errors[] = 'You forgot to enter the course name';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['course_name'])); 
		//mysqli_real_escape_strin()escapes special characters in a string for use in an SQL statement.
		$sn = mysqli_real_escape_string($dbc, trim($_POST['semester_name']));
		$sy = mysqli_real_escape_string($dbc, trim($_POST['semester_year']));
	}
	
    if (empty($errors)) { // If there is no errors. If everything's OK.
      // Make the query:
		$q = "SELECT CouLongName, CONCAT(SemesterName, SemesterYear) as SemesterInf, CONCAT(StuLastName, ', ', StuFirstName) as name from Students, Semesters, Courses, StudentClass, ScheduleOfClasses
     WHERE Students.StudentID=StudentClass.StudentID AND
     ScheduleOfClasses.CourseID=Courses.CourseID AND
     ScheduleOfClasses.ScheduleID=StudentClass.ScheduleID AND
     ScheduleOfClasses.SemesterID=Semesters.SemesterID AND
     CouLongName='$fn' AND Semesters.SemesterName='$sn' AND Semesters.SemesterYear='$sy'";	
		$r = @mysqli_query ($dbc, $q); // Run the query.
		$num = mysqli_num_rows($r);
		
	   if ($num > 0) { // If it ran OK, display the records
	   
	// Print how many users there are:
	   echo "<p>There is the information for the course you are looking for.</p>\n";

	// Table header.
	   echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	    <tr><td align="left"><b>Course Name</b></td><td align="left"><b>Semester</b></td><td align="left"><b>Student Name</b></td></tr>';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { //MYSQLI_ASSOC makes the returned array assortative. 
		echo '<tr><td align="left">' . $row['CouLongName'] . '</td><td align="left">' . $row['SemesterInf'] . '</td><td align="left">' . $row['name'] . '</td></tr>
		';
	   }

	echo '</table>'; // Close the table.
			} 
			else { // If it did not run OK.

				// Public message:
				echo '<h1>Error</h1>
				<p class="error">There is no course roster match with the information you provided</p>'; 
	
			}
			}
			
			mysqli_close($dbc); // Close the database connection.
		} // End of the main Submit conditional.
?>

<form class="form-horizontal" action="show_roster.php" method="post">
  <fieldset>
    <legend>Class Roster</legend>
    <div class="form-group">
      <label for="course_name" class="col-lg-2 control-label">Course Name</label>
      <div class="col-lg-10">
        <input class="form-control" placeholder="Course Name" autocomplete="off" type="text" name="course_name" id="course_name" size="15" maxlength="50" value="<?php if (isset($_POST['course_name'])) echo $_POST['course_name']; ?>" />
      </div>
    </div>

		<!-- SEMESTER -->
		<div class="form-group">
      <label for="semester" class="col-lg-2 control-label">Semester Name</label>
      <div class="col-lg-10">
        <select class="form-control" id="semester">
        <option value="semester" selected>--Semester--</option>
      <option value="Fall">Fall</option>
      <option value="Spring">Spring</option>
      <option value="Summer">Summer</option>
        </select>
      </div>
    </div>

		<!-- YEAR -->
    <div class="form-group">
      <label for="year" class="col-lg-2 control-label">Semester Year</label>
      <div class="col-lg-10">
        <select class="form-control" id="year">
          	<option value="year" selected>--Year--</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
						<option value="1999">1999</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
				 </select>   
      </div>
    </div>
    
    <!-- submit button -->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="submit" class="btn btn-primary">Show Class Roster</button>
      </div>
    </div>
  </fieldset>
</form>

<?php include ('includes/footer.html'); ?>


</html>