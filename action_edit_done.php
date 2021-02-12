<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>行動リスト修正確定</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

try
{
$id = $_POST['id'];
$list = $_POST['list'];
$point = $_POST['point'];
$praise = $_POST['praise'];  

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password ='';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'UPDATE actions SET list=?,point=?,praise=? WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[] = $list;
$data[] = $point;
$data[] = $praise;
$data[] = $id;
$stmt->execute($data);

$dbh = null;

header('Location: action_list.php');
}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}

?>

</body>
</html>