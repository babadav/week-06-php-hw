<?php

$_SESSION;

	 $email = $_POST['emailInput'];
	 $password  = crypt($_POST['passwordInput']);
	 $firstName = $_POST['firstNameInput'];
	 $lastName  = $_POST['lastNameInput']; 
	 $phoneInput  = $_POST['phoneInput']; 
	 $creditCardInput  = $_POST['creditCardInput']; 
	 $expiration  = $_POST['expirationInput']; 

	 $FILENAME = "customers.csv";
	 $textToWrite = $email.",".$password.",".$firstName.",".$lastName.",".$creditCardInput.",".$expiration."\n";
 

	 $handler = fopen($FILENAME, "a+");
	 fwrite($handler, $textToWrite);
	 fclose($handler);
	 print_r( empty($firstName));
	 
	if(empty($firstName) || empty($lastName) ||empty($phoneInput) || empty($email) || empty($phoneInput) || empty($creditCardInput) || empty($expiration)){
		echo "You left an empty field!";
	}
	
	echo "thank you , please log in. "
	
   

?>

<html>
	 <a href="login.php?access=plain">Log In</a>
</html>

