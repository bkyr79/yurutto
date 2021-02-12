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
  }
  $dbh = null;
  print '<section class="section-action-list">';
  print '<div class="action-list"><p>Action List</p></div>';
  
  print '<form method="post" action="action_branch.php" class="form-action-list">';

  $result = mysqli_query($con, 'SELECT * FROM actions');

  while ($data = mysqli_fetch_array($result)) {
    print '<div class="radio-list">';
    print '<input type="radio" name="id" class="radio" value="'.$data['id'].'">';
    print '<p class="point-and-list">'.$data['point'].'P: '.$data['list'].'</p><br>';
    print '</div>';
  }
  
  $sum = $val['sum'];
  print '<div class=four-botton>';
  print '<input type="submit" name="disp" class="list-button" value="Detail">';
  print '<input type="submit" name="add[add]" class="list-button" value="Add">';
  print '<input type="hidden" name="add[sum]" value="'.$sum.'">';
  print '<input type="submit" name="edit" class="list-button" value="Fix">';
  print '<input type="submit" name="delete" class="list-button" value="Delete">';
  print '</div>';
  print '</form>';
  
  }
  catch(Exception $e)
  {
    print 'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
  }
  
?>

</br>
</section>
</body>
</html>