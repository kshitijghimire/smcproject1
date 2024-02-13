<?php
// create connection
$server="localhost";
$username="root";
$password="";
$db="bcaecommerce";
$conn=mysqli_connect($server,$username,$password,$db);
// check connection

if(!$conn)
{
    die("connection error");
}
