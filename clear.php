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
		Which number to start with? <input type="text" name="number" />
		<input type="submit" />
	</form>



	<?php

	if (empty($_POST["number"]))
		echo "Please enter with leading zeros, like 0XX or 00X!!!!";
	else {
		echo "CLEARED! Will Start with number " . $_POST["number"];
		$file = fopen("log.txt", "w");
		fwrite($file, date("d") . ",");
		$hour = date("H") + 3;
		fwrite($file, $hour);
		fwrite($file, ",");
		fwrite($file, date("i") . ",");
		fwrite($file, $_POST["number"]);
		fclose($file);

		echo date("d") . "day, ";
		$hour = date("H") + 3;
		echo $hour;
		echo " hour and  ";
		echo date("i") . " minute.";
	}





	?>

</body>

</html>