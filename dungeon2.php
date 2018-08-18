
<html>
<head>
  <title>Orion's Dungeon 2</title>
  <style type="text/css">

    .dungeonTable {
      border: 2px solid black;
          border-spacing: 0;
    }

    .dungeonTable td {
      width: 64px;
      height: 64px;
      border: 7px solid;
      margin: 0;
      padding: 0;

    }

    .dungeonTable td.floor {

      background-color: green;
      border-top-color: : rgb(116, 249, 128);
      border-left-color: rgb(130, 181, 127);
      border-right-color: rgb(43, 105, 14);
      border-bottom-color:  rgb(43, 105, 14);
    }
    .dungeonTable td.wall {

      background-color: rgb(15, 132, 131);
      border-top-color: : black;
      border-left-color: black ;
      border-right-color: rgb(38, 255, 254);
      border-bottom-color:  rgb(38, 255, 254);
    }

.dungeonTable td.stone {
  width: 21.33333333px;
  height: 21.33333333px;
  border: 21.33333333px solid;
  background-color: rgb(15, 132, 131);
  border-top-color: rgb(38, 255, 254);
  border-left-color: rgb(38, 255, 254);
  border-right-color: rgb(34, 66, 66);
  border-bottom-color: rgb(34, 66, 66);
}

  </style>
</head>

<body>
<table class ="dungeonTable">
<?php

$lineNumber = 0;

$width = $_GET['w'] ?? 16;
$height = $_GET['h'] ?? 16;
$coords = [];

$handle = fopen("levels/rooms.txt", "r") or die (" Unable to open file!");
// echo fread($myfile,filesize("levels/rooms.txt"));

if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
      if ($lineNumber==0) {
          $levelSize = explode(",", $buffer);
          var_dump($levelSize);
          $width = $levelSize[0];
          $height = $levelSize[1];
      } else {
        $coords[] = explode(",", $buffer);

      }

        echo $buffer."$lineNumber<br>\n";
        $lineNumber++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
fclose($myfile);
}

var_dump($coords);


$stoneX = rand(2,$width-2);
$stoneY = rand(2,$height-2);

for ($y=0; $y < $height; $y++) {
echo "<tr>";
for ($x=0; $x < $width; $x++) {

  $cellClass = 'floor';

  if ($x == 0 || $x == $width-1 || $y == 0 || $y == $height-1) {
    $cellClass = 'wall';
  }

  foreach ($coords as $coord) {

    if ($x == $coord[0] && $y == $coord[1])
      $cellClass = 'stone';
  }



//   if ($stoneX == $x && $stoneY == $y) {
//$link1 = 'onclick="location.href=\'dungeon2.php\'"';
// $cellClass = 'stone';
//
//   }

  echo "<td  $link1 class=\"$cellClass\">  </td>\n";
}
  echo"</tr>\n ";

}



 ?>
</table>
Example table



<table class="dungeonTable">
<tr>
  <td>
    cell
  </td>
  <td>
    cell
  </td>
</tr>
<tr>
  <td>
    cell
  </td>
  <td>
    cell
  </td>
</tr>

</table>

</body>
</html>
