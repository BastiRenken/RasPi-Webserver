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
        <p class="schalter">Garage</p>
        <input type="submit" value="Tor" name="tor-auf">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <p class="schalter">Schalter 1</p>
        <input type="submit" value="An" name="1-an">
        <input type="submit" value="Aus" name="1-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <p class="schalter">Schalter 2</p>
        <input type="submit" value="An" name="2-an">
        <input type="submit" value="Aus" name="2-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <p class="schalter">Schalter 3</p>
        <input type="submit" value="An" name="3-an">
        <input type="submit" value="Aus" name="3-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <p class="schalter">Schalter 4</p>
        <input type="submit" value="An" name="4-an">
        <input type="submit" value="Aus" name="4-aus">
      </form>
    </div>
  </div>
  <?php
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 2 out");
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 3 out");
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 27 out");
  $setmode17 = shell_exec("/usr/local/bin/gpio -g mode 22 out");
  if(isset($_GET['tor-auf'])){
    $gpio17_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
    sleep(1);
    $gpio17_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
  }
  else if(isset($_GET['1-an'])){
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['1-aus'])){
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  else if(isset($_GET['2-an'])){
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['2-aus'])){
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  else if(isset($_GET['3-an'])){
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['3-aus'])){
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  else if(isset($_GET['4-an'])){
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['4-aus'])){
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  ?>
</body>

<html>
