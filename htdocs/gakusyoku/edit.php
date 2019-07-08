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

$pro_code=$_GET['procode'];

$dsn='mysql:dbname=study;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name,shinagire FROM nara WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name'];
$pro_shinagire=$rec['shinagire'];

$dbh=null;

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

商品修正<br />
<br />
商品コード<br />
<?php print $pro_code; ?>
<br />
<form method="post" action="edit_check.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
商品名<br />
<input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />
在庫はありますか？<br />
<input type="text" name="shinagire" style="width:50px" value="<?php print $pro_shinagire; ?>">
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>