<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title></title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>

<?php
  require "menu.php";

$id = $_POST['id'];
$list = $_POST['list'];
$point = $_POST['point'];
$praise = $_POST['praise'];  

if($point=='' || $list=='' || $praise=='')
{
  header('Location: action_edit.php');
}
else
{
  print'<form method="post" action="action_edit_done.php">';
  print'<input type="hidden" name="id" value="'.$id.'">';
  print'<input type="hidden" name="list" value="'.$list.'">';
  print'<input type="hidden" name="point" value="'.$point.'">';
  print'<input type="hidden" name="praise" value="'.$praise.'">';
  print'<br/>';
  print'<input type="button" onclick="history.back()" value="戻る">';
  print'<input type="submit" value="OK">';
  print'</form>';
}

?>

</body>
</html>