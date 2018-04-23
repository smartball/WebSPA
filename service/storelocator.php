<?php

// Get parameters from URL
$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"]; 
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
$namehost = '35.200.218.222';
    $root  = 'smartball';
    $password = 'ball1234';
    $dbname = 'serviceSPA';
  $con = mysqli_connect($namehost,$root,$password,$dbname);
// Opens a connection to a mySQL server
//$con = mysqli_connect ("localhost", $username, $password,$database );
if (!$con) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Search the rows in the markers table
//  SELECT id, name, address, lat, lng, ( cos( radians('-33') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('151.2') ) + sin( radians('-33') ) * sin( radians( lat ) ) ) AS distance FROM markers HAVING distance < '100' ORDER BY distance LIMIT 0 , 20
 /* $sql = "SELECT id, name, lat, lng, ( 6373 * cos( radians('13.729212') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('100.775616') ) 
    + sin( radians('13.729212') ) * sin( radians( lat ) ))  AS distance FROM markers HAVING distance < '100' ORDER BY distance LIMIT 0 , 20"; */
    $sql = "SELECT * FROM location" ;
$result = mysqli_query($con, $sql);
  
/*while ($test = mysqli_fetch_assoc($result)) {
  # code...
  
  echo $test["distance"];
}*/

   
if (!$result) {
  die("Invalid query: " .mysqli_error($con) );
}

header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['id']);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("distance", $row['distance']);
}
echo $dom->saveXML();  
?>