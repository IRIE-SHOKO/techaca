<html>
<head >
    <meta charset="UTF-8">
    <title>電卓</title>
</head>
<body>
<!--入力フォームを作る-->
<form name="form1" method="POST" action="conputer.php">
    計算：
    <input type="text" name="calculator" size="3">
    <select name="operator">
        <option value="1">＋</option>
        <option value="2">－</option>
        <option value="3">×</option>
        <option value="4">÷</option>
    </select>
    <input type="text" name="calculator2" size="3">
    ＝
    <input type="submit" value="計算">
</form>
<br>
<p> 計算結果</p>
<?PHP
/*PHPでPOSTしたデータを受け取る*/
if(isset($_POST["calculator"]) && isset($_POST["calculator2"]) && isset($_POST["operator"])) {
    $number1 = $_POST["calculator"];
    $number2 = $_POST["calculator2"];
    $operand = $_POST["operator"];
    /*入力されたものを計算して、表示
    する*/
    //入力フォームに数字が入っているかを確認する
    //入力されたものが数字か確認する
    if (is_numeric($number1) && is_numeric($number2)) {
        switch ($operand) {
            case '1':
                print $number1 + $number2;
                break;
            case "2":
                print $number1 - $number2;
                break;
            case "3":
                print $number1 * $number2;
                break;
            case "4":
                //0除算子の処理を行う
                //
                if($number2 == 0){
                    print '分母に0を入れることはできません。';
                }else {
                    print $number1 / $number2;
                }
                break;
        }
    } else {
        print '数値を入力してください。';
    }
}
?>


</body>
</html>