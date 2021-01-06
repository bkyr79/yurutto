<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="style.css">
<title></title>
</head>
<body>
<?php

$gohobi_name = $_POST['gohobi'];
$gohobi_point = $_POST['point'];

if ($gohobi_name == '' || $gohobi_point == '') {
  print 'リストが入力されていません。<br/>';
  print '<a href="li_add.php">戻る</a>';
  exit();
}

$dsn = 'mysql:dbname=yurutto;host=localhost;charset=utf8';
$user = 'root';
$password ='';

try {
  $db = new PDO($dsn,$user,$password);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

  $stmt = $db->prepare("
    INSERT INTO gohobi(necessary_point,gohobi_name)
    VALUES (:point, :name)"
  );

  $stmt->bindParam(':point', $gohobi_point, PDO::PARAM_STR);
  $stmt->bindParam(':name', $gohobi_name, PDO::PARAM_STR);

  $stmt->execute();

  header('Location: index.php');
  exit();
} catch(PDOException $e){
  die ('エラー：' . $e->getMessage());
}

?>
</body>
</html>