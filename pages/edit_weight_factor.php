<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/logo-real.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="" class="simple-text">
                    <img src="../assets/img/logo-real.png" style="width: 100px;" alt="">
                </a>
            </div>
            <div class="sidebar-wrapper">
               <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">flag</i>
                            <p>Weight Factor >> <u>Edit</u></p>
                        </a>
                    </li>
                    <li>
                        <a href="locate.php">
                            <i class="material-icons">pin_drop</i>
                            <p>Weight Loaction</p>
                        </a>
                    </li>
                    <li>
                        <a href="road.php">
                            <i class="material-icons">map</i>
                            <p>Weight Road</p>
                        </a>
                    </li>
                    <li>
                        <a href="map.php">
                            <i class="material-icons">location_on</i>
                            <p>Maps</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Edit Weight of Factor </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new tasks</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Andrew</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
            	<?php $id = $_GET['id'];
            	$namehost = '35.200.218.222';
			    $root  = 'smartball';
			    $password = 'ball1234';
			    $dbname = 'serviceSPA';
				$dbcon = mysqli_connect($namehost,$root,$password,$dbname);
				if ((mysqli_connect_errno())) {
				echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
				}
				mysqli_set_charset($dbcon, 'utf8'); 
				
				 $query = "SELECT province.PROVINCE_NAME as PROVINCE_NAME,
				 				  amphur.AMPHUR_NAME as AMPHUR_NAME,
				 				  typefactor.TYPE_NAME as TYPE_NAME,
				 				  weightfactor.FACTOR_NAME as FACTOR_NAME, 
				 				  weightfactor.WEIGHTOFFACTOR as WEIGHTOFFACTOR, 
				 				  weightfactor.ID as ID FROM weightfactor
								  INNER JOIN province on weightfactor.PROVINCE_ID = weightfactor.PROVINCE_ID
								  INNER JOIN amphur on amphur.AMPHUR_CODE = weightfactor.AMPHUR_CODE 
								  INNER JOIN typefactor on typefactor.TYPE = weightfactor.TYPE 
								  WHERE weightfactor.ID = '$id'";
			 	                                     

				$result = mysqli_query($dbcon,$query);
            	if($row = mysqli_fetch_array($result)) { ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../assets/img/logo-real.png" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray">Edit Weight Factor ( <?php echo $row['TYPE_NAME'] ; ?> )</h6>
                                    
	                                <div class="card-content">
	                                	<form id="form1" action="../service/update_weight_factor.php" method="post" class="form" enctype="multipart/form-data"  novalidate>
	                                		<input type="hidden" name="id" value="<?=$row['ID'];?>">
		                                    <div class="row">
		                                    	<div class="col-md-6">
		                                    		<div class="form-group label">
		                                                    <label class="control-label">จังหวัด (แก้ไขไม่ได้)</label>
		                                                    <input type="text" class="form-control" value="<?=$row['PROVINCE_NAME'];?>" style="text-align: center;" disabled>
		                                            </div>
		                                    	</div>
		                                    	<div class="col-md-6">
		                                    		<div class="form-group label">
		                                                    <label class="control-label">อำเภอ (แก้ไขไม่ได้)</label>
		                                                    <input type="text" class="form-control" value="<?=$row['AMPHUR_NAME'];?>" style="text-align: center;" disabled>
		                                            </div>
		                                    	</div>
		                                    </div>
		                                    <div class="row">
		                                    	<div class="col-md-6">
		                                    		<div class="form-group label">
		                                                    <label class="control-label">ชนิด (แก้ไขไม่ได้)</label>
		                                                    <input type="text" class="form-control" value="<?=$row['TYPE_NAME'];?>" style="text-align: center;" disabled>
		                                            </div>
		                                    	</div>
		                                    	<div class="col-md-6">
		                                    		<div class="form-group label">
		                                                    <label class="control-label">ชื่อ (แก้ไขไม่ได้)</label>
		                                                    <input type="text" id="name" class="form-control" value="<?=$row['FACTOR_NAME'];?>" style="text-align: center;" disabled>
		                                            </div>
		                                    	</div>
		                                    </div>
		                                    <div class="row">
		                                    	<div class="form-group label">
	                                                    <label class="control-label" style="color: blue">น้ำหนักของ Factor</label>
	                                                    <input type="text" value="<?=$row['WEIGHTOFFACTOR'];?>" name="weight" class="form-control" style="text-align: center;">
	                                            </div>
		                                    </div>
		                                    
		                                    
		                                    <button type="submit" class="btn btn-primary btn-round">Update Factor</button>
	                                	</form>
	                                </div>
                            	</div>
                            </div>
                        </div>
                    </div>
                    <div id="spin"></div>
                </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<!-- AdminLTE App -->
<script src="../themes/AdminLTE/dist/js/app.min.js"></script>
<!-- Smoke -->
<script src="../themes/smoke/js/smoke.min.js"></script>
<!-- Spin -->
<script src="../themes/smoke/js/spin.min.js"></script>


<script>

  $( document ).ajaxStart(function() {
   $("#spin").show();
  }).ajaxStop(function() {
   $("#spin").hide();
  });


  $(document).ready(function() {
    
      $("#name").focus();

      var spinner = new Spinner().spin();
      $("#spin").append(spinner.el);
      $("#spin").hide();

      $('#form1').on("submit",function(e) {

        if ($('#form1').smkValidate()) {
          
            $.ajax({
              url: '../service/update_weight_factor.php',
              type: 'POST',
              data: new FormData( this ),
              processData: false,
              contentType: false,
              dataType: 'json'
            }).done(function( data) {

              if (data.status === "success") {
                  //$.smkAlert({text: data.message , type: data.status});
                  alert("บันทึกข้อมูลสำเร็จ");
                  $(location).attr('href','index.php');
                } else {
                  alert("บันทึกข้อมูลไม่สำเร็จ");	
                  $.smkAlert({text: data.message , type: data.status});
                }
           
            $('#form1').smkClear();
            //$("#name").focus();

            });   
            e.preventDefault();
        }
        e.preventDefault();
      });
      
  });
</script>


</html>