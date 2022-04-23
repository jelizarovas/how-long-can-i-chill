<html>

<body>
  <center>
    <br><br>
    <form action="admin.php" method="get">
      <input type="submit" value="+1!">
    </form>
    <br>



    <?php

    $file = fopen("log.txt", "r+") or exit("Unable to open file!");
    //reikia i paskutine eilute kursoriu nunest
    echo ftell($file) . "->";
    fseek($file, -11, SEEK_END);
    $data = fgetcsv($file);
    echo ftell($file);
    echo "<br>";

    echo "Current day is " . date("d") . ". Time is ";
    $hour = date("H") + 3; //TIMEZONE VILNIUS
    echo $hour;
    echo ": ";
    echo date("i") . ". ";
    $plusone = $data[3] + 1;
    if ($plusone < 100 && $plusone != 1 && $plusone != 2 && $plusone != 3 && $plusone != 4 && $plusone != 5 && $plusone != 6 && $plusone != 7 && $plusone != 8 && $plusone != 9)
      echo "Current Ticket No. 0" . $plusone;
    elseif ($plusone < 10)
      echo "Current Ticket No. 00" . $plusone;
    else
      echo "Current Ticket No. " . $plusone;

    fwrite($file, "\r\n");
    fwrite($file, date("d") . ",");
    $hour = date("H") + 3; //TIMEZONE VILNIUS
    fwrite($file, $hour);
    fwrite($file, ",");
    fwrite($file, date("i") . ",");
    $plusone = $data[3] + 1;
    if ($plusone < 100 && $plusone != 1 && $plusone != 2 && $plusone != 3 && $plusone != 4 && $plusone != 5 && $plusone != 6 && $plusone != 7 && $plusone != 8 && $plusone != 9)
      fwrite($file, "0" . $plusone);
    elseif ($plusone < 10)
      fwrite($file, "00" . $plusone);
    else
      fwrite($file, $plusone);
    fclose($file);

    ?>
    <br><br>

    <?php
    $file = fopen("log.txt", "r") or exit("Unable to open file!");

    while (!feof($file)) {
      $data2 = fgetcsv($file);
      echo "No. " . $data2[3] . " was signed at " . $data2[1] . ":" . $data2[2] . ".";
      echo "<br>";
    }
    fclose($file);
    ?>
    <br><br>
    <form action="clear.php" method="get">
      <input type="submit" value="CLEAR 0!">
    </form>
    <br>
    <a href="log.txt" target="_blank">LOG.TXT</A>
    </form>
  </center>
</body>

</html>