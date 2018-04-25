<html><body><h1>It works!</h1><br/>
<?php
$timestamp = strtotime("+10 minutes");
echo date("Y-m-d H:i:s", $timestamp)."<br>";
echo strtotime(date("Y-m-d H:i:s"))."<br>";
echo time()."<br>";
echo gmdate("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")));
 phpinfo(); 
 
 ?>
</body></html>
