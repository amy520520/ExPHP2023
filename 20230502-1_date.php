<pre><?php
# date_default_timezone_set() # 修改時區，當頁有效
#echo time()
// date_default_timezone_set('Europe/London'); #修改時區,當頁有效

echo date("Y-m-d H:i:s");
echo"\n";

echo date("Y-m-d H:i:s", time()+14*24*60*60);

$t= strtotime('2023-05-17'); #timestamp


?></pre>