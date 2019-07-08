<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>入力内容チェック</title>
</head>
<body>

<?php

$post=$_POST;
$pro_name=$post['name'];
$pro_comment=$post['comment'];



if($pro_name=='')
{
	print '名前が入力されていません。<br />';
}
else
{
	print '名前:';
	print $pro_name;
	print '<br />';
}

if($pro_comment=='')
{
	print '感想が入力されていません。<br />';
}
else
{
	print '感想:';
	print $pro_comment;
	print '<br />';
}




if($pro_name=='' || $pro_comment=='')
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の内容を追加します。<br />';
	print '<form method="post" action="add_done.review.php">';

	print '<input type="hidden" name="name" value="'.$pro_name.'">';
	print '<input type="hidden" name="comment" value="'.$pro_comment.'">';

	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="登録">';
	print '</form>';
}

?>

</body>
</html>
