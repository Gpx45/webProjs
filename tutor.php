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
    $email = $selection = $messages = "";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };
                        
    $lastNameErr = $firstNameErr = $StudentIDErr = $dateErr = 
    $emailErr = $selectionErr = $messagesErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["lname"])) {
            $lastNameErr = "Last Name is required";
        } else {
            $raw_input = test_input($_POST["lname"]);
            $lastName = ucwords($raw_input);
        }

        if (empty($_POST["fname"])) {
            $firstNameErr = "First Name is required";
        } else {
            $raw_input = test_input($_POST["fname"]);
            $firstName = ucwords($raw_input);
        }

        if (empty($_POST["studentID"])) {
            $StudentIDErr = "Student ID Required";
        } else {
            $StudentID = test_input($_POST["studentID"]);
        }

        if (empty($_POST["rdate"])) {
            $dateErr = "Date Required";
        } else {
            $rgDate = test_input($_POST["rdate"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }
                    
        if (empty($_POST["selection"])) {
            $selectionErr = "Select Your  Course";
        } else {
            $selection = test_input($_POST["selection"]);
        }
                    
        if (empty($_POST["comments"])) {
            $messagesErr = "Please Enter a Message";
        } else {
            $messages = test_input($_POST["comments"]);
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

	<div class="r-img-div">
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

                    <span  class="error">* required field.</span>
                   
                    <div class="form">
                                
                        <div class="lil-padding">
                        <label for="lastName">Last Name: </label>
                        <input type="text" name="lname" pattern="[A-Za-z]*\D*">
                        <span class="error">* <?php echo $lastNameErr;?></span>
                        <br />
                        </div>
                        
                        <div class="lil-padding">
                        <label for="firstName">First Name: </label>
                        <input type="text" name="fname" pattern="[A-Za-z]*\D*">
                        <span class="error">* <?php echo $firstNameErr;?>
                        </div>

                        <div class="lil-padding">
                        <label for="sID">Student ID: </label>
                        <input type="text" name="studentID" pattern="[A-Z]{1}[0-9]{8}">
                        <span class="error">* <?php echo $StudentIDErr;?>
                        </div>

                        <div class ="lil-padding">
                        <label for="date">When(Enter a date after 2000-01-01): </label>
                        <input type="date" name="rdate">
                        <span class="error">* <?php echo $dateErr;?>
                        </div>

                        <div class="lil-padding">
                        <label for="email">E-mail: </label>
                        <input type="text" name="email" size="44" 
                        pattern="^([a-zA-Z0-9_\-\.]+)&#64([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]\.(com)(net)(edu)">
                        <span class="error">* <?php echo $emailErr;?>
                        </div>

                        <div class="msg-form-padding">
                        <label for="email">I need tutoring in subject: </label>
                    
                        <select class="lil-padding" name="selection">
                            <option value="null"></option>
                            <option value="algebra">Algebra</option>
                            <option value="calculus">Calculus</option>
                            <option value="biology">Biology</option>
                            <option value="programming">Programming</option>
                            
                        </select>
                        <span class="error">* <?php echo $selectionErr;?>
                        <br />
                        </div>
                        
                        
                        <div class="msg-form-padding">
                            <label for="comments">Message: </label>
                            <textarea name="comments" cols="44" rows="4"></textarea>
                            
                        </div>
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
                                    echo "You are now in students_t table!";
                                    
                                    if(isset($_POST['submitButton'])){
                                            

                                        $sentData = "INSERT INTO students_t(lastName,
                                        firstName, studentID, regDate, email, selection, message)
                                        VALUES (\"".$lastName."\",\"".$firstName."\",\"".$StudentID."\"
                                        ,\"".$rgDate."\",\"".$email."\",\"".$selection."\",\"".$messages."\")";
                                        

                                        if($DBConnect->query($sentData) === TRUE){
                                            echo "New Record created successfully!";
                                        }
                                            else{
                                                echo "Error:" . $sentData."<br />".$DBConnect->error;
                                                $DBConnect->close();
                                            }
                                    }

                                }
                            
                                
                            }
                        
                    
            ?>

        </div>
       
	</div>

	<div class="r-text-div">
		
			<h2 class="p-adjust" style="margin-bottom: 10px;">Quote of the day</h2>
                    <div class="rp-adjust">
                    <q>
                    Often it isn't the mountains ahead that wear you out, its the little
                    pebbie in your shoe. 
                    </q>
					</div>
					
					<div class="image">
						<img src="images\ma.jpg" alt="Muhammad Ali">
					</div>
					<p class="webkit"><u>Muhammad Ali</u></p>
                <br></br>
				
			
		
	</div>

	<footer class="footer">
		<p class="small-pad"><b>Tutoring Services LLC</b></p>
	</footer>
    </body>
    
    <?php
    /*
    echo "<h2>Your Input:</h2>";
            echo $firstName;
            echo "<br>";
            echo $lastName;
            echo "<br>";
            echo $StudentID;
            echo "<br>";
            echo $rgDate;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $selection;
            echo "<br>";
            echo $messages;
       */     
            ?>
            

</html>

