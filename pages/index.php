<?php session_start();
  
 ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<?php 
  include 'common/head.php';
?>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
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
                    <li class="active">
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
                        <a class="navbar-brand" href="#"> Smart Property Dashboard </a>
                    </div>
                   
                </div>
            </nav>
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="orange">
                                        <h4 class="title">แสดง Weight Location</h4>
                                        <p class="category"></p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table table-hover" id="table" data-toggle="table" data-url="../service/weight_factor.php"
                                               data-classes = "table table-hover"
                                               data-pagination = "true"
                                               data-page-size = "5"
                                               data-page-list = "[5,10,15]"
                                               data-search = "true"
                                               data-show-refresh = "true"
                                               data-show-toggle = "true"
                                               data-show-columns = "true"
                                               data-toolbar = "#remove"
                                               data-id-field = "FACTOR_NAME">
                                            <thead class="text-warning">
                                                <tr>
                                                <th data-field="ID" data-align="center">ลำดับ</th>    
                                                <th data-field="PROVINCE_NAME" data-align="center">จังหวัด</th>
                                                <th data-field="AMPHUR_NAME" data-align="center">อำเภอ</th>
                                                <th data-field="TYPE_NAME" data-align="center">ชนิด</th>
                                                <th data-field="FACTOR_NAME" data-align="center">ชื่อ factor</th>
                                               
                                                <th data-field="WEIGHTOFFACTOR" data-align="center">น้ำหนัก factor</th>
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
    </div>
<!-- REQUIRED JS SCRIPTS -->

</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>

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
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- bootstrap-table -->
<!-- Latest compiled and minified JavaScript -->
<script src="../themes/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="../themes/AdminLTE/dist/js/app.min.js"></script>
<!-- Smoke -->
<script src="../themes/smoke/js/smoke.min.js"></script>
<!-- bootstrap-table -->
<!-- Latest compiled and minified JavaScript -->
<script src="../themes/bootstrap-table/dist/bootstrap-table.min.js"></script>
<!-- Spin -->
<script src="../themes/smoke/js/spin.min.js"></script>

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
      window.location.replace('edit_weight_factor.php?id='+row.ID);
     }    
  };
  
</script>
</html>
