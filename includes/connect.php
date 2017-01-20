<?php

define("DB_HOST", "localhost");
define("DB_NAME", "site_db");
define("DB_USER", "site_user");
define("DB_PASS", "rw8~BSf2cN44");

$connect_site = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Database Connection Failed " . mysqli_connect_error());
mysqli_select_db($connect_site, DB_NAME) or die("Database Selection Failed " . mysqli_error($connect_site));
?>