<?php
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

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>Delete Page</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	</head>
	
	<body class="loggedin">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Technical University of Crete</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="Teachers.php">Home</a></li>
					<li><a href="formAddStudent.php">Add Student</a></li>
					<li><a href="formEditStudent.php">Edit Student</a></li>
					<li><a href="#">Delete Student</a></li>
					<li><a href="formSearchStudents.php">Search Student</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</nav>
        <div class="container">
            <h1>Delete Student</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                <div class="text-center">
                    <img src="images/delete2.png" class="avatar img-circle" alt="avatar" height="110" width="120">
                </div>
                </div>
                
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                <h3>Personal info</h3>
                
                <form class="form-horizontal" action="DeleteStudent.php"  method="post" name="form">
                    <input type="hidden" name="new" value="1" />
                    <div class="form-group">
                    <label class="col-lg-3 control-label">Student ID:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="id" required> 
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="surname" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-lg-3 control-label">Fathername:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="fathername" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Grade:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="number" step="0.01" name="grade" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Mobile phone:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="mobilenumber" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label">Birthday:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="birthday" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Delete">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
            <hr>		
		</div>
	</body>
</html>

