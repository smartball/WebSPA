<?php 
	session_start();
	
	$namehost = '35.200.218.222';
    $root  = 'smartball';
    $password = 'ball1234';
    $dbname = 'serviceSPA';
	$dbcon = mysqli_connect($namehost,$root,$password,$dbname);
	if ((mysqli_connect_errno())) {
	echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
	}
	mysqli_set_charset($dbcon, 'utf8'); 
	
	 $query = "SELECT province.PROVINCE_NAME as PROVINCE_NAME,amphur.AMPHUR_NAME as AMPHUR_NAME,typefactor.TYPE_NAME as TYPE_NAME,weightfactor.FACTOR_NAME as FACTOR_NAME, weightfactor.WEIGHTOFFACTOR as WEIGHTOFFACTOR, weightfactor.ID as ID, weightfactor.TYPE as type FROM weightfactor
INNER JOIN province on province.PROVINCE_ID = weightfactor.PROVINCE_ID
INNER JOIN amphur on amphur.AMPHUR_CODE = weightfactor.AMPHUR_CODE 
INNER JOIN typefactor on typefactor.TYPE = weightfactor.TYPE ";
                                      

	$result = mysqli_query($dbcon,$query);

	$estate = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$estate[] = $row;
	}
	
	echo json_encode($estate);
	?> 
	