<?php

$dbhost = "localhost";
$dbuser = "uthyrning";
$dbpass = "uthyrning";
$dbname = "uthyrning";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect");
}
?>