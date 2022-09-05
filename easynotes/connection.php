<?php
$serevername="localhost";
$username="root";
$password="";
$dbase="dbms";
$conn = mysqli_connect($serevername,$username,$password,$dbase);
    if(!$conn){
        die("connection faild!" . mysqli_connect_error());
    }


?>