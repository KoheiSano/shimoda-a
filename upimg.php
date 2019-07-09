<?php
$pic_id = 1;

$fp = fopen($_FILES['upimg']['tmp_name'], "rb");
$img = fread($fp, filesize($_FILES['upimg']['tmp_name']));
fclose($fp);

$sql = <<<SQL
	REPLACE INTO PICTURE
	(PICID, PIC) VALUES (:pic_id, :PIC);
SQL;
$stmt = $DB->prepare($sql);
$stmt->bindValue(':pic_id'  ,$pic_id);
$stmt->bindValue(':PIC'     ,$img);
$stmt->execute();
$stmt = null;

echo '<img src="img.php?pic_id=' . $pic_id . '">';
?>