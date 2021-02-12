<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/style.css">
<title>継続アプリ「ゆるっと」</title>
</head>
<body>
<?php
  require "menu.php";

  print '<div class="reward-list"><p>Reward List</p></div>';

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

  $result = mysqli_query($con, 'SELECT gohobi_name, necessary_point FROM gohobi ORDER BY necessary_point DESC');
  print '<section class="reward-lists">';
  while ($data = mysqli_fetch_array($result)) {
    print '<p>'.$data['necessary_point'].'P:　'.$data['gohobi_name'].'</p>';

  }
  print '</section>';

  $con = mysqli_close($con);
  if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
  }
  
?>

<br/>
</form>


</body>
</html>