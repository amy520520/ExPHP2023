<?php

include './20230429-1_db-connect.php '; //插入此檔內容

// $stmt = $pdo-> query("SELECT * FROM address_book LIMIT 5");//從address_book資料庫中取前5筆
// echo json_encode($stmt->fetchAll());//陣列全5筆資料

$row = $pdo-> query("SELECT * FROM address_book LIMIT 5")->fetchAll();
echo json_encode($row);