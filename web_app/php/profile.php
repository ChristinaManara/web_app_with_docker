<?php
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit();
    }
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

    // We don't have the password or email info stored in sessions so instead we can get the results from the database.
    $stmt = $db->prepare('SELECT PASSWORD, EMAIL, NAME, SURNAME FROM Teachers WHERE ID = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($password, $email, $name, $surname);
    $stmt->fetch();
    $stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/profile.css">
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
					<li><a href="formDeleteStudent.php">Delete Student</a></li>
					<li><a href="formSearchStudents.php">Search Student</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</nav>
		<div id="user-profile-2" class="user-profile " style="max-width: 500px; max-height: 500px;  width: 50%; margin: 0 auto;">
		<div class="tabbable">
			<ul class="nav nav-tabs padding-18">
				<li class="active">
					<a data-toggle="tab" href="#home">
						<i class="green ace-icon fa fa-user bigger-120"></i>
						Profile
					</a>
				</li>
			</ul>

			<div class="tab-content no-border padding-24" >
				<div id="home" class="tab-pane in active"  style="max-width: 500px; max-height: 500px;">
					<div class="row" >
						<div class="col-xs-12 col-sm-3 ">
							<span class="profile-picture">
								<img class="editable img-responsive" alt=" Avatar" id="avatar2" src="images/myavatar.png">
							</span>

							<div class="space space-4"></div>

						</div><!-- /.col -->

						<div class="col-xs-12 col-sm-9">
							<h4 class="blue">
								<span class="middle"><?=$name?> <?=$surname?></span>

								<span class="label label-purple arrowed-in-right">
									<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
									online
								</span>
							</h4>

							<div class="profile-user-info">
								<div class="profile-info-row">
									<div class="profile-info-name"> Username </div>

									<div class="profile-info-value">
										<span><?=$_SESSION['name']?></span>
									</div>
								</div>


								<div class="profile-info-row">
									<div class="profile-info-name"> Password </div>

									<div class="profile-info-value">
										<span><?=$password?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> Email </div>

									<div class="profile-info-value">
										<span><?=$email?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> ID </div>

									<div class="profile-info-value">
										<span><?=$_SESSION['id']?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-8 dotted"></div>

						</div><!-- /.col -->
					</div><!-- /.row -->

					<div class="space-20"></div>
				</div><!-- /#home -->
			</div>
		</div>
	</div>
	</body>
</html>

