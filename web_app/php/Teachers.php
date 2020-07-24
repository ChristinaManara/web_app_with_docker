<?php
	//Check if CONSTANT called SITE_URL is defined.
	if(defined('SITE_URL')) {
		//Send 403 Forbidden response.
		header("HTTP/1.0 403 Forbidden");
		//Kill the script.
		exit();
	}
	$user_check = $_SESSION['loggedin'];
	// Info of the connection.
	$host = 'db';
	$username = 'devuser';
	$password = 'devpass';
	$myDb = 'student_db';
	// Create connection.
	$db = mysqli_connect($host, $username, $password, $myDb);

	// Check connection.
	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_errno());
	}
	session_start();
	
	$ses_sql = mysqli_query($db,"SELECT USERNAME FROM Teachers WHERE USERNAME = '$user_check' ");
	
	$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	
	$login_session = $row['username'];

	if(!isset($_SESSION['loggedin'])){
		header("location:index.php");
		die();
	} 
?>
<?php
	$user_check = $_SESSION['loggedin'];
	// Info of the connection.
	$host = 'db';
	$username = 'devuser';
	$password = 'devpass';
	$myDb = 'student_db';
	// Create connection.
	$db = new mysqli($host, $username, $password, $myDb);

	// Check connection.
	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_errno());
	}
	// Query for all students in order to display them in a table at the Teachers.php page.
	$query = "SELECT * FROM Students";
	$result = $db->query($query);
?>	

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Library of TUC!</title>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	
	<body class="loggedin">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Technical University of Crete</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="formAddStudent.php">Add Student</a></li>
					<li><a href="formEditStudent.php">Edit Student</a></li>
					<li><a href="formDeleteStudent.php">Delete Student</a></li>
					<li><a href="formSearchStudents.php">Search Student</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user" ></span> <?=$_SESSION['name'] ?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</nav>
		<div class="container">
			<h2>Library of TUC <?php echo $login_session; ?></h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
		<div class="container-fluid">
			<table class="table"><table id="example" class="table table-striped table-bordered table-responsive text-center" style="   margin: auto;
   			width: 70% !important; ">		
			<thead class="thead-dark">
				<tr>
				<th scope="col" class="text-center">ID</th>
				<th scope="col" class="text-center">NAME</th>
				<th scope="col" class="text-center">SURNAME</th>
				<th scope="col" class="text-center">FATHERNAME</th>
				<th scope="col" class="text-center">GRADE</th>
				<th scope="col" class="text-center">MOBILE NUMBER</th>
				<th scope="col" class="text-center">BIRTHDAY</th>				
				</tr>
			</thead>
			<tbody>

			<?php
				 while ($row = $result->fetch_assoc())
				 {
			?>		
					<tr>
						<td><?php echo $row['ID'];?></td>
						<td><?php echo $row['NAME'];?></td>
						<td><?php echo $row['SURNAME'];?></td>
						<td><?php echo $row['FATHERNAME'];?></td>
						<td><?php echo $row['GRADE'];?></td>
						<td><?php echo $row['MOBILENUMBER'];?></td>
						<td><?php echo $row['BIRTHDAY'];?></td>
					</tr>
					 
			<?php
					}
				
			?>
			</tbody>
			</table>
		</div>
	</body>
</html>
