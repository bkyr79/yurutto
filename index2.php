<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css">
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
  print '<form method="post" action="confirmation.php">';
  print '<div class="list" name="list">' . $data['list'] . '</div>';
  print '<input class="complete" type="submit" name="execution" value="やったよ！">';
  print '</form>';
}

$con = mysqli_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
</body>
</html>