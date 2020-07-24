<?php
    /* Attempt MySQL server connection.*/

    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $surname = filter_input(INPUT_POST, 'surname');
    $fathername = filter_input(INPUT_POST, 'fathername');
    $grade = filter_input(INPUT_POST, 'grade');
    $mobilenumber = filter_input(INPUT_POST, 'mobilenumber');
    $birthday = filter_input(INPUT_POST, 'birthday');
    // Check if all fields are inserted.
    if(!empty($id)){
        if(!empty($name)){
            if(!empty($surname)){
                if(!empty($fathername)){
                    if(!empty($grade)){
                        if(!empty($mobilenumber)){
                            if(!empty($birthday)){
                                $host = 'db';
                                $username = 'devuser';
                                $password = 'devpass';
                                $myDb = 'student_db';
                                // Create connection.
                                $db = mysqli_connect($host, $username, $password, $myDb);
                                // Delete with a specific ID.
                                $sql = "DELETE FROM Students WHERE ID='$id'";

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
                            }else{
                                echo "Birthday should not be empty";
                                die();
                            }
                        }else{
                            echo "Mobile number should not be empty";
                            die();
                        }
                    }else{
                        echo "Grade should not be empty";
                        die();
                    }
                }else{
                    echo "Fathername should not be empty";
                    die();
                }
            }else{
                echo "Surname should not be empty";
                die();
            }
        }else{
            echo "Name should not be empty";
            die();
        }
    }else{
        echo "ID should not be empty";
        die();
    }
?>

