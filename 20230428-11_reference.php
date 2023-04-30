<?php

$a = [
    'id' =>17,
    'name' => 'david' ,
    
];

$b = $a;

$c= &$a;

$a['id'] =36;
print_r($a);
print_r($b);
print_r($c);



?>