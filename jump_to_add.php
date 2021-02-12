<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>リスト削除</title>
  <link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>
<?php
  require "menu.php";

  ini_set('display_errors', 0);

  try
  {
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
  // この記述って？
  // この記述があるってことは、別に、formでname="sum"つけて送る記述があるってことだよね？
  $sum=$_POST['sum'];

  $dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
  $user='root';
  $password='';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
  // 問題はsqlでselectした値を、どうすれば変数に置き換えられるか？
  $sql = 'SELECT count(*) as sum FROM actions';

  $stmt = $dbh->query($sql); 
  foreach($stmt as $val) {
  // var_dump ($val['sum']);
  }

  // var_dump($sql['sum']);


  // $stmt = $dbh->prepare($sql);
  // 何で配列$dataに$sumを放り込むんやっけ？
  // そもそも$_POST['sum']ってどこからもってきた、何の値？
  // $data[]=$sum;
  // $stmt->execute($data);
  
  // $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  // $list=$rec['list'];
  //   print $list;

  $dbh = null;

  print '<form method="post" action="action_branch.php">';

  $result = mysqli_query($con, 'SELECT * FROM actions');

  while ($data = mysqli_fetch_array($result)) {
    print '<input type="hidden" name="id" value="'.$data['id'].'">';
  }
  
  $sum = $val['sum'];
  print '<input type="submit" id="from_menu" class="hidden-submit" name="add[add]">';
  print '<input type="hidden" name="add[sum]" value="'.$sum.'">';
  print '</form>';
  
  }
  catch(Exception $e)
  {
    print 'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
  }
  
?>
<script>
    document.getElementById('from_menu').click();
</script>
</br>
</body>
</html>