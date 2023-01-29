#############################Create##################################

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

---------------------Recommended Items-----------------------------
CREATE TABLE recommended_items(
    ID int PRIMARY KEY AUTO_INCREMENT,
    fileName varchar(90),
    categoryID int,
    FOREIGN KEY (categoryID) references category(categoryID)
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
-----------------Reviews---------------------------------------

CREATE TABLE reviews(
  productID int,
  userID int,
  reviewTitle varchar(60) NOT NULL,
  reviewDescription varchar(256) NOT NULL,
  FOREIGN KEY (productID) references product(productID),
  FOREIGN KEY (userID) references userInfo(userID),
  PRIMARY KEY(productID,userID)
);