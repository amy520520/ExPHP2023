<?php
    
    $ar = [
        'name' => [
            'frist' =>'shin' ,
            'last'=>'lin' ,
        ],
        'age' =>  '30', 
        'gender' => 'male/男性',
        'hello'
    ];


    echo json_encode($ar, JSON_UNESCAPED_UNICODE+ JSON_UNESCAPED_SLASHES)
    
    //json_decode :接受一个 JSON 编码的字符串并且把它转换为 PHP 值。



?>