<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-01</title>
</head>
<body>
    <form action="" method="post">
    <p>名前</p>   
        <input type="text" name="namae" ><br>
    <p>コメント</p>
        <input type="text" name="comment" >
        
    <input type="submit" name="submit" >
            
    </form>
    
<?php $filename='mission_3-01.txt';
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
?>
