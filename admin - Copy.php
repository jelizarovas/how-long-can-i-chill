<?php
  
$file = fopen("log.txt", "r+") or exit("Unable to open file!");
//reikia i paskutine eilute kursoriu nunest
echo ftell($file);
echo "<br>";

fseek($file,-11,SEEK_END);
$data=fgetcsv($file);
echo ftell($file);
echo "<br>";

echo date("d").",";
$hour=date("H")+3;
echo $hour;
echo ",";
echo date("i").",";
$plusone=$data[3]+1;
if ($plusone<100)
echo "0".$plusone;
else
echo $plusone;

fwrite($file,"\r\n");
fwrite($file,date("d").",");
$hour=date("H")+3;
fwrite($file,$hour);
fwrite($file,",");
fwrite($file,date("i").",");
$plusone=$data[3]+1;
if ($plusone<100)
fwrite($file,"0".$plusone);
elseif ($plusone<10)
fwrite($file,"00".$plusone);
else
fwrite($file,$plusone);
fclose($file);

?>