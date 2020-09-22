<?php

$DBserver = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "reg";

$conn = mysqli_connect($DBserver, $DBusername, $DBpassword, $DBname);

if (!$conn) {
    die("Connection error" . mysqli_connect_error());
}