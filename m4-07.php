<?php $dsn='データベース名';
      $user="ユーザー名";
      $password="パスワード";
      
      $pdo=new PDO($dsn,$user,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
      
      $id = 1; //変更する投稿番号
    $name = "タイショー";
    $comment = "俺やでぇ"; //変更したい名前、変更したいコメントは自分で決めること
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

?>