# How Long Can I Chill

Originally `kiekgalimachillint`

## Why

Signing a contract for university was boring with lines lasting 2-4 hours. [Vilnius University Students' Representation](https://ff.vusa.lt/l) decided to spruce up the signing process by adding enterainment - games, tours, etc. We feared that people wouldn't want to leave their long lines, so I suggested ticketing system like banks use, just available online.

## Idea

Soon to be students would grab a ticket as they show up, get a quick explanation how it works, and either stay in the area and be entertained, leave to explore the city, or just go get food. They could check the current ticket number by going to the [website](https://kiekdargaliuchilling.99k.org) and also what's the aproximate wait time left.

## Execution

When i proposed the idea, I had no clue how to execute it. I've had some html experience, and to make the websites I would designed them in Adobe Photoshop use slicer tool to cut it up, and replace the content areas with actual text. JavaScript was nowhere near my radar and the only php I've ever done was light editing WordPress themes. I had less than 14 hours to learn and execute it, by pulling an all nighter.

### Requirements

- Display Current Ticket Number
- Admin panel to update
- Show approximate time remaining by entering you number

### Template for the actual ticket

![Ticket](images/ticket_template.png)

Not sure how exactly this part was executed, but I am guessing that I took the template, added multiples of it to word document, and manually wrote out the numbers. Or just printed a bunch of blank ones and manually wrote numbers on it.

It was perfect for that one time usage, but now I would just write a generator, and maybe add a qr code with a route [webpage/453](#453), just to remove url typing, and any user input.

### Design [Initial]

![Website deisgn](images/Screenshot.png)

## 4/23/22 - Englishify

Translated index.php, admin.php to english and removed unnecessary copies of php files. Also replaced image with useful links with actual anchor tags.

### Lighthouse score

| Performance | Accessibility | Best Practices | SEO | PWA |
| ----------- | ------------- | -------------- | --- | --- |
| 99          | 75            | 83             | 67  | N/A |

## 4/23/22 - Index rework

Replaced the whole sliced table design with flex css, looking almost identical to original design with some minor tweaks.

![Website deisgn](images/Snapshot%2022-04-23.png)

### Lighthouse score 2

| Performance | Accessibility | Best Practices | SEO | PWA |
| ----------- | ------------- | -------------- | --- | --- |
| 100         | 100           | 100            | 87  | N/A |

## 4/23/22 - Welcome javascript

Due to the fact that I do not want to host a server for this project, and host it on github pages - I will need to remove php and replace it with javascript.

On index page i used php to calculate average time between tickets and calculate time left until users ticket is called.

```php
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
```

This approach uses a very weird approach where i'm using 3 files (`log.txt`[1], `minutes.txt`[2] and `minutes2.txt`[3]).

Instead of using an array for calculations, i was storing them in a file.

[1] `log.txt` would look like this:

```text
23,13,58,010
23,14,01,011
23,14,04,012
23,14,09,013
23,14,12,014
23,14,16,015
23,14,19,016
23,14,25,017
23,14,37,018
23,15,45,019
23,17,14,020
23,17,18,021
```

[2] `minutes.txt` would look like this:

```text
298,301,304,309,312,316,319,325,337,405,494,498,
```

[3] `minutes2.txt` would look like this:

```text
3,3,5,3,4,3,6,12,68,89,4,
```

None of this has to be done on the users end and we will only need two endpoints for user: `newTicket()` & `getData()` which should return `averageTicketTime` and `currentTicket` .

```php
<?php
$file = fopen("log.txt", "r") or exit("Unable to open file!");

fseek($file, -3, SEEK_END);
while (!feof($file)) {
    echo fgetc($file);
}

fclose($file);
?>
```

```php
<?php
if (empty($_POST["number"]))
    echo "";
else
    echo "You have left ~ " . ($_POST["number"] - $data3[3]) * intval($vid) . "minutes";
?>
```
