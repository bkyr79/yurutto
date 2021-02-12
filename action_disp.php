<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>ろくまる農園</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

try
{

$id=$_GET['id'];

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM actions WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$id;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$list=$rec['list'];
$point=$rec['point'];
$praise=$rec['praise'];

$dbh = null;

}
catch (Exception $e)
{

  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>
行動リスト情報参照<br/>
<br/>
<?php print $list;?>
<br/>
<?php print $point; ?>
<br/>
<?php print $praise; ?>
<br/>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>