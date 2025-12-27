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
if(!$book){ exit('未找到商品'); }
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title>支付 - <?= $book['title'] ?></title>
<style>
body{font-family:-apple-system;padding:40px;max-width:720px;margin:auto}
.box{background:#f8f9fb;padding:20px;border-radius:12px}
</style>
</head>

<body>

<h2>📕 <?= $book['title'] ?></h2>

<div class="box">
<p><strong>价格</strong></p>
<ul>
<li>人民币：￥<?= $book['price_rmb'] ?></li>
<li>印尼盾：IDR <?= $book['price_idr'] ?></li>
<li>美元：$<?= $book['price_usd'] ?></li>
</ul>

<p><strong>支付方式</strong></p>
<ul>
<li>微信支付 / 支付宝（扫码或转账）</li>
<li>BCA 银行转账（IDR）</li>
</ul>

<p><strong>付款后请联系我发货：</strong></p>
<ul>
<li>WhatsApp：+62 852 8266 1513</li>
<li>微信：sage08090717</li>
<li>邮箱：xiuqiaojiang35@gmail.com</li>
</ul>

<p style="color:#c00;margin-top:15px">
⚠️ 本商品为数字资料，人工发送，<br>
一经发出不支持退货退款。
</p>
</div>

</body>
</html>
