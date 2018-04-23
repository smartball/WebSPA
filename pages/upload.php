<?php

	$new_picture_name = 'location'.".".pathinfo(basename($_FILES['file-6']['name']), PATHINFO_EXTENSION);
	$path_upload = "../assets/file/".$new_picture_name;
	move_uploaded_file($_FILES['file-6']['tmp_name'], $path_upload);
	$province = $_POST['province'];
	$amphur = $_POST['amphur'];
	$type = $_POST['type'];
	
	$namehost = '35.200.218.222';
    $root  = 'smartball';
    $password = 'ball1234';
    $dbname = 'serviceSPA';
    $dbcon = mysqli_connect($namehost,$root,$password,$dbname);
    if ((mysqli_connect_errno())) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
    }
    mysqli_set_charset($dbcon, 'utf8'); 
    
    $dom = new DOMDocument();
    // load file 
    $dom->load("../assets/file/location.kml");
    // get coordinates tag
    $coordinates = $dom->getElementsByTagName("coordinates");
    $lengthCo = $coordinates->length;

    $names = $dom->getElementsByTagName("name");
    $lengthName = $names->length;
    
    for($i=0;$i<$lengthCo;$i++){
      $co = $coordinates[$i]->nodeValue;
      $na = $names[$i+1]->nodeValue;
      $devide = explode(",", $co);
      $lat = $devide[1];
      $lng = $devide[0];
      
      	$sql = "INSERT INTO location (PROVINCE_ID, AMPHUR_CODE, NAME, TYPE, LAT, LNG) VALUES ('$province', '$amphur', '$na', '$type','$lat','$lng')";
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