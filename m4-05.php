<?php $dsn='データベース名';
      $user="ユーザー名";
      $password="パスワード";
      
      $pdo=new PDO($dsn,$user,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
      
       $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $name = 'まこ';
    $comment = '美味しい'; //好きな名前、好きな言葉は自分で決めること
    $sql -> execute();
?>