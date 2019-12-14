<?php
	$password = $checkpass = $username = $email = $na = $location = $phoneno = "";
	session_start();
	$errors = array();
	$db = mysqli_connect("localhost", 'id11628252_drivesmart','drivesmart',"id11628252_drivesmart");
    if(isset($_POST['signup'])){
		$checkpass = $_POST["psw-repeat"];
		if (empty($_POST["username"])) { 
			array_push($errors, "Username is required");
  		} else {
    		$username = mysqli_real_escape_string($db,$_POST["username"]);
  		}
  		
  		if (empty($_POST["email"])) {
  			
    		array_push($errors, "Email is required");
  		} else {
    		$email = mysqli_real_escape_string($db, $_POST["email"]);
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			array_push( $errors, "Invalid email format");			
    		}
  		}
  		
  		if (empty($_POST["password"])) {
  			array_push($errors, "Password is required"); 	
  		} else {
  			$password = mysqli_real_escape_string($db, $_POST["password"]);
  		}
  		if ($password != $checkpass) {
			array_push( $errors, "The two passwords do not match");
			
  		}
  		
  		if (empty($_POST["name"])) { 
			array_push($errors, "Name is required");
  		} else {
    		$na = mysqli_real_escape_string($db,$_POST["name"]);
  		}
  		if (empty($_POST["location"])) { 
			array_push($errors, "Location is required");
  		} else {
    		$location = mysqli_real_escape_string($db,$_POST["location"]);
  		}
  		if (empty($_POST["phoneno"]) || (strlen($_POST["phoneno"]) < 10)) { 
			array_push($errors, "Phone number is not of required length");
  		} else {
    		$phoneno = mysqli_real_escape_string($db,$_POST["phoneno"]);
  		}
  		$user_check_query = "SELECT * FROM accounts WHERE username='$username' OR email='$email' LIMIT 1";
	  	$result = mysqli_query($db, $user_check_query);
	  	$user = mysqli_fetch_assoc($result);
	  	if ($user) { // if user exists
			if ($user['username'] === $username) {
				array_push($errors, "Username already exists");
			}
			if ($user['email'] === $email) {
		 			array_push($errors, "email already exists");
			}
	  	}
  		if (count($errors) == 0){
  			$hash_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO accounts (username, password, email, name, location, phoneno) VALUES ('$username', '$hash_password', '$email', '$na', '$location', '$phoneno')";
        	mysqli_query($db, $insert);
         
        	$_SESSION['username'] = $username;
  			$_SESSION['success'] = "You are now logged in";
  			header("location: profile_page.php	");
  		}
	}
	if(isset($_POST['signin'])){
		$errors = array();
		$name = mysqli_real_escape_string($db,$_POST["username"]);
		$psw = mysqli_real_escape_string($db, $_POST["password"]);
		if (empty($name)) {
  			array_push($errors, "Username is required");
  		}
  		if (empty($psw)) {
  			array_push($errors, "Password is required");
  		}
  		if (count($errors) == 0){
  			$hash_password = password_hash($psw, PASSWORD_DEFAULT);
  			$query = "SELECT * FROM accounts WHERE username='$name'";
  			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
  				//array_push($errors, "Matched");
				$row = mysqli_fetch_assoc($results);
				if (password_verify($psw, $row['password'])){
					$_SESSION['username'] = $name;
	  	  			$_SESSION['success'] = "You are now logged in";
	  	  			header('location: profile_page.php');
	  	  		} 
	  	  	}
	  	  	else {
  				array_push($errors, "Wrong username/password combination");
  			}
  			
  		}
  	}	
?>
