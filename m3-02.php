<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-02</title>
</head>
<body>
    <form action="" method="post">
    <p>名前</p>   
        <input type="text" name="namae" ><br>
    <p>コメント</p>
        <input type="text" name="comment" >
        
    <input type="submit" name="submit" >
            
    </form>
    
<?php $filename='mission_3-02.txt';
      $name=($_POST['namae']);
      $comment=($_POST['comment']);
      $date = date('Y年m月d日 H時i分s秒');

      if(file_exists($filename))
      {$num=count(file($filename))+1;}
      else{$num=1;}
      
      $newdata=$num."<>".$name."<>".$comment."<>".$date;
      
      if(!empty($name)||!empty($comment))
      {$fp=fopen($filename,"a");
          fwrite($fp,$newdata.PHP_EOL);
          fclose($fp);  }
          
      if(file_exists($filename))
      {$lines=file($filename,FILE_IGNORE_NEW_LINES);
      foreach($lines as $line)
      {$value=explode("<>",$line,4);
      echo $value[0]." ";
      echo $value[1]." ";
      echo $value[2]." ";
      echo $value[3],"<br>";}
      }
?>
