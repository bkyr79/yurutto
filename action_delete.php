<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>行動リスト削除</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>

<?php
  require "menu.php";

try
{
$action_list = $_GET['id'];

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password ='';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'DELETE FROM actions WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[] = $action_list;
$stmt->execute($data);

$dbh = null;

}
catch (Exception $e)
{

  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}
header('Location: action_list.php');
exit();
?>


</body>
</html>