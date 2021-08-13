<?php
require_once('database.php');



if(!isset($_SESSION)) { 
    session_start(); 
} 

#Just setting a value to error because will be used later.
$error = NULL;


    if (!empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    } else { #Sets the error variable.
        $error = 'You forgot to choose a password!';
    }

    #Uses the error value to check, if error is still null then it will add to Query.
    if ($error != 'You forgot to choose a password!' ) {
        $sql2 = "SELECT email FROM users WHERE email = '$email';";
        $statement2 = $db->prepare($sql2);
        $statement2->execute();
        $result = $statement2->fetchAll();

        $query = 'INSERT INTO users
                     (email, password, firstName, lastName, loggedIn)
                  VALUES
                     (:email, :password, :first_name, :last_name, 0)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->execute();
        $statement->closeCursor();
        
        echo "<script> alert('You have successfully created an account! Please login.') </script>";
    }
    
    ?>



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
            <li><a href="registration.php" id="signup"> Sign Up</a> </li>
            <li><a href="login.php" id="login"> Login </a> </li>
            <li><a href="aboutus.php" id="about">About Us</a></li>
            <li><a href="search.php" id="search">Search</a></li>
        </ul>
    </nav>

    <?php 

    $try = "SELECT email FROM users WHERE loggedIn = 1";
    $attempt = $db->prepare($try);
    $attempt->execute();
    $result = $attempt->fetchAll();
    if(!$result){

    ?> 

    <form action="registration.php" method="post" class="form_input" name="myForm" onsubmit="return validateRegistration();" >
        <fieldset>
            <h2>Create Account</h2>
            <input type="text" class="input_field" name="first" placeholder="First Name" >
            <input type="text" class="input_field" name="last" placeholder="Last Name"  >
            <input type="text" class="input_field" name="email" placeholder="Email Address" >
            <input type="password" class="input_field" name="password" placeholder="Password" >
            <input type="submit" id="submit" name="Submit" value="Submit"/>
        </fieldset>
    </form>

    <?php 

    }else {

    ?>

    <h1 id="logout_error">You are already logged in. </h1>
    <?php
    }
    ?>

</body>
</html>