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
    password varchar(100) NOT NULL,
    user_type varchar(20) NOT NULL,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
    -- ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

7. create a new table with name `product` by run this sql query in console

| Field	 |   Type	|  Null | Key | Default	|	Extra|
|:---:|:---:|:---:|:---:|:---:|:---:|
|name	|       varchar(50) |	 NO|		|NULL|		
|price	|       float	    |    NO|		|NULL|		
|details|	    text	    |    NO|		|NULL|		
|imgpath|	    varchar(100)|	 NO|		|NULL|		
|uploaded_by|	int(11)	    |    NO|		|NULL|		
|pid	|       int(11)	    |    NO|	PRI |NULL|	auto_increment|	
|time	|       timestamp	|    NO|		|current_timestamp()|		

```sql 
    CREATE TABLE `product` (
    name varchar(50) NOT NULL,
    price float NOT NULL,
    details text NOT NULL,
    imgpath varchar(100) NOT NULL,
    uploaded_by int(11) NOT NULL,
    pid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
    -- ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
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
    pid int(11) NOT NULL,
    userid int(11) NOT NULL,
    time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);
    --ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
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
    -- ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

10. Open your browser and go to `http://localhost/ecommerce-web/`