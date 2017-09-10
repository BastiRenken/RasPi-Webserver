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
        <input type="submit" value="Tor" name="tor">
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
    <div>
      <form method="get" action="index.php">
        <p class="schalter">System</p>
        <input type="submit" value="Reboot" name="reboot">
      </form>
    </div>
  </div>
  <?php
  $setmode2 = shell_exec("/usr/local/bin/gpio -g mode 2 out");
  $default2 = shell_exec("/usr/local/bin/gpio -g write 2 1");
  $setmode3 = shell_exec("/usr/local/bin/gpio -g mode 3 out");
  $default3 = shell_exec("/usr/local/bin/gpio -g write 3 1");
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 4 out");
  $default4 = shell_exec("/usr/local/bin/gpio -g write 4 1");
  $setmode17 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
  $default17 = shell_exec("/usr/local/bin/gpio -g write 17 1");
  $setmode22 = shell_exec("/usr/local/bin/gpio -g mode 22 out");
  $default22 = shell_exec("/usr/local/bin/gpio -g write 22 1");
  if(isset($_GET['tor'])){
    $gpio2_on = shell_exec("/usr/local/bin/gpio -g write 2 0");
    sleep(1);
    $gpio2_off = shell_exec("/usr/local/bin/gpio -g write 2 1");
  }
  else if(isset($_GET['1-an'])){
    $gpio3_on = shell_exec("/usr/local/bin/gpio -g write 3 0");
  }
  else if(isset($_GET['1-aus'])){
    $gpio3_off = shell_exec("/usr/local/bin/gpio -g write 3 1");
  }
  else if(isset($_GET['2-an'])){
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  else if(isset($_GET['2-aus'])){
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['3-an'])){
    $gpio17_on = shell_exec("/usr/local/bin/gpio -g write 17 0");
  }
  else if(isset($_GET['3-aus'])){
    $gpio17_off = shell_exec("/usr/local/bin/gpio -g write 17 1");
  }
  else if(isset($_GET['4-an'])){
    $gpio22_on = shell_exec("/usr/local/bin/gpio -g write 22 0");
  }
  else if(isset($_GET['4-aus'])){
    $gpio22_off = shell_exec("/usr/local/bin/gpio -g write 22 1");
  }
  else if(isset($_GET['reboot'])){
    $reboot = shell_exec("sudo reboot 0");
  }
  ?>
</body>

<html>
