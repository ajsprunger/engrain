

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
<?php

$url = 'https://api.sightmap.com/v1/assets/1273/multifamily/units';

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'API-Key: ',
  'Content-Type: application/json'
]);

$response = curl_exec($curl);
curl_close($curl);

// echo $response . PHP_EOL;

while($response) {
  echo "<tr>";
  echo "<td>".$response["id"]."</td>";
  echo"</td>";
}

?>
</body>
</html>