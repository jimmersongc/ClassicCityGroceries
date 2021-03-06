<?php require_once('database.php')?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classic City Groceries</title>
    <link rel="stylesheet" href="style.css">
     <img class="headerImage" src="headerImage.jpeg">
</head>
<body>
    <?php 
    $try = "SELECT email FROM users WHERE loggedIn = 1";
    $attempt = $db->prepare($try);
    $attempt->execute();
    $result = $attempt->fetchAll();
    if(!$result){

    ?>

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

    }else {

    ?>
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

    }

    ?>

    <h1 id = "aboutHead"> About Classic City Groceries </h1>
    <div class="founders">
        <h2> Meet the Founders </h2>
        <img class="photo" src="IMG_9768.jpeg" height="150" width="150" align="">
        <img class="photo" src="IMG_9769.jpeg" height="150" width="150">
        <img class="photo" src="IMG_9770.jpeg" height="150" width="150">
        <img class="photo" src="caro.jpeg" height="150" width="150">
    </div>

    <ul id ="cgc">
        <li>Classic City Groceries was founded in the early 21st century
            with its purpose being to serve Athens like no other grocery store
        </li>
        <li>Our founders, Grant, Kendall, Paulo, and Caroline, all happened to cross
            paths in a grocery store class, and they all shared the same passion for 
            serving Athens
        </li>
        <li>Classic City Groceries has collaborated with numerous local vendors to
            provide fruits, veggies, meats, and more for local residents and students alike
        </li>
        <li>After a few years in the business, CGC was noticed by Kroger, who was deeply
            moved by the impact we have had on Athens. Shortly thereafter, Kroger ended up
            renaming itself to Classic City Groceries and started selling products from local
            vendors
        </li>
        <li>We are currently working with Facebook to provide worldwide availability for 
            Classic City Groceries
        </li>
    </ul>

</body>
</html>