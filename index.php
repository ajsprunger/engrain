<html>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<head>
<style>
h1{
  text-align: center;
}
table{
  border: 3px solid pink;
  padding: 3px;
  border-radius: 2%;
}
.tables{
  display: flex;
  align-items: flex-start;
  justify-content: center;
}
.table1{
  margin-right: 10px;
}
.table2{
  margin-left: 10px;
  align-self: bottom;
}
th{
  padding: 0px 10px;
}
td{
  text-align: center;
}

@media screen and (max-width: 600px) {
  table{
    width: 90%;
    margin: auto;
  }
  .tables{
    display: block;
    justify-content: center;
  }
  .table1{
    margin: auto;
  }
  .table2{
    margin: 10px auto;
  }
}

</style>
</head>
<body bgcolor="#EEFDEF">
  <h1>Units</h1>
<?php

$url = 'https://api.sightmap.com/v1/assets/1273/multifamily/units';

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'API-Key: ',
  'Content-Type: application/json'
]);

$response = json_decode(curl_exec($curl));
curl_close($curl);

$area1 = [];

$areaGreater = [];

foreach ($response->data as $unit) {
  if($unit->area > 1) {
    array_push($areaGreater, $unit);
  } else {
    array_push($area1, $unit);
  }
}

echo "<div class='tables'>";
echo "<table class='table1'>";
echo "<th> Unit Number </th>";
echo "<th> Area </th>";
echo "<th> Updated At </th>";
  foreach ($areaGreater as $unit) {
    echo "<tr>";
      echo "<td>".$unit->unit_number."</td>";
      echo "<td>".$unit->area."</td>";
      echo "<td>".date("m-d-y, g:i", $unit->updated_at)."</td>";
    echo "</tr>";
  }
echo "</table>";

echo "<table class='table2'>";
echo "<th> Unit Number </th>";
echo "<th> Area </th>";
echo "<th> Updated At </th>";
foreach ($area1 as $unit) {
  echo "<tr>";
  echo "<td>".$unit->unit_number."</td>";
  echo "<td>".$unit->area."</td>";
  echo "<td>".date("m-d-y, g:i", $unit->updated_at)."</td>";
  echo "</tr>";
}
echo "</table>";
echo "</div>";


?>
</body>
</html>