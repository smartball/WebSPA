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
    <link href="../assets/css/map.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-6.jpg">
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
                    <li>
                        <a href="index.php">
                            <i class="material-icons">flag</i>
                            <p>Weight Factor</p>
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
                    <li class="active">
                        <a href="map.php">
                            <i class="material-icons">location_on</i>
                            <p>Maps >> <u>Add Position</u></p>
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
                        <a class="navbar-brand" href="#"> Map </a>
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
            <div class="card">
            	<div class="row">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">แสดงพิกัดที่ถูกจัดเก็บ</h4>
                        <p class="category"></p>
                    </div>
            		
            		<form id="form1" action="upload.php" method="post" class="form" enctype="multipart/form-data"  novalidate>
            		<div class="row" style="text-align: center;margin:10%">
            		
            		<div class="row">
                    <div class="box"  style="text-align: center;">
                    <input type="file" name="file-6" id="file-6" class="inputfile inputfile-5" data-multiple-caption="{count} files selected" style="display: none" />
                    <label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file&hellip;</span></label>
                    </div>
                    </div>
                    <div class="row">
                    <?php 
                // ดึงข้อมูลจังหวัดนะจ๊ะ
                $namehost = '35.200.218.222';
			    $root  = 'smartball';
			    $password = 'ball1234';
			    $dbname = 'serviceSPA';
				$dbcon = mysqli_connect($namehost,$root,$password,$dbname);
				if ((mysqli_connect_errno())) {
				echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้".mysqli_connect_error();
				}
                mysqli_set_charset($dbcon, 'utf8'); 
                $sql = "SELECT * FROM province order by PROVINCE_NAME ASC";
                $sql_type = "SELECT distinct TYPE  FROM weightlocation ORDER BY TYPE ASC";
                $rst = mysqli_query($dbcon,$sql);
                $rdt = mysqli_query($dbcon,$sql_type);
                $types = array();
                $provinces = array();
                while ($row = mysqli_fetch_assoc($rst)) {
                $provinces[] = $row;
                }
                while ($row_type = mysqli_fetch_assoc($rdt)){
                	$types[] = $row_type;
                }
                ?>

                
                <select  style="height: 43px;margin:2px auto;" id="province"  name="province">
                    <option value="">--เลือกจังหวัด--</option>
                    <?php 
                    // ตรวจสอบ
                    if(!empty($provinces)){
                    // พบข้อมูล
                    foreach ($provinces as $province) {
                    echo '<option value="' . $province['PROVINCE_ID'] . '">' . $province['PROVINCE_NAME'] . '</option>';
                      }
                    }
                    ?>
                </select>
                <select  style="height: 43px;margin:2px auto;" id="amphur" name="amphur">
                    <option value="">--เลือก เขต/อำเภอ--</option>
                </select>
	                <select name="type"  style="height: 43px;margin:2px auto;">
		                <option value="">--ประเภทสิ่งปลูกสร้าง--</option>
		                <?php 
		                if(!empty($types)){
		                	foreach ($types as $type) {
		                		//echo '/<option value="">'.$type['TYPE'].'</option>';
		                		echo '<option value="' . $type['TYPE'] . '">' . $type['TYPE'] . '</option>';
		                	}
		                }

		                 ?>
		                
	                </select>
                    </div>
                    <div class="row">
                    	<input type="submit" class="btn btn-warning" style="font-size: 20px" value="Upload File">
                    </div>      
                    </div> 
                   	</form>
                    <div id="spin"></div>               
            	</div>
            	</div>                       
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



<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/map.js"></script>
<!-- AdminLTE App -->
<script src="../themes/AdminLTE/dist/js/app.min.js"></script>
<!-- Smoke -->
<script src="../themes/smoke/js/smoke.min.js"></script>
<!-- Spin -->
<script src="../themes/smoke/js/spin.min.js"></script>
<script type="text/javascript">
    /*
    By Osvaldas Valutis, www.osvaldas.info
    Available for use under the MIT License
*/
  
'use strict';

;( function ( document, window, index )
{
    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label    = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });
}( document, window, 0 ));
</script>
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
              url: 'upload.php',
              type: 'POST',
              data: new FormData( this ),
              processData: false,
              contentType: false,
              dataType: 'json'
            }).done(function( data) {

              if (data.status === "success") {
                  //$.smkAlert({text: data.message , type: data.status});
                  alert("บันทึกข้อมูลสำเร็จ");
                  $(location).attr('href','map.php');
                } else {
                  alert("บันทึกข้อมูลไม่สำเร็จ");	
                  //$.smkAlert({text: data.message , type: data.status});
                  $(location).attr('href','insert_file.php');
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
<script>
	//ดึงอำเภอ
        jQuery(function($) {
        jQuery('body').on('change','#province',function(){ 
            jQuery.ajax({
                'type':'POST',
                'url':'amphur.php',
                'cache':false,
                'data':{province_id:jQuery(this).val()},
                'success':function(html){
                    jQuery("#amphur").html(html);
                    }
                });
                return false;
            });    
        });
</script>
    
</html>