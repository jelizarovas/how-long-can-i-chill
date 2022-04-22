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

    echo "Šiandien yra " . date("d") . "diena. ";
    $hour = date("H") + 3;
    echo $hour;
    echo "valanda ir ";
    echo date("i") . " minučių.";
    $plusone = $data[3] + 1;
    if ($plusone < 100 && $plusone != 1 && $plusone != 2 && $plusone != 3 && $plusone != 4 && $plusone != 5 && $plusone != 6 && $plusone != 7 && $plusone != 8 && $plusone != 9)
      echo "Dabar eilėje yra Nr. 0" . $plusone;
    elseif ($plusone < 10)
      echo "Dabar eilėje yra Nr. 00" . $plusone;
    else
      echo "Dabar eilėje yra Nr. " . $plusone;

    fwrite($file, "\r\n");
    fwrite($file, date("d") . ",");
    $hour = date("H") + 3;
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
      echo "Kai sutartį pasirašinėjo Nr. " . $data2[3] . " buvo " . $data2[1] . "valanda ir " . $data2[2] . " minučių.";
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