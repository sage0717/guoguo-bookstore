<?php
$rows = array_map('str_getcsv', file('books.csv'));
$header = array_shift($rows);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title>果果电子书店</title>
<style>
body{
    margin:0;
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI";
    background:#f4f6f8;
}
h1{
    text-align:center;
    padding:30px 0 10px;
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:20px;
    padding:30px;
}
.card{
    background:#fff;
    border-radius:14px;
    padding:20px;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
}
.card h3{
    margin:0 0 6px;
}
.price{
    color:#007aff;
    font-weight:600;
    margin:10px 0;
}
a.btn{
    display:inline-block;
    padding:8px 14px;
    border-radius:8px;
    background:#007aff;
    color:#fff;
    text-decoration:none;
}
</style>
</head>

<body>

<h1>📚 果果电子书店</h1>

<div class="grid">
<?php foreach($rows as $r):
    $b = array_combine($header,$r);
?>
<div class="card">
    <h3><?= $b['title'] ?></h3>
    <p><?= $b['subtitle'] ?></p>
    <div class="price">
        ￥<?= $b['price_rmb'] ?> /
        IDR <?= $b['price_idr'] ?> /
        $<?= $b['price_usd'] ?>
    </div>
    <a class="btn" href="book.php?id=<?= $b['id'] ?>">查看详情</a>
</div>
<?php endforeach; ?>
</div>

</body>
</html>
