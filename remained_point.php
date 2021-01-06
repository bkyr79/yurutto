<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="style.css">
<title></title>
</head>
<body>

<?php

ini_set('display_errors', 0);

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

$n_point=$_POST['nPoint'];

$pdo = new PDO('mysql:dbname=yurutto;host=localhost;' , 'root', '');
$stmt = $pdo->prepare('INSERT INTO users(point) VALUES (' .$n_point.'*-1);');
$stmt->execute();

$stmt = $pdo->prepare('SELECT SUM(point) as sum_point FROM users;');
$stmt->execute();
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$sum_point=$rec['sum_point'];

if(isset($_POST['nPoint'])){
  print '堪能してね〜';
}

print '</br></br>';
print '残りは'.$sum_point.'Pだよ';

?>
</br>
<input type="button" onclick="history.back()" value="戻る">
</body>
</html>