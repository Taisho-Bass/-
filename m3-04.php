<?php $filename='mission_3-04.txt';
      $name=($_POST["name"]);
      $comment=($_POST["comment"]);
      $date = date("Y年m月d日 H時i分s秒");
      $delete=($_POST["delete"]);
      $edit=($_POST["edit"]);
      $editno=($_POST["editno"]);
      $editNo="";
      $editName="";
      $editComment="";
      
      if(file_exists($filename))
      {$num=count(file($filename))+1;}
      else{$num=1;}
      
      $newdata=$num."<>".$name."<>".$comment."<>".$date;
      
      if(!empty($name)||!empty($comment))
      {$fp=fopen($filename,"a");
          fwrite($fp,$newdata.PHP_EOL);
          fclose($fp);  }
      
      if(!empty($delete)){
            $files = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename, "w");
            for($i = 0 ; $i < count($files) ; $i++ )
            {
                $file = explode("<>" , $files[$i]);
                if($file[0] != $delete)
                {fwrite($fp,$file[0]."<>".$file[1]."<>".$file[2]."<>".$file[3].PHP_EOL);
                }
            }
             fclose($fp);
        }
      
      if(!empty($edit))
       {$lines=file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line)
            {$elements= explode("<>" , $line);
                if($elements[0]==$edit)
                {$editNo=$elements[0];
                 $editName=$elements[1];
                 $editComment=$elements[2];
                }
            }
        }
      
      if(!empty($editno))
      {$lines=file($filename,FILE_IGNORE_NEW_LINES);
       $fp=fopen($filename,"w");
         foreach($lines as $line)
         {$elements=explode("<>",$line);
               if($editno==$elements[0])
               {fwrite($fp, $editno."<>".$name."<>".$comment."<>".$date.PHP_EOL);
               }else
               {fwrite($fp, $line.PHP_EOL);
               }
         }
      }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-04</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="editno" value="<?php echo $editNo=""; ?>">
        <input type="text" name="name" placeholder="名前" value="<?php echo $editName=""; ?>">
        <input type="text" name="comment" placeholder="コメント" value="<?php echo $editComment=""; ?>">
        <input type="submit" name="送信">
    </form>
    
    <form action="" method="post">
        <input type="number" name="delete">
        <input type="submit" value="削除">
    </form>
    
    <form action="" method="post">
        <input type="number" name="edit">
        <input type="submit" value="編集">
    </form>
    
    <?php
        if(file_exists($filename)){
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                $elements = explode("<>", $line);
                echo $elements[0]." ".$elements[1]." ".$elements[2]." ".$elements[3]."<br>";
            }
        }
    ?>
</body>
</html>