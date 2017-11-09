<?php
<<<<<<< HEAD
echo "<h2>MySQL DB</h2>";
function connectDB(){
=======
>>>>>>> revision1


    
    $location = "localhost";
    $user = "root";
    $pass = "";
    $dataBase = "tutoringsite";
    $ErrorMsg = array();
    $DBconnect = @new mysqli("$location",$user,$pass,$dataBase);

    if($DBconnect->connect_errno){
        $ErrorMsg[] = "The Database Server is not available.";
        foreach($ErrorMsg as $msg){
            echo "<p>" . $msg . "</p>\n";

        };
        echo "<p>CREATING NEW DATABASE!</p>";
        $DBconnect = @new mysqli("$location",$user,$pass);
        
        $sql = "CREATE DATABASE "."$dataBase";
        $DBconnect->query($sql);

        $DBconnect = @new mysqli("$location",$user,$pass,$dataBase);
        $sql = "
        CREATE TABLE students_t 
        ( sID INT AUTO_INCREMENT, 
        lastName VARCHAR(255) NOT NULL, 
        firstName VARCHAR(255) NOT NULL, 
        studentID VARCHAR(9) NOT NULL, 
        regDate date NOT NULL, 
        email VARCHAR(255) NOT NULL,
        selection VARCHAR(255) NOT NULL,
        message VARCHAR(255) NOT NULL, 
        PRIMARY KEY(sID, studentID) )";
        $DBconnect->query($sql);
        


    }
    else{
        echo " Connection established ";
        $Result = @$DBconnect->select_db($dataBase); 
        if($Result === FALSE){
            echo "<p>Unable to select the database.</p>"
            . $DBconnect->errno.": " . $DBconnect->error."\n";
        }

    };
    echo " <p class="."color: green;".">You many now register!</p> ";

?>
