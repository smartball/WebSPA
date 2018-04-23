<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>
  <link rel="icon" type="image/png" href="../assets/img/logo-real.png" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../themes/AdminLTE/bootstrap/css/bootstrap.min.css">
  <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <style>
    	#map {
        height: 500px;
        width: 100%;
		
        

      }
    </style>
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
                        <a class="navbar-brand" href="#"> Smart Property Dashboard </a>
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
            	    <div class="row" style="margin-left: 3%;margin-right: 3%">
            		<div class="col-md-5" style="text-align: center;" >
            			<div id="map"></div>
            			<button class="btn btn-warning" onclick='location.replace("insert_position.php")' style="font-size: 20px;width: 430px;"> เพิ่มที่ละตำแหน่งเดียว</a></button>
                        <button class="btn btn-success" onclick='location.replace("insert_multi_position.php")' style="font-size: 20px;width: 430px;"> เพิ่มที่ละหลายตำแหน่งตำแหน่ง</a></button>
                        <button class="btn btn-primary" onclick='location.replace("insert_file.php")' style="font-size: 20px;width: 430px"> เพิ่มตำแหน่งโดย KML File</a></button>
            		</div>
                    <div class="col-md-7">
                        <div class="card-content table-responsive">
                            <table class="table table-hover" id="table" data-toggle="table" data-url="../service/data_location.php"
                                   data-classes = "table table-hover"
                                   data-pagination = "true"
                                   data-page-size = "5"
                                   data-page-list = "[5,10,15]"
                                   data-search = "true"
                                   data-show-refresh = "true"
                                   data-show-toggle = "true"
                                   
                                   data-toolbar = "#remove"
                                   data-id-field = "TYPE">
                                <thead class="text-warning">
                                    <tr>
                                    
                                    
                                    <th data-field="PROVINCE_NAME" data-align="center">จังหวัด</th>
                                   
                                    <th data-field="AMPHUR_NAME" data-align="center">อำเภอ</th>
                                    <th data-field="NAME" data-align="center">ชื่อ</th>
                                    <th data-field="TYPE" data-align="center">ประเภท</th>
                                    <th data-field="operate" data-align="center"  data-events="operateEvents" data-formatter="operateFormatter" >แก้ไข</th>
                                  </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>    
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOPIuRcO9J3K4y0SrC_fHyJF5sgo8Wz58&callback"></script>

<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if ($('.main-panel > .content').length == 0) {
            $('.main-panel').css('height', '100%');
        }


        // Javascript method's body can be found in assets/js/demos.js
        demo.initGoogleMaps();
    });
</script>
<script>
  function operateFormatter(value, row, index) {
        return [
            '<a class="look btn btn-warning" href="javascript:void(0)" title="แก้ไข">',
            '<i class="glyphicon glyphicon-pencil"></i>',
            '</a>'
        ].join('');
    }
  window.operateEvents = {
     'click .look': function (e, value, row) {
      window.location.replace('edit_weight_road.php?id='+row.ID);
     }    
  };
  
</script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>


<!-- bootstrap-table -->
<!-- Latest compiled and minified JavaScript -->
<script src="../themes/bootstrap-table/dist/bootstrap-table.min.js"></script>
</html>