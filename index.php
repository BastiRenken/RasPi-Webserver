<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width"/>
  <title> Smart Home </title>
  <link href="style.css" rel="stylesheet">
  <?php
  // Listen und Befehle definieren
  $alle_gpios = array(2, 3, 4, 17, 27, 22, 10, 9);
  $gpios = array(3, 4, 17, 27, 22, 10, 9);
  $gpio_liste = array(
    array(1, 3),
    array(2, 4),
    array(3, 17),
    array(4, 27),
    array(5, 22),
    array(6, 10),
    array(7, 9)
  );
  $an = "%d-an";
  $aus = "%d-aus";
  $datei = "gpio%d.txt";
  $terminal_out = "/usr/local/bin/gpio -g mode %d out";
  $terminal_an = "/usr/local/bin/gpio -g write %d 0";
  $terminal_aus = "/usr/local/bin/gpio -g write %d 1";

  // Alle GPIO-Pins als Outputs festlegen
  foreach($alle_gpios as $pin){
    shell_exec(sprintf($terminal_out, $pin));
  }

  // GPIO Steuerung
  if(isset($_GET['tor'])){ //Tor betätigen
    $gpio2_on = shell_exec("/usr/local/bin/gpio -g write 2 0");
    sleep(1);
    $gpio2_off = shell_exec("/usr/local/bin/gpio -g write 2 1");
  }
  else if(isset($_GET['alle-an'])){ //Alle anschalten
    foreach($gpios as $pin){
      file_put_contents(sprintf($datei, $pin), 0);
    }
    foreach($gpios as $pin){
      shell_exec(sprintf($terminal_an, $pin));
    }
  }
  else if(isset($_GET['alle-aus'])){ //Alle ausschalten
    foreach($gpios as $pin){
      file_put_contents(sprintf($datei, $pin), 1);
    }
    foreach($gpios as $pin){
      shell_exec(sprintf($terminal_aus, $pin));
    }
  }
  else foreach($gpio_liste as $pin_liste){
    if(isset($_GET[sprintf($an, $pin_liste[0])])){
      file_put_contents(sprintf($datei, $pin_liste[1]), 0);
      shell_exec(sprintf($terminal_an, $pin_liste[1]));
    }
  }
  foreach($gpio_liste as $pin_liste){
    if(isset($_GET[sprintf($aus, $pin_liste[0])])){
      file_put_contents(sprintf($datei, $pin_liste[1]), 1);
      shell_exec(sprintf($terminal_aus, $pin_liste[1]));
    }
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
