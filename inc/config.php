<?php

	$host = 'localhost';
	$user = 'jawad';
	$pass = 'jawadturk';
	$dbname = 'petshop';
	//mengubung ke host
	$connect = mysql_connect($host, $user, $pass) or die(mysql_error());

	//memilih database yang akan digunakan
	$dbselect = mysql_select_db($dbname);

?>
