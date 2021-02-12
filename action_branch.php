<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>行動リスト削除</title>
<link type="text/css" rel="stylesheet" href="./css/style.css"></head>
<body>

<?php
  require "menu.php";

if(isset($_POST['disp'])==true)
{
  if(isset($_POST['id'])==false)
  {
    header('Location: action_list.php');
    exit();
  }
  $action_id=$_POST['id'];
  header('Location: action_disp.php?id='.$action_id);
  exit();
}

if(isset($_POST['add'])==true)
{
  $add = $_POST['add']['sum'];
  // print $add;
  if($add>=3){
    print '<p>これ以上追加できません</p>';
    print '<a href="action_list.php">戻る</a>';
  }else{
    header('Location: action_add.php');
    exit();

  }
}

if(isset($_POST['edit'])==true)
{
  if(isset($_POST['id'])==false)
  {
    header('Location: action_list.php');
    exit();
  }
  $action_id=$_POST['id'];
  header('Location: action_edit.php?id='.$action_id);
  exit();
}

if(isset($_POST['delete'])==true)
{
  if(isset($_POST['id'])==false)
  {
    header('Location: action_list.php');
  }
  else
  {
    $action_id=$_POST['id'];
    header('Location: action_delete.php?id='.$action_id);
    exit();
  }
}else{
  exit();
}
?>
</body>
</html>