<html>

<head>
	<title>#How long can I chill??</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1257">
	<style type="text/css">
		#Table_01 tr td strong {
			font-size: 150px;
			font-family: Arial, Helvetica, sans-serif;
		}

		a {
			text-decoration: none;
			color: black;
			font-weight: bold;
			margin-right: 5px;
		}
	</style>
</head>

<body bgcolor="#d84848" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<!-- Save for Web Slices (Untitled-1.psd) -->
	<center>
		<table id="Table_01" width="641" height="481" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="9">
					<img src="images/index_01.gif" width="640" height="26" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="26" alt="">
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<img src="images/index_02.gif" width="86" height="29" alt="">
				</td>
				<td colspan="3">
					Currently signing ticket number is:</td>
				<td colspan="2">
					<img src="images/index_04.gif" width="186" height="29" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="29" alt="">
				</td>
			</tr>
			<tr>
				<td rowspan="7">
					<img src="images/index_05.gif" width="30" height="425" alt="">
				</td>
				<td colspan="7">
					<center><strong>

							No.
							<?php
							$file = fopen("log.txt", "r") or exit("Unable to open file!");

							fseek($file, -3, SEEK_END);
							while (!feof($file)) {
								echo fgetc($file);
							}

							fclose($file);
							?>


						</strong></center>
				</td>
				<td rowspan="7">
					<img src="images/index_07.gif" width="33" height="425" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="177" alt="">
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="3">
					<img src="images/index_08.gif" width="42" height="177" alt="">
				</td>
				<td colspan="3" align="center">
					Today one ticket took<br>
					an average of
					<?php
					$file = fopen("log.txt", "r") or exit("Unable to open file!");
					$file2 = fopen("minutes.txt", "w+") or exit("Unable to open file!");
					rewind($file);

					while (!feof($file)) {
						$data3 = fgetcsv($file);
						$minutes = $data3[1] * 60 + $data3[2] - 540;
						fwrite($file2, $minutes . ",");
					}
					fclose($file2);

					$file2 = fopen("minutes.txt", "r") or exit("Unable to open file!");
					$file3 = fopen("minutes2.txt", "w+") or exit("Unable to open file!");
					$data4 = fgetcsv($file2);



					for ($y = 0; $y < count($data4) - 2; $y++) {
						$minutes2 = $data4[$y + 1] - $data4[$y];
						fwrite($file3, $minutes2 . ",");
					}
					fclose($file3);
					fclose($file2);

					$file3 = fopen("minutes2.txt", "r") or exit("Unable to open file!");
					$data5 = fgetcsv($file3);


					$suma = array_sum($data5);
					$skaicius = count($data5);
					$vid = $suma / $skaicius;

					echo intval($vid);

					fclose($file);
					?>
					minutes.</td>
				<td colspan="2" rowspan="4">
					<img src="images/index_10.gif" width="206" height="215" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="56" alt="">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p>
						<center>Find Out How Long you have to wait! <br>Enter Your No.</center>
					</p>
					<center>
						<form action="index.php" method="post">
							<input type="text" name="number" />
							<input type="submit" />
						</form>
					</center>

					<center>

						<?php

						if (empty($_POST["number"]))
							echo "";
						else
							echo "You have left ~ " . ($_POST["number"] - $data3[3]) * intval($vid) . "minutes";




						?>
						<br />
					</center>
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="112" alt="">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<img src="images/index_12.gif" width="329" height="9" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="9" alt="">
				</td>
			</tr>
			<tr>
				<td rowspan="3">
					<img src="images/index_13.gif" width="9" height="71" alt="">
				</td>
				<td colspan="3" rowspan="2">
					<!-- <img src="images/index_14.gif" width="352" height="48" alt=""> -->
					<div width="352" height="48">
						Useful links <br />
						<a href="http://www.vu.lt" target="_blank" rel="noopener noreferrer">vu.lt</a>
						<a href="http://www.ffsa.lt" target="_blank" rel="noopener noreferrer">ffsa.lt</a>
						<a href="http://www.ff.vu.lt" target="_blank" rel="noopener noreferrer">ff.vu.lt</a>

					</div>
				</td>
				<td rowspan="3">
					<img src="images/index_15.gif" width="10" height="71" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="38" alt="">
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="2">
					<img src="images/index_16.gif" width="206" height="33" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="10" alt="">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<img src="images/index_17.gif" width="352" height="23" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="1" height="23" alt="">
				</td>
			</tr>
			<tr>
				<td>
					<img src="images/spacer.gif" width="30" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="9" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="33" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="14" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="305" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="10" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="53" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="153" height="1" alt="">
				</td>
				<td>
					<img src="images/spacer.gif" width="33" height="1" alt="">
				</td>
				<td></td>
			</tr>
		</table>
	</center>
	<!-- End Save for Web Slices -->
</body>

</html>