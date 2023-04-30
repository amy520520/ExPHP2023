<?php
require './20230429-1_db-connect.php '; //插入此檔內容

$sql = "SELECT * FROM address_book LIMIT 25"; //sql部分獨立出來
$row = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">姓名</th>
      <th scope="col">手機</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($row as $r): ?>
        <tr>
            <td><?= $r['sid'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['mobile'] ?></td>
            <td><?= $r['email'] ?></td>

        </tr>
    <?php endforeach ?>    

  </tbody>
</table>
                
                
            </div>
        </div>
    </div>
    
</body>
</html>