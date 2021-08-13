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
        function get_name($db){
            $sql = "SELECT * FROM users WHERE loggedIn = 1; ";
            $statement = $db->prepare($sql);
            $statement->execute();
            $name = $statement->fetch();
            echo $name['firstName'];
                    
        }

        function get_email($db){
            $sql = "SELECT * FROM users WHERE loggedIn = 1; ";
            $statement = $db->prepare($sql);
            $statement->execute();
            $name = $statement->fetch();
            echo $name['email'];        
        }

        $try = "SELECT * FROM users WHERE loggedIn = 1;";
        $attempt = $db->prepare($try);
        $attempt->execute();
        $result = $attempt->fetch();
        if($result){

            $to = $result['email'];
            $subject = "Order Confirmation";
            $txt = 
                "Great news! We’ve received your order. Thank you for shopping with us.";
            $headers = "From: ClassicCityGroceries@gmail.com";

            mail($to,$subject,$txt,$headers);

    ?>
    <br><br><br>
    <h4 id="confirmation_msg"> 

        Thank you for completing your order, <?php get_name($db) ?>! A confirmation email has been sent to <?php get_email($db) ?>.
        <br><br>
        Below is a copy of what you ordered.
        <br><br>
            </h4>
        
                <table id="receipt">
                    <tr> 
                        <th> Item </th>
                        <th> Quantity </th>
                        <th> Unit Price </th>
                        <th> Price </th>
                    </tr>
        <?php
                        $sql2 = "SELECT name, price, quantity FROM cart";
                        $statement2 = $db->prepare($sql2);
                        $statement2->execute();
                        $result = $statement2->fetchAll();
                        $totalPrice = 0;
                        if($result) {
                            foreach ($result as $key => $value) {
                                echo "<tr><td>".$result[$key]["name"]."</td><td>".$result[$key]["quantity"]."</td><td> $".$result[$key]["price"]."</td><td>$".$result[$key]["price"]*$result[$key]["quantity"]."</td></tr>";
                                $totalPrice = $totalPrice + $result[$key]["price"]*$result[$key]["quantity"];
                            }

                            echo "</table>";
                        }
                        else {
                            echo "0 result";
                        }
                    ?>

                    <br><br>
                    <h4 id="confirmation_msg"> Total: $ <?php echo($totalPrice); ?> <h4>
                    <br><br>
                
                </table>


    

    <?php  }

    $sql2 = ("TRUNCATE TABLE cart;");
                $db->query($sql2);
                ?>

</body>
</html>