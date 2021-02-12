<!DOCTYPE html>
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

<div class="action-list"><p>Action List</p></div>
<br/>
<?php
// if(){
//   print 'それ以上は追加できません';
// }

?>

<form method="post" action="action_add_check.php">
<div class="contentA">
<div class="input-the-list"><span>Input the list.</span></div>
<input type="text" name="list" style="width:200px"><br/>
<div class="input-the-list"><span>Point?</span></div>
<input type="text" name="point" placeholder="Please within 5P." style="width:200px"><br/>
<div class="input-the-praise-word"><span>Praise word?</span></div>
<input type="text" name="praise" value="エライ！ありがとう！！" style="width:200px"><br/>
</div>
<input type="button" class="confirm-button" onclick="history.back()" value="Back">
<input type="submit" class="confirm-submit" value="OK">
</form>
</body>
</html>