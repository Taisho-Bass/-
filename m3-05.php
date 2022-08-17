<?php $filename="mission_3-05.txt";
      $editno=$_POST["editno"];
      $name=$_POST["name"];
      $comment=$_POST["comment"];
      $date=date("Y年m月d日 H時i分s秒");
      $password=$_POST["password"];
      $deletenumber=$_POST["deletenumber"];
      $editnumber=$_POST["editnumber"];
      
      if(!empty($editnumber) && !empty($password))
      {$lines=file($filename, FILE_IGNORE_NEW_LINES);
      foreach($lines as $line)
      {$elements=explode("<>", $line);
      if($elements[0]==$editnumber && $elements[4]==$password)
      {$editNo=$elements[0];
       $editName=$elements[1];
       $editComment=$elements[2];
      }
      }
      }
      
      if(!empty($name) && !empty($comment) && !empty($password))
      {if(!empty($editno))
      {$lines=file($filename, FILE_IGNORE_NEW_LINES);
       $fp=fopen($filename, "w");
       foreach($lines as $line)
       {$elements=explode("<>", $line);
       if($elements[0]==$editno)
       {fwrite($fp, $editno."<>".$name."<>".$comment."<>".$date."<>".$password.PHP_EOL);
       }
       else{fwrite($fp, $line.PHP_EOL);}
       }
      }
       else{$fp=fopen($filename, "a");
            $count=count(file($filename))+1;
            fwrite($fp, $count."<>".$name."<>".$comment."<>".$date."<>".$password.PHP_EOL);
            fclose($fp);
       }
      }
      
      if(!empty($deletenumber) && !empty($password))
      {$lines=file($filename, FILE_IGNORE_NEW_LINES);
       $fp=fopen($filename, "w");
       for($i = 0 ; $i < count($lines) ; $i++)
       {$line=explode("<>", $lines[$i]);
       if($line[0] != $deletenumber || $line[4] != $password)
       {fwrite($fp, $lines[$i].PHP_EOL);
       }
      }
      fclose($fp);
      }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-05</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="editno" value="<?php echo $editNo=""; ?>">
        <input type="text" name="name" placeholder="名前" value="<?php echo $editName=""; ?>">
        <input type="text" name="comment" placeholder="コメント" value="<?php echo $editComment=""; ?>">
        <input type="text" name="password" placeholder="パスワード" >
        <input type="submit" name="送信">
    </form>
    
    <form action="" method="post">
        <input type="number" name="deletenumber" placeholder="削除番号">
        <input type="text" name="password" placeholder="パスワード" >
        <input type="submit" value="削除">
    </form>
    
    <form action="" method="post">
        <input type="number" name="editnumber" placeholder="編集番号">
        <input type="text" name="password" placeholder="パスワード" >
        <input type="submit" value="編集">
    </form>
<?php     if(file_exists($filename));
          {$lines=file($filename, FILE_IGNORE_NEW_LINES);
           foreach($lines as $line)
           {$elements = explode("<>", $line);
            echo $elements[0]." ".$elements[1]." ".$elements[2]." ".$elements[3]."<br>";
           }
          }       
?>

</body>
</html>