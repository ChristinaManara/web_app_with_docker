<?php
	/**FormSearchStudent is responsible for searching a specific student based on a given id. When this id is given 
	 * by the teacher-user then the result is displayed as a table. */

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
        <title>Search Page</title>
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
					<li><a href="formDeleteStudent.php">Delete Student</a></li>
					<li><a href="#">Search Student</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['name']?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</nav>

        <div class="container">
            <h1>Search Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="images/1.png" class="avatar img-circle" alt="avatar" style="max-width: 90px; max-height: 90px;">
                    </div>
                </div>
            
                <!-- edit form column -->
                <div class="col-md-9 personal-info">

                    <h3>Personal info</h3>
                    
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Student ID:</label>
                            <div class="col-lg-8">
                                <input id="var" class="form-control" type="text" name="search"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Search">
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
               // First we need a connection with the database.
                $host = 'db';
                $username = 'devuser';
                $password = 'devpass';
                $myDb = 'student_db';
                // Create connection.
                $db = mysqli_connect($host, $username, $password, $myDb);

                $id = filter_input(INPUT_POST, 'search');

                $sql = "SELECT * FROM Students WHERE ID='$id'";

                // Check connection
                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                } else {
                    $result = $db->query($sql);
                }
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

