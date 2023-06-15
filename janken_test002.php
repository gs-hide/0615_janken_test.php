<?php
// var_dump($_POST);
// exit();
function h($val){
return htmlspecialchars($val,ENT_QUOTES);
}
$yours = $_POST["yourJudge"];

function choiceNumber(){ $choiceNumber = rand(1,3); return
$choiceNumber; } $decisionNumber = choiceNumber();

 function converter($decisionNumber){ 
  if ($decisionNumber === 1){ $judgeJanken = "ぐー"; return $judgeJanken; 
} else if ($decisionNumber === 2){ $judgeJanken = "ちょき"; return $judgeJanken; 
} else if ($decisionNumber === 3){ $judgeJanken = "ぱー"; return $judgeJanken; } } $cpus = converter($decisionNumber);

//じゃんけんの判定 
 function judge($yours,$cpus){ 
  if($yours === $cpus) { $result = "引き分け"; return $result; 
} else if($yours === "ぐー"){ 
  if($cpus === "ちょき"){ $result = "あなたの勝ち"; return $result; 
} else if($cpus === "ぱー"){ $result = "あなたの負け"; return $result; } 
} else if($yours === "ちょき"){ 
  if($cpus === "ぐー"){ $result = "あなたの負け"; return $result; 
} else if($cpus === "ぱー"){ $result = "あなたの勝ち"; return $result; } 
} else if($yours ==="ぱー"){ 
  if($cpus === "ぐー"){ $result = "あなたの勝ち"; return $result; 
} else if($cpus === "ちょき"){ $result = "あなたの負け"; return $result; } } }
 //表示する結果を変数に代入 
 $resultDisplay = judge($yours,$cpus);

// データまとめ用の空文字変数
$str = '';
$array = []; 

// ファイルを開く（読み取り専用）
$file = fopen('data/janken.txt', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
  while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する
    $str .="<tr><td>{$line}</td></tr>";
    array_push($array, $line);
  }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);
 
?>

 <!DOCTYPE html>
 <!-- enをjaに変更する -->
 <html lang="ja">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>じゃんけんの結果</title>

 </head>

 <body>
  <fieldset>
    <legend>じゃんけんアプリ（一覧画面）</legend>
    <a href="janken_test001.php">入力画面</a>
    <h1>じゃんけんの結果</h1> 

   <table>
      <thead>
        <tr>
          <!-- <th>じゃんけん結果</th> -->
           <p>あなた:<?php echo $yours?></p> 
           <p>コンピューター:<?php echo $cpus?></p> 
           <p><?php echo $resultDisplay?></p>
        </tr>
      </thead>
      <tbody>
       <?= $str ?>
      </tbody>
    </table>
  </fieldset>

  <script>
    const array = <?= json_encode($array) ?>;
    console.log(array);
  </script>

 </body>
 </html>

