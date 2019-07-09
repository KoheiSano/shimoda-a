<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メニュー入力</title>
</head>
<body>
メニュー入力<br />
<br />

<form method="post" action="add_check.1.php">
名前を入力してください。<br />
<input type="text" name="name" style="width:100px"><br />
品切れですか？<br />
<input type="text" name="shinagire" style="width:100px"><br />
価格を入力してください。<br />
<input type="text" name="nedann" style="width:50px"><br />

<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="確認">
</form>

</body>
</html>
