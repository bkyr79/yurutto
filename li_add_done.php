<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>継続アプリ「ゆるっと」</title>
</head>
<body>
<?php

if(!empty($_POST['list'])){
  try
  {

  $li_name = $_POST['list'];
  $li_point = $_POST['point'];

  $dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
  $user='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql = 'INSERT INTO actions(list,point) VALUES (?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $li_name;
  $data[] = $li_point;
  $stmt->execute($data);

  $dbh = null;

  print $li_name;
  print 'を追加しました。<br/>';

  }
  catch (Exception $e)
  {
    print 'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
  }
}
?>

<a href="li_list.php">戻る</a>

</body>
</html>