
---------------------------User Info------------------------------
CREATE TABLE userInfo (
  userID int PRIMARY KEY AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  surname varchar(20) NOT NULL,
  email varchar(50) NOT NULL UNIQUE,
  password varchar(256) NOT NULL,
  phone varchar(25),
  admin boolean
);

-----------------------Category------------------------------------
CREATE TABLE category(
  categoryID int PRIMARY KEY AUTO_INCREMENT,
  categoryName varchar(30) NOT NULL UNIQUE
);

-------------------Product----------------------------------------
CREATE TABLE product(
  productID int PRIMARY KEY AUTO_INCREMENT,
  productName varchar(25) NOT NULL,
  productDescription varchar(256) NOT NULL,
  productPrice float NOT NULL,
  productQuantity int NOT NULL,
  productCategoryID int, 
  productImage varchar(50),
  FOREIGN KEY (productCategoryID) references category(categoryID) 
);
-------------------Purchase----------------------------------------
CREATE TABLE purchase(
  transactionID int PRIMARY KEY AUTO_INCREMENT,
  productName varchar(25) NOT NULL,
  productPrice float NOT NULL,
  productQuantity int NOT NULL,
  totalPrice float NOT NULL,
  purchasedAt DATE,
  userID int, 
  FOREIGN KEY (userID) references userInfo(userID) 
);

-----------------Reviews---------------------------------------

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `review` text NOT NULL,
  `publishedAt` date NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(5, 'Accessories'),
(1, 'Laptop'),
(4, 'Pc'),
(38, 'Phone'),
(7, 'Screen'),
(2, 'Tv');
COMMIT;

INSERT INTO `product` (`productID`, `productName`, `productDescription`, `productPrice`, `productQuantity`, `productCategoryID`, `productImage`) VALUES
(68, 'Apple iPhone 14 Pro,128GB', 'First-class design, durability, functions and technology.', 1500, 10, 38, 'iphone.jpg'),
(69, 'Dell Latitude 5520', 'Laptop Dell Latitude 5520 (S002L552015W11PL), 15.6\" Full HD, Intel Core i5, 8GB RAM DDR4, 256GB SSD, Intel Iris Xe Graphics, i hirtë', 1074, 5, 1, 'dell.jpg'),
(70, 'Assus Rog', 'Laptop ASUS ROG Strix SCAR 18 (2023) G834, 18\", Intel Core i9, 32GB RAM, 2x 1TB SSD, NVIDIA GeForce RTX 4090, i zi', 4000, 5, 1, 'assusrog.jpg'),
(71, 'Laptop Lenovo NB Legion ', 'Laptop Lenovo NB Legion 5 15IAH7H, 15.6\", Intel Core I7-12700H, 2x 16GB RAM, 2x 1TB SSD, NVIDIA GeForce RTX 3070 8GBG DDR6', 2000, 10, 1, 'legion.jpg');
COMMIT;
