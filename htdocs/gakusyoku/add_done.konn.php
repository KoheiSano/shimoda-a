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
$pro_time=$post['time'];
$pro_konn=$post['konn'];	

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO shinkon(time,konn) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_time;
$data[]=$pro_konn;

$stmt->execute($data);

$dbh=null;

print $pro_time;
print '時点の混雑度は';
print $pro_konn;
print '%';
print 'です。<br />';
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


