<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品修正</title>
</head>
<body>

<?php

try
{

$post=$_POST;
$pro_code=$post['code'];
$pro_name=$post['name'];
$pro_shinagire=$post['shinagire'];

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE tuda SET name=?,shinagire=? WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_shinagire;
$data[]=$pro_code;
$stmt->execute($data);

$dbh=null;

print '修正しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="index.php">戻る</a>

</body>
</html>