<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>継続アプリ「ゆるっと」</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>

<?php
  require "menu.php";
?>

ご褒美リスト追加<br/>
<br/>
<form method="post" action="gohobi_check.php">
追加したいご褒美を入力してね。<br/>
<input type="text" name="gohobi" style="width:200px"><br/>
必要ポイントを入力してね。<br/>
<input type="text" name="point" style="width:200px"><br/>
<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>