<?php

$con = mysqli_connect("localhost","root","","users");
if($con == null)
{
    die("database failed to connect");
}
$conn = new mysqli("localhost","root","","users");

?>