<?php 
@session_start();
error_reporting(0);
if (!$_SESSION["UserID"]){
  Header("Location: form_login.php");
}else{ ?>
  <?php
  $menu = "page2";
  date_default_timezone_set("Asia/Bangkok");
  ?>
  <?php include("header.php"); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"> 
      <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> ฟอร์มการปฏิบัติงานนอกสถานที่</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <style>
      textarea {resize: none;}
      input.sizebig{width: 30px;height: 30px;}
    </style>
    <div class="card">
      <div class="card-header card-navy card-outline">
      </div><br>
      <?php
      include('mysql/config.php');
      $id_case = (isset($_GET['id_case'])) ? $_GET['id_case'] : "";
      $ID      = (isset($_GET['ID']))      ? $_GET['ID']      : "";
      $sql     ="SELECT * FROM lawcase WHERE id_case = '$id_case'";
      $result       = $conn->query($sql);
      $row          = $result->fetch_array(MYSQLI_ASSOC);
      $id_case      = $row['id_case'];
      $id_u         = $row['id_u'];
      $casedate     = $row['casedate'];
      $sdate        = $row['sdate'];
      $stime        = $row['stime'];
      $edate        = $row['edate'];
      $etime        = $row['etime'];
      $latitude0    = $row['latitude'];
      $longitude0   = $row['longitude'];
      $case_area    = $row['case_area'];
      $case_name_p  = $row['case_name_p'];
      $case_date_p  = $row['case_date_p'];
      $law_status   = $row['law_status'];
      $case0        = $row['case0'];
      $case1        = $row['case1'];
      $case2        = $row['case2'];
      $caseA        = $row['caseA'];
      $caseA1       = $row['caseA1'];
      $caseA2       = $row['caseA2'];
      $caseB        = $row['caseB'];
      $caseB1       = $row['caseB1'];
      $caseB2       = $row['caseB2'];
      $caseC        = $row['caseC'];
      $caseC1       = $row['caseC1'];
      $caseC2       = $row['caseC2'];
      $caseD        = $row['caseD'];
      $caseD1       = $row['caseD1'];
      $caseD2       = $row['caseD2'];
      $caseE        = $row['caseE'];
      $caseE1       = $row['caseE1'];
      $caseE2       = $row['caseE2'];
      $caseF        = $row['caseF'];
      $caseF1       = $row['caseF1'];
      $caseF2       = $row['caseF2'];
      $caseG        = $row['caseG'];
      $caseG1       = $row['caseG1'];
      $caseG2       = $row['caseG2'];
      $caseH        = $row['caseH'];
      $caseH1       = $row['caseH1'];
      $caseH2       = $row['caseH2'];
      $caseI        = $row['caseI'];
      $caseI1       = $row['caseI1'];
      $caseI2       = $row['caseI2'];
      $caseJ        = $row['caseJ'];
      $caseJ1       = $row['caseJ1'];
      $pbcase       = $row['pbcase'];
      /*ผู้ปฏิบัติงาน*/
      $caseUser     = $row['caseUser'];
      $casePosition = $row['casePosition'];
      $caseUdate    = $row['caseUdate'];
      /*เจ้าหน้าที่*/
      $caseUlaw     = $row['caseUlaw'];
      $casePlaw     = $row['casePlaw'];
      $caseUlawtime = $row['caseUlawtime'];
      $caseUlawdate = $row['caseUlawdate'];

      if ($id_u) { 

        $sql1 ="SELECT * FROM user WHERE ID = '$id_u'";
        $result1  = $conn->query($sql1);
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
        $ID        = $row1['ID'];
        $BFL       = $row1['BFL'];
        $Firstname = $row1['Firstname'];
        $Lastname  = $row1['Lastname'];
        $Idpass    = $row1['Idpass'];
        $Position  = $row1['Position'];
        $Office    = $row1['Office'];
        $Partwork  = $row1['Partwork'];
        $Work      = $row1['Work'];
        $Phone     = $row1['Phone'];
        $Email     = $row1['Email'];
        $Regidate  = $row1['Regidate'];
        $lineTK    = $row1['lineTK'];
        $Userlevel = $row1['Userlevel'];
      } 

      ?>
      <?php if ($_SESSION['UserID'] == $id_u) { ?> 
        <!--Start Form to Edit Only-->
        <!--S-Map latitude-&-longitude-->
        <!DOCTYPE html>
        <html>
        <body>
          <form method="POST" accept-charset="utf-8">
            <tr>
              <td>
                <center>
                  <!--ใส่ id="demo" เพื่อที่จะใช้ document.getElementById("demo") ใน JavaScript -->
                  <input type="text" name="latitude" id="latitude" value="" style="background-color: azure" placeholder="latitude" size="20%"  required class="btn btn-light" size="20%"></input>
                  <input type="text" name="longitude" id="longitude" value="" style="background-color: azure" placeholder="longitude" size="20%"  required class="btn btn-light" size="20%"></input>
                  <input type="submit" name="submit" value="ค้นหา" onclick="getLocation()" class="btn-success btn-sm" title="กดปุ่มค้นหา 2 ครั้งเพื่อ 1.lock location / 2.Show Map">

                  <!--button onclick="location.reload()" class="btn btn-warning btn-sm">ล้างข้อมูล</button-->
                </center>
              </td>
            </tr>
          </form>
        </body>
        </html>

        <!-- โหลด Google Maps JavaScript API -->
        <?php 
        if (isset($_POST['submit']))
        {
        $latitude  = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        } 
        ?>

        <?php if ($latitude0 & $longitude0) { ?>
          <center><iframe width="80%" height="600" src="https://map.google.com/maps?q=<?php echo $latitude0; ?>,<?php echo $longitude0; ?>&output=embed">
          </iframe></center>
        <?php }elseif(isset($_POST['submit'])) {  ?>
          <center><iframe width="80%" height="600" src="https://map.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed">
          </iframe></center>
        <?php } ?>
        <!--SCRIPT--->
        <script>
// ฟังก์ชันเมื่อคลิกปุ่ม "ค้นหา"
          function getLocation() {
// ตรวจสอบว่าเบราว์เซอร์รองรับ geolocation หรือไม่
            if (navigator.geolocation) {
// ขอข้อมูลตำแหน่งปัจจุบัน
              navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
// กรณีที่เบราว์เซอร์ไม่รองรับ geolocation
              document.getElementById("demo").value = "เบราว์เซอร์นี้ไม่รองรับการรับข้อมูลตำแหน่ง";
            }
          }

// ฟังก์ชันเมื่อข้อมูลตำแหน่งถูกดึงมาสำเร็จ
          function showPosition(position) {
// แสดงพิกัดละติจูดและลองจิจูดใน input field
 //document.getElementById("demo1").value = "latitude: " + position.coords.latitude + ", longitude: " + position.coords.longitude;
            document.getElementById("latitude").value  = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
          }

// ฟังก์ชันสำหรับการแสดงข้อผิดพลาด (กรณีไม่สามารถดึงตำแหน่งได้)
          function showError(error) {
            switch(error.code) {
            case error.PERMISSION_DENIED:
              document.getElementById("demo").value = "ผู้ใช้ปฏิเสธการขอข้อมูลตำแหน่ง";
              break;
            case error.POSITION_UNAVAILABLE:
              document.getElementById("demo").value = "ข้อมูลตำแหน่งไม่พร้อมใช้งาน";
              break;
            case error.TIMEOUT:
              document.getElementById("demo").value = "หมดเวลาในการดึงข้อมูลตำแหน่ง";
              break;
            case error.UNKNOWN_ERROR:
              document.getElementById("demo").value = "เกิดข้อผิดพลาดที่ไม่รู้จัก";
              break;
            }
          }
        </script>
        <div>
          <p style="color: red;" align="center">*** หลังจาก ค้นหา กดปุ่ม บันทึกมูล เพื่ออัพเดทรูปแผนที่และ Location</p>
        </div>
        
        <!--E-Map latitude-&-longitude-->
        <form action="page2-1_update.php" method="POST" accept-charset="utf-8">
         <table width="auto"  align="center">
          <tr align="center">

            <td colspan="2">
              <label style="font-size: 120%;">Latitude :</label>
              <!--input type="text"  name="latitude"  id="latitude"  value="<--?php if($_GET['latitude']){echo $_GET['latitude'];}else{echo $_POST['latitude'];}  ?>" class="btn btn-light"></input-->
                <input type="text"  name="latitude"  id="latitude" style="background-color: #1E90FF" value="<?php if($latitude){echo $latitude;}else{echo $latitude0;}?>" class="btn btn-light" ></input>

              </td>
              <td colspan="2">
                <label style="font-size: 120%;">Longitude :</label>
                <!--input type="text"  name="longitude"  id="longitude"  value="<--?php if($_GET['longitude']){echo $_GET['longitude'];}else{echo $_POST['longitude'];}  ?>" class="btn btn-light"></input-->
                  <input type="text"  name="longitude"  id="longitude"  style="background-color: #1E90FF" value="<?php if($longitude){echo $longitude;}else{echo $longitude0;}?>" class="btn btn-light" ></input>
                </td>
              </tr>
              <tr>
               <td colspan="4"><hr></td>
             </tr>
             <tr>
               <th colspan="4">
                <button class="form-control btn-light" style="height: 120%;" disabled>
                  <label style="font-size: 100%"> วันที่  <?php echo date("d",strtotime($casedate));?></label>
                  <label style="font-size: 100%"> เดือน  <?php echo date("m",strtotime($casedate));?></label>
                  <label style="font-size: 100%"> พ.ศ. <?php echo date("Y",strtotime("+543year".$casedate));?></label>
                  <label style="font-size: 100%"> เวลา  <?php echo date("H:i",strtotime($casedate));?> น. </label>
                </button>     
              </th>
            </tr>
            <input type="hidden"  name="casedate" value="<?php echo $casedate; ?>">
            <input type="hidden"  name="id_case"  value="<?php echo $id_case; ?>">
            <input type="hidden"  name="id_u"     value="<?php echo $id_u; ?>">
            <br> 
            <tr>
              <td>
                <select name="BFL" id="BFL" class="form-control is-primary" readonly>
                  <option value="0"disabled selected>คำนำหน้า...</option>
                  <option value="1">นาย</option>
                  <option value="2">นาง</option>
                  <option value="3">นางสาว</option>
                </select> 
              </td>
              <td>
                <input type="text" name="Firstname" value="<?php echo $Firstname;?>" readonly="readonly" class="form-control is-primary" placeholder="ชื่อ"  autocomplete="off">
              </td>
              <td>
                <input type="text" name="Lastname" value="<?php echo $Lastname;?>" readonly="readonly" class="form-control is-primary" placeholder="นามสกุล"  autocomplete="off">
              </td>
              <td>
                <input type="text" name="Position" value="<?php echo $Positionname[$Position];?>" readonly="readonly" class="form-control is-primary" placeholder="ตำแหน่ง"  autocomplete="off">
              </td>
            </tr>

            <tr>
              <td></td>
              <td>
                <select name="Work" id="Work" class="form-control is-primary" readonly>
                  <option value=" " disabled selected >งาน...</option>
                  <option value="1">ไม่มีสังกัดงาน</option>
                  <option value="4">งานสืบสวนสอบสวน</option>
                  <option value="9">งานคดีและอื่นๆ</option>

                </select> 
              </td>

              <td>
                <select name="Partwork" id="Partwork" class="form-control is-primary" readonly>
                  <option value=" " disabled selected >ส่วนงาน...</option>
                  <option value="23">ส่วนงานคดีแพ่งและปกครอง1</option>
                  <option value="24">ส่วนงานคดีแพ่งและปกครอง2</option>
                  <option value="25">ส่วนงานคดีอาญา</option>
                  <option value="26">ส่วนงานบังคับคดี</option>
                  <option value="18"disabled>ส่วนงานพัฒนาเทคโนโลยีดิจิทัล</option>
                </select> 
              </td>
              <td>
                <select name="Office" id="Office" class="form-control is-primary" readonly>
                  <option value=" " disabled selected >สำนัก...</option>
                  <option value="8">สำนักคดี</option>
                  <option value="6"disabled>สำนักเทคโนโลยีดิจิทัล</option>
                </select> 
              </td>
            </tr>
            <tr>
              <td>
                <hr>
              </td>
              <td>
                <hr>
              </td>
              <td>
                <hr>
              </td>
              <td>
                <hr>
              </td>
            </tr>
            <tr>
              <td>
                <center><label>ตั้งแต่ วันที่</label></center>
              </td>
              <td>
                <input type="date" name="sdate" value="<?php echo date('Y-m-d',strtotime($sdate."+543year")); ?>" min="<?php echo date('Y-m-d');?>" class="form-control is-primary"  >
              </td>
              <td>
                <center><label>เวลา</label></center>
              </td>
              <td>
                <input type="time" name="stime" value="<?php echo $stime; ?>"  class="form-control is-primary"  > 
              </td>
            </tr>
            <tr>
              <td>
                <center><label>ถึง วันที่</label></center>
              </td>
              <td>
                <input type="date" name="edate" value="<?php echo date('Y-m-d',strtotime($edate."+543year")); ?>" min="<?php echo date('Y-m-d');?>" class="form-control is-primary"  >
              </td>
              <td>
                <center><label>เวลา</label></center>
              </td>
              <td>
                <input type="time" name="etime" value="<?php echo $etime; ?>"  class="form-control is-primary"  > 
              </td>
            </tr>
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            <tr>
              <!--a-->

              <td colspan="2">
                <center><input type="radio" id="a1" name="case_area" class="sizebig" <?php if($case_area == "1") {echo "checked"; } ?> value="1" ><br>
                  <label style="font-size: 125%;">กรุงเทพฯและปริมณฑล</label></center>
                </td>
                <td colspan="2">
                 <center><input type="radio" id="a2" name="case_area" class="sizebig" <?php if($case_area == "2") {echo "checked"; } ?> value="2" ><br>
                   <label style="font-size: 125%;">ปฏิบัติงานต่างจังหวัด</label></center>
                 </td><br><br>
                 <!--b-->
               </tr>
               <tr>
                <td colspan="4"><hr></td>
              </tr>
              <tr>
                <td align="right"><label style="font-size: 125%;">ผู้อนุมัติ</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td align="center" >
                  <input type="text" name="case_name_p" value="<?php echo $case_name_p; ?>"  class="form-control is-primary">
                </td>
                <td  align="right"><label style="font-size: 125%;">วันที่อนุมัติ</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                  <?php if ($case_date_p > 0) { ?>
                    <input type="date" name="case_date_p" value="<?php echo date("Y-m-d",strtotime("+543year".$case_date_p)); ?>" class="form-control is-primary" >
                  <?php }else{ ?>
                    <input type="date" name="case_date_p" value="" class="form-control is-primary"  >
                  <?php } ?>
                </td>

              </tr>
              <tr>
                <td colspan="4"><hr></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><br></td>
              </tr>
              <tr>
               <td colspan="4">
                <h4 align="center">สถานที่ / ลักษณะงานที่ไปปฏิบัติงาน</h4><hr>
              </td>
            </tr>
            <!--***-->
            <tr>
              <td align="right">
                <?php if (!$caseA) { ?>
                  <input type="checkbox" name="caseA" value="ศาลปกครองกลาง/ศาลปกครองสูงสุด"  class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }else{ ?>
                  <input type="checkbox" name="caseA" value="ศาลปกครองกลาง/ศาลปกครองสูงสุด" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
                <?php } ?>
              </td>
              <td><label style="font-size: 125%;">ศาลปกครองกลาง /<br>ศาลปกครองสูงสุด</label></td>
              <td colspan="2">
                <select name="caseA1" id="caseA1" class="form-control is-primary" > 
                  <?php if ($caseA1) { ?>
                    <option value="<?php echo $caseA1; ?>"><?php echo $caseA1; ?></option>
                  <?php } ?>
                  <option value="">...</option>
                  <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
                  <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
                  <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
                  <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
                  <option value="อื่นๆ">อื่นๆ</option>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td colspan="2">
               <?php if (!$caseA2) { ?>
                <textarea id="caseA2" name="caseA2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
              <?php  }else{ ?>
                <textarea id="caseA2" name="caseA2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseA2; ?></textarea>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td><hr></td>
            <td><hr></td>
            <td><hr></td>
            <td><hr></td>
          </tr>
          <!--***-->
          <tr>
            <td align="right">
              <?php if (!$caseB) { ?>
               <input type="checkbox" name="caseB" value="ศาลแพ่ง/ศาลอุทธรณ์/ศาลฎีกา"  class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
             <?php  }else{ ?>
               <input type="checkbox" name="caseB" value="ศาลแพ่ง/ศาลอุทธรณ์/ศาลฎีกา" checked="on"  class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
             <?php } ?>
           </td>
           <td><label style="font-size: 125%;">ศาลแพ่ง / ศาลอุทธรณ์ /<br>ศาลฎีกา</label></td>
           <td colspan="2">
            <select name="caseB1" id="caseB1" class="form-control is-primary" > 
              <?php if ($caseB1) { ?>
                <option value="<?php echo $caseB1; ?>"><?php echo $caseB1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
              <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2">
            <?php if (!$caseB2) { ?>
              <textarea id="caseB2" name="caseB2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
            <?php  }else{ ?>
              <textarea id="caseB2" name="caseB2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseB2; ?></textarea>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
        </tr>
        <!--***-->
        <tr>
          <td align="right">
            <?php if (!$caseC) { ?>
              <input type="checkbox" name="caseC" value="ศาลอาญาคดีทุจริตฯ" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
              <input type="checkbox" name="caseC" value="ศาลอาญาคดีทุจริตฯ" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
          <td><label style="font-size: 125%;">ศาลอาญาคดีทุจริตฯ</label></td>

          <td colspan="2">
            <select name="caseC1" id="caseC1" class="form-control is-primary" > 
              <?php if ($caseC1) { ?>
                <option value="<?php echo $caseC1; ?>"><?php echo $caseC1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
              <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2">
            <?php if (!$caseC2) { ?>
              <textarea id="caseC2" name="caseC2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
            <?php }else{ ?>
              <textarea id="caseC2" name="caseC2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseC2 ?></textarea>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
        </tr>
        <!--***-->
        <tr>
          <td align="right">
            <?php if (!$case0) { ?>
              <input type="checkbox" name="case0" value="ศาลจังหวัด/ศาลแขวง" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
              <input type="checkbox" name="case0" value="ศาลจังหวัด/ศาลแขวง" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
          <td><label style="font-size: 125%;">ศาลจังหวัด/ศาลแขวง</label></td>

          <td colspan="2">
            <select name="case1" id="case1" class="form-control is-primary" > 
              <?php if ($case1) { ?>
                <option value="<?php echo $case1; ?>"><?php echo $case1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
              <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2">
            <?php if (!$case2) { ?>
              <textarea id="case2" name="case2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
            <?php }else{ ?>
              <textarea id="case2" name="case2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $case2; ?></textarea>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
        </tr>
        <!--***-->
        <tr>
          <td align="right">
            <?php if (!$caseD) { ?>
              <input type="checkbox" name="caseD" value="สำนักงานอัยการสูงสุด" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
              <input type="checkbox" name="caseD" value="สำนักงานอัยการสูงสุด" checked='on' class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
          <td><label style="font-size: 125%;">สำนักงานอัยการสูงสุด</label></td>

          <td colspan="2">
            <select name="caseD1" id="caseD1" class="form-control is-primary"  > 
              <?php if ($caseD1) { ?>
                <option value="<?php echo $caseD1; ?>"><?php echo $caseD1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ชี้แจงข้อเท็จจริงต่อพนักงานอัยการ">ชี้แจงข้อเท็จจริงต่อพนักงานอัยการ</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2">
            <?php if (!$caseD2) { ?>
              <textarea id="caseD2" name="caseD2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
            <?php }else{ ?>
              <textarea id="caseD2" name="caseD2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseD2; ?></textarea>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
        </tr>
        <!--***-->
        <tr>
          <td align="right">
            <?php if (!$caseE) { ?>
              <input type="checkbox" name="caseE" value="สำนักงาน ป.ป.ช." class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
              <input type="checkbox" name="caseE" value="สำนักงาน ป.ป.ช." checked="on" class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
          <td><label style="font-size: 125%;">สำนักงาน ป.ป.ช.</label></td>
          <td colspan="2">
            <select name="caseE1" id="caseE1" class="form-control is-primary" > 
              <?php if ($caseE1) { ?>
                <option value="<?php echo $caseE1; ?>"><?php echo $caseE1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2">
            <?php if (!$caseE2) { ?>
              <textarea id="caseE2" name="caseE2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
            <?php }else{ ?>
              <textarea id="caseE2" name="caseE2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseE2; ?></textarea>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
        </tr>
        <!--***-->
        <tr>
          <td align="right">
            <?php if (!$caseF) { ?>
              <input type="checkbox" name="caseF" value="สำนักงาน ป.ป.ท." class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
              <input type="checkbox" name="caseF" value="สำนักงาน ป.ป.ท." checked="on" class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
          <td><label style="font-size: 125%;">สำนักงาน ป.ป.ท.</label></td>

          <td colspan="2">
            <select name="caseF1" id="caseF1" class="form-control is-primary" > 
              <?php if ($caseF1) { ?>
                <option value="<?php echo $caseF1; ?>"><?php echo $caseF1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td colspan="2">
            <?php if (!$caseF2) { ?>
              <textarea id="caseF2" name="caseF2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
            <?php }else{ ?>
              <textarea id="caseF2" name="caseF2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseF2; ?></textarea>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
          <td><hr></td>
        </tr>
        <!--***-->
        <tr>
          <td align="right">
            <?php if (!$caseG) { ?>
              <input type="checkbox" name="caseG" value="สถานีตำรวจ" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
              <input type="checkbox" name="caseG" value="สถานีตำรวจ" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
          </td>
          <td><label style="font-size: 125%;">สถานีตำรวจ</label></td>

          <td colspan="2">
            <select name="caseG1" id="caseG1" class="form-control is-primary" > 
              <?php if ($caseG1) { ?>
                <option value="<?php echo $caseG1; ?>"><?php echo $caseG1; ?></option>
              <?php } ?>
              <option value="">...</option>
              <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
              <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
              <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </td>
        </tr>
        <tr>
         <td></td>
         <td></td>
         <td colspan="2">
          <?php if (!$caseG2) { ?>
            <textarea id="caseG2" name="caseG2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
          <?php }else{ ?>
            <textarea id="caseG2" name="caseG2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseG2; ?></textarea>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <!--***-->
      <tr>
        <td align="right">
          <?php if (!$caseH) { ?>
           <input type="checkbox" name="caseH" value="เทศบาลนครนนทบุรี" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
         <?php }else{  ?>
          <input type="checkbox" name="caseH" value="เทศบาลนครนนทบุรี" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
        <?php } ?>
      </td>

      <td>
        <label style="font-size: 125%;">เทศบาลนครนนทบุรี</label></td>
        <td colspan="2">
          <select name="caseH1" id="caseH1" class="form-control is-primary" > 
            <?php if ($caseH1) { ?>
              <option value="<?php echo $caseH1; ?>"><?php echo $caseH1; ?></option>
            <?php } ?>
            <option value="">...</option>
            <option value="คัดทะเบียนราษฎร">คัดทะเบียนราษฎร</option>
            <option value="คัดใบมรณะบัตร">คัดใบมรณะบัตร</option>
            <option value="อื่นๆ">อื่นๆ</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2">
          <?php if (!$caseH2) { ?>
            <textarea id="caseH2" name="caseH2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
          <?php }else{ ?>
            <textarea id="caseH2" name="caseH2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseH2; ?></textarea>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <!--***-->
      <tr>
        <td align="right">
          <?php if (!$caseI) { ?>
            <input type="checkbox" name="caseI" value="กรมบังคับคดี" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
          <?php }else{ ?>
            <input type="checkbox" name="caseI" value="กรมบังคับคดี" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
        </td>
        <td><label style="font-size: 125%;">กรมบังคับคดี</label></td>
        <td colspan="2">
          <select name="caseI1" id="caseI1" class="form-control is-primary" >
            <?php if ($caseI1) { ?>
              <option value="<?php echo $caseI1; ?>"><?php echo $caseI1; ?></option>
            <?php } ?>
            <option value="">...</option> 
            <option value="ยื่น/ตรวจคำขอรับชำระหนี้">ยื่น/ตรวจคำขอรับชำระหนี้</option>
            <option value="ประชุมเจ้าหนี้">ประชุมเจ้าหนี้</option>
            <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
            <option value="รับเงินที่ได้จากการแบ่งทรัพย์สินของลูกหนี้">รับเงินที่ได้จากการแบ่งทรัพย์สินของลูกหนี้</option>
            <option value="ตั้งเรื่องยึด/อายัด">ตั้งเรื่องยึด/อายัด</option>
            <option value="อื่นๆ">อื่นๆ</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td colspan="2">
          <?php if (!$caseI2) { ?>
            <textarea id="caseI2" name="caseI2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"></textarea>
          <?php }else{ ?>
            <textarea id="caseI2" name="caseI2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"><?php echo $caseI2; ?></textarea>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <!--***-->
      <tr>
        <td align="right">
          <?php if (!$caseJ) { ?>
            <input type="checkbox" name="caseJ" value="อื่นๆ" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
          <?php }else{ ?>
            <input type="checkbox" name="caseJ" value="อื่นๆ" checked="on" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
        </td>
        <td><label style="font-size: 125%;">อื่นๆ</label></td>
        <td colspan="4">
          <?php if (!$caseJ1) { ?>
            <textarea id="caseJ1" name="caseJ1" cols="2" rows="4" placeholder="รายละเอียดเพิ่มเติม" class="form-control is-primary"></textarea>
          <?php }else{ ?>
            <textarea id="caseJ1" name="caseJ1" cols="2" rows="4" placeholder="รายละเอียดเพิ่มเติม" class="form-control is-primary"><?php echo $caseJ1; ?></textarea>
          <?php } ?>
        </td>
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <!--***-->
      <tr>
        <td colspan="4">
          <textarea id="pbcase" name="pbcase" cols="2" rows="4" class="form-control is-primary"placeholder="ปัญหา/อุปสรรคของผู้ปฏิบัติงาน"><?php echo $pbcase; ?></textarea>
        </td>
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <!--***-->
      <tr>
        <td></td>
        <td></td>
        <td colspan="1" align="center">
         <label style="font-size: 125%; color: blue;">ผลการปฏิบัติงาน</label><br>

         <select name="law_status" id="law_status" class="form-control is-primary">
           <option value="1">อยู่ระหว่างดำเนินการ</option>
           <option value="2">ดำเนินการแล้วเสร็จ</option>
         </select>
       </td>
     </tr>
     <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td></td>
      <td><label style="font-size: 125%;">ลงชื่อ<br>เจ้าหน้าที่</label></td>
      <td colspan="2">
        <input type="text" value="<?php echo $caseUlaw; ?>" name="caseUlaw" placeholder="ชื่อ-นามสกุล" class="form-control is-primary">
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>
        <input type="text" value="<?php echo $casePlaw; ?>" name="casePlaw" placeholder="ตำแหน่ง" class="form-control is-primary">
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td>
        <input type="date" value="<?php echo $caseUlawdate ; ?>"  name="caseUlawdate" placeholder="วันที่" class="form-control is-primary">
      </td>
      <td>
        <input type="time" value="<?php echo $caseUlawtime; ?>" name="caseUlawtime" placeholder="เวลา" class="form-control is-primary">
      </td>
    </tr>
    <tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <tr>
        <td></td>
        <td><label style="font-size: 125%;">ลงชื่อ<br>ผู้ปฏิบัติงาน</label></td>
        <td colspan="2">
          <input type="text" value="<?php echo $caseUser;?>" name="caseUser" placeholder="ชื่อ-นามสกุล" class="form-control is-primary" readonly="readonly">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <input type="text" value="<?php echo $Positionname[$Position];?>"    class="form-control is-primary" readonly="readonly" disabled="disabled">
          <input type="hidden" value="<?php echo $Position;?>" name="casePosition" >
        </td>
        <td>
          <input type="text" value="<?php echo date("d-m-Y  H:i",strtotime($caseUdate."+543year"));?>" name="caseUdate" placeholder="วันที่" class="form-control is-primary" readonly="readonly">
        </td>
      </tr>
      <tr>
        <td colspan="4" >
          <label style="font-size: 100%; color:Gray ;">*หมายเหตุ<br>  
           - เจ้าหน้าที่ ได้แก่ บุคคลภายนอกที่ผู้ปฏิบัติงานไปติดต่อราชการ<br>
           หากไม่มีการลงลายมือชื่อของเจ้าหน้าที่ ขอให้เช็คอินสถานที่<br>ที่ไปติดต่อจาก Google Map ของระบบ PWO LAW TRACK<br>
           - ผู้ปฏิบัติงาน ได้แก่ นิติกร ผู้รับผิดชอบ 
         </label>
       </td>
     </tr>
     <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <tr>
     <td colspan="4">
      <input type="submit" value="บันทึกข้อมูล" class="form-control btn-success ">
    </td> 
  </tr>
</table>

<script>
  document.getElementById('Office').value     = '<?php echo $Office; ?>';
  document.getElementById('Partwork').value   = '<?php echo $Partwork; ?>';
  document.getElementById('Work').value       = '<?php echo $Work; ?>';
  document.getElementById('BFL').value        = '<?php echo $BFL; ?>';  
  document.getElementById('law_status').value = '<?php echo $law_status; ?>';
</script>

</form>


<?php }else{ ?> <!--Else Form to View Only-->

<?php if ($_GET['latitude'] & $_GET['longitude']) {

  $latitude  = (isset($_GET['latitude']))  ? $_GET['latitude']  : "";
  $longitude = (isset($_GET['longitude'])) ? $_GET['longitude'] : "";


  ?>
  <center><iframe width="80%" height="600" src="https://map.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed">
  </iframe></center>
<?php }else{ ?>
  <center><iframe width="80%" height="600" src="https://map.google.com/maps?q=&output=embed">
  </iframe></center>
<?php } ?>

<table width="auto"  align="center">
  <tr>
    <td></td>
    <td colspan="1">
     <center>
      <label style="font-size: 125%;">Latitude</label>
      <input type="text"  name="latitude"  id="latitude"  value="<?php echo $latitude;  ?>" class="form-control is-primary" readonly="readonly" disabled="disabled"></input>
    </center>
  </td>
  <td colspan="1">
    <center>
      <label style="font-size: 125%;">Longitude</label>
      <input type="text"  name="longitude" id="longitude" value="<?php echo $longitude; ?>" class="form-control is-primary" readonly="readonly" disabled="disabled"></input>
    </center>
  </td>
</tr>
<tr>
  <th colspan="4">

    <button class="form-control btn-light" style="height: 120%;" disabled>
      <label style="font-size: 100%"> วันที่  <?php echo date("d",strtotime($casedate));?></label>
      <label style="font-size: 100%"> เดือน  <?php echo date("m",strtotime($casedate));?></label>
      <label style="font-size: 100%"> พ.ศ. <?php echo date("Y",strtotime("+543year".$casedate));?></label>
      <label style="font-size: 100%"> เวลา  <?php echo date("H:i",strtotime($casedate));?> น. </label>
    </button>     
  </th>
</tr>
<tr>
  <td>
    <input type="text" name="BFL" value="<?php echo $BFLname[$BFL] ?>" class="form-control is-primary" readonly disabled>
  </td>
  <td>
    <input type="text" name="Firstname" value="<?php echo $Firstname;?>" readonly disabled class="form-control is-primary" placeholder="ชื่อ"  autocomplete="off">
  </td>
  <td>
    <input type="text" name="Lastname" value="<?php echo $Lastname;?>" readonly disabled class="form-control is-primary" placeholder="นามสกุล"  autocomplete="off">
  </td>
  <td>
    <input type="text" name="Position" value="<?php echo $Positionname[$Position];?>" readonly disabled class="form-control is-primary" placeholder="ตำแหน่ง"  autocomplete="off">
  </td>
</tr>

<tr>
  <td></td>
  <td>
    <input type="text" name="Work" value="<?php echo $Workname[$Work]; ?>" class="form-control is-primary" readonly disabled>
  </td>

  <td>
    <input type="text" name="Partwork" value="<?php echo $Partworkname[$Partwork]; ?>" class="form-control is-primary" readonly disabled>
  </td>
  <td>
    <input type="text" name="Office" value="<?php echo $Officename[$Office]; ?>" class="form-control is-primary" readonly disabled> 
  </td>
</tr>
<tr>
  <td>
    <hr>
  </td>
  <td>
    <hr>
  </td>
  <td>
    <hr>
  </td>
  <td>
    <hr>
  </td>
</tr>
<tr>
  <td>
    <center><label>ตั้งแต่ วันที่</label></center>
  </td>
  <td>
    <input type="date" name="sdate" value="<?php echo date('Y-m-d',strtotime($sdate."+543year")); ?>" min="<?php echo date('Y-m-d');?>" class="form-control is-primary"  readonly disabled>
  </td>
  <td>
    <center><label>เวลา</label></center>
  </td>
  <td>
    <input type="time" name="stime" value="<?php echo $stime; ?>"  class="form-control is-primary"  readonly disabled> 
  </td>
</tr>
<tr>
  <td>
    <center><label>ถึง วันที่</label></center>
  </td>
  <td>
    <input type="date" name="edate" value="<?php echo date('Y-m-d',strtotime($edate."+543year")); ?>" min="<?php echo date('Y-m-d');?>" class="form-control is-primary"  readonly disabled>
  </td>
  <td>
    <center><label>เวลา</label></center>
  </td>
  <td>
    <input type="time" name="etime" value="<?php echo $etime; ?>"  class="form-control is-primary"  readonly disabled> 
  </td>
</tr>
<tr>
  <td colspan="4"><hr></td>
</tr>
<tr>
  <!--a-->

  <td colspan="2">
    <center><input type="radio" id="a1" name="case_area" class="sizebig" <?php if($case_area == "1") {echo "checked"; } ?> value="1" readonly="readonly" disabled="disabled"><br>
      <label style="font-size: 125%;">กรุงเทพฯและปริมณฑล</label></center>
    </td>
    <td colspan="2">
     <center><input type="radio" id="a2" name="case_area" class="sizebig" <?php if($case_area == "2") {echo "checked"; } ?> value="2" readonly="readonly" disabled="disabled"><br>
       <label style="font-size: 125%;">ปฏิบัติงานต่างจังหวัด</label></center>
     </td><br><br>
     <!--b-->
   </tr>
   <tr>
    <td colspan="4"><hr></td>
  </tr>
  <tr>
    <td align="right"><label style="font-size: 125%;">ผู้อนุมัติ</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="center" >
      <input type="text" name="case_name_p" value="<?php echo $case_name_p; ?>"  class="form-control is-primary" readonly="readonly">
    </td>
    <td  align="right"><label style="font-size: 125%;">วันที่อนุมัติ</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
      <?php if ($case_date_p > 0) { ?>
        <input type="date" name="case_date_p" value="<?php echo date("Y-m-d",strtotime("+543year".$case_date_p)); ?>" class="form-control is-primary" readonly disabled>
      <?php }else{ ?>
        <input type="date" name="case_date_p" value="" class="form-control is-primary" readonly disabled>
      <?php } ?>
    </td>

  </tr>
  <tr>
    <td colspan="4"><hr></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><br></td>
  </tr>
  <tr>
   <td colspan="4">
    <h4 align="center">สถานที่ / ลักษณะงานที่ไปปฏิบัติงาน</h4><hr>
  </td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseA) { ?>
      <input type="checkbox" name="caseA" value="ศาลปกครองกลาง/ศาลปกครองสูงสุด"  class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseA" value="ศาลปกครองกลาง/ศาลปกครองสูงสุด" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">ศาลปกครองกลาง /<br>ศาลปกครองสูงสุด</label></td>
  <td colspan="2">
    <select name="caseA1" id="caseA1" class="form-control is-primary" readonly disabled> 
      <?php if ($caseA1) { ?>
        <option value="<?php echo $caseA1; ?>"><?php echo $caseA1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
      <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
   <?php if (!$caseA2) { ?>
    <textarea id="caseA2" name="caseA2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม" readonly disabled></textarea>
  <?php  }else{ ?>
    <textarea id="caseA2" name="caseA2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม" readonly disabled><?php echo $caseA2; ?></textarea>
  <?php } ?>
</td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseB) { ?>
     <input type="checkbox" name="caseB" value="ศาลแพ่ง/ศาลอุทธรณ์/ศาลฎีกา"  class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
   <?php  }else{ ?>
     <input type="checkbox" name="caseB" value="ศาลแพ่ง/ศาลอุทธรณ์/ศาลฎีกา" checked="on"  class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
   <?php } ?>
 </td>
 <td><label style="font-size: 125%;">ศาลแพ่ง / ศาลอุทธรณ์ /<br>ศาลฎีกา</label></td>
 <td colspan="2">
  <select name="caseB1" id="caseB1" class="form-control is-primary" readonly disabled> 
    <?php if ($caseB1) { ?>
      <option value="<?php echo $caseB1; ?>"><?php echo $caseB1; ?></option>
    <?php } ?>
    <option value="">...</option>
    <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
    <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
    <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
    <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
    <option value="อื่นๆ">อื่นๆ</option>
  </select>
</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseB2) { ?>
      <textarea id="caseB2" name="caseB2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php  }else{ ?>
      <textarea id="caseB2" name="caseB2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseB2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseC) { ?>
      <input type="checkbox" name="caseC" value="ศาลอาญาคดีทุจริตฯ" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseC" value="ศาลอาญาคดีทุจริตฯ" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">ศาลอาญาคดีทุจริตฯ</label></td>

  <td colspan="2">
    <select name="caseC1" id="caseC1" class="form-control is-primary" readonly disabled> 
      <?php if ($caseC1) { ?>
        <option value="<?php echo $caseC1; ?>"><?php echo $caseC1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
      <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseC2) { ?>
      <textarea id="caseC2" name="caseC2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseC2" name="caseC2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseC2 ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$case0) { ?>
      <input type="checkbox" name="case0" value="ศาลจังหวัด/ศาลแขวง" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="case0" value="ศาลจังหวัด/ศาลแขวง" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">ศาลจังหวัด/ศาลแขวง</label></td>

  <td colspan="2">
    <select name="case1" id="case1" class="form-control is-primary" readonly disabled> 
      <?php if ($case1) { ?>
        <option value="<?php echo $case1; ?>"><?php echo $case1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
      <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$case2) { ?>
      <textarea id="case2" name="case2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="case2" name="case2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $case2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<tr>
  <td align="right">
    <?php if (!$caseD) { ?>
      <input type="checkbox" name="caseD" value="สำนักงานอัยการสูงสุด" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseD" value="สำนักงานอัยการสูงสุด" checked='on' class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">สำนักงานอัยการสูงสุด</label></td>

  <td colspan="2">
    <select name="caseD1" id="caseD1" class="form-control is-primary"  readonly disabled> 
      <?php if ($caseD1) { ?>
        <option value="<?php echo $caseD1; ?>"><?php echo $caseD1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ชี้แจงข้อเท็จจริงต่อพนักงานอัยการ">ชี้แจงข้อเท็จจริงต่อพนักงานอัยการ</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseD2) { ?>
      <textarea id="caseD2" name="caseD2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseD2" name="caseD2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseD2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseE) { ?>
      <input type="checkbox" name="caseE" value="สำนักงาน ป.ป.ช." class="sizebig"readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseE" value="สำนักงาน ป.ป.ช." checked="on" class="sizebig"readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">สำนักงาน ป.ป.ช.</label></td>
  <td colspan="2">
    <select name="caseE1" id="caseE1" class="form-control is-primary" readonly disabledreadonly disabled> 
      <?php if ($caseE1) { ?>
        <option value="<?php echo $caseE1; ?>"><?php echo $caseE1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseE2) { ?>
      <textarea id="caseE2" name="caseE2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseE2" name="caseE2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseE2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseF) { ?>
      <input type="checkbox" name="caseF" value="สำนักงาน ป.ป.ท." class="sizebig"readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseF" value="สำนักงาน ป.ป.ท." checked="on" class="sizebig"readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">สำนักงาน ป.ป.ท.</label></td>

  <td colspan="2">
    <select name="caseF1" id="caseF1" class="form-control is-primary" readonly disabled> 
      <?php if ($caseF1) { ?>
        <option value="<?php echo $caseF1; ?>"><?php echo $caseF1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseF2) { ?>
      <textarea id="caseF2" name="caseF2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseF2" name="caseF2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseF2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseG) { ?>
      <input type="checkbox" name="caseG" value="สถานีตำรวจ" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseG" value="สถานีตำรวจ" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">สถานีตำรวจ</label></td>

  <td colspan="2">
    <select name="caseG1" id="caseG1" class="form-control is-primary" readonly disabled> 
      <?php if ($caseG1) { ?>
        <option value="<?php echo $caseG1; ?>"><?php echo $caseG1; ?></option>
      <?php } ?>
      <option value="">...</option>
      <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
 <td></td>
 <td></td>
 <td colspan="2">
  <?php if (!$caseG2) { ?>
    <textarea id="caseG2" name="caseG2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
  <?php }else{ ?>
    <textarea id="caseG2" name="caseG2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseG2; ?></textarea>
  <?php } ?>
</td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseH) { ?>
     <input type="checkbox" name="caseH" value="เทศบาลนครนนทบุรี" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
   <?php }else{  ?>
    <input type="checkbox" name="caseH" value="เทศบาลนครนนทบุรี" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
  <?php } ?>
</td>

<td><label style="font-size: 125%;">เทศบาลนครนนทบุรี</label></td>
<td colspan="2">
  <select name="caseH1" id="caseH1" class="form-control is-primary" readonly disabled> 
    <?php if ($caseH1) { ?>
      <option value="<?php echo $caseH1; ?>"><?php echo $caseH1; ?></option>
    <?php } ?>
    <option value="">...</option>
    <option value="คัดทะเบียนราษฎร">คัดทะเบียนราษฎร</option>
    <option value="คัดใบมรณะบัตร">คัดใบมรณะบัตร</option>
    <option value="อื่นๆ">อื่นๆ</option>
  </select>
</td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseH2) { ?>
      <textarea id="caseH2" name="caseH2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseH2" name="caseH2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseH2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseI) { ?>
      <input type="checkbox" name="caseI" value="กรมบังคับคดี" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseI" value="กรมบังคับคดี" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">กรมบังคับคดี</label></td>
  <td colspan="2">
    <select name="caseI1" id="caseI1" class="form-control is-primary" readonly disabledreadonly disabled>
      <?php if ($caseI1) { ?>
        <option value="<?php echo $caseI1; ?>"><?php echo $caseI1; ?></option>
      <?php } ?>
      <option value="">...</option> 
      <option value="ยื่น/ตรวจคำขอรับชำระหนี้">ยื่น/ตรวจคำขอรับชำระหนี้</option>
      <option value="ประชุมเจ้าหนี้">ประชุมเจ้าหนี้</option>
      <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
      <option value="รับเงินที่ได้จากการแบ่งทรัพย์สินของลูกหนี้">รับเงินที่ได้จากการแบ่งทรัพย์สินของลูกหนี้</option>
      <option value="ตั้งเรื่องยึด/อายัด">ตั้งเรื่องยึด/อายัด</option>
      <option value="อื่นๆ">อื่นๆ</option>
    </select>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td colspan="2">
    <?php if (!$caseI2) { ?>
      <textarea id="caseI2" name="caseI2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseI2" name="caseI2" rows="4"  class="form-control is-primary" placeholder="รายละเอียดเพิ่มเติม"readonly disabled><?php echo $caseI2; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td align="right">
    <?php if (!$caseJ) { ?>
      <input type="checkbox" name="caseJ" value="อื่นๆ" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }else{ ?>
      <input type="checkbox" name="caseJ" value="อื่นๆ" checked="on" class="sizebig" readonly disabled>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php } ?>
  </td>
  <td><label style="font-size: 125%;">อื่นๆ</label></td>
  <td colspan="4">
    <?php if (!$caseJ1) { ?>
      <textarea id="caseJ1" name="caseJ1" cols="2" rows="4" placeholder="รายละเอียดเพิ่มเติม" class="form-control is-primary"readonly disabled></textarea>
    <?php }else{ ?>
      <textarea id="caseJ1" name="caseJ1" cols="2" rows="4" placeholder="รายละเอียดเพิ่มเติม" class="form-control is-primary"readonly disabled><?php echo $caseJ1; ?></textarea>
    <?php } ?>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td colspan="4">
    <textarea id="pbcase" name="pbcase" cols="2" rows="4" class="form-control is-primary"placeholder="ปัญหา/อุปสรรคของผู้ปฏิบัติงาน"readonly disabled><?php echo $pbcase; ?></textarea>
  </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td></td>
  <td></td>
  <td colspan="1" align="center">
   <label style="font-size: 125%; color: blue;">ผลการปฏิบัติงาน</label><br>
   <input type="text" name="law_status" value="<?php echo $law_statusname[$law_status]; ?>" class="form-control is-primary" readonly>
 </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<!--***-->
<tr>
  <td></td>
  <td><label style="font-size: 125%;">ลงชื่อ<br>เจ้าหน้าที่</label></td>
  <td colspan="2">
    <input type="text" value="<?php echo $caseUlaw; ?>" name="caseUlaw" placeholder="ชื่อ-นามสกุล" class="form-control is-primary"readonly disabled>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td>
    <input type="text" value="<?php echo $casePlaw; ?>" name="casePlaw" placeholder="ตำแหน่ง" class="form-control is-primary"readonly disabled>
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td>
    <input type="date" value="<?php echo $caseUlawdate ; ?>"  name="caseUlawdate" placeholder="วันที่" class="form-control is-primary"readonly disabled>
  </td>
  <td>
    <input type="time" value="<?php echo $caseUlawtime; ?>" name="caseUlawtime" placeholder="เวลา" class="form-control is-primary"readonly disabled>
  </td>
</tr>

<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<tr>
  <td></td>
  <td><label style="font-size: 125%;">ลงชื่อ<br>ผู้ปฏิบัติงาน</label></td>
  <td colspan="2">
    <input type="text" value="<?php echo $caseUser;?>" name="caseUser" placeholder="ชื่อ-นามสกุล" class="form-control is-primary" readonly="readonly">
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td>
    <input type="text" value="<?php echo $Positionname[$Position];?>"    class="form-control is-primary" readonly="readonly" disabled="disabled">
    <input type="hidden" value="<?php echo $Position;?>" name="casePosition" >
  </td>
  <td>
    <input type="text" value="<?php echo date("d-m-Y  H:i",strtotime($caseUdate."+543year"));?>" name="caseUdate" placeholder="วันที่" class="form-control is-primary" readonly="readonly">
  </td>
</tr>
<tr>
  <td colspan="4">
    <label style="font-size: 100%; color:Gray ;">*หมายเหตุ<br>  
     - เจ้าหน้าที่ ได้แก่ บุคคลภายนอกที่ผู้ปฏิบัติงานไปติดต่อราชการ<br>
     หากไม่มีการลงลายมือชื่อของเจ้าหน้าที่ ขอให้เช็คอินสถานที่<br>ที่ไปติดต่อจาก Google Map ของระบบ PWO LAW TRACK<br>
     - ผู้ปฏิบัติงาน ได้แก่ นิติกร ผู้รับผิดชอบ 
   </label>
 </td>
</tr>
<tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>

</table>
<?php } ?> <!--End Form to View Only-->

<br>
<div class="card-body p-1">
  <div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-12">


    </div>
    <div class="col-md-1" >

    </div>
  </div>
</div>

</div>



</div>
<!-- /.col -->
</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>
<script>
  $(function () {
    $(".datatable").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
<?php } ?>
