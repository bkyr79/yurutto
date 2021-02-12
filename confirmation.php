<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>継続アプリ「ゆるっと」</title>
<link type="text/css" rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="content">
<div class="praise">
<?php
require "menu.php";

$con = mysqli_connect('127.0.0.1', 'root', '');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysqli_select_db($con, 'yurutto');
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysqli_query($con, 'SET NAMES utf8');
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$con = mysqli_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

try
{

$pro_code=$_POST['id'];
$add_point=$_POST['add_point'];

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT praise FROM actions WHERE id = ?;
        INSERT INTO users(point) SELECT point FROM actions where id='.$pro_code;
$stmt = $dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$li_praise=$rec['praise'];

$dbh = null;

print $li_praise.'<br>';
print $add_point.' Pゲット！';

}
catch (Exception $e)
{

  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>
</div>
<form method="post" action="sum_point.php" class="confirm-form">
<input type="hidden" name="code" value="<?php print $pro_code['praise']; ?>">
<input type="hidden" name="sum_point" value="<?php print $add_point; ?>">
<input type="button" class="confirm-button" onclick="history.back()" value="Back">
<input type="submit" class="confirm-submit" value="OK">
</form>
</div>
</body>
</html>