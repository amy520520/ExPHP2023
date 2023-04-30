<?php

session_start(); //啟用session功能-方式1

echo json_encode($_SESSION['my_var']);
