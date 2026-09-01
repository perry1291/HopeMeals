<?php

$connection = mysqli_connect("localhost", "root", "");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$db = mysqli_select_db($connection, "hopemeals");

if (!$db) {
    die("Database selection failed: " . mysqli_error($connection));
}

?>