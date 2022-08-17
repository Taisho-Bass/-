<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="str"  placeholder="数を入力" >
        <input type="submit" name="submit" >
            
    </form>
    
<?php $num=$_POST["str"];
     $filename="mission_1-27.txt";
      if(isset($num)){
      $fp=fopen($filename,"a");
          fwrite($fp,$num.PHP_EOL);
          fclose($fp);}
      
      if(file_exists($filename)){
      $lines=file($filename,FILE_IGNORE_NEW_LINES);
      foreach($lines as $line){
     if($line%3==0&&$line%5==0){echo "FizzBuzz<br>";}
     elseif($line%3==0){echo "Fizz<br>";}
     elseif($line%5==0){echo "Buzz<br>";}
     else{echo $line."<br>";}
      } }
?>