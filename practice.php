<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>自由にPHPを書いてみよう</title>
</head>
<body>
<?php
const DISCOUNT = 0.9;
$price = 500;
$sum = $price * DISCOUNT;
print "値引き後の価格は{$sum}円です。";

$msg = 'こんにちは、世界！';
print $msg; //結果：こんにちは、世界！
//リスト2.2
echo '<br>';
$x = 'title';
$title = 'PHP : Hypertext Preprocessor';
print $$x;
//リスト2.3
echo '<br>';
const TAX = 1.05;
$price = 1000;
$sum = $price * TAX;
print $sum;
//リスト2.4
echo '<br>';

//if文　分岐構文と呼ばれる　電卓で必要なエッセンス
$score = 35;
if($score > 80) {
    echo 'great!';
}elseif($score > 60){
    echo 'good!';
}else{
    echo 'so-so...';
}

//ループ処理　while
$i = 0;
while($i < 10){
    echo $i;
    $i++;
}

/**for文→あと何回やるか笑
 *formを送る機能がデフォルトである。
 * 受け取った処理をどうするかは文章で書かなければならない
 * $_POST
 * $_GET
*/
var_dump(__LINE__);
var_dump(__FILE__);
var_dump(__DIR__);
/**
 * Created by PhpStorm.
 * User: shoko
 * Date: 2016/04/29
 * Time: 23:58
 */
?>
</body>
</html>


