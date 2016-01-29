<?php
//the code below shows how to create a databse table. 
include_once("php_includes/db_conx.php");




$tbl_users = "CREATE TABLE IF NOT EXISTS users (  
              id INT(11) NOT NULL AUTO_INCREMENT COMMENT ' can create up to 11 integer-number of users; -can`t be empty; - number of users auoto-increments', 
			  username VARCHAR(30) NOT NULL COMMENT ' limited by 30 charecters, 
			  email VARCHAR(255) NOT NULL COMMENT '200 is a max capacity',    
			  password VARCHAR(255) NOT NULL COMMENT'',
			  gender ENUM('m','f') NOT NULL COMMENT ' male of female option (might be Learner or Mentor option)',  
			  website VARCHAR(255) NULL COMMENT ' NULL means that it can be empty ', 
			  country VARCHAR(255) NULL COMMENT ' ', 
			  userlevel ENUM('a','b','c','d') NOT NULL DEFAULT 'a' COMMENT ' a,b,c,d define previlige. Gives default a-type. ',  
			  avatar VARCHAR(255) NULL COMMENT ' saves file name',  
			  ip VARCHAR(255) NOT NULL COMMENT ' storing user's IP addresses',  
			  signup DATETIME NOT NULL COMMENT ' provides exact sign up date and time', 
			  lastlogin DATETIME NOT NULL COMMENT ' provides last login date and time', 
			  notescheck DATETIME NOT NULL COMMENT ' saves last time a user checks notifications', 
			  activated ENUM('0','1') NOT NULL DEFAULT '0' COMMENT ' sending an email to each new memeber. Users have to click on the lin to varify the email address.',   
              PRIMARY KEY (id) COMMENT ' unique inxex; no two IDs will be the same',  
			  UNIQUE KEY username (username,email) COMMENT ' no two users can have the same sername or email'  
             )";

$tbl_users = "CREATE TABLE IF NOT EXISTS users ( 
              id INT(11) NOT NULL AUTO_INCREMENT, 
              username VARCHAR(30) NOT NULL, 
              email VARCHAR(255) NOT NULL,   
              password VARCHAR(255) NOT NULL,
              gender ENUM('m','f') NOT NULL, 
              website VARCHAR(255) NULL, 
              country VARCHAR(255) NULL, 
              userlevel ENUM('a','b','c','d') NOT NULL DEFAULT 'a', 
              avatar VARCHAR(255) NULL,
              ip VARCHAR(255) NOT NULL,
              signup DATETIME NOT NULL,
              lastlogin DATETIME NOT NULL, 
              notescheck DATETIME NOT NULL, 
              activated ENUM('0','1') NOT NULL DEFAULT '0', 
              PRIMARY KEY (id), 
              UNIQUE KEY username (username,email) 
             )";


print_r($tbl_users);
//die();
$query = mysqli_query($db_conx, $tbl_users); //param#1 link to the database connection param#2 SQL syntax. Creates table "uses" in database. 

//VAR_DUMP($query); Prints out the code #Odil
//die(); Stops script execution #Odil
//The If statement checks whether the $query was created
if ($query === TRUE) {
	echo "<h3>user table created OK :) </h3>"; 
} else {
	echo "<h3>user table NOT created :( </h3>"; 
}
//the code above explicitly describes how to create a databse table. 

$tbl_useroptions = "CREATE TABLE IF NOT EXISTS useroptions ( 
                id INT(11) NOT NULL,
                username VARCHAR(30) NOT NULL,
				background VARCHAR(255) NOT NULL,
				question VARCHAR(255) NULL COMMENT ' provides extra layer of security. When a user sigs up he chooses a question and an answer.',  
				answer VARCHAR(255) NULL COMMENT ' provides extra layer of security',    
                PRIMARY KEY (id),
                UNIQUE KEY username (username) 
                )"; 
$query = mysqli_query($db_conx, $tbl_useroptions); 
if ($query === TRUE) {
	echo "<h3>useroptions table created OK :) </h3>"; 
} else {
	echo "<h3>useroptions table NOT created :( </h3>"; 
}
////////////////////////////////////
$tbl_friends = "CREATE TABLE IF NOT EXISTS friends ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                user1 VARCHAR(16) NOT NULL COMMENT ' a person who is requestion a friendship',  
                user2 VARCHAR(16) NOT NULL COMMENT ' a person who accepts friendship',  
                datemade DATETIME NOT NULL COMMENT ' datetime when the friendship was accepted' ,  
                accepted ENUM('0','1') NOT NULL DEFAULT '0',
                PRIMARY KEY (id)
                )"; 
$query = mysqli_query($db_conx, $tbl_friends); 
if ($query === TRUE) {
	echo "<h3>friends table created OK :) </h3>"; 
} else {
	echo "<h3>friends table NOT created :( </h3>"; 
}
////////////////////////////////////
$tbl_blockedusers = "CREATE TABLE IF NOT EXISTS blockedusers ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                blocker VARCHAR(16) NOT NULL,
                blockee VARCHAR(16) NOT NULL,
                blockdate DATETIME NOT NULL,
                PRIMARY KEY (id) 
                )"; 
$query = mysqli_query($db_conx, $tbl_blockedusers); 
if ($query === TRUE) {
	echo "<h3>blockedusers table created OK :) </h3>"; 
} else {
	echo "<h3>blockedusers table NOT created :( </h3>"; 
}
////////////////////////////////////
$tbl_status = "CREATE TABLE IF NOT EXISTS status ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                osid INT(11) NOT NULL,
                account_name VARCHAR(16) NOT NULL,
                author VARCHAR(16) NOT NULL,
                type ENUM('a','b','c') NOT NULL,
                data TEXT NOT NULL,
                postdate DATETIME NOT NULL,
                PRIMARY KEY (id) 
                )"; 
$query = mysqli_query($db_conx, $tbl_status); 
if ($query === TRUE) {
	echo "<h3>status table created OK :) </h3>"; 
} else {
	echo "<h3>status table NOT created :( </h3>"; 
}
////////////////////////////////////
$tbl_photos = "CREATE TABLE IF NOT EXISTS photos ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                user VARCHAR(16) NOT NULL,
                gallery VARCHAR(16) NOT NULL,
				filename VARCHAR(255) NOT NULL,
                description VARCHAR(255) NULL,
                uploaddate DATETIME NOT NULL,
                PRIMARY KEY (id) 
                )"; 
$query = mysqli_query($db_conx, $tbl_photos); 
if ($query === TRUE) {
	echo "<h3>photos table created OK :) </h3>"; 
} else {
	echo "<h3>photos table NOT created :( </h3>"; 
}
////////////////////////////////////
$tbl_notifications = "CREATE TABLE IF NOT EXISTS notifications ( 
                id INT(11) NOT NULL AUTO_INCREMENT,
                username VARCHAR(16) NOT NULL,
                initiator VARCHAR(16) NOT NULL,
                app VARCHAR(255) NOT NULL,
                note VARCHAR(255) NOT NULL,
                did_read ENUM('0','1') NOT NULL DEFAULT '0',
                date_time DATETIME NOT NULL,
                PRIMARY KEY (id) 
                )"; 
$query = mysqli_query($db_conx, $tbl_notifications); 
if ($query === TRUE) {
	echo "<h3>notifications table created OK :) </h3>"; 
} else {
	echo "<h3>notifications table NOT created :( </h3>"; 
}
?>



