<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width"/>
  <title> Smart Home </title>
  <link href="style.css" rel="stylesheet">
  <?php
  $setmode2 = shell_exec("/usr/local/bin/gpio -g mode 2 out");
  $setmode3 = shell_exec("/usr/local/bin/gpio -g mode 3 out");
  $setmode4 = shell_exec("/usr/local/bin/gpio -g mode 4 out");
  $setmode17 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
  $setmode27 = shell_exec("/usr/local/bin/gpio -g mode 27 out");
  $setmode22 = shell_exec("/usr/local/bin/gpio -g mode 22 out");
  $setmode10 = shell_exec("/usr/local/bin/gpio -g mode 10 out");
  $setmode9 = shell_exec("/usr/local/bin/gpio -g mode 9 out");
  if(isset($_GET['tor'])){
    $gpio2_on = shell_exec("/usr/local/bin/gpio -g write 2 0");
    sleep(1);
    $gpio2_off = shell_exec("/usr/local/bin/gpio -g write 2 1");
  }
  else if(isset($_GET['alle-an'])){
    file_put_contents("gpio3.txt", 0);
    file_put_contents("gpio4.txt", 0);
    file_put_contents("gpio17.txt", 0);
    file_put_contents("gpio27.txt", 0);
    file_put_contents("gpio22.txt", 0);
    file_put_contents("gpio10.txt", 0);
    file_put_contents("gpio9.txt", 0);
    $gpio3_on = shell_exec("/usr/local/bin/gpio -g write 3 0");
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 0");
    $gpio17_on = shell_exec("/usr/local/bin/gpio -g write 17 0");
    $gpio27_on = shell_exec("/usr/local/bin/gpio -g write 27 0");
    $gpio22_on = shell_exec("/usr/local/bin/gpio -g write 22 0");
    $gpio10_on = shell_exec("/usr/local/bin/gpio -g write 10 0");
    $gpio9_on = shell_exec("/usr/local/bin/gpio -g write 9 0");
  }
  else if(isset($_GET['alle-aus'])){
    file_put_contents("gpio3.txt", 1);
    file_put_contents("gpio4.txt", 1);
    file_put_contents("gpio17.txt", 1);
    file_put_contents("gpio27.txt", 1);
    file_put_contents("gpio22.txt", 1);
    file_put_contents("gpio10.txt", 1);
    file_put_contents("gpio9.txt", 1);
    $gpio3_off = shell_exec("/usr/local/bin/gpio -g write 3 1");
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 1");
    $gpio17_off = shell_exec("/usr/local/bin/gpio -g write 17 1");
    $gpio27_off = shell_exec("/usr/local/bin/gpio -g write 27 1");
    $gpio22_off = shell_exec("/usr/local/bin/gpio -g write 22 1");
    $gpio10_off = shell_exec("/usr/local/bin/gpio -g write 10 1");
    $gpio9_off = shell_exec("/usr/local/bin/gpio -g write 9 1");
  }
  else if(isset($_GET['1-an'])){
    file_put_contents("gpio3.txt", 0);
    $gpio3_on = shell_exec("/usr/local/bin/gpio -g write 3 0");
  }
  else if(isset($_GET['1-aus'])){
    file_put_contents("gpio3.txt", 1);
    $gpio3_off = shell_exec("/usr/local/bin/gpio -g write 3 1");
  }
  else if(isset($_GET['2-an'])){
    file_put_contents("gpio4.txt", 0);
    $gpio4_on = shell_exec("/usr/local/bin/gpio -g write 4 0");
  }
  else if(isset($_GET['2-aus'])){
    file_put_contents("gpio4.txt", 1);
    $gpio4_off = shell_exec("/usr/local/bin/gpio -g write 4 1");
  }
  else if(isset($_GET['3-an'])){
    file_put_contents("gpio17.txt", 0);
    $gpio17_on = shell_exec("/usr/local/bin/gpio -g write 17 0");
  }
  else if(isset($_GET['3-aus'])){
    file_put_contents("gpio17.txt", 1);
    $gpio17_off = shell_exec("/usr/local/bin/gpio -g write 17 1");
  }
  else if(isset($_GET['4-an'])){
    file_put_contents("gpio27.txt", 0);
    $gpio27_on = shell_exec("/usr/local/bin/gpio -g write 27 0");
  }
  else if(isset($_GET['4-aus'])){
    file_put_contents("gpio27.txt", 1);
    $gpio27_off = shell_exec("/usr/local/bin/gpio -g write 27 1");
  }
  else if(isset($_GET['5-an'])){
    file_put_contents("gpio22.txt", 0);
    $gpio22_on = shell_exec("/usr/local/bin/gpio -g write 22 0");
  }
  else if(isset($_GET['5-aus'])){
    file_put_contents("gpio22.txt", 1);
    $gpio22_off = shell_exec("/usr/local/bin/gpio -g write 22 1");
  }
  else if(isset($_GET['6-an'])){
    file_put_contents("gpio10.txt", 0);
    $gpio10_on = shell_exec("/usr/local/bin/gpio -g write 10 0");
  }
  else if(isset($_GET['6-aus'])){
    file_put_contents("gpio10.txt", 1);
    $gpio10_off = shell_exec("/usr/local/bin/gpio -g write 10 1");
  }
  else if(isset($_GET['7-an'])){
    file_put_contents("gpio9.txt", 0);
    $gpio9_on = shell_exec("/usr/local/bin/gpio -g write 9 0");
  }
  else if(isset($_GET['7-aus'])){
    file_put_contents("gpio9.txt", 1);
    $gpio9_off = shell_exec("/usr/local/bin/gpio -g write 9 1");
  }
  ?>
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
        <p class="schalter" style="color:black">Alle</p>
        <input type="submit" value="An" name="alle-an">
        <input type="submit" value="Aus" name="alle-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
          if (file_get_contents("gpio3.txt") == 1){
            echo '<p class="schalter" style="color:darkred">Schalter 1</p>';
          }
          else if (file_get_contents("gpio3.txt") == 0){
            echo '<p class="schalter" style="color:limegreen">Schalter 1</p>';
          }
        ?>
        <input type="submit" value="An" name="1-an">
        <input type="submit" value="Aus" name="1-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
          if (file_get_contents("gpio4.txt") == 1){
            echo '<p class="schalter" style="color:darkred">Schalter 2</p>';
          }
          else if (file_get_contents("gpio4.txt") == 0){
            echo '<p class="schalter" style="color:limegreen">Schalter 2</p>';
          }
        ?>
        <input type="submit" value="An" name="2-an">
        <input type="submit" value="Aus" name="2-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
          if (file_get_contents("gpio17.txt") == 1){
            echo '<p class="schalter" style="color:darkred">Schalter 3</p>';
          }
          else if (file_get_contents("gpio17.txt") == 0){
            echo '<p class="schalter" style="color:limegreen">Schalter 3</p>';
          }
        ?>
        <input type="submit" value="An" name="3-an">
        <input type="submit" value="Aus" name="3-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
          if (file_get_contents("gpio27.txt") == 1){
            echo '<p class="schalter" style="color:darkred">Schalter 4</p>';
          }
          else if (file_get_contents("gpio27.txt") == 0){
            echo '<p class="schalter" style="color:limegreen">Schalter 4</p>';
          }
        ?>
        <input type="submit" value="An" name="4-an">
        <input type="submit" value="Aus" name="4-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
        if (file_get_contents("gpio22.txt") == 1){
          echo '<p class="schalter" style="color:darkred">Schalter 5</p>';
        }
        else if (file_get_contents("gpio22.txt") == 0){
          echo '<p class="schalter" style="color:limegreen">Schalter 5</p>';
        }
        ?>
        <input type="submit" value="An" name="5-an">
        <input type="submit" value="Aus" name="5-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
        if (file_get_contents("gpio10.txt") == 1){
          echo '<p class="schalter" style="color:darkred">Schalter 6</p>';
        }
        else if (file_get_contents("gpio10.txt") == 0){
          echo '<p class="schalter" style="color:limegreen">Schalter 6</p>';
        }
        ?>
        <input type="submit" value="An" name="6-an">
        <input type="submit" value="Aus" name="6-aus">
      </form>
    </div>
    <div>
      <form method="get" action="index.php">
        <?php
        if (file_get_contents("gpio9.txt") == 1){
          echo '<p class="schalter" style="color:darkred">Schalter 7</p>';
        }
        else if (file_get_contents("gpio9.txt") == 0){
          echo '<p class="schalter" style="color:limegreen">Schalter 7</p>';
        }
        ?>
        <input type="submit" value="An" name="7-an">
        <input type="submit" value="Aus" name="7-aus">
      </form>
    </div>
  </div>
</body>

<html>
