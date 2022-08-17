<?php $dsn='データベース名';
      $user="ユーザー名";
      $password="パスワード";
      
      $pdo=new PDO($dsn,$user,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
      
      $sql = "CREATE TABLE IF NOT EXISTS take"
      ." ("
      . "id INT AUTO_INCREMENT PRIMARY KEY,"
      . "name char(32),"
      . "comment TEXT,"
      . "passwd TEXT,"
      . "date DATETIME"
      .");";
      $stmt = $pdo->query($sql);
      
      $editno=$_POST["editno"];
      $name=$_POST["name"];
      $comment=$_POST["comment"];
      $date=date("Y-m-d H:i:s");
      $passwd=$_POST["passwd"];
      $deletenumber=$_POST["deletenumber"];
      $editnumber=$_POST["editnumber"];
      $editNo= "";
      $editName="";
      $editComment="";
      
      if(!empty($editnumber) && !empty($passwd))
      {$sql = 'SELECT * FROM take WHERE id=:id AND passwd=:passwd';
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $editnumber, PDO::PARAM_INT);
      $stmt->bindParam(':passwd', $passwd, PDO::PARAM_INT);
      $stmt->execute();
      $results = $stmt->fetchAll();
      foreach ($results as $row)
      {$editNo=$row['id'];
       $editName=$row['name'];
       $editComment=$row['comment'];
      }
      }
      
      if(!empty($name) && !empty($comment) && !empty($passwd))
      {if(!empty($editno))
      {$sql = 'UPDATE take SET name=:name,comment=:comment, date=:date, passwd=:passwd WHERE id=:id';
       $stmt = $pdo->prepare($sql);
       $stmt->bindParam(':name', $name, PDO::PARAM_STR);
       $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
       $stmt->bindParam(':date', $date, PDO::PARAM_STR);
       $stmt->bindParam(':passwd', $passwd, PDO::PARAM_STR);
       $stmt->bindParam(':id', $editno, PDO::PARAM_INT);
       $stmt->execute();
      }else
      {$sql = $pdo -> prepare("INSERT INTO take (name, comment, date, passwd) VALUES (:name, :comment, :date, :passwd)");
       $sql -> bindParam(':name', $name, PDO::PARAM_STR);
       $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
       $sql -> bindParam(':date', $date, PDO::PARAM_STR);
       $sql -> bindParam(':passwd', $passwd, PDO::PARAM_STR);
       $sql ->execute();
      }
      }
      
      
      if(!empty($deletenumber) && !empty($passwd))
      {$sql = 'delete from take where id=:id AND passwd=:passwd';
       $stmt = $pdo->prepare($sql);
       $stmt->bindParam(':id', $deletenumber, PDO::PARAM_INT);
       $stmt->bindParam(':passwd', $passwd, PDO::PARAM_INT);
       $stmt->execute();
      }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_5-01</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="editno" value="<?php echo $editNo; ?>">
        <input type="text" name="name" placeholder="名前" value="<?php echo $editName; ?>">
        <input type="text" name="comment" placeholder="コメント" value="<?php echo $editComment; ?>">
        <input type="text" name="passwd" placeholder="パスワード" >
        <input type="submit" name="送信">
    </form>
    
    <form action="" method="post">
        <input type="number" name="deletenumber" placeholder="削除番号">
        <input type="text" name="passwd" placeholder="パスワード" >
        <input type="submit" value="削除">
    </form>
    
    <form action="" method="post">
        <input type="number" name="editnumber" placeholder="編集番号">
        <input type="text" name="passwd" placeholder="パスワード" >
        <input type="submit" value="編集">
    </form>
<?php $sql = 'SELECT * FROM take';
      $stmt = $pdo->query($sql);
      $results = $stmt->fetchAll();
      foreach ($results as $row){
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].',';
        echo $row['date'].'<br>';
        echo "<hr>";
      }
?>

</body>
</html>



