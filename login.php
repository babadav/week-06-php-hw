<?php

session_start();

if($_GET['action'] == "login"){
	$isLoggedIn = false;
	$FILENAME = "customers.csv";
	$lines = file($FILENAME);
	
	echo "<pre>";
	
	// print_r($lines);
	
	 $email = $_POST['emailInput'];
	 $password  = crypt($_POST['passwordInput']);
	
	foreach($lines as $row){
		$userParts = explode(",", $row);
		// [0]=> email, [1]=>password, [2]=>lastname
		// print_r($userParts);
		if($userParts[0] == $_POST['emailInput' ] && password_verify($_POST['passwordInput'] , $userParts[1])){
			$_SESSION['email'] = $userParts[0];
			$_SESSION['firstname'] = $userParts[2];
			$_SESSION['is_user'] = 1;
			$isLoggedIn = true;
			break;
		}
	}
	
	if($isLoggedIn){
		echo "you are logged in!!";
	}else{
		echo " Bad username or password";
	}
}

elseif($_GET['action'] == "logout"){
	session_destroy();
	echo "you are logged out";
	
}

else{
	if($_GET['action'] == "register"){
	echo "WTF";
		}
	
	}




?>

<html>
	<body>
		<div>
			<b>Login</b>
		</div> <br><br>
		<div>
			<form action="login.php?action=login" method="POST">
				Email Address: <input type="text" name="emailInput"/><br />
				Password: <input type="password" name="passwordInput"/><br />
				 <input type="submit" value="login"/>
			</form>
		</div>
		<br>
		
		<a href="handle_register.html?access=plain">Register for an account.</a>
	</body>
</html>