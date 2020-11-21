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

// $result = mysqli_query($con, 'SELECT praise FROM actions');
//   print '<form method="post" action="confirmation.php">';
//   print '<div class="list" name="praise">' . $data['list'] . '</div>';
//   // print '<input class="complete" type="submit" name="execution" value="やったよ！">';
//   print '</form>';

$con = mysqli_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

try
{

$pro_code=$_POST['id'];

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT praise FROM actions WHERE id = ?';
$stmt = $dbh->prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$li_praise=$rec['praise'];

$dbh = null;


print $li_praise;

}
catch (Exception $e)
{

  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>
<br/>
<br/>
<form method="post" action="index2.php">
<input type="hidden" name="code" value="<?php print $pro_code['praise']; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>