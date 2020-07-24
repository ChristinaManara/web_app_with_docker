<?php
    //First thing we have to do is start the session, this allows us to remember data on the server, this will be used later on to remember logged in users.
    session_start();
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

    //Connect to the database to check the username and password, make sure to set the variables to database credentials.

    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
    if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        die ('Please fill both the username and password field!');
    }

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $db->prepare('SELECT ID, PASSWORD FROM Teachers WHERE USERNAME = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            if ($_POST['password'] === $password) {
                // Verification success! User has loggedin!
                // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: Teachers.php');
            } else {
                // Displays a messages when the password is incorrect.
                $message = "Username and/or Password incorrect.\\nTry again.";
                echo "<script type='text/javascript'>alert('$message');</script>";  
            }
        } else {
            // Displays a messages when the username is incorrect.
            $message = "Username and/or Password incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";          
        }
        $stmt->close();
    }

?>