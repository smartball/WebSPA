<?php
	
	$namehost = '35.200.218.222';
    $root  = 'smartball';
    $password = 'ball1234';
    $dbname = 'serviceSPA';
	$dbcon = mysqli_connect($namehost,$root,$password,$dbname);
	if ((mysqli_connect_errno())) {
	echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
	}
	mysqli_set_charset($dbcon, 'utf8');

 	if (isset($_POST['province_id'])){

 		$province_id = $_POST['province_id'];

 		$sql = "SELECT * FROM amphur WHERE PROVINCE_ID = '$province_id'";
 		$rst = mysqli_query($dbcon,$sql);
 		$amphurs = array();
 		while ($row = mysqli_fetch_assoc($rst)) {
  		$amphurs[] = $row;
 		}

 		if(!empty($amphurs)){
 			echo ' <select id="province" class="form-control" name="amphur" required>';
 			echo '<option value=""> --- กรุณาเลือกอำเภอ --- </option>';
 			foreach ($amphurs as $amphur) {
 				echo '<option value="'.$amphur["AMPHUR_CODE"].'">'.$amphur["AMPHUR_NAME"].'</option>';
 				
 			echo '</select>';
 			}

 		}else{
 			return false;
 		}
 	}

	exit();
	