<?php
$conn = mysqli_connect("localhost","root","","shohoz_bus");
//$conn = mysqli_connect("sql211.iceiy.com","icei_38176063","Imamhossain09","icei_38176063_shohoz_bus");

if(!$conn){
    echo("Connection Failed". mysqli_connect_error());
}
?>