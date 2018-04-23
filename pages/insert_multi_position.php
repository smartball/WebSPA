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
                    
                </div>
            </nav>
            <div class="content">
            <div class="card">
            	<div class="row" style="margin-left:2px;">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">เพิ่มตำแหน่งใน Google Map</h4>
                        <p class="category"></p>
                    </div>
            	
            		<div class="col-md-6" style="text-align: center;" >
                        
    
    
            			<div id="map"></div>
            			<div id="infowindow-content">
                          <img src="" width="16" height="16" id="place-icon" style="height: 30px;width: 30px;">
                          <span id="place-name"  class="title"></span><br>
                          <span id="place-address"></span>
                        </div>
            		</div>
            	<div class="col-md-6" style="margin-top: 5%;">
            		<h3 style="margin-top: 5%;margin-bottom: 5%; text-align: center;">ระบุรายละเอียดที่จะค้นหา</h3>
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
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group label">
                                <label class="input select">จังหวัด</label>
                                <select class="text-form"  id="province"  name="province">
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
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group label">
                                <label class="input select">อำเภอ</label>
                                <select class="text-form"  id="amphur" name="amphur">
                                    <option value="">--เลือก เขต/อำเภอ--</option>
                                </select>
                            </div>    
                        </div>
                        
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12" style="text-align: center;">
                                <label class="input select">ประเภท</label>
                                <!-- <div class="form-group is-empty"> -->
                                    <select class="text-form"  id="selectType" name="selectType" style="text-align: center;">
                                        <option value="supermarket">ซุปเปอร์มาร์เก็ต</option>
                                        <option value="store">ร้านค้า</option>
                                        <option value="department_store">ห้างสรรพสินค้า</option>
                                        <option value="storage">บริษัท</option>
                                        <option value="school">โรงเรียน</option>
                                        <option value="subway_station">สถานีรถไฟ</option>
                                        <option value="hospital">สถานพยาบาล</option>
                                        <option value="park">สวนสาธารณะ</option>
                                        <option value="cemetery">สุสาน</option>
                                    </select>
                                <!-- </div> -->
                            </div>
                        </div>
                        
                    </div>
                    <form id="form1" action="../service/upload_position.php" method="post" class="form" enctype="multipart/form-data"  novalidate>
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="col-md-12">
                        		<!-- <label class="input select">ระบุสถานที่</label> -->
                                <div class="form-group  is-empty">
                                    <input name="namePlace" type="text" id="namePlace" class="text-form" placeholder="ค้นหาสถานที่" style="text-align: center;">
                                    <span class="material-input"></span>
                                    
                                    <button type="button" class="addon-btn adn-50 adn-right clone" name="SearchPlace" id="SearchPlace">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                        	</div>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <input type="button" id="add" class="btn btn-warning" style="font-size: 20px" value="เพิ่มตำแหน่ง">
                    </div>
                    <div id="spin"></div>     
            	</div>
                </div>
                <div class="row" style="margin: 5% auto;padding-right: 5%;padding-left: 5%;">
                <table id="customers">
                    <tr>
                        <th>ชื่อสถานที่</th>
                        <th>ชนิด</th>
                    </tr>
                    <tbody id="tbody"></tbody>
                </table>    
            	</div>
                </form>                
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
<!-- AdminLTE App -->
<script src="../themes/AdminLTE/dist/js/app.min.js"></script>
<!-- Smoke -->
<script src="../themes/smoke/js/smoke.min.js"></script>
<!-- Spin -->
<script src="../themes/smoke/js/spin.min.js"></script>

