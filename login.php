<?php
require_once('database.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");

if ($email == null || $password == null) {
    $error = "Invalid data. Check all fields, go back and try again.";
}
else if (checkEmail($db, $email)!=1){
	echo("This email is not registered.");
}
else if (checkPassword($db, $email, $password)!=1){
	echo("Invalid password.");
}
else{
    $sql = "UPDATE users SET loggedIn = 1 WHERE email='$email';";
    $db->query($sql);
    if(!isset($_SESSION)) { 
        session_start(); 
    }
    $_SESSION['email'] = $email;
    #include('home.php');
    header("location: home.php");
}


function checkEmail($db, $mail){
    $sql = "SELECT * FROM users WHERE email='$mail'; ";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->rowCount();
    if ($result > 0)
        return 1;
    return 0;
}

function checkPassword($db, $mail, $pass){
	$sql = $db->prepare("SELECT * FROM users WHERE email='$mail' AND password = '$pass'; ");
    $sql->execute();  
    $result = $sql->rowCount();
    if ($result > 0)
        return 1;
    return 0;
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

<form action="login.php" method="post" class="form_input" name="myForm" onsubmit="return validateLogin();">
    <fieldset>
        <h2>Login</h2>
        <input type="text" class="input_field" name = "email" placeholder="Email Address">
        <input type="password" class="input_field" name = "password" placeholder="Password">
        <input type="submit" id="submit" name="Submit" value="Submit" />
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