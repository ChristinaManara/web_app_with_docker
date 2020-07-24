<?php

// Check if all fields are inserted.

$host = 'db';
$username = 'devuser';
$password = 'devpass';
$myDb = 'student_db';
// Create connection.
$db = mysqli_connect($host, $username, $password, $myDb);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$surname = filter_input(INPUT_POST, 'surname');
$fathername = filter_input(INPUT_POST, 'fathername');
$grade = filter_input(INPUT_POST, 'grade');
$mobilenumber = filter_input(INPUT_POST, 'mobilenumber');
$birthday = filter_input(INPUT_POST, 'birthday');

$sql = "UPDATE Students SET ID='".$id."',
NAME='".$name."', SURNAME='".$surname."',
FATHERNAME='".$fathername."', GRADE='".$grade."',
MOBILENUMBER='".$mobilenumber."', BIRTHDAY='".$birthday."' WHERE ID='".$id."'";

// Check connection.
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_errno());
} else {
    if ($db->query($sql)){
        header('Location: Teachers.php');
    } else{
        echo "Error: ". $sql ."<br>". $db->error;
    }   
    $db->close();                                     
}

$update="update Students set ID='".$id."',
NAME='".$name."', SURNAME='".$surname."',
FATHERNAME='".$fathername."', GRADE='".$grade."',
MOBILENUMBER='".$mobile_number."', BIRTHDAY='".$birthday."' where ID='".$id."'";

?>
