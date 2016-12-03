<?php
$fw = fopen("./passwd.txt","r");
$user = $_GET["user"];
$match = false;
$accounts = array();
while(!feof($fw)) {
  $a = fgets($fw);
  $b = explode(':',trim($a));
  array_push($accounts, $b[0]);
}
for ($i = 0; $i < count($accounts); $i++){
  if ($accounts[$i] == $user){
    $match = true;
  }
}
echo $match;
fclose($fw);
?>
