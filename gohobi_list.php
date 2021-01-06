<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
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

  $result = mysqli_query($con, 'SELECT gohobi_name, necessary_point FROM gohobi');
  while ($data = mysqli_fetch_array($result)) {
    print 'NAME: '.$data['gohobi_name'].'　POINT: '.$data['necessary_point'].'<br>';
  }

  $con = mysqli_close($con);
  if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
  }
  
?>

<br/>
<!-- <form method="post" action=""> -->
<!-- <input type="hidden" name="code" value="<?php print $pro_code['praise']; ?>"> -->
<input type="button" onclick="history.back()" value="戻る">
<!-- <input type="submit" value="OK"> -->
</form>


</body>
</html>