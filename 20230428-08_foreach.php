<pre>
    <?php

    $ar = [
        'name' => 'Shinder',
        'age' =>  '30', 
        2000,
        'gender' => 'male',
        'hello'
    ];

    //只拿到 value 的部份        
    foreach ($ar as $v) {
        echo "$v \n";
    }
    
    echo '----------------------------';

    //拿到kid & value
    foreach ($ar as $k => $v){
        echo "$k : $v \n";
    }


    ?>
</pre>