<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "bestbooks";

$con = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$con){
    die("connection failed: " . mysqli_connect_error());
}