<?php

$sname= "localhost";

$unmae= "ankesh";

$password = "GmZ)6-d?RCk,!NALh";

$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}