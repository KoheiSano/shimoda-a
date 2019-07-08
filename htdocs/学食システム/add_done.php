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
$pro_syouhinn=$post['syouhinn'];
$pro_shinagire=$post['shinagire'];
$pro_nedann=$post['nedann'];
$pro_campus=$post['campus'];	

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO shinagire(syouhinn,shinagire,nedann,campus) VALUES (?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_syouhinn;
$data[]=$pro_shinagire;
$data[]=$pro_nedann;
$data[]=$pro_campus;

$stmt->execute($data);

$dbh=null;

print $pro_syouhinn;
print $pro_shinagire;
print $pro_nedann;
print $pro_campus;

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


