<?php

$servername = "localhost";
//if using online server use hosting company's server name
$dBUserName = "root";
$dBPassword ="";
$dBName="loginsystem";

$conn = mysqli_connect($servername, $dBUserName, $dBPassword,$dBName);

if(!$conn){
	die("Connection Failed:".mysqli_connect_error());
}