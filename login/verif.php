<?php

session_start();

$DB_host = "10.2.2.34";
$DB_user = "IMIEforum";
$DB_pass = "root";
$DB_name = "IMIEforum";

try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}


include_once ('Class.User.php');
$user = new USER($DB_con);

// $password = "123456";
//      $hash = password_hash($passwod, PASSWORD_DEFAULT);
//      $hashed_password = "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa";

     /*
     "123456" will become "$2y$10$BBCpJxgPa8K.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa"
     */

     $password = "123456";
     $hashed_password = "$2y$10.iw9ZporxzuW2Lt478RPUV/JFvKRHKzJhIwGhd1tpa";
     password_verify($password, $hashed_password);

     /*
      if the password match it will return true.
     */
