<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メニュー入力</title>
</head>
<body>
メニュー入力<br />
<br />


<form method="post" action="add_check.review.php">
            名前<input type="text" name="name" value="" />
            コメント<textarea name="comment" rows="4" cols="20"></textarea>
            <input type="submit" name="send" value="書き込む" />
            <br/><br/><br/>
            <input type="button" onclick="history.back()" value="戻る">
           
</form>
</body>
</html>
