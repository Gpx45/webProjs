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
            $firstName = ucwords(raw_input);
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
			<li><a href="request-tutoring.php">Request Tutoring</a> </li>
			<li><a href="enrollment.php">Tutoring Enrollment List</a></li>
			<li><a href="home.php">Student Search</a></li>
		</ul>
	</nav>

	<div class="r-img-div">
		<div>
            

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
    /*echo "<h2>Your Input:</h2>";
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
            ?>
            */
            ?>
</html>

