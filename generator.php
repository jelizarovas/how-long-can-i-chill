<html>

<head>
	<title>#Kiekdargaliuchillint???</title>
	<meta charset="UTF-8">
	<style type="text/css">
		body {
			background: #d84848
		}

		#Table_01 tr td strong {
			font-size: 450px;
		}
	</style>
</head>

<body>

	<?php
	$file = fopen("log.txt", "r+") or exit("Unable to open file!");
	fseek($file, -11, SEEK_END);
	$data = fgetcsv($file);
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

	<table id="Table_01" TABLE BORDER="0" cellpadding="0" CELLSPACING="0">
		<TR>

			<TD WIDTH="600" HEIGHT="353" BACKGROUND="lol.png" VALIGN="center" ALIGN="center">
				Šiuo metu sutartį pasirašinėja

				<br>
				<form action="generator.php" method="get">
					<input type="submit" value="+1!">
				</form>

				<br>
				<strong>

					<?php
					$file = fopen("log.txt", "r") or exit("Unable to open file!");

					fseek($file, -3, SEEK_END);
					while (!feof($file)) {
						echo fgetc($file);
					}

					fclose($file);
					?>

				</strong>
			</TD>

		</TR>
	</TABLE>


</body>

</html>