<?php
$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT SUM(point) as sum_point FROM users;';

$stmt = $dbh->prepare($sql);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$sum_point=$rec['sum_point'];

$dbh = null;

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
$result = mysqli_query($con, 'SELECT * FROM gohobi ORDER BY necessary_point DESC');
while ($data = mysqli_fetch_array($result)) {
  for ($i=$sum_point; $sum_point>=$data['necessary_point']; $i--){
  // if($sum_point>=$data['necessary_point']){
    print "合計ポイントは".$sum_point."P! ";
    print "ご褒美『".$data['gohobi_name']."』をGETだ!";
    return false;
    // if($data>1){
    //   print "文章2つだねー";
    // }
  }
}

$con = mysqli_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}
?>