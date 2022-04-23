<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>#How long can I chill??</title>

	<style type="text/css">
		:root {
			--container-padding: 18px;
			--bg-color: #d84848
		}

		html {
			height: 100%;
		}

		body {
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: var(--bg-color);
			margin: 0px;
			padding: 0px;
		}

		a {
			text-decoration: none;
			color: black;
			font-weight: bold;
			margin-right: 5px;
		}

		.container {
			width: 641px;
			height: 480px;
			box-sizing: border-box;
			background-color: white;
			padding: var(--container-padding);
		}

		.content {
			box-sizing: border-box;
			background-color: var(--bg-color);
			border-radius: 10px;
			height: 100%;
			display: flex;
			flex-direction: column;
			padding: 10px;
			align-items: center;
		}

		.ticket {
			font-size: 150px;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
		}

		.flex {
			display: flex;
			width: 100%;
		}

		.content-col {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			align-items: center;
			width: 100%;
		}

		.useful-links {
			align-self: flex-start;
		}

		.grow {
			flex-grow: 1;
		}

		.logo {
			width: auto;
			height: 215px;
			margin-inline: 30px;
			box-sizing: border-box;

		}
	</style>
</head>

<body>
	<div class="container">
		<div class="content">
			<span>Currently signing ticket number is:</span>
			<span class="ticket">No.
				<?php
				$file = fopen("log.txt", "r") or exit("Unable to open file!");

				fseek($file, -3, SEEK_END);
				while (!feof($file)) {
					echo fgetc($file);
				}

				fclose($file);
				?>

			</span>
			<div class="flex">
				<div class="content-col">
					<span>Today's ticket's average is
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
						min.</span>
					<span>Find Out How Long you have to wait!</span>
					<form action="index.php" method="post">
						<input type="text" name="number" placeholder="Your ticket number" />
						<input type="submit" />
					</form>
					<?php
					if (empty($_POST["number"]))
						echo "";
					else
						echo "You have left ~ " . ($_POST["number"] - $data3[3]) * intval($vid) . "minutes";
					?>
					<div class="useful-links">
						Useful links <br />
						<a href="http://www.vu.lt" target="_blank" rel="noopener noreferrer">vu.lt</a>
						<a href="http://www.ffsa.lt" target="_blank" rel="noopener noreferrer">ffsa.lt</a>
						<a href="http://www.ff.vu.lt" target="_blank" rel="noopener noreferrer">ff.vu.lt</a>

					</div>
				</div>
				<div><img class="logo" src="images/vusa_logo.svg" alt="Vilnius universtiy student assoc. logo" /></div>
			</div>

		</div>
	</div>

</body>

</html>