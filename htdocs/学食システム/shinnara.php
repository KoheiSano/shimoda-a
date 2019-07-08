<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>メニュー一覧</title>
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

$sql='SELECT syouhinn,shinagire,campus,nedann FROM shinagire WHERE 1';
$stmt->execute();

$dbh=null;

print 'メニュー一覧<br /><br />';
print '<a href="add form(add).php">登録はこちら</a><br />';
//---------------------------------------------------------


//検索キーワード代入
//$keyword=$_GET['keyword'];//$keywordが空のときエラー
if (isset($_GET['keyword'])){
	$keyword=$_GET['keyword'];
}
else{
	$keyword='';
}
print '<br />';


while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	//検索処理
	if (($keyword==='')||(strpos($rec['syouhinn'],$keyword)!==false)){
	//if (strpos($rec['syouhinn'],$keyword)!==false){//$keywordが空のときエラー
		print $rec['syouhinn'].' ';
		print $rec['shinagire'].' ';
		print $rec['campus'].' ';
		print $rec['nedann'].' ';
		print '<br />';
	}
}

print '<a href="add form(add).php">登録はこちら</a><br />';
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
}

catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>
