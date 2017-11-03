

<?php
echo "<h2>MySQL DB</h2>";
function collectDB(){

    $ErrorMsg = array();
    $DBConnect = @new mysqli("localhost","root","","tutoringsite");
    $DBstudents_t = "tutoringsite";
    if($DBConnect->connect_errno){
        $ErrorMsg[] = "The Database Server is not available.";
        foreach($ErrorMsg as $msg){
            echo "<p>" . $msg . "</p>\n";

        };
    }
    else{
        echo "Successful connection.";
        $Result = @$DBConnect->select_db($DBstudents_t); 
        if($Result === FALSE){
            echo "<p>Unable to select the database.</p>"
            . $DBConnect->errno.": " . $DBConnect->error."\n";
        }
        else{
            echo "You are now in students_t table!";
        };

    };
};


?>
