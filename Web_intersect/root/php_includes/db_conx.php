<?php 

$db_conx = mysqli_connect("localhost", "Slavakov", "23Nb8Cfww7DccamQ", "engolingo");
//evauate the connection 
if(mysqli_connect_errno ()) {
	echo mysqli_connect_error();
	exit();

}
?>