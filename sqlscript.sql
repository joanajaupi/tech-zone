
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

