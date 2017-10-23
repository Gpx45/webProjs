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
			<li><a href="home.php">Tutoring Enrollment List</a></li>
			<li><a href="home.php">Student Search</a></li>
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
            
            <div>
                <form method="post" action="action-server.php" target="_blank" id="submit-form">
                    <div class="form">
                        
                        <div class="lname-form-padding">
                        <label for="lastName">Last Name: </label>
                        <input type="text" name="lname" id="lastName">
                        </div>
                        
                        <div class="fname-form-padding">
                        <label for="firstName">First Name: </label>
                        <input type="text" name="fname" id="firstName"><br>
                        </div>

                        <div class="lname-form-padding">
                        <label for="sID">Student ID: </label>
                        <input type="text" name="studentID" id="sID"><br>
                        </div>

                        <div class ="lname-form-padding">
                        <label for="date">When(Enter a date after 2000-01-01): </label>
                        <input type="date" name="date" id="date"><br>
                        </div>

                        <div class="lname-form-padding">
                        <label for="email">E-mail: </label>
                        <input type="text" name="email" id="email" size="44"><br>
                        </div>

                        <div class="msg-form-padding">
                        <label for="email">I need tutoring in subject: </label>
                        <select>
                            <option value="algebra">Algebra</option>
                            <option value="calculus">Calculus</option>
                            <option value="biology">Biology</option>
                            <option value="programming">Programming</option>
                        </select><br>
                        </div>
                        
                        <div class="msg-form-padding">
                            <label for="comments">Message: </label>
                            <textarea name="comments" id="comments" cols="44" rows="4">
                            </textarea>
                        </div>
                        <hr>  

                        <div class="reset-pad">
                        <input type= "reset" id="submit-form" value="CLEAR">
                        </div>

                        <div class="submit-pad">
                        <input type="submit" id="submit-form" value="Send Request">
                        </div>

                       
                      
                    </div>
                    
                </form>
                
            </div>

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

</html>

