# [ecommerce-web](https://github.com/animeshmaiti/ecommerce-web)

this website is running on xampp web server with mysql, php, html, bootstrap

## How to run this project

1. Install [xampp](https://www.apachefriends.org/download.html) on your computer
2. Clone this project to `C:\xampp\htdocs` folder
3. Open xampp control panel and start `Apache` and `MySQL` service
4. Open your browser and go to `http://localhost/phpmyadmin/`
5. Create a new database with name `acme`
   - or create a new database with other name and change the database name in `shared/connection.php` file

```php
    $conn = mysqli_connect("localhost", "root", "", "your_database_name");
```
```diff
- $conn = mysqli_connect("localhost", "root", "", "acme");
+ $conn = mysqli_connect("localhost", "root", "", "your_database_name");
```

6. create a new table with name `user` by run this sql query in console

| Field	 |   Type	|  Null | Key |Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
| userid     |int(ll)	    | NO	|PRI | NULL|auto increment|
| username   | varchar(50)	| NO	|UNI | NULL|
| password   | varchar(100) | NO	|    | NULL|
| user_type  | varchar(20)  | NO	|    | NULL|
| time       | timestamp    | NO	|    | current_timestamp()|
```sql 
    CREATE TABLE `user` (
    userid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(50) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    user_type varchar(20) NOT NULL,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

7. create a new table with name `product` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|product_name	|       varchar(50) |	 NO|		|NULL|		
|price	|       float	    |    NO|		|NULL|		
|details|	    text	    |    NO|		|NULL|		
|imgpath|	    varchar(100)|	 NO|		|NULL|		
|uploaded_by|	int(11)	    |    NO|		|NULL|		
|pid	|       int(11)	    |    NO|	PRI |NULL|	auto_increment|	
|time	|       timestamp	|    NO|		|current_timestamp()|		

```sql 
    CREATE TABLE `product` (
    product_name varchar(50) NOT NULL,
    price float NOT NULL,
    details text NOT NULL,
    imgpath varchar(100) NOT NULL,
    uploaded_by int(11) NOT NULL,
    pid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

8. create a new table with name `cart` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|cartid	    |int(11)	|NO|	PRI |NULL|	auto_increment|	
|pid	    |int(11)	|NO|		|NULL|		
|userid	    |int(11)	|NO|		|NULL|		
|seller_id	|int(11)	|NO|		|NULL|		
|time	    |timestamp	|NO|		|current_timestamp()|

```sql 
    CREATE TABLE `cart` (
    cartid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pid int(11) NOT NULL,
    userid int(11) NOT NULL,
    seller_id int(11) NOT NULL,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

9. create a new table with name `wishlist` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|cartid	|int(11)	|NO		|NULL|		
|pid	|int(11)	|NO		|NULL|		
|userid	|int(11)	|NO		|NULL|		
|time	|timestamp	|YES	|current_timestamp()|

```sql 
    CREATE TABLE `wishlist` (
    cartid int(11) NOT NULL,
    pid int(11) NOT NULL,
    userid int(11) NOT NULL,
    time timestamp NULL DEFAULT CURRENT_TIMESTAMP);
```
10. create a new table with name `address` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|address_id	|int(11)	    |NO|PRI 	|NULL|	auto_increment|	
|title	    |varchar(50)	|NO|		|NULL|		
|userid	    |int(11)	    |NO|		|NULL|		
|name	    |varchar(50)	|NO|		|NULL|		
|state	    |varchar(50)	|NO|		|NULL|		
|city	    |varchar(50)	|NO|		|NULL|		
|landmark	|varchar(50)	|NO|		|NULL|		
|pin_code	|int(11)	    |NO|		|NULL|		
|contact	|varchar(50)	|NO|		|NULL|		
|time	    |timestamp	    |NO|		|current_timestamp()|

```sql 
    CREATE TABLE `address` (
    address_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(50) NOT NULL,
    userid int(11) NOT NULL,
    name varchar(50) NOT NULL,
    state varchar(50) NOT NULL,
    city varchar(50) NOT NULL,
    landmark varchar(50) NOT NULL,
    pin_code int(11) NOT NULL,
    contact varchar(50) NOT NULL,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```	

11 create a new table with name `orders` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|orderid	|int(11)	|NO| PRI|NULL|	auto_increment|
|pid	    |int(11)	|NO| 	|NULL|		
|userid	    |int(11)	|NO| 	|NULL|		
|address_id	|int(11)	|NO| 	|NULL|		
|seller_id	|int(11)	|NO| 	|NULL|		
|time	    |timestamp	|NO| 	|current_timestamp()|

```sql 
    CREATE TABLE `orders` (
    orderid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pid int(11) NOT NULL,
    userid int(11) NOT NULL,
    address_id int(11) NOT NULL,
    seller_id int(11) NOT NULL,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

11. Open your browser and go to `http://localhost/ecommerce-web/`

### note: this project is not completed yet i need to add some more features and sections in this project

## Features
- login and register
- Customer side
    - add to cart
    - add to wishlist
    - remove from cart
    - remove from wishlist
    - place order
    - add address
    - view orders
    - view cart
    - view wishlist
    - view profile
    - view products(home page)
- Vendor side
    - upload product
    - edit product
    - delete product
    - view orders from customers with address
    - view products
    - view profile

yet to add some more features like search, filter, categorized products,reviews, handle multiple address, etc.

## Take Helps
- [Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/) navbar, card, form, toast, style etc.

## Difficulties
- Edit product <br>
handled default value for input file in edit_product.php page if user not select any image then it will not update the image path in database
```php
if($_FILES['img_path']['product_name']==""){
        $query="UPDATE `product` SET `product_name`='$product_name',`price`=$price,`details`='$details',`uploaded_by`=$userid WHERE `pid`=$pid";
        $result=mysqli_query($conn,$query);
    }else{
        $dest_img_path="../shared/img/".$_FILES['img_path']['product_name'];
        move_uploaded_file($_FILES['img_path']['tmp_name'],$dest_img_path);

        $query="UPDATE `product` SET `product_name`='$product_name',`price`=$price,`details`='$details',`imgpath`='$dest_img_path',`uploaded_by`=$userid WHERE `pid`=$pid";
        $result=mysqli_query($conn,$query);
    }
```
- connect customer orders to vendor <br>
when customer place order then it will store in orders table with seller_id and address_id so that vendor can see the orders with address and that order details is only visible to that vendor

## [Screenshots](Screenshots/)




