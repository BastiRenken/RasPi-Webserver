<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width"/>
  <title> Smart Home </title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <h1>Smart Home</h1>
  <div id=menu>
    <div>
      <form method="get" action="index.php">
        <p class="schalter">Schalter 1</p>
        <input type="submit" value="An" name="eins-an">
        <input type="submit" value="Aus" name="eins-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <p class="schalter">Garage</p>
        <input type="submit" value="Tor" name="tor-auf">
      </form>
    </div>
  </div>
  <?php
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 4 out");
  $setmode17 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
  if(isset($_GET['eins-an'])){
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['eins-aus'])){
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  else if(isset($_GET['tor-auf'])){
    $gpio17_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
    sleep(1);
    $gpio17_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
  }
  ?>
</body>

<html>
