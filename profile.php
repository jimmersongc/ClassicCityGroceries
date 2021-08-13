<?php require_once('database.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classic City Groceries</title>
    <link rel="stylesheet" href="style.css">
    <img class="headerImage" src="headerImage.jpeg">
    <script src="validation.js"></script>
</head>
<body>
    <nav id="nav_menu">
        <ul>
            <li><a href="home.php" id="home" >Classic City Groceries</a></li>
            <li><a href="cart_view.php" id="cart" > My Cart</a> </li>
            <li><a href="logout.php" id="logout"> Logout </a> </li>
            <li><a href="aboutus.php" id="about">About Us</a></li>
            <li><a href="search.php" id="search">Search</a></li>
            <li><a href="profile.php" id="profile">Profile</a></li>
        </ul>
    </nav>

    

	

	<?php 

		if(isset($_POST['Submit'])){
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$password = $_POST['password'];
			$try = "SELECT * FROM users WHERE loggedIn = 1";
			$attempt = $db->prepare($try);
			$attempt->execute();
			$result = $attempt->fetch();
			$email = $result['email'];


			$sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', password = '$password' WHERE email = '$email';";
			$query = $db->prepare($sql);
    		$query->bindValue(':password', $password);
    		$query->bindValue(':firstName', $firstName);
    		$query->bindValue(':lastName', $lastName);
			$query->execute(); 
			
			
		}

			$try = "SELECT * FROM users WHERE loggedIn = 1";
			$attempt = $db->prepare($try);
			$attempt->execute();
			$result = $attempt->fetch();
			if($result){
				$email = $result['email'];
			?> 
			<form action="profile.php" method="post" class="form_input" name="myForm" onsubmit="return validateRegistration();" >
			    <fieldset>
			        <h2> <?php echo $result['firstName']?>'s Profile</h2>
			        <label for="first">First Name</label>
		            <input type="text" class="input_field" name="firstName" value="<?php echo $result['firstName']?>">
		            <label for="last">Last Name</label>
		            <input type="text" class="input_field" name="lastName" value="<?php echo $result['lastName']?>">
		            <label for="email">Email</label>
		            <input type="text" class="input_field" name="email" value="<?php echo $result['email']?>" disabled>
		            <label for="password">Password</label>
		            <input type="text" class="input_field" name="password" value="<?php echo $result['password']?>">
		            <input type="submit" id="submit" name="Submit" value="Submit"/>
			    </fieldset>
			</form>
	<?php 
		 


	}
		?>

</body>
</html>