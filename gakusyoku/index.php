<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学食情報共有システム</title>
</head>
<body>

<?php

try
{
//------------------------------------------------------------------------------------------------------------------

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,shinagire,nedann FROM nara WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;


print '新習志野キャンパスのメニューはこちら<br /><br />';



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
	if (($keyword==='')||(strpos($rec['code'],$keyword)!==false)){
	//if (strpos($rec['name'],$keyword)!==false){//$keywordが空のときエラー
		print $rec['code'].' ';
		print $rec['name'].' ';
		print $rec['shinagire'].' ';
		print $rec['nedann'].' ';
		print '<br />';
	}
}
print '<a href="add form(add).php">登録はこちら</a><br />';

print '<br />';
print '<form method="get" action="edit.php">';
print '商品修正：商品名';
print '<input type="number" name="procode" style="width:100px">';
print '<input type="submit" value="決定">';
print '</form>';

print '<br />';
print '<form method="get" action="delete.php">';
print '商品削除：商品名';
print '<input type="number" name="procode" style="width:100px">';
print '<input type="submit" value="決定">';
print '</form>';

//------------------------------------------------------------------------------------------------------------------


$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,shinagire,nedann FROM tuda WHERE 1';

$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<br />';
print '<br />';
print '<br />';
print '津田沼キャンパスのメニューはこちら<br /><br />';




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
	if (($keyword==='')||(strpos($rec['code'],$keyword)!==false)){
	//if (strpos($rec['name'],$keyword)!==false){//$keywordが空のときエラー
		print $rec['code'].' ';
		print $rec['name'].' ';
		print $rec['shinagire'].' ';
		print $rec['nedann'].' ';
		print '<br />';
	}
}
print '<a href="add form(add).1.php">登録はこちら</a><br />';

print '<br />';
print '<form method="get" action="edit.1.php">';
print '商品修正：商品名';
print '<input type="number" name="procode" style="width:100px">';
print '<input type="submit" value="決定">';
print '</form>';

print '<br />';
print '<form method="get" action="delete.1.php">';
print '商品削除：商品名';
print '<input type="number" name="procode" style="width:100px">';
print '<input type="submit" value="決定">';
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
		print $rec['name'].' ';
		print $rec['shinagire'].' ';
		print $rec['nedann'].' ';
		print '<br />';
	}
}
print '<a href="add form(add).1.php">登録はこちら</a><br />';

//------------------------------------------------------------------------------------------------------------------

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,time,konn FROM thudakonn WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;


$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,time,konn FROM shinkon WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '<br /><br /><br />';
print '新習志野キャンパスの混雑度<br /><br />';



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
	if (($keyword==='')||(strpos($rec['code'],$keyword)!==false)){
	//if (strpos($rec['name'],$keyword)!==false){//$keywordが空のときエラー
		print $rec['code'].' ';
        print $rec['time'].' ';
        print $rec['konn'].' %';

		
		print '<br />';
	}
}


//------------------------------------------------------------------------------------------------------------------



}



catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

<form method="post" action="add_check.konn.php">
            日時<input type="date" name="time" value="" />

            混雑度<select name="konn">
            <option value="100">100</option>
            <option value="90">90</option>
            <option value="80">80</option>
            <option value="70">70</option>
            <option value="60">60</option>
            <option value="50">50</option>
            <option value="40">40</option>
            <option value="30">30</option>
            <option value="20">20</option>
            <option value="10">10</option>
            <option value="0">0</option>
            </select>％
            <input type="submit" name="send" value="送信" />
            <br/><br/><br/>
           
</form>

<?php
print '<br /><br /><br />';
print '津田沼キャンパスの混雑度<br /><br />';



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
	if (($keyword==='')||(strpos($rec['code'],$keyword)!==false)){
	//if (strpos($rec['name'],$keyword)!==false){//$keywordが空のときエラー
		print $rec['code'].' ';
        print $rec['time'].' ';
        print $rec['konn'].'% ';

		
		print '<br />';
	}
}


//------------------------------------------------------------------------------------------------------------------






?>

<form method="post" action="add_check.konn.1.php">
            日時<input type="date" name="time" value="" />

            混雑度<select name="konn">
            <option value="100">100</option>
            <option value="90">90</option>
            <option value="80">80</option>
            <option value="70">70</option>
            <option value="60">60</option>
            <option value="50">50</option>
            <option value="40">40</option>
            <option value="30">30</option>
            <option value="20">20</option>
            <option value="10">10</option>
            <option value="0">0</option>
            </select>％
            <input type="submit" name="send" value="送信" />
            <br/><br/><br/>
           
</form>



<?php
print '<br />';
print '<br />';
print '<br />';
print '<a href="supe1.php">スペシャルメニューの情報はこちら</a><br />';
print '<br />';
print '<br />';
print '<br />';
print '<a href="supe2.php">スペシャルメニューの感想はこちら</a><br />';



?>



</body>
</html>
