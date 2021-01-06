<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<title>継続アプリ「ゆるっと」</title>
</head>
<body>
リスト追加<br/>
<br/>
<form method="post" action="li_add_check.php">
追加したい項目を入力してね。<br/>
<input type="text" name="list" style="width:200px"><br/>
ポイントを入力してね。<br/>
<input type="text" name="point" style="width:50px"><br/>
なんて褒めてあげるのか決めてね。<br/>
<input type="text" name="praise" value="エライ！ありがとう！！" style="width:200px"><br/>
<br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>