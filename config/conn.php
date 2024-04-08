<?php

//Database pertama...

$hostname   = "localhost";
$username   = "root";
$password   = "password";
$database   = "db_skk";

$con = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error($con));

//Database kedua....

$hostname   = "localhost";
$username   = "root";
$password   = "password";
$database   = "scg_test";

$con2 = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error($con));
