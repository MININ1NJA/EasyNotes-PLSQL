<?php
include 'connection.php';

$username = $_POST["username"];
$password = $_POST["password"];
$query="select login('$username','$password');";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

if ($row[0]==1){

    ?>
         <script>
           alert('Login  Successfull');
           window.location.assign('add_notes.html')
         </script>
    <?php


}else{

    ?>
    <script>
      alert('Login  Failed');
      window.location.assign('index.html')
    </script>
    <?php

}
?>
