<?php

$db_host = 'localhost';
$db_name = 'proj57';
$db_user = 'root';
$db_pass = 'root';

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_option = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn,$db_user, $db_pass, $pdo_options);

if(! isset($_SESSION)){
    session_start();
  }