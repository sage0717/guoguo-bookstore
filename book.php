<?php
$rows = array_map('str_getcsv', file('books.csv'));
$header = array_shift($rows);
$id = $_GET['id'] ?? '';

$book = null;
foreach($rows as $r){
    $b = array_combine($header,$r);
    if($b['id'] == $id){
        $book = $b;
        break;
    }
}
if(!$book){ exit('未找到书籍'); }
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title><?= $book['title'] ?></title>
<style>
body{font-family:-apple-system;padding:40px;max-width:720px;margin:auto}
.price{font-size:18px;color:#007aff;font-weight:600}
a.btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 18px;
    border-radius:10px;
    background:#007aff;
    color:#fff;
    text-decoration:none;
}
</style>
</head>

<body>

<h1><?= $book['title'] ?></h1>
<h3><?= $book['subtitle'] ?></h3>

<p><?= $book['desc'] ?></p>

<p class="price">
价格：
￥<?= $book['price_rmb'] ?> /
IDR <?= $book['price_idr'] ?> /
$<?= $book['price_usd'] ?>
</p>

<a class="btn" href="pay.php?id=<?= $book['id'] ?>">立即购买</a>

</body>
</html>
