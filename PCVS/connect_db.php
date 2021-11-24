<?php

$host= "localhost";
$uname= "root";
$password = "";

$db_name = "pcvs_db";

$connect = mysqli_connect($host, $uname, $password, $db_name);

if ($connect) {
	echo "Connect Successfull";
}
else {
	echo "Connection failed!";
}
?>