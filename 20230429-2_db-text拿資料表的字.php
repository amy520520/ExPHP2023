<?php

include './20230429-1_db-connect.php '; //插入此檔內容

$stmt = $pdo-> query("SELECT * FROM address_book LIMIT 5");//從address_book資料庫中取前5筆

$row = $stmt->fetch(); //拿出第一筆，fetch指"拿一筆"

echo json_encode($row); //轉成json秀出來