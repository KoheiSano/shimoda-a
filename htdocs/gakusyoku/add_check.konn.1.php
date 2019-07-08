<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>入力内容チェック</title>
</head>
<body>

<?php

$post=$_POST;
$pro_time=$post['time'];
$pro_konn=$post['konn'];


if($pro_time=='')
{
	print '日時が入力されていません。<br />';
}
else
{
	print '日時:';
	print $pro_time;
	print '<br />';
}

if($pro_konn=='')
{
	print '混雑度が入力されていません。<br />';
}
else
{
	print '混雑度:';
    print $pro_konn;
    print '%';
	print '<br />';
}






if($pro_time=='' || $pro_konn=='')
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の内容を追加します。<br />';
	print '<form method="post" action="add_done.konn.1.php">';

	print '<input type="hidden" name="time" value="'.$pro_time.'">';
	print '<input type="hidden" name="konn" value="'.$pro_konn.'">';

	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="登録">';
	print '</form>';
}

?>

</body>
</html>
