<?php 
//連資料庫&撈資料

include './parts/db-connect.php';
$title = '列表';



$perPage = 5; //每一頁5筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if($page<1){
    header("Location: list.php"); //設定回應的檔頭
    //Location 跳轉到別一個頁面 (redirect)
    exit;
}

$totalPages = 0; #總頁數的預設值
$row = []; # 分頁資料

$t_sql = "SELECT COUNT(1) FROM address_book" ;

//計算總筆數
$tota1Rows =$pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; 
//計算總頁數
if($totalRows > 0){
    $totalPages = ceil($totalRows / $perPage);
    if($page > $totalPages){
    header("Location: list.php?page={$totalPages}");
    exit;
    }
    $sql = sprintf("SELECT * FROM `address_book` LIMIT %s,%s",($page-1)*$perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}


echo json_encode([
    'totalRows' => $tota1Rows,
    'totalPages' => $totalPages,
    'page' => $page,
    'rows'=> $rows,
    'perPage' => $perPage,

    ]) ;//拿到陣列

exit; //結束 php 程式執行
?>

<?php include './parts/html-head.php' ?>

<?php include './parts/navbar.php' ?>

  <div class="container"></div>


    
    
<?php include './parts/scripts.php' ?>
<?php include './parts/html-foot.php' ?>