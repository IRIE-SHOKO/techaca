<html>
<head>
    <title>電卓</title>
</head>
<body>
<!--フォームを作る-->
<form method="GET" action="conputer.php">
    計算：
    <input type="text" name="calculator" size="3">
    <select name="operator">
        <option value="1">＋</option>
        <option value="2">－</option>
        <option value="3" selected>×</option>
        <option value="4" selected>÷</option>
    </select>
    <input type="text" name="calculator2" size="3">
    ＝
    <input type="submit" value="計算"></form>
    <br/>
    <?php
    print '計算結果　<br/>';

//フォームに入力、選択されたものと対応させる
//PHPでPOSTしたデータを受け取る
    if(isset($_POST["calculator"]) && $_POST["calculator2"] && $_POST["operator"]) {
        $number1 = $_POST["calculator"];
        $number2 = $_POST["calculator2"];
        $operand = $_POST["operator"];
    };

     //$number1 = "5";
    //$number2 = "10";

    //入力されたものを計算して、表示する
        if (isset($operand)) {
            if ($operand == "1") {
                print $number1 + $number2;
            } elseif ($operand == "2") {
                print $number1 - $number2;
            } elseif ($operand == "3") {
                print $number1 * $number2;
            } else{print $number1 / $number2;}
        };


?>


</body>
</html>



