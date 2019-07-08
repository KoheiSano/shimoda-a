<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>DB登録</title>
</head>
<body>

<?php

try
{

$post=$_POST;
$pro_name=$post['name'];
$pro_shinagire=$post['shinagire'];
$pro_nedann=$post['nedann'];	

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO nara(name,shinagire,nedann) VALUES (?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_shinagire;
$data[]=$pro_nedann;

$stmt->execute($data);

$dbh=null;

print $pro_name;
print $pro_shinagire;
print $pro_nedann;

print 'を追加しました。<br />';

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


