<?php

	$data = $_POST['data'];
	
	$jsonData = json_decode($data, true);
	
foreach ($jsonData as $key => $value) {
	$name = $value["name"];
	$type = $value["type"];
	$lat = $value["lat"];
	$lng = $value["lng"];
	$province = $value["province"];
	$amphur = $value["amphur"];
    // echo $name . $type . $lat . $lng . $province . $amphur . "<br>";
    $namehost = '35.200.218.222';
    $root  = 'smartball';
    $password = 'ball1234';
    $dbname = 'serviceSPA';
    $dbcon = mysqli_connect($namehost,$root,$password,$dbname);
    if ((mysqli_connect_errno())) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
    }
    mysqli_set_charset($dbcon, 'utf8'); 
    
    $sql = "INSERT ignore INTO location (PROVINCE_ID, AMPHUR_CODE, NAME, TYPE, LAT, LNG) VALUES ('$province', '$amphur', '$name', '$type','$lat','$lng')";
	    $result = mysqli_query($dbcon,$sql);
    
    
  }
  if($result){
	        
	        header('Content-Type: application/json');
          echo json_encode(array('status' => 'success','message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
	    }else {
			header('Content-Type: application/json');
			$errors = "ข้อมูลผิดพลาด กรุณาลองใหม่่".mysqli_error($dbcon);
			echo json_encode(array('status' => 'danger','message' => $errors));
			exit;
		}
  
?>