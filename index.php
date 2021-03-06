<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width"/>
  <title> Smart Home </title>
  <link href="style.css" rel="stylesheet">
  <?php
  // Userdaten in Datei speichern
  $timestamp = time();
  $datum = date("d.m.Y - H:i:s", $timestamp);
  $user_agent = $_SERVER["HTTP_USER_AGENT"];
  $ip = $_SERVER["REMOTE_ADDR"];
  $port = $_SERVER["REMOTE_PORT"];
  file_put_contents("/home/pi/Desktop/logfile.txt", $datum, FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", ": ", FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", $ip, FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", ", ", FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", $port, FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", ", ", FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", $user_agent, FILE_APPEND);
  file_put_contents("/home/pi/Desktop/logfile.txt", "\n", FILE_APPEND);
  // Listen und Befehle definieren
  $alle_gpios = array(2, 3, 4, 17, 27, 22, 10, 9, 11);
  $gpios = array(3, 4, 17, 27, 22, 10, 9);
  $gpio_liste = array(
    array(1, 3, "Schalter 1"),
    array(2, 4, "Schalter 2"),
    array(3, 17, "Schalter 3"),
    array(4, 27, "Schalter 4"),
    array(5, 22, "Schalter 5"),
    array(6, 10, "Schalter 6"),
    array(7, 9, "Schalter 7")
  );
  $an = "%d-an";
  $aus = "%d-aus";
  $datei = "gpio/gpio%d.txt";
  $terminal_out = "/usr/local/bin/gpio -g mode %d out";
  $terminal_an = "/usr/local/bin/gpio -g write %d 0";
  $terminal_aus = "/usr/local/bin/gpio -g write %d 1";

  // Alle GPIO-Pins als Outputs festlegen
  foreach($alle_gpios as $pin){
    shell_exec(sprintf($terminal_out, $pin));
  }

  // GPIO Steuerung
  if(isset($_GET["tor"])){ //Tor betätigen
    $gpio2_on = shell_exec("/usr/local/bin/gpio -g write 2 0");
    sleep(1);
    $gpio2_off = shell_exec("/usr/local/bin/gpio -g write 2 1");
  }
  if(isset($_GET["buzzer"])){ //Buzzer betätigen
    $gpio11_on = shell_exec("/usr/local/bin/gpio -g write 11 1");
    sleep(1);
    $gpio11_off = shell_exec("/usr/local/bin/gpio -g write 11 0");
  }
  else if(isset($_GET["alle-an"])){ //Alle GPIO-Pins anschalten
    foreach($gpios as $pin){
      file_put_contents(sprintf($datei, $pin), 0);
      shell_exec(sprintf($terminal_an, $pin));
    }
  }
  else if(isset($_GET["alle-aus"])){ //Alle GPIO-Pins ausschalten
    foreach($gpios as $pin){
      file_put_contents(sprintf($datei, $pin), 1);
      shell_exec(sprintf($terminal_aus, $pin));
    }
  }
  else foreach($gpio_liste as $pin_liste){ //Einzelne GPIO-Pins anschalten
    if(isset($_GET[sprintf($an, $pin_liste[0])])){
      file_put_contents(sprintf($datei, $pin_liste[1]), 0);
      shell_exec(sprintf($terminal_an, $pin_liste[1]));
    }
  }
  foreach($gpio_liste as $pin_liste){ //Einzelne GPIO-Pins ausschalten
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
    <div> <!Garagenschalter anzeigen>
      <form method="get" action="index.php">
        <p class="schalter">Garage</p>
        <input type="submit" value="Tor" name="tor">
      </form>
    </div>
    <div> <!Buzzerschalter anzeigen>
      <form method="get" action="index.php">
        <p class="schalter">Buzzer</p>
        <input type="submit" value="Buzzer" name="buzzer">
      </form>
    </div>
    <div> <!"Alle"-Schalter anzeigen>
      <form method="get" action="index.php">
        <p class="schalter" style="color:black">Alle</p>
        <input type="submit" value="An" name="alle-an">
        <input type="submit" value="Aus" name="alle-aus">
      </form>
    </div>
    <div> <!Andere Schalter anzeigen>
      <form method="get" action="index.php">
        <?php
        foreach($gpio_liste as $pin_liste){ //Schleife für mehrere Schalter
          echo "<div>";
          if (file_get_contents(sprintf($datei, $pin_liste[1])) == 1){ //Ausgeschaltet
            echo sprintf("<p class=\"schalter\" style=\"color:black\">%s</p>", $pin_liste[2]);
          }
          else if (file_get_contents(sprintf($datei, $pin_liste[1])) == 0){ //Angeschaltet
            echo sprintf("<p class=\"schalter\" style=\"color:limegreen\">%s</p>", $pin_liste[2]);
          }
          $an2 = sprintf($an, $pin_liste[0]);
          $aus2 = sprintf($aus, $pin_liste[0]);
          echo sprintf("<input type=\"submit\" value=\"An\" name=%s>", $an2); //Anschalter
          echo sprintf("<input type=\"submit\" value=\"Aus\" name=%s>", $aus2); //Ausschalter
          echo "</div>";
        }
        ?>
      </form>
    </div>
  </div>
</body>
</html>
