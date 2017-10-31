<!DOCTYPE html>

<html lang="en-US">


	<head>
	<title>Request Tutoring</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Free Tutoring Online, come sign in and get help right away!" />
		<meta name="keywords" content="tutor, tutoring, service, math, reading, science" />
		<meta name="author" content="Victor Martins" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="styles\styles.css"/>
	</head>

	<body>



    <?php

    $lastName = $firstName = $StudentID = $rgDate = 
    $email = "";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["lname"]) {
       
            $raw_input = test_input($_POST["lname"]);
            $lastName = ucwords($raw_input);
         }

        if ($_POST["fname"]) {
            
            $raw_input = test_input($_POST["fname"]);
            $firstName = ucwords($raw_input);
        }

        if ($_POST["studentID"]) {
    
            $StudentID = test_input($_POST["studentID"]);
        }

        if ($_POST["rdate"]) {

            $rgDate = test_input($_POST["rdate"]);
        }

        if ($_POST["email"]) {

            $email = test_input($_POST["email"]);
        }

    }
    ?>



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
		<div>
            <?php 
            $date = date('m/d/Y', time());
            
            ?>
			<p class="p-adjust"><b>Yes!</b> I am interested in receiving some
			tutoring. Today's Date: <b><?php echo $date;?></b>
			</p>
            
            <div class="lil-padding">
                
                
                
                <form method="post" action="<?php echo htmlspecialchars
                ($_SERVER["PHP_SELF"]);?>"
                  target="_self" name="submit-form">

                    <span  class="error">Please Enter Information On Student.</span>
                   
                    <div class="form2">
                                
                        <div class="lil-padding">
                        <label for="lastName">Last Name: </label>
                        <input type="text" name="lname">
                        <br />
                        </div>
                        
                        <div class="lil-padding">
                        <label for="firstName">First Name: </label>
                        <input type="text" name="fname">
                        </div>

                        <div class="lil-padding">
                        <label for="sID">Student ID: </label>
                        <input type="text" name="studentID" ">
                        </div>

                        <div class ="lil-padding">
                        <label for="date">When(Enter a date after 2000-01-01): </label>
                        <input type="date" name="rdate">
                        </div>

                        <div class="lil-padding">
                        <label for="email">E-mail: </label>
                        <input type="text" name="email" size="44">
                        </div>

                        <br />
                        <hr>  

                        <div class="reset-pad">
                        <input type= "reset" id="submit-form" value="CLEAR">
                        </div>

                        <div class="submit-pad">
                        <input type="submit" name="submitButton" value="Send Request">
                        </div>
                    
                    
                    </div>
                    
                    

                </form>

                
            </div>
           

            <?php
               
                
                            $ErrorMsg = array();
                            $DBConnect = @new mysqli("localhost","root","","tutoringsite");
                            $DBtutorDB = "tutoringsite";
                            if($DBConnect->connect_errno){
                                $ErrorMsg[] = "The Database Server is not available.";
                                foreach($ErrorMsg as $msg){
                                    echo "<p>" . $msg . "</p>\n";
                
                                };
                            }
                            else{
                                echo "Successful connection.";
                                $Result = @$DBConnect->select_db($DBtutorDB); 
                                if($Result === FALSE){
                                    echo "<p>Unable to select the database.</p>"
                                    . $DBConnect->errno.": " . $DBConnect->error."\n";
                                }
                                else{
                                    echo "<h2 class='webkit'>Results</h2>";
                                    
                                    
                                     if (isset($_POST['submitButton'])){        
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
                                                    }
                                                    

                                                     if(empty($_POST['lname'])){
                                                        
                                                    }
                                                    else{
                                                        $sql = "SELECT * FROM students_t WHERE lastName"."="."\"".$lastName."\"";
                                                        
                                                        $sentData = $DBConnect->query($sql);
                                                        
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
                                                    
                                                            while($row = mysqli_fetch_array($sentData)) {
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
                                    
                                                            


                                                    };
                                                   

                                                    if(empty($_POST['fname'])){
                                                        
                                                    }
                                                    else{
                                                        $sql = "SELECT * FROM students_t WHERE firstName"."="."\"".$firstName."\"";
                                                        
                                                        $sentData = $DBConnect->query($sql);
                                                        
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
                                                    
                                                            while($row = mysqli_fetch_array($sentData)) {
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

                                                    };


                                                    if(empty($_POST['studentID'])){
                                                        
                                                    }
                                                    else{
                                                        $sql = "SELECT * FROM students_t WHERE studentID"."="."\"".$StudentID."\"";
                                                        
                                                        $sentData = $DBConnect->query($sql);
                                                        
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
                                                    
                                                            while($row = mysqli_fetch_array($sentData)) {
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
                                    
                                                            


                                                    };
                                                   


                                                    if(empty($_POST['rdate'])){
                                                        
                                                    }
                                                    else{
                                                        $sql = "SELECT * FROM students_t WHERE regDate"."="."\"".$rgDate."\"";
                                                        
                                                        $sentData = $DBConnect->query($sql);
                                                        
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
                                                    
                                                            while($row = mysqli_fetch_array($sentData)) {
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
                                    
                                                            


                                                    };
                                                   

                                                    if(empty($_POST['email'])){
                                                        
                                                    }
                                                    else{
                                                        $sql = "SELECT * FROM students_t WHERE email"."="."\"".$email."\"";
                                                        
                                                        $sentData = $DBConnect->query($sql);
                                                        
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
                                                    
                                                            while($row = mysqli_fetch_array($sentData)) {
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
                                    
                                                            


                                                    };
                                                   


                                                    }
                                                }
                                                                    
                                                }   
                                }
            ?>

        </div>
       
	</div>

	

	<footer class="longer-footer">
		<p class="small-pad"><b>Tutoring Services LLC</b></p>
	</footer>
	</body>        

</html>

