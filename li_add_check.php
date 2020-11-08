<?php
if(isset($_POST['list']))
{
  print $_POST['list'];
  print'<br/>';
}
else
{
  print'リストが入力されていません。<br/>';
}
if(isset($_POST['point']))
{
  print $_POST['point'];
  print 'ポイント<br/>';
}
else
{
  print 'ポイントをきちんと入力してください。<br/>';

}

if($_POST['list']=='' || $_POST['point']=='')
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  print '上記の商品を追加します。<br/>';
  print'<form method="post" action="li_add_done.php">';
  print'<input type="hidden" name="name" value="'.$_POST['list'].'">';
  print'<input type="hidden" name="price" value="'.$_POST['point'].'">';
  print'<br/>';
  print'<input type="button" onclick="history.back()" value="戻る">';
  print'<input type="submit" value="OK">';
  print'</form>';
}

?>