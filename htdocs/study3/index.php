<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品一覧</title>
</head>
<body>

<?php

try
{

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,price FROM mst_product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '商品一覧<br /><br />';



//検索キーワード入力
print '<form method="get" action="">';
print '検索キーワード';
print '<input type="text" name="keyword">';
print '<input type="submit" value="検索">';
print '</form>';

//検索キーワード代入
if (isset($_GET['keyword'])){
	$keyword=$_GET['keyword'];
}
else{
	$keyword='';
}

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	//検索処理
	if (($keyword==='')||(strpos($rec['name'],$keyword)!==false)){
		print $rec['code'].' ';
		print $rec['name'].' ';
		print $rec['price'].' ';
		print '<br />';
	}
}


print '<br />';
print '<a href="add.php">商品入力</a><br />';

print '<br />';
print '<form method="get" action="disp.php">';
print '商品表示：番号';
print '<input type="text" name="procode" style="width:20px">';
print '<input type="submit" value="決定">';
print '</form>';
print '<br />';
print '<form method="get" action="edit.php">';
print '商品修正：番号';
print '<input type="text" name="procode" style="width:20px">';
print '<input type="submit" value="決定">';
print '</form>';
print '<br />';
print '<form method="get" action="delete.php">';
print '商品削除：番号';
print '<input type="text" name="procode" style="width:20px">';
print '<input type="submit" value="決定">';
print '</form>';
}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>
