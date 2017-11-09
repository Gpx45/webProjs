<!DOCTYPE html>

<html lang="en-US">


	<head>
	<title>Enrollment List</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Free Tutoring Online, come sign in and get help right away!" />
		<meta name="keywords" content="tutor, tutoring, service, math, reading, science" />
		<meta name="author" content="Victor Martins" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles\styles.css"/>
	</head>

	<body>

	<div id="header">
		<div>
		<h1>Tutoring Services</h1>
		</div>
		<div>
		<h4 class="pad-adjust">Face to Face Online</h4>
		</div>
	</div>
	<hr>

	<nav id="nav">
		<ul class="nv">
        <li><a href="home.php">Home</a></li>
        <li><a href="tutor.php">Request Tutoring</a> </li>
        <li><a href="enrollment.php">Tutoring Enrollment List</a></li>
        <li><a href="search.php">Student Search</a></li>
		</ul>
	</nav>

	<div class="r-imgr-div">
    <?php
        echo "<h2 class='webkit'>Complete Roster</h2>";

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


                $result = mysqli_query($DBConnect,"SELECT * FROM students_t");
                
                echo "<table border='1' width='960px'>
                        <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>StudentID</th>
                        <th>Date</th>
                        <th>E-mail</th>
                        <th>Selection</th>
                        <th>Message</th>
                        </tr>";
                
                        while($row = mysqli_fetch_array($result)) {
                          echo "<tr>";
                          echo "<td>".$row['lastName'] . "</td>";
                          echo "<td>".$row['firstName']."</td>";
                          echo "<td>".$row['studentID'] . "</td>";
                          echo "<td>".$row['regDate'] . "</td>";
                          echo "<td>".$row['email'] . "</td>";
                          echo "<td>".$row['selection']."</td>";
                          echo "<td>".$row['message'] . "</td>";
                          echo "</tr>";
                        }
                        echo "$row";
                        echo "</table>";
                
                

                $DBConnect->close();
            }   
    
        
    ?>
       
	</div>

    <footer class="longer-footer">
		<p class="small-pad"><b>Tutoring Services LLC</b></p>
	</footer>
	</body>
	
</html>

