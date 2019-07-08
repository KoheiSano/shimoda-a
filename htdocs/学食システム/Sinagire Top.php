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

$sql='SELECT syouhinn,shinagire,campus FROM shinagire WHERE 1';
//$sql='SELECT code,name,price FROM mst_product WHERE 1 ORDER BY name ASC';//昇順
//$sql='SELECT code,name,price FROM mst_product WHERE 1 ORDER BY name DESC';//降順
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<a href="shinnara.php">新習志野キャンパスはこちら</a><br />';
print '<a href="tsudanuma.php">津田沼キャンパスはこちら</a><br />';

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
