<?php 
    require_once('database.php');


    if(!isset($_SESSION)) { 
        session_start(); 
    } 

?>

<!DOCTYPE html>
<html>
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
            <li><a href="logout.php" id="logout"> Logout </a> </li>
            <li><a href="aboutus.html" id="about">About Us</a></li>
            <li><a href="search.php" id="search">Search</a></li>
            <li><a href="profile.php" id="profile">Profile</a></li>
        </ul>
    </nav>
        <main>
            <?php 
                function get_name($db){
                    $sql = "SELECT * FROM users WHERE loggedIn = 1; ";
                    $statement = $db->prepare($sql);
                    $statement->execute();
                    $name = $statement->fetch();
                    echo $name['firstName'];
                    
                }

                $try = "SELECT email FROM users WHERE loggedIn = 1";
                $attempt = $db->prepare($try);
                $attempt->execute();
                $result = $attempt->fetchAll();
                if($result){

                ?>
                <h1>
                <?php get_name($db) ?>'s Cart 
                </h1>
        
                
                    <?php
                        $sql2 = "SELECT name, price, quantity FROM cart";
                        $statement2 = $db->prepare($sql2);
                        $statement2->execute();
                        $result = $statement2->fetchAll();
                        $totalPrice = 0;
                        if($result) {
                            ?>
                            <table>
                                <tr> 
                                    <th> Item </th>
                                    <th> Quantity </th>
                                    <th> Unit Price </th>
                                    <th> Price </th>
                                </tr>
                                <?php 
                            foreach ($result as $key => $value) {
                                echo "<tr><td>".$result[$key]["name"]."</td><td>".$result[$key]["quantity"]."</td><td> $".$result[$key]["price"]."</td><td>$".$result[$key]["price"]*$result[$key]["quantity"]."</td></tr>";
                                $totalPrice = $totalPrice + $result[$key]["price"]*$result[$key]["quantity"];
                            }
                            echo "Total: $";
                            echo($totalPrice);
                            echo "<br><br>";
                            echo "</table>";
                            ?>
                            <br><br>
                            <a href="checkout.html" id="checkout">Continue to Checkout</a>
                            <?php 
                        }
                        else {
                            echo "There is currently nothing in your cart.";

                        }
                        echo "<br><br>";
                        
                    ?>
                
                </table>

                

                <?php } else { ?>
                <br><br>
                <h1 id="cart_error">There is no user logged in. Please login <a href="login.php"> here. </a></h1>
                <?php } ?>    

        </main>
        
    </body>
</html>