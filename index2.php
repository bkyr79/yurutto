<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>継続アプリ「ゆるっと」</title>
</head>
<body>
<?php

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

$result = mysqli_query($con, 'SELECT * FROM actions');
while ($data = mysqli_fetch_array($result)) {
  echo '<p>' . $data['list'] . ':' . $data['point'] . "</p>\n";
}

$con = mysqli_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
</body>
</html>

print '<form method="post" action="confirmation.php">
print '<div class="list" name="list1">皿洗い<div>
print '<input type="submit" name="execution1" value="やったよ！"><br><br>
print '<div class="list" name="list2">お風呂掃除<div>
print '<input type="submit" name="execution2" value="やったよ！"><br><br>
print '<div class="list" name="list3">掃除機がけ<div>
print '<input type="submit" name="execution3" value="やったよ！"><br><br>
print '</form>