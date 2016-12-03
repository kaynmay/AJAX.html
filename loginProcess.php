<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thank You</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
    text-align: center;
    padding-top: 1em;
  }
  </style>
</head>

<body>
  <?php
  $fw = fopen("./passwd.txt","a+");
  $user = $_GET["username"];
  $source = $_GET["password"];
  $key = 'CS329';
  $method = 'aes-128-cbc';
  $pass = openssl_encrypt ($source, $method, $key);
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
  if ($match == false){
    fwrite($fw, $user.":".$pass."\r\n");
    print "<h4>Registration complete.</h4>";
  }
  else{
    print "<h4>Username already taken.</h4>";
  }
  fclose($fw);
  ?>
</body>
</html>
