<html>
<head>
    <title>電卓</title>
</head>
<body>
<!--入力フォームを作る-->
<form method="POST" action="conputer.php">
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

    /*PHPでPOSTしたデータを受け取る*/
    if(isset($_POST["calculator"]) && $_POST["calculator2"] && $_POST["operator"]) {
        $number1 = $_POST["calculator"];
        $number2 = $_POST["calculator2"];
        $operand = $_POST["operator"];


        /*入力されたものを計算して、表示する*/
        //入力フォームに数字が入っているかを確認する
        if (isset($operand)) {

            //入力されたものが数字か確認する
            if (is_numeric($number1) && is_numeric($number2)) {
                if ($operand == "1") {
                    print $number1 + $number2;
                } elseif ($operand == "2") {
                    print $number1 - $number2;
                } elseif ($operand == "3") {
                    print $number1 * $number2;
                } elseif ($operand == "4") {
                    print $number1 / $number2;
                }
            }
        }
    }
?>


</body>
</html>
