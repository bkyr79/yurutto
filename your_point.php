<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/style.css">
<title></title>
</head>
<body>

<?php
require "menu.php";

$pdo = new PDO('mysql:dbname=yurutto;host=localhost;' , 'root', '');
$stmt = $pdo->prepare('SELECT SUM(point) as sum_point FROM users;');
$stmt->execute();
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$sum_point=$rec['sum_point'];

print '<div class="your-point"><p>your Point</p></div>';
print '<div class="your-point-font"><span>'.$sum_point.' P</span></div>';
?>

</body>
</html>