<script>

  
</script>
<!--  Google Maps Plugin    -->
<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      var map;
      var infowindow;
      function initMap() {
        // var map = new google.maps.Map(document.getElementById('map'), {
        //   center: {lat: 13.756331, lng: 100.501765},
        //   zoom: 13,

        // });
        const options = {
            center: {lat: 13.75633, lng: 100.50177},
            zoom:10,
            // disableDefaultUI: true,
            streetViewControl:false,
            mapTypeId:'roadmap'//roadmap , satellite , hybrid , terrain
        };
        map = new google.maps.Map(document.getElementById('map'), options)
        // Create the search box and link it to the UI element.
        var input = document.getElementById('namePlace');
        var searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));
            

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          const getPositionLat = markers[0].getPosition().lat();
          const getPositionLng = markers[0].getPosition().lng();
          console.log(getPositionLat, getPositionLng);
          var coordinate = {lat: getPositionLat, lng: getPositionLng};
          map.fitBounds(bounds);
          setMap(coordinate);
        });
      }
      function setMap (_data){
        const selectType = document.getElementById('selectType').value;
        console.log(selectType);
        map = new google.maps.Map(document.getElementById('map'), {
          center: _data,
          zoom: 14,
          mapTypeId: 'roadmap',

        });
        console.log(_data);
        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: _data,
          radius: 2000,
          type: [selectType]
        }, callback);
        var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.05,
            map: map,
            center: _data,  
            radius: 2000
          });
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          
          createMarker(results);
          console.log(results);
        }
      }
      var dataList = [];
     
      function createMarker(place) {
          const Province = document.getElementById('province').value;
          const Amphur = document.getElementById('amphur').value;
          console.log(Province,Amphur);
        // const selectProvince = document.getElementById('province').value;
        // const selectAmphur = document.getElementById('Amphur').value;
        // console.log(selectProvince);
        dataList = [];
        for(var i = 0; i<place.length; i++){
          var placeLoc = place[i].geometry.location;
          var marker = new google.maps.Marker({
            map: map,
            position: place[i].geometry.location
          });
          const namePlace = place[i].name;
          const getPositionLat = marker.getPosition().lat();
          const getPositionLng = marker.getPosition().lng();
          const nameType = getType(place[i].types);
          
          dataList.push({
            name: namePlace,
            type: nameType,
            lat: marker.getPosition().lat(),
            lng: marker.getPosition().lng(),
            province: Province,
            amphur: Amphur
          });
        }
        // console.log(dataList);

        //sendData(dataList);
        var tbody = document.getElementById('tbody');
        tbody.innerHTML = "";
        for (var i = 0; i < dataList.length; i++) {
            var tr = "<tr>";

            tr += "<td>"+ dataList[i].name +"</td>" + "<td>" + dataList[i].type + "</td></tr>";

            tbody.innerHTML += tr;
        }
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
        var jsonData = JSON.stringify(dataList);
        // console.log(jsonData);
        
        
    }

    //console.log(dataList);
    $(document).ready(function(){ 

          $('#add').click(function(){ // prepare button inserts the JSON string in the hidden element 
            var jsonData = JSON.stringify(dataList);
            // console.log(jsonData)
            const data = {data : jsonData};
            console.log(data)
            $.ajax({
            type: "POST",
            url: "../service/upload_multi_position.php",
            data: {data : jsonData},
            processData: true,
            cache: false
            }).done(function( data) {

              if (data.status === "success") {
                  alert("บันทึกข้อมูลสำเร็จ");
                  $(location).attr('href','map.php');
                } else {
                  alert("บันทึกข้อมูลไม่สำเร็จ");   
                }
            });   
          }); 
    });     
      function getType(types){
        for(var i = 0 ;i< types.length; i++){
            let firstArray = types[types.length-types.length];
            var ChangeKeyword = '';
            if(firstArray == 'church' || firstArray == 'synagogue'){
                ChangeKeyword = 'โบสถ์';
                return ChangeKeyword;
            }
            else if(firstArray == 'cemetery' || firstArray == 'funeral_home'){
                ChangeKeyword = 'สุสาน';
                return ChangeKeyword;
            }
            else if(firstArray == 'dentist' || firstArray == 'doctor' || firstArray == 'hospital' || firstArray == 'pharmacy' || firstArray == 'physiotherapist' || firstArray == 'veterinary_care'){
                ChangeKeyword = 'สถานพยาบาล';
                return ChangeKeyword;
            }
            else if(firstArray == 'airport'){
                ChangeKeyword = 'ท่าอากาศยาน';
                return ChangeKeyword;
            }
            else if(firstArray == 'bus_station' || firstArray == 'taxi_stand' || firstArray == 'transit_station'){
                ChangeKeyword = 'ป้ายรถประจำทาง';
                return ChangeKeyword;
            }
            else if(firstArray == 'library'){
                ChangeKeyword = 'ห้องสมุด';
                return ChangeKeyword;
            }
            else if(firstArray == 'subway_station' || firstArray == 'train_station'){
                ChangeKeyword = 'สถานนีรถไฟ';
                return ChangeKeyword;
            }
            else if(firstArray == 'supermarket'){
                ChangeKeyword = 'ซุปเปอร์มาร์เก็ต';
                return ChangeKeyword;
            }
            else if(firstArray == 'department_store' || firstArray == 'shopping_mall'){
                ChangeKeyword = 'ห้างสรรพสินค้า';
                return ChangeKeyword;
            }
            else if(firstArray == 'hindu_temple'){
                ChangeKeyword = 'วัด';
                return ChangeKeyword;
            }
            else if(firstArray == 'mosque'){
                ChangeKeyword = 'มัสยิด';
                return ChangeKeyword;
            }
            else if(firstArray == 'school'){
                ChangeKeyword = 'สถานศึกษา';
                return ChangeKeyword;
            }
            else if(firstArray == 'accounting' || firstArray == 'atm' || firstArray == 'bank'){
                ChangeKeyword = 'ธนาคาร';
                return ChangeKeyword;
            }
            else if(firstArray == 'amusement_park' || firstArray == 'aquarium' || firstArray == 'art_gallery' || firstArray == 'bowling_alley' || firstArray == 'campground' || firstArray == 'zoo'){
                ChangeKeyword = 'สวนสนุก';
                return ChangeKeyword;
            }
            else if(firstArray == 'museum' || firstArray == 'painter'){
                ChangeKeyword = 'พิพิธภัณฑ์';
                return ChangeKeyword;
            }
            else if(firstArray == 'bakery' || firstArray == 'bicycle_store' || firstArray == 'cafe' || firstArray == 'clothing_store' || firstArray == 'florist' || firstArray == 'furniture_store' || firstArray == 'hardware_store' || firstArray == 'home_goods_store' || firstArray == 'jewelry_store' || firstArray == 'laundry' || firstArray == 'locksmith' || firstArray == 'meal_delivery' || firstArray == 'movie_rental' || firstArray == 'movie_theater' || firstArray == 'pet_store' || firstArray == 'restaurant' || firstArray == 'shoe_store' || firstArray == 'store' || firstArray == 'convenience_store' || firstArray == 'electronics_store'){
                ChangeKeyword = 'ร้านค้า';
                return ChangeKeyword;
            }
            else if(firstArray == 'car_dealer' || firstArray == 'car_rental' || firstArray == 'car_repair' || firstArray == 'car_wash' ){
                ChangeKeyword = 'ศูนย์บริการรถ';
                return ChangeKeyword;
            }
            else if(firstArray == 'bar' || firstArray == 'liquor_store' || firstArray == 'night_club'){
                ChangeKeyword = 'สถานบันเทิง';
                return ChangeKeyword;
            }
            else if(firstArray == 'beauty_salon' || firstArray == 'hair_care' || firstArray == 'spa'){
                ChangeKeyword = 'ร้านเสริมสวย';
                return ChangeKeyword;
            }
            else if(firstArray == 'city_hall' || firstArray == 'courthouse'  || firstArray == 'embassy' || firstArray == 'local_government_office' || firstArray == 'police' || firstArray == 'post_office' ){
                ChangeKeyword = 'อาคารราชการ';
                return ChangeKeyword;
            }
            else if(firstArray == 'fire_station'){
                ChangeKeyword = 'สถานีดับเพลิง';
                return ChangeKeyword;
            }
            else if(firstArray == 'gas_station'){
                ChangeKeyword = 'ปั้ม';
                return ChangeKeyword;
            }
            else if(firstArray == 'gym' || firstArray == 'stadium'){
                ChangeKeyword = 'สถานที่ออกกำลัง';
                return ChangeKeyword;
            }
            else if(firstArray == 'lodging'){
                ChangeKeyword = 'ที่พักอาศัย';
                return ChangeKeyword;
            }
            else if(firstArray == 'parking' || firstArray == 'rv_park'){
                ChangeKeyword = 'ที่จอดรถ';
                return ChangeKeyword;
            }
            else if(firstArray == 'electrician' || firstArray == 'insurance_agency' || firstArray == 'moving_company' || firstArray == 'plumber' || firstArray == 'real_estate_agency' || firstArray == 'roofing_contractor' || firstArray == 'storage' || firstArray == 'lawyer' || firstArray == 'travel_agency' || firstArray == 'finance'){
                ChangeKeyword = 'บริษัท';
                return ChangeKeyword;
            }
            else if(firstArray == 'park'){
                ChangeKeyword = 'สวนสาธารณะ';
                return ChangeKeyword;
            }
            else{
                const other = 'อื่นๆ'
                return other;
            }

            // return firstArray;
        }
      }
      $( document ).ajaxStart(function() {
       $("#spin").show();
      }).ajaxStop(function() {
       $("#spin").hide();
      });


  $(document).ready(function() {
      var spinner = new Spinner().spin();
      $("#spin").append(spinner.el);
      $("#spin").hide();

      // $('#add').on('click',function(e) {
      //   var jsonData = dataList;
      //   console.log(jsonData);
      //       $.ajax({
      //         url: '../service/upload_position.php',
      //         type: 'post',
      //         data: {data : jsonData}, 
      //         dataType: 'json'
      //       }).done(function( data) {

      //         if (data.status === "success") {
      //             alert("บันทึกข้อมูลสำเร็จ");
      //             $(location).attr('href','map.php');
      //           } else {
      //             alert("บันทึกข้อมูลไม่สำเร็จ");   
      //           }
      //       });   
      //   });
    });
      function sendData(_data){
        var jsonData = JSON.stringify(_data);

            $.ajax({
            type: "POST",
            url: "../service/upload_position.php",
            data: {data : jsonData}, 
            cache: false,

            success: function(){
                alert("OK");
            }
        });
      }
       
    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOPIuRcO9J3K4y0SrC_fHyJF5sgo8Wz58&libraries=places&callback=initMap"
        async defer></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
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