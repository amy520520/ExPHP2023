<?php

include './20230429-1_db-connect.php '; //插入此檔內容

$stmt = $pdo-> query("SELECT * FROM address_book LIMIT 5");//從address_book資料庫中取前5筆

while($row = $stmt->fetch()){
    echo json_encode($row). '<br>';
} //用迴圈拿前5筆資料
