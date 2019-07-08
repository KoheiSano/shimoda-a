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
//$sql='SELECT code,name,price FROM mst_product WHERE 1 ORDER BY name ASC';//昇順
//$sql='SELECT code,name,price FROM mst_product WHERE 1 ORDER BY name DESC';//降順
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '商品一覧<br /><br />';

//---------------------------------------------------------
//検索キーワード入力
print '<form method="get" action="">';
print '検索キーワード';
print '<input type="text" name="keyword">';
print '<input type="submit" value="検索">';
print '</form>';

//検索キーワード代入
//$keyword=$_GET['keyword'];//$keywordが空のときエラー
if (isset($_GET['keyword'])){
	$keyword=$_GET['keyword'];
}
else{
	$keyword='';
}
print '<br />';

//検索キーワード表示
if ($keyword!==''){
	print $keyword.'が含まれる商品';
	print '<br />';
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
	//if (strpos($rec['name'],$keyword)!==false){//$keywordが空のときエラー
		print $rec['code'].' ';
		print $rec['name'].' ';
		print $rec['price'].' ';
		print '<br />';
	}
}
//---------------------------------------------------------
//並べ替え
/*
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	$recs[]=$rec;
}
//print_r($recs);
//print '<br />';
//print '<br />';

foreach ($recs as $key => $rec) {
    $sort[$key] = $rec['name'];
}
array_multisort($sort, SORT_ASC, $recs);//昇順
//array_multisort($sort, SORT_DESC, $recs);//降順

foreach($recs as $rec){
	print $rec['code'].' ';
	print $rec['name'].' ';
	print $rec['price'].' ';
	print '<br />';
}
*/
//---------------------------------------------------------

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
