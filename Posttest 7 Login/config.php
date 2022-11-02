<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "pertemuan7";

$db = new mysqli($server,$username,$password,$db_name);

if(!$db){
    die("Gagal Terhubung : ".$db->connect_error);
}