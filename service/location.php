<?php
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers");
	$parnode = $dom->appendChild($node);
	$namehost = '35.200.218.222';
    $root  = 'smartball';
    $password = 'ball1234';
    $dbname = 'serviceSPA';
	$dbcon = mysqli_connect($namehost,$root,$password,$dbname);
	if ((mysqli_connect_errno())) {
	echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
	}
	mysqli_set_charset($dbcon, 'utf8'); 
	
	$strSQL = "SELECT * FROM location  ";

	$objQuery = mysqli_query($dbcon,$strSQL);
	$resultArray = array();
	/*while($obResult = mysqli_fetch_array($objQuery))
	{
		array_push($resultArray,$obResult);
	}*/
	if (!$objQuery) {
  die("Invalid query: " .mysqli_error($dbcon) );
}

header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($objQuery)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  //$newnode->setAttribute("id", $row['ID']);
  $newnode->setAttribute("name", $row['NAME']);
  $newnode->setAttribute("lat", $row['LAT']);
  $newnode->setAttribute("lng", $row['LNG']);
  $newnode->setAttribute("type", $row['TYPE']);
}
echo $dom->saveXML();  
	//mysqli_close($dbcon);
	//echo $dom->saveXML();  
	//echo json_encode($resultArray);
?>