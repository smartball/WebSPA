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
                    <li>
                        <a href="index.php">
                            <i class="material-icons">flag</i>
                            <p>Weight Factor</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="locate.php">
                            <i class="material-icons">pin_drop</i>
                            <p><u> Add New Location type</u></p>
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
            
            <div class="content">
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
                $rst = mysqli_query($dbcon,$sql);
                $provinces = array();
                while ($row = mysqli_fetch_assoc($rst)) {
                $provinces[] = $row;
                }
                
                ?>
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
                                    <h6 class="category text-gray">Add New Location Type ( <?php echo $row['TYPE_NAME'] ; ?> )</h6>
                                    
                                    <div class="card-content">
                                       <form id="form1" action="../service/add_new_type.php" method="post" class="form" enctype="multipart/form-data"  novalidate>
                                            <input type="hidden" name="id" value="<?=$row['ID'];?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label">
                                                            <label class="control-label">จังหวัด</label>
                                                            <select class="form-control" style="height: 43px;margin:2px auto;" id="province"  name="province">
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
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label">
                                                            <label class="control-label">อำเภอ</label>
                                                            <select  class="form-control" style="height: 43px;margin:2px auto;" id="amphur" name="amphur">
                                                                <option value="">--เลือก เขต/อำเภอ--</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group label">
                                                            <label class="control-label">ประเภท</label>
                                                            <input type="text" class="form-control" name="name" value="" style="text-align: center;">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="form-group label">
                                                        <label class="control-label" style="color: blue">น้ำหนักของ Location</label>
                                                        <input type="text" value="" name="weight" class="form-control" style="text-align: center;">
                                                </div>
                                            </div>
                                            
                                            
                                            <button type="submit" class="btn btn-primary btn-round">เพิ่มประเภทสถานที่</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="spin"></div>
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
              url: '../service/add_new_type.php',
              type: 'POST',
              data: new FormData( this ),
              processData: false,
              contentType: false,
              dataType: 'json'
            }).done(function( data) {

              if (data.status === "success") {
                  //$.smkAlert({text: data.message , type: data.status});
                  alert("บันทึกข้อมูลสำเร็จ");
                  $(location).attr('href','locate.php');
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