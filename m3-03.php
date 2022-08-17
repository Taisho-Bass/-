<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-03</title>
</head>
<body>
    <form action="" method="post">
    <p>名前</p>   
        <input type="text" name="namae" ><br>
    <p>コメント</p>
        <input type="text" name="comment" >
        <input type="submit" name="submit" ><br>
    <p>削除番号</p>
        <input type="number" name="delete" placeholder="削除番号">
        <input type="submit" name="submit" >
    </form>
    
<?php $filename='mission_3-03.txt';
      $name=($_POST["namae"]);
      $comment=($_POST["comment"]);
      $date = date("Y年m月d日 H時i分s秒");
      $delete=($_POST["delete"]);
      
      if(file_exists($filename))
      {$num=count(file($filename))+1;}
      else{$num=1;}
      
      $newdata=$num."<>".$name."<>".$comment."<>".$date;
      
      if(!empty($name)||!empty($comment))
      {$fp=fopen($filename,"a");
          fwrite($fp,$newdata.PHP_EOL);
          fclose($fp);  }
      elseif(!empty($delete)){
            $files = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename, "w");
            for($i = 0 ; $i < count($files) ; $i++ ){
                $file = explode("<>" , $files[$i]);
                if($file[0] != $delete){
                     fwrite($fp,$file[0]."<>".$file[1]."<>".$file[2]."<>".$file[3].PHP_EOL);
                }
            }
             fclose($fp);
        }
          
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