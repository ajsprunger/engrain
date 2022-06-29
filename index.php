

<html>
<head>
<style>
table{
  border-style:solid;
  border-width:2px;
  border-color:pink;
}
</style>
</head>
<body bgcolor="#EEFDEF">
  <h1>Testing Table</h1>
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

// echo $response . PHP_EOL;

// while($response) {
//   echo "<tr>";
//   echo "<td>".$response["id"]."</td>";
//   echo "</td>";
// }

echo "<table>";
echo "<th> Unit Number </th>";
echo "<th> Area </th>";
echo "<th> Updated At </th>";
  foreach ($response->data as $unit) {
    // echo $unit->id;
    echo "<tr>";
      echo "<td>".$unit->unit_number."</td>";
      echo "<td>".$unit->area."</td>";
      echo "<td>".date("m-d-y, g:i", $unit->updated_at)."</td>";
    echo "</tr>";
  }
echo "</table>";

?>
</body>
</html>