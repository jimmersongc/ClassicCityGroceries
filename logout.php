<?php
	require_once('database.php');
	
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classic City Groceries</title>
    <link rel="stylesheet" href="style.css">
    <img class="headerImage" src="headerImage.jpeg">

</head>

<body>


    <nav id="nav_menu">
        <ul>
            <li><a href="home.php" id="home" >Classic City Groceries</a></li>
            <li><a href="cart_view.php" id="cart" > My Cart</a> </li>
            <li><a href="login.php" id="login"> Login </a> </li>
            <li><a href="aboutus.php" id="about">About Us</a></li>
            <li><a href="search.php" id="search">Search</a></li>
            <li><a href="profile.php" id="profile">Profile</a></li>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    <br>
    	<?php
	    	$try = "SELECT email FROM users WHERE loggedIn = 1";
			$attempt = $db->prepare($try);
			$attempt->execute();
			$result = $attempt->fetchAll();
			if($result){
				$email = $_SESSION['email'];
				$sql = ("UPDATE users SET loggedIn = 0 WHERE email='$email';");
			    $db->query($sql);
		    	unset($_SESSION['email']);
				
				$sql2 = ("TRUNCATE TABLE cart;");
				$db->query($sql2);
				session_destroy();
			
    	?>


    	<h1 id="logout_error">You have successfully logged out. Please login <a href="login.php"> here. </a></h1>
    	
    	<?php
    		} 
    	?>


</body>
</html>

