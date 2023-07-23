# ecommerce-web
### This is a simple ecommerce website with php and mysql and this is not completed yet
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
    password varchar(100),
    user_type varchar(20),
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
    price float,
    deta
    imgpath varchar(100),
    uploaded_by int(11),
    pid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

8. create a new table with name `cart` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|cartid	|int(11)	|NO|	PRI |NULL|	auto_increment|	
|pid	|int(11)	|NO|		|NULL|		
|userid	|int(11)	|NO|		|NULL|		
|time	|timestamp	|NO|		|current_timestamp()|

```sql 
    CREATE TABLE `cart` (
    cartid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pid int(11),
    userid int(11),
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
    cartid int(11),
    pid int(11),
    userid int(11),
    time timestamp NULL DEFAULT CURRENT_TIMESTAMP);
```

10. create a new table with name `orders` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|orderid	|int(11)	|NO	|PRI	|NULL|	auto_increment|
|pid	    |int(11)	|NO	|	    |NULL|		
|userid	    |int(11)	|NO	|	    |NULL|
|address_id	|int(11)	|NO	|	    |NULL|
|seller_id	|int(11)	|NO	|	    |NULL|		
|time	    |timestamp	|NO	|	    |current_timestamp()|

```sql 
    CREATE TABLE `order` (
    orderid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pid int(11) ,
    userid int(11) ,
    address_id int(11) ,
    seller_id int(11) ,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

11. create a new table with name `addresses` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|address_id	|int(11)	    |NO|	PRI	|NULL|	auto_increment|	
|title	    |varchar(50)	|NO|		|NULL|		
|userid	    |int(11)	    |NO|		|NULL|		
|state	    |varchar(50)	|NO|		|NULL|		
|city	    |varchar(50)	|NO|		|NULL|		
|landmark	|varchar(50)	|NO|		|NULL|		
|pin_code	|int(11)	    |NO|		|NULL|		
|contact	|varchar(50)	|NO|		|NULL|		
|time	    |timestamp	    |NO|		|current_timestamp()|

```sql 
    CREATE TABLE `addresses` (
    address_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(50),
    userid int(11),
    state varchar(50),
    city varchar(50),
    landmark varchar(50),
    pin_code int(11),
    contact varchar(50),
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
```

13. Open your browser and go to `http://localhost/ecommerce-web/`