<?php

$conn = mysqli_connect("localhost","root","","shohoz_bus");

if(!$conn){
    echo("Connection Failed". mysqli_connect_error());
}
?>