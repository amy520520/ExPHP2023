<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>

        <?php
        // var_dump($_GET);        
        ?>
    </pre>

    <form method="get">
        <!-- <input type="text" name="account" placeholder="帳號"> -->
        <br>
        <!-- <input type="text" name="password" placeholder="密碼"> -->
        <br>
        <!-- <input type="submit"> -->
        <input type="text" name="age" placeholder="age">
    </form>

    <?php
    
    //isset() 是 PHP 中的內置函數，用於檢查變數是否已設置並且非空。
    //intval() 是 PHP 中的一個內置函數，用於將字符串轉換為整數。
    $age = isset($_GET['age']) ? intval($_GET['age']) : 0 ;

    if($age !==0 ){
        
        if($age>=18){
            echo'<h2>請勿進入';
            echo '<img src="imgs/01.png" alt=""  >';

        } else {
            echo'<h2>歡迎光臨</h2>';
            echo '<img src="imgs/02.png" alt="">';
        }
    }
    ?>
<!-- 
    <img src="imgs/01.png" alt="">
    <img src="imgs/02.png" alt=""> -->

</body>
</html>