<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>継続アプリ「ゆるっと」</title>
<link type="text/css" rel="stylesheet" href="./css/style.css">
</head>
<body>

<?php
  require "menu.php";
?>

<div class="content">
<div class="title">Select to be done.</div>
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
      print '<form method="post" action="confirmation.php" class="form">';
      print '<div class="list">';
      print '<input type="hidden" name="id" class="index" value="'.$data['id'].'">';
      print '<input type="hidden" name="add_point" class="index" value="'.$data['point'].'">';   
      print '<input type="submit" class="input" class="index" value="'.$data['list'].'">';
      print '<div>';
      print '</form>';
    }

    $con = mysqli_close($con);
    if (!$con) {
      exit('データベースとの接続を閉じられませんでした。');
    }
    
  ?>
</form>
</div>
</body>
</html>