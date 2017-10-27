<?php
$sfName = $slname = $stID = $regDate = $studentEmail = $subjec = $message = "";

 if ($SERVER["REQUEST_METHOD"] == "POST"){
	 $slName = userInput($data);
	 $sfName = userInput($data);
	 $stID = userInput($data);
	 $regDate = userInput($data);
	 $subject = userInput($data);
	 $message = userInput($data);
	 
 };
 
  if ($SERVER["REQUEST_METHOD"] == "GET"){
	 $slName = userInput($data);
	 $sfName = userInput($data);
	 $stID = userInput($data);
	 $regDate = userInput($data);
	 $subject = userInput($data);
	 $message = userInput($data);
	 
 };

 function userInput($data){
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
	 
 }

?>