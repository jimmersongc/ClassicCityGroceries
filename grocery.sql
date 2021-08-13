
DROP DATABASE IF EXISTS grocery;
CREATE DATABASE grocery;
USE grocery;


CREATE TABLE `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Values for table 'products'

INSERT INTO products VALUES
(1, 'Asparagus', 'Vegetable', '1.99', 'asparagus.jpg'),
(2, 'Banana', 'Fruit', '0.21', 'banana.jpg'),
(3, 'Brownies', 'Dessert', '4.99', 'brownies.jpg'),
(4, 'Butter', 'Dairy', '1.99', 'butter.jpg'),
(5, 'Cookie', 'Dessert', '1.49', 'IMG_9771.jpeg'),
(6, 'Carrots', 'Vegetable', '0.99', 'carrots.jpg'),
(7, 'Cheese', 'Dairy', '1.39', 'cheese.jpg'),
(8, 'Corn', 'Vegetable', '2.99', 'corn.jpg'),
(9, 'Creme Brulee', 'Dessert', '5.99', 'cremebrulee.jpg'),
(10, 'Lamb Chop', 'Meat', '11.99', 'download.jpeg'),
(11, 'Milk', 'Dairy', '2.69', 'milk.jpg'),
(12, 'NY Strip', 'Meat', '20.00', 'nystripultra_2.jpg'),
(13, 'Orange', 'Fruit', '0.49', 'orange.jpg'),
(14, 'Pepper', 'Vegetable','1.38', 'pepper.jpg'),
(15, 'Pineapple', 'Fruit','3.49', 'pineapple.jpg'),
(16, 'Pork', 'Meat','5.83', 'pork-1122171_1920.jpg'),
(17, 'Ribeye', 'Meat','12.99', 'IMG_9772.jpeg'),
(18, 'Strawberries', 'Fruit','5.52', 'strawberry.jpg'),
(19, 'Cheesecake', 'Dessert','5.99', 'vanillaChzCake.jpg'),
(20, 'Yogurt', 'Dairy','4.99', 'yogurt.jpg');


CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `loggedIn` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cart` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`productID`)
);

