<?php
require('connect_db.php');
session_start();

$error = '';
$validate = '';

if (isset($_POST['submit'])) {
    $username = stripcslashes($_POST['username']);
    $username = mysql_real_escape_string($connect, $username);
    $password = stripcslashes($_POST['password']);
    $password = mysql_real_escape_string($connect, $password);
    $repass = stripcslashes($_POST['repass']);
    $repass = mysql_real_escape_string($connect, $repass);
    $fullName = stripcslashes($_POST['fullName']);
    $fullName = mysql_real_escape_string($connect, $fullName);
    $email = stripcslashes($_POST['email']);
    $email = mysql_real_escape_string($connect, $email);
    $ICPassport = stripcslashes($_POST['{ICPassport}']);
    $ICPassport = mysql_real_escape_string($connect, $ICPassport);

    if(!empty(trim($username)) && !empty(trim($password)) && !empty(trim($repass)) && !empty(trim($fullName)) && !empty(trim($email)) && !empty(trim($ICPassport))){
        if ($password == $repass) {
            if (check_fullName($fullName, $connect)==0) {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO patient (username,password,fullName,email,ICPassport) VALUES ('$username','$password','$fullName','$email','$ICPassport')";
                $result = mysqli_
            }
        }
    }
}