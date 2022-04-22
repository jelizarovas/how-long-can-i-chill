<html>
<body>
Dabar sutartá pasiraðinëja Nr.:
<?php
$file = fopen("log.txt", "r") or exit("Unable to open file!");

	fseek($file,-3,SEEK_END);
	while (!feof($file))
  	{
  		echo fgetc($file);
  	}

fclose($file);
echo "<br>";

$file = fopen("log.txt", "r") or exit("Unable to open file!");
$file2 = fopen("minutes.txt", "w+") or exit("Unable to open file!");
	rewind($file);

	while(!feof($file))
  	{
		$data3=fgetcsv($file);
		$minutes=$data3[1]*60+$data3[2]-540;
		echo fwrite($file2,$minutes.",");
	}
fclose($file2);

$file2 = fopen("minutes.txt", "r") or exit("Unable to open file!");
$file3 = fopen("minutes2.txt", "w+") or exit("Unable to open file!");
$data4=fgetcsv($file2);



for ($y=0; $y<count($data4)-2; $y++)
  {
$minutes2=$data4[$y+1]-$data4[$y];
echo fwrite($file3,$minutes2.",");
  }
fclose($file3);
fclose($file2);

$file3 = fopen("minutes2.txt", "r") or exit("Unable to open file!");
$data5=fgetcsv($file3);


$suma=array_sum($data5);
$skaicius=count($data5);
$vid=$suma/$skaicius;

echo "<br>Vidutiniðkai vienas nr. laukia ".intval($vid)." minutes.";

fclose($file);
?>

<form action="index.php" method="post">
Áveskite savo numeriukà: <input type="text" name="number" />
<input type="submit" />
</form>



<?php 

if (empty($_POST["number"]))
	echo "Áveskite numeriukà ir suþinosite kiek apytiksliai liko laukti!";
else
	echo "Jums liko laukti ~ ".($_POST["number"]-$data3[3])*intval($vid);


 

?>
 minuèiø.<br />

</body>
</html>