<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>じゃんけんアプリ（入力画面）</title>
</head>
<body>
  <form action="janken_test002.php" method="POST">
    <fieldest>
       <legend>じゃんけんアプリ（入力画面）</legend>
      <a href="janken_test002.php">一覧画面</a><br>
     ぐー:<input type="radio" value="ぐー" name="yourJudge"><br>
     ちょき:<input type="radio" value="ちょき" name="yourJudge"><br>
     ぱー:<input type="radio" value="ぱー" name="yourJudge"> <br>
     <input type="submit" value="送信する"> <br>
    </form>
</body>
</html>