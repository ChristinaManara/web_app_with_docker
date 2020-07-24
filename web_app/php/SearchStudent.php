<?php
    // First we need a connection with the database.
    $host = 'db';
    $username = 'devuser';
    $password = 'devpass';
    $myDb = 'student_db';
    // Create connection.
    $db = mysqli_connect($host, $username, $password, $myDb);

    $id = $_POST['search'];
    // Search by the id of the student.
    $sql = "SELECT * FROM Students WHERE ID='$id'";

    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        $result = $db->query($sql);
        if ($db->query($sql)){
            // If the student is found then redirect to formSearchStudent.php in order to display the results. 
            header('Location: formSearchStudent.php');
        } else{
            echo "Error: ". $sql ."<br>". $db->error;
        }   
        $db->close();                                     
    }
    if ( ! $result){
        echo "No result.";
    }else {
        if ($row = $result->fetch_assoc())
        {
            echo 'ID: '.$row["ID"];
            echo "\n";
            echo 'Name: '.$row["NAME"];
            echo "\n";
            echo 'Surname: '.$row["SURNAME"];
            echo "\n";
            echo 'Fathername: '.$row["FATHERNAME"];
            echo "\n";
            echo 'Grade: '.$row["GRADE"];
            echo "\n";
            echo 'Mobile number: '.$row["MOBILENUMBER"];
            echo "\n";
            echo 'Birthday: '.$row["BIRTHDAY"];
            echo "<br>";
        }
    }
?>