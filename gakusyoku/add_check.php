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
$pro_shinagire=$post['shinagire'];
$pro_nedann=$post['nedann'];


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

if($pro_shinagire=='')
{
	print '品切れかどうか入力されていません。<br />';
}
else
{
	print '品切れ:';
	print $pro_shinagire;
	print '<br />';
}

if($pro_nedann=='')
{
	print '値段が入力されていません。<br />';
}
else
{
	print '値段:';
	print $pro_nedann;
	print '<br />';
}






if($pro_name=='' || $pro_shinagire=='' || $pro_nedann=='')
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の内容を追加します。<br />';
	print '<form method="post" action="add_done.php">';

	print '<input type="hidden" name="name" value="'.$pro_name.'">';
	print '<input type="hidden" name="shinagire" value="'.$pro_shinagire.'">';
	print '<input type="hidden" name="nedann" value="'.$pro_nedann.'">';

	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="登録">';
	print '</form>';
}

?>

</body>
</html>
