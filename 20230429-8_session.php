<?php

// session_start(); //啟用session功能-方式1

if(! isset($_SESSION)){
    session_start();  //啟用session功能-方式2
}

if(! isset($_SESSION['my_var'])){
    //my_var:session變數
    $_SESSION['my_var'] = 0; //設定
}

$_SESSION['my_var']++;//設定

echo $_SESSION['my_var'];//讀取
