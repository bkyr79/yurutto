<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>行動リスト修正</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

try
{

$list_id = $_GET['id'];

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM actions WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$list_id;
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
行動リスト修正<br/></br>
<form method="post" action="action_edit_check.php">
<input type="hidden" name="id" value="<?php print $list_id; ?>">
<input type="text" name="list" value="<?php print $list; ?>"></br>
<input type="text" name="point" style="width:200px" value="<?php print $point; ?>"></br>
<input type="text" name="praise" value="<?php print $praise; ?>">
<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>