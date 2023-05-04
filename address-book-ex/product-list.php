<?php
include './parts/db-connect.php';
$title = '商品列表';
$pageName = 'product-list';

$perPage = 4; //每一頁4筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header("Location: list.php"); //設定回應的檔頭
    //Location 跳轉到別一個頁面 (redirect)
    exit;
}

$where = ' WHERE 1 ';//如果有很多頁要加
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0; //所有商品

if(! empty($cate)){
    $where .=" AND category_sid={$cate}";
}


$totalPages = 0; #總頁數的預設值
$row = []; # 分頁資料

$t_sql = "SELECT COUNT(1) FROM products $where";
//計算總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
//計算總頁數
if ($totalRows > 0) {
    $totalPages = ceil($totalRows / $perPage);
    if ($page > $totalPages) {
        header("Location: product-list.php?page={$totalPages}"); //跳轉到哪支php
        exit;
    }
    $sql = sprintf("SELECT * FROM `products`$where ORDER BY sid DESC LIMIT %s,%s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

# 取得分類資料
$c_sql = " SELECT * FROM `categories` WHERE parent_sid=0" ; 
$cates = $pdo->query($c_sql)->fetchAll();





?>

<?php include './parts/html-head.php' ?>

<?php include './parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <a type="button" class="btn btn-outline-primary" href="?cate=0">所有商品</a>
                <?php foreach($cates as $c): ?>
                    <a type="button" class="btn btn-outline-primary" href="?cate=<?=$c['sid']?>"><?=$c['name']?></a></button>
                <?php endforeach ?>    
            </div>
        </div>
        <div class="col-9">

            <div class="row">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item<?= $i == 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page - 1 ?>">
                                <i class="fa-thin fa-circle-chevron-left"></i>
                            </a>
                        </li>

                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"> <?= $i ?> </a>
                            </li>
                        <?php endfor ?>

                        <li class="page-item<?= $i == $totaPages ? 'disabled' : '' ?> ">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">
                                <i class="fa-thin fa-circle-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php foreach ($rows as $r) : ?>
                    <div class="col-3">
                        <div class="card">
                            <img src="imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $r['bookname'] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</div>





<?php include './parts/scripts.php' ?>
<?php include './parts/html-foot.php' ?>