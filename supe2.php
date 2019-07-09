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

$sql='SELECT code,name,comment FROM review WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;


print 'スペシャルメニューの感想掲示板<br /><br />';



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
		print $rec['code'].' ';
		print $rec['name'].' ';
		print $rec['comment'].' ';
		
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
<br/><br/><br/><br/><br/>
<form method="post" action="add_check.review.php">
            名前<input type="text" name="name" value="" />
            コメント<textarea name="comment" rows="4" cols="20"></textarea>
            <input type="submit" name="send" value="書き込む" />
            <br/><br/><br/>
            <input type="button" onclick="history.back()" value="戻る">
           
</form>

</body>
</html>
