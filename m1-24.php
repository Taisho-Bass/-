<?php $str="井上尚弥";
      $filename="mission_1-24.txt";
      $fp=fopen($filename,"a");
          fwrite($fp,$str.PHP_EOL);
          fclose($fp);
      echo "書き込み成功！";
?>
