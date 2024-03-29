
<html>    
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>        
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/gmap3.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="assets/embed_fonts.css" />
    <style>
       body{
        text-align:center;
        font-family: CmPrasanmit, Arial, 'Arial Unicode MS', Helvetica, Sans-Serif;
      }
      h1, h2{
        font-family: 'ThaiSans Neue', Arial, 'Arial Unicode MS', Helvetica, Sans-Serif;
        font-weight: normal;
      }
      h1{
        margin-left: 30px;
      }
      h2, p{
        margin: 0;
      }
      .awesome{
        padding: 10px 15px;
        background: #4479BA;
        color: #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        border: solid 1px #20538D;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
        text-decoration: none;
      }
      .awesome:hover, .awesome:focus {
        background: #356094;
        border: solid 1px #2A4E77;
        text-decoration: none;
        -webkit-transition-duration: 0.2s;
        -moz-transition-duration: 0.2s;
        transition-duration: 0.2s;
      }
      .awesome:active {
          -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
          -moz-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
          box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
          background: #2E5481;
          border: solid 1px #203E5F;
      }

      #container{
        overflow: hidden;
        margin: 0 auto;
        width: 820px;
        padding: 0;
      }
      .gmap3, #tool{
        margin: 0 auto;
        padding: 0;
        border: 1px dashed #C0C0C0;
        width: 395px;
        height: 480px;
        float: left;
      }
      #tool{
        width: 400px;
        padding: 0;
        text-align:left;
      }
      #data{
        position: relative;
        width: 400px;
        height: 480px;
      }
      #backtomain{
        position: absolute;
        bottom: 0;
        left: 0;
        height: 25px;
      }
      .pcc_group_datail{
        position: absolute;
        top: 0;
        left: 0;
      }
     .pcc_group_datail, .element_inactive{
        visibility: hidden;
        opacity: 0; 
        -webkit-transition: all 500ms ease-in-out;
           -moz-transition: all 500ms ease-in-out;
             -o-transition: all 500ms ease-in-out;
            -ms-transition: all 500ms ease-in-out;
                transition: all 500ms ease-in-out;  
        -webkit-transform: scale(0.5) translate(0,-37%);
           -moz-transform: scale(0.5) translate(0,-37%);
             -o-transform: scale(0.5) translate(0,-37%);
            -ms-transform: scale(0.5) translate(0,-37%);
                transform: scale(0.5) translate(0,-37%);
      }
      .element_active{
        visibility: visible;
        -webkit-transform: scale(1) translate(0,0);
           -moz-transform: scale(1) translate(0,0);
             -o-transform: scale(1) translate(0,0);
            -ms-transform: scale(1) translate(0,0);
                transform: scale(1) translate(0,0);
        opacity: 1;
      }
      .pcc_group_datail img{
        width: 400px;
        height: 100px;
        border: none;
      }
      #title a, #title a:link, #title a:hover, #title a:visited, .data_content h2 a, .data_content h2 a:link, .data_content h2 a:hover, .data_content h2 a:visited{
        font-size: 20px;
        text-decoration: none;
        color: rgb(6, 23, 81);
      }
      #title a:hover, .data_content h2 a:hover{
        color: #EF4100;
      }
      .data_content {
        margin-top: 0;
        margin-left: 15px;
        font-size: 20px;
      }
      .data_content h2 a, .data_content h2 a:link, .data_content h2 a:hover, .data_content h2 a:visited{
        font-size: 27px;
      }

    </style>
    
    <script type="text/javascript">
    var markers = [
      {latLng:[19.920079, 99.884048], id:"PCCCR"}, //เชียงราย
      {latLng:[16.933640,100.235094], id:"PCCPL"}, //พิษณุโลก
      {latLng:[17.725730,101.730118], id:"PCCL"}, //เลย
      {latLng:[14.966620,100.690810], id:"PCCLB"}, //ลพบุรี
      {latLng:[13.294038,101.163518], id:"PCCCB"}, //ชลบุรี
      {latLng:[12.784633, 99.914921], id:"PCCPB"}, //เพชรบุรี
      {latLng:[ 6.730385,100.064887], id:"PCCST"}, //สตูล 
      {latLng:[ 7.552763, 99.557688], id:"PCCTRG"}, //ตรัง
      {latLng:[15.307858,103.303539], id:"PCCBR"}, //บุรีรัมย์
      {latLng:[16.605453,104.679269], id:"PCCMH"}, //มุกดาหาร
      {latLng:[14.112344,100.398573], id:"PCCPT"}, //ปทุมธานี
      {latLng:[ 8.368934,100.044933], id:"PCCNST", callback: function(marker){
              console.log(marker.position);
            }} //นครศรีธรรมราช 
    ];
    var currDir = document.URL.substr(0,document.URL.lastIndexOf('/'));
    var markersIcon = [
      currDir+"/assets/img/pcccr.png",
      currDir+"/assets/img/pccpl.png",
      currDir+"/assets/img/pccl.png",
      currDir+"/assets/img/pcclb.png",
      currDir+"/assets/img/pcccb.png",
      currDir+"/assets/img/pccpb.png",
      currDir+"/assets/img/pccst.png",
      currDir+"/assets/img/pcctrg.png",
      currDir+"/assets/img/pccbr.png",
      currDir+"/assets/img/pccmh.png",
      currDir+"/assets/img/pccpt.png",
      currDir+"/assets/img/pccnst.png"
    ];
    var mapCenter = [13.727896,100.524123];
    var mapCenterObj = new google.maps.LatLng(mapCenter[0], mapCenter[1]);
    var markerPosition = new Object();
     $(function(){
        $.each(markers, function(i){
          markers[i].options = new Object();
          markers[i].options.icon = new google.maps.MarkerImage(markersIcon[i]);
          markerPosition[markers[i].id] = new google.maps.LatLng(markers[i].latLng[0],markers[i].latLng[1]);
          $("#data_"+markers[i].id.toLowerCase()+' h2').prepend('<img src="'+markersIcon[i]+'" style="width: 32px; height: 32px; vertical-align: middle;" />')
        });
        $('#map').gmap3({
          map:{
            options:{
              center:mapCenter,
              zoom: 5
            }
          },
          marker:{
            values: markers,
            options:{
              draggable: false
            },
            
            events: {
              click: function(marker, event, context){
                markerSelected(context.id);
              }
            }
          }
        });

        
        /*$("#bcolor").click(function(){
          var marker = $('#map').gmap3({get: $("#markerId .value").text() });
          marker.setIcon(marker.getIcon() ? "" : "http://maps.google.com/mapfiles/marker_green.png");
        });
        
        $("#bremove").click(function(){
          $('#map').gmap3({clear: $("#markerId .value").text() });
          $("#data").hide();
          $("#title").show();
        });*/
        $(".pcc_group_link").click(function(e){
          var id = $(this).attr("href").substr(1).toUpperCase();
          //console.log(markerPosition[id]);
          var map = $("#map").gmap3('get');          
          map.panTo(markerPosition[id]);
          map.setZoom(8);
          showDetail(id);
          e.preventDefault();
        });

        $("#backtomain").click(function(e){
          var oldId = $(".pcc_group_datail.element_active");
          if(typeof oldId != "undefined") oldId.removeClass("element_active");
          $("#data, #backtomain").removeClass("element_active");
          $("#title").removeClass("element_inactive");
          setTimeout(function(){ $("#title").fadeIn(); }, 500);
          var map = $("#map").gmap3('get');          
          map.panTo(mapCenterObj);
          map.setZoom(5);
          e.preventDefault();
        });
        
      });
      
      function markerSelected(id){
        var marker = $('#map').gmap3({get:id});
        
        /*$("#markerId .value").text(id);
        $("#latitude .value").text(marker.getPosition().lat());
        $("#longitude .value").text(marker.getPosition().lng());*/
        showDetail(id.toLowerCase());
        $("#map").gmap3('get').panTo(markerPosition[id]);
        $("#map").gmap3('get').setZoom(8);
      }
      function showDetail(id){
        //alert($('#data').hasClass("element_inactive"));
        if ($('#data').hasClass("element_inactive")) { 
          $('#data').removeClass("element_inactive"); 
          $("#data").addClass("element_active"); 
        }
        if ($('#backtomain').hasClass("element_inactive")) $('#backtomain').removeClass("element_inactive");
        $("#title").addClass("element_inactive").css("display","none");
        var oldId = $(".pcc_group_datail.element_active").attr("id");
        if(typeof oldId != "undefined") $("#"+oldId).removeClass("element_active");
        $("#data_"+id.toLowerCase()).addClass("element_active");
      }
      
    </script>
  <body>
    <div id="container">
      <div id="map" class="gmap3"></div>
      <div id="tool">
        <div id="title">
          <h1>กลุ่มโรงเรียนจุฬาภรณราชวิทยาลัย</h1>
          <ul>
            <li><a href="#pcccr" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย เชียงราย</a></li>
            <li><a href="#pccpl" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย พิษณุโลก</a></li>
            <li><a href="#pccl" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย เลย</a></li>
            <li><a href="#pcclb" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย ลพบุรี</a></li>
            <li><a href="#pcccb" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย ชลบุรี</a></li>
            <li><a href="#pccpb" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย เพชรบุรี</a></li>
            <li><a href="#pccst" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย สตูล</a></li>
            <li><a href="#pcctrg" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย ตรัง</a></li>
            <li><a href="#pccbr" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย บุรีรัมย์</a></li>
            <li><a href="#pccmh" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย บุรีรัมย์</a></li>
            <li><a href="#pccpt" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย ปทุมธานี</a></li>
            <li><a href="#pccnst" class="pcc_group_link">โรงเรียนจุฬาภรณราชวิทยาลัย นครศรีธรรมราช</a></li>
          </ul>
        </div>
        <div id="data" class="element_inactive">
          <div id="data_pccnst" class="pcc_group_datail">
            <img class="pcc_group_cover" src="./assets/img/cover/pccnst.png" />
            <div class="data_content"><h2>
              <a href="http://www.pccnst.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย นครศรีธรรมราช</a></h2>
            <p>
              <table>
              <tbody>
              <tr>
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">เลขที่ 120 ถนนสุนอนันต์ หมู่ที่ 1 ตำบลบางจาก อำเภอเมือง จังหวัดนครศรีธรรมราช รหัสไปรษณีย์ 80330</td>
              </tr>
              <tr>
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">0-7539-9123</td>
              </tr>
              <tr>
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">0-7539-9453</td>
              </tr>
              <tr>
              <td style="border-width: 0px;"><strong>Website</strong></td>
              <td style="border-width: 0px;"><a href="http://www.pccnst.ac.th/" target="_blank">www.pccnst.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pccst" class="pcc_group_datail">
            <a href="http://www.pccst.ac.th/pccst_visit.html" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccst.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccst.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย สตูล</a></h2>
            <p>
              <table>
              <tbody>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">เลขที่ 138 หมู่ที่ 12 ตำบลฉลุง อำเภอเมือง จังหวัดสตูล รหัสไปรษณีย์ 91140</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">0-7472-5982</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">0-7472-5981</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>Website</strong></td>
              <td style="border-width: 0px;"><a title="www.pccst.ac.th" href="http://www.pccst.ac.th">www.pccst.ac.th</a></td>
              </tr>
              </tbody>
              </table>
              
            </p></div>
          </div>
          <div id="data_pcctrg" class="pcc_group_datail">
            <a href="http://www.pcctrg.ac.th" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pcctrg.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pcctrg.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย ตรัง</a></h2>
            <p>
              <table>
              <tbody>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">เลขที่ 196 ตำบลบางรัก อำเภอเมือง จังหวัดตรัง รหัสไปรษณีย์ 92000</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">0-7559-0364 - 5</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">0-7559-0367</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>Website</strong></td>
              <td style="border-width: 0px;"><a href="http://www.pcctrg.ac.th/" target="_blank">www.pcctrg.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pccpb" class="pcc_group_datail">
            <a href="http://www.pccphet.ac.th/main/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccpb.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccphet.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย เพชรบุรี</a></h2>
            <p>
              <table>
                <tbody>
                <tr style="border: 0px;">
                <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
                <td style="border-width: 0px;">เลขที่ 427 ถนนหุบกะพง หมู่ที่ 8 ตำบลเขาใหญ่ อำเภอชะอำ จังหวัดเพชรบุรี รหัสไปรษณีย์ 76120</td>
                </tr>
                <tr style="border: 0px;">
                <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
                <td style="border-width: 0px;">0-3247-0293, 0-3247-0295</td>
                </tr>
                <tr style="border: 0px;">
                <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
                <td style="border-width: 0px;">0-3247-0293</td>
                </tr>
                <tr style="border: 0px;">
                <td style="border-width: 0px;"><strong>Website</strong></td>
                <td style="border-width: 0px;"><a href="http://www.pccphet.ac.th/" target="_blank">www.pccphet.ac.th</a></td>
                </tr>
                </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pccmh" class="pcc_group_datail">
            <a href="http://www.dek-d.com/board/view/1611069/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccmh.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccm.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย มุกดาหาร</a></h2>
            <p>
              <table border="0">
              <tbody>
              <tr>
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">หมู่ที่ 6 ตำบลบางทรายใหญ่ อำเภอเมือง จังหวัดมุกดาหาร รหัสไปรษณีย์ 49000</td>
              </tr>
              <tr>
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">0-4261-0480, 0-4261-0481</td>
              </tr>
              <tr>
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">0-4261-0480</td>
              </tr>
              <tr>
              <td style="border-width: 0px;"><strong>เว็บไซต์</strong></td>
              <td style="border-width: 0px;"><a title="โรงเรียนจุฬาภรณราชวิทยาลัย มุกดาหาร" href="http://www.pccm.ac.th/ " target="_blank">www.pccm.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pcccr" class="pcc_group_datail">
            <a href="http://www.pcccr.ac.th/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pcccr.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pcccr.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย เชียงราย</a></h2>
            <p>
              <table border="0">
                <tbody>
                <tr>
                <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
                <td style="border-width: 0px;">เลขที่ 345 หมู่ที่ 2 ตำบลรอบเวียง อำเภอเมือง จังหวัดเชียงราย รหัสไปรษณีย์ 57000</td>
                </tr>
                <tr>
                <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
                <td style="border-width: 0px;">0-5317-4551-4</td>
                </tr>
                <tr>
                <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
                <td style="border-width: 0px;">0-5317-4555</td>
                </tr>
                <tr>
                <td style="border-width: 0px;"><strong>เว็บไซต์</strong></td>
                <td style="border-width: 0px;"><a title="โรงเรียนจุฬาภรณราชวิทยาลัย เชียงราย" href="http://www.pcccr.ac.th/ " target="_blank">www.pcccr.ac.th</a></td>
                </tr>
                </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pccpl" class="pcc_group_datail">
            <a href="http://panchanok211042.wordpress.com/2013/08/28/%E0%B9%82%E0%B8%A3%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%99%E0%B8%88%E0%B8%B8%E0%B8%AC%E0%B8%B2%E0%B8%A0%E0%B8%A3%E0%B8%93%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccpl.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccpl.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย พิษณุโลก</a></h2>
            <p>
              <table border="0">
                <tbody>
                <tr>
                <td style="border-width: 0px;">ที่ตั้ง</td>
                <td style="border-width: 0px;">เลขที่ 86 หมู่ที่ 4 ตำบลมะขามสูง อำเภอเมือง จังหวัดพิษณุโลก รหัสไปรษณีย์ 65000</td>
                </tr>
                <tr>
                <td style="border-width: 0px;">โทรศัพท์</td>
                <td style="border-width: 0px;">0-5524-5115</td>
                </tr>
                <tr>
                <td style="border-width: 0px;">โทรสาร</td>
                <td style="border-width: 0px;">0-5524-5110</td>
                </tr>
                <tr>
                <td style="border-width: 0px;">เว็บไซต์</td>
                <td style="border-width: 0px;"><a title="โรงเรียนจุฬาภรณราชวิทยาลัย พิษณุโลก" href="http://www.pccpl.ac.th/ " target="_blank">www.pccpl.ac.th</a></td>
                </tr>
                </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pccl" class="pcc_group_datail">
            <a href="http://www.pccloei.ac.th/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccl.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccloei.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย เลย</a></h2>
            <p>
              <table border="0">
              <tbody>
              <tr>
              <td style="border-width: 0px;">ที่ตั้ง</td>
              <td style="border-width: 0px;">เลขที่ 129 หมู่ที่ 5 ตำบลธาตุ อำเภอเชียงคาน จังหวัดเลย รหัสไปรษณีย์ 42110</td>
              </tr>
              <tr>
              <td style="border-width: 0px;">โทรศัพท์</td>
              <td style="border-width: 0px;">0-4287-7024</td>
              </tr>
              <tr>
              <td style="border-width: 0px;">โทรสาร</td>
              <td style="border-width: 0px;">0-4287-7034</td>
              </tr>
              <tr>
              <td style="border-width: 0px;">เว็บไซต์</td>
              <td style="border-width: 0px;"><a title="โรงเรียนจุฬาภรณราชวิทยาลัย เลย" href="http://www.pccloei.ac.th/ " target="_blank">www.pccloei.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pcclb" class="pcc_group_datail">
            <a href="http://www.pccl.ac.th/external_photos.php?links=407" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pcclb.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccl.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย ลพบุรี</a></h2>
            <p>
              <table>
              <tbody>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">เลขที่ 216 หมู่ที่ 1 ตำบลห้วยโป่ง อำเภอโคกสำโรง จังหวัดลพบุรี รหัสไปรษณีย์ 15120</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">0-3665-0260-1</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">0-3665-0260-1 ต่อ 106</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>Website</strong></td>
              <td style="border-width: 0px;"><a href="http://www.pccl.ac.th">www.pccl.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pcccb" class="pcc_group_datail">
            <a href="http://www.dek-d.com/board/view/2090794/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pcccb.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccchon.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย ชลบุรี</a></h2>
            <p>
              <table>
              <tbody>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">เลขที่ 695 หมู่ที่ 3 ตำบลหนองซาก อำเภอเมือง จังหวัดชลบุรี รหัสไปรษณีย์ 20170</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">038-485149</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">038-485149</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>Website</strong></td>
              <td style="border-width: 0px;"><a href="http://www.pccchon.ac.th/" target="_blank">www.pccchon.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <div id="data_pccbr" class="pcc_group_datail">
            <a href="http://picpost.postjung.com/172774.html" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccbr.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccbr.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย บุรีรัมย์</a></h2>
            <p>
              <table border="0">
                <tbody>
                <tr>
                <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
                <td style="border-width: 0px;">เลขที่ 299 ถนนพรเทพมงคล หมู่ที่ 2 ตำบลสตึก อำเภอสตึก จังหวัดบุรีรัมย์ รหัสไปรษณีย์ 31150</td>
                </tr>
                <tr>
                <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
                <td style="border-width: 0px;">044-681946</td>
                </tr>
                <tr>
                <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
                <td style="border-width: 0px;">044-681947</td>
                </tr>
                <tr>
                <td style="border-width: 0px;"><strong>เว็บไซต์</strong></td>
                <td style="border-width: 0px;"><a title="โรงเรียนจุฬาภรณราชวิทยาลัย บุรีรัมย์" href="https://sites.google.com/site/pccburiram/" target="_blank">https://sites.google.com/site/pccburiram/</a> หรือ <a title="www.pccbr.ac.th" href="http://www.pccbr.ac.th">www.pccbr.ac.th</a></td>
                </tr>
                </tbody>
              </table>  
            </p></div>
          </div>
          
          <div id="data_pccpt" class="pcc_group_datail">
            <a href="https://spypccp.wordpress.com/" target="_blank">
              <img class="pcc_group_cover" src="./assets/img/cover/pccpt.png" />
            </a>
            <div class="data_content"><h2>
              <a href="http://www.pccp.ac.th" target="_blank">โรงเรียนจุฬาภรณราชวิทยาลัย ปทุมธานี</a></h2>
            <p>
              <table>
              <tbody>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>ที่ตั้ง</strong></td>
              <td style="border-width: 0px;">เลขที่ 51 หมู่ที่ 6 ตำบลบ่อเงิน อำเภอลาดหลุมแก้ว จังหวัดปทุมธานี รหัสไปรษณีย์ 12140</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรศัพท์</strong></td>
              <td style="border-width: 0px;">0-2599-4461-4</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>โทรสาร</strong></td>
              <td style="border-width: 0px;">0-2599-4463-4 ต่อ 112</td>
              </tr>
              <tr style="border: 0px;">
              <td style="border-width: 0px;"><strong>Website</strong></td>
              <td style="border-width: 0px;"><a href="http://www.pccp.ac.th/">www.pccp.ac.th</a></td>
              </tr>
              </tbody>
              </table>
            </p></div>
          </div>
          <a href="#" id="backtomain" class="element_inactive blue awesome">กลับไปหน้าหลัก</a>
        </div>
      </div>
     </div> 
  </body>
</html>