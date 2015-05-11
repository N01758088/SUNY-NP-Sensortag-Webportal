<?php

$con=mysql_connect('127.0.0.1', 'root', 'password');
mysql_select_db("db name", $con); //Name of the database

$row_id=$_POST['row_id'];
$device_id=$_POST['device_id'];
$temperature=$_POST['temperature'];
$humidity=$_POST['humidity'];
$barometer=$_POST['barometer'];
$timestamp=$_POST['timestamp'];

mysql_query("insert into sensor_table(row_id, device_id, temperature, humidity, barometer, timestamp) values('{$row_id}', '{$device_id}', '{$temperature}', '{$humidity}', '{$barometer}', '{$timestamp}')");

//The table name is sensor_table
//mysql_close();
?>
