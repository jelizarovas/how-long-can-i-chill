<html>

<body>
	<form action="admin.php" method="get">
		<input type="submit" value="+1!">
	</form>
	<br>

	<br>
	<?php


	?>

	<form action="clear.php" method="post">
		Kokiu numeriu prad�ti: <input type="text" name="number" />
		<input type="submit" />
	</form>



	<?php

	if (empty($_POST["number"]))
		echo "BUTINAI �VESKITE SU 00x, ar 0xx!!!!";
	else {
		echo "I�VALYTA! Prasid�s numeriu " . $_POST["number"];
		$file = fopen("log.txt", "w");
		fwrite($file, date("d") . ",");
		$hour = date("H") + 3;
		fwrite($file, $hour);
		fwrite($file, ",");
		fwrite($file, date("i") . ",");
		fwrite($file, $_POST["number"]);
		fclose($file);

		echo date("d") . "diena, ";
		$hour = date("H") + 3;
		echo $hour;
		echo " valanda ir ";
		echo date("i") . " minu�i�.";
	}





	?>

</body>

</html>