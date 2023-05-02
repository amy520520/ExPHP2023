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
$totalRows =$pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; 
//計算總頁數
if($totalRows > 0){
    $totalPages = ceil($totalRows / $perPage);
    if($page > $totalPages){
    header("Location: list.php?page={$totalPages}");
    exit;
    }
    $sql = sprintf("SELECT * FROM `address_book`ORDER BY sid DESC LIMIT %s,%s",($page-1)*$perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}


echo json_encode([
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'page' => $page,
    'rows'=> $rows,
    'perPage' => $perPage,

    ]) ;//拿到陣列

exit; //結束 php 程式執行
?>

<?php include './parts/html-head.php' ?>

<?php include './parts/navbar.php' ?>

  <div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">姓名</th>
                    <th scope="col">手機</th>
                    <th scope="col">電郵</th>
                    <th scope="col">生日</th>
                    <th scope="col">地址</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $r): ?>
                    <tr>
                        <td><?= $r['sid'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['mobile'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['birthday'] ?></td>
                        <td><?= $r['address'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>            
        </div>
    </div>
  </div>


    
    
<?php include './parts/scripts.php' ?>
<?php include './parts/html-foot.php' ?>