<?php 
@session_start();
if (!$_SESSION["UserID"]){
  Header("Location: form_login.php");
}else{ ?>

  <?php

  $menu = "page2";

  ?>



  <?php include("header.php"); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"> 
      <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> รายงานการปฏิบัติงานนอกสถานที่</h1>
    </div><!-- /.container-fluid -->
  </section>
  <meta name="viewport" content="width=640">
  <!-- Main content -->
  <section class="content">

    <?php
    //error_reporting(0);
    date_default_timezone_set("Asia/Bangkok");
    include('mysql/config.php');

 

    if ($_SESSION['Userlevel'] == '5') { /**ผอ.สำนักคดี**/

      $sql = "SELECT 
      u.ID,
      u.BFL,
      u.Firstname,
      u.Lastname,
      u.Idpass,
      u.Position,
      u.Office,
      u.Partwork,
      u.Work,
      u.Regidate,
      u.Userlevel,
      u.case_count,
      u.Phone,
      u.Email,
      u.lineTK,
      l.id_case,
      l.id_u,
      l.casedate,
      l.sdate,
      l.stime,
      l.edate,
      l.etime,

      l.latitude,
      l.longitude,
      l.case_area,
      l.case_name_p,
      l.case_date_p,

      l.case0,
      l.case1,
      l.case2,
      l.caseA,
      l.caseA1,
      l.caseA2,
      l.caseB,
      l.caseB1,
      l.caseB2,
      l.caseC,
      l.caseC1,
      l.caseC2,
      l.caseD,
      l.caseD1,
      l.caseD2,
      l.caseE,
      l.caseE1,
      l.caseE2,
      l.caseF,
      l.caseF1,
      l.caseF2,
      l.caseG,
      l.caseG1,
      l.caseG2,
      l.caseH,
      l.caseH1,
      l.caseH2,
      l.caseI,
      l.caseI1,
      l.caseI2,
      l.caseJ,
      l.caseJ1,
      l.law_status,
      l.count_line
      FROM user as u  
      INNER JOIN lawcase as l ON u.ID = l.id_u 
      WHERE  u.Office = '8'
      ORDER BY   l.casedate DESC";

    }elseif($_SESSION['Userlevel'] == '1'){ /**แอดมิน**/

      $sql = "SELECT 
      u.ID,
      u.BFL,
      u.Firstname,
      u.Lastname,
      u.Idpass,
      u.Position,
      u.Office,
      u.Partwork,
      u.Work,
      u.Regidate,
      u.Userlevel,
      u.case_count,
      u.Phone,
      u.Email,
      u.lineTK,
      l.id_case,
      l.id_u,
      l.casedate,
      l.sdate,
      l.stime,
      l.edate,
      l.etime,

      l.latitude,
      l.longitude,
      l.case_area,
      l.case_name_p,
      l.case_date_p,

      l.case0,
      l.case1,
      l.case2,
      l.caseA,
      l.caseA1,
      l.caseA2,
      l.caseB,
      l.caseB1,
      l.caseB2,
      l.caseC,
      l.caseC1,
      l.caseC2,
      l.caseD,
      l.caseD1,
      l.caseD2,
      l.caseE,
      l.caseE1,
      l.caseE2,
      l.caseF,
      l.caseF1,
      l.caseF2,
      l.caseG,
      l.caseG1,
      l.caseG2,
      l.caseH,
      l.caseH1,
      l.caseH2,
      l.caseI,
      l.caseI1,
      l.caseI2,
      l.caseJ,
      l.caseJ1,
      l.law_status,
      l.count_line
      FROM user as u  
      INNER JOIN lawcase as l ON u.ID = l.id_u 
      WHERE u.Office = '8'
      ORDER BY   l.casedate DESC";

    }elseif($_SESSION['Userlevel'] == '4' /**หัวหน้าส่วน(4)**/
        AND $_SESSION['Partwork'] == '23'
          ||$_SESSION['Partwork'] == '24'
          ||$_SESSION['Partwork'] == '25'
          ||$_SESSION['Partwork'] == '26'){

$sql = "SELECT 
      u.ID,
      u.BFL,
      u.Firstname,
      u.Lastname,
      u.Idpass,
      u.Position,
      u.Office,
      u.Partwork,
      u.Work,
      u.Regidate,
      u.Userlevel,
      u.case_count,
      u.Phone,
      u.Email,
      u.lineTK,
      l.id_case,
      l.id_u,
      l.casedate,
      l.sdate,
      l.stime,
      l.edate,
      l.etime,
      l.latitude,
      l.longitude,
      l.case_area,
      l.case_name_p,
      l.case_date_p,
      l.case0,
      l.case1,
      l.case2,
      l.caseA,
      l.caseA1,
      l.caseA2,
      l.caseB,
      l.caseB1,
      l.caseB2,
      l.caseC,
      l.caseC1,
      l.caseC2,
      l.caseD,
      l.caseD1,
      l.caseD2,
      l.caseE,
      l.caseE1,
      l.caseE2,
      l.caseF,
      l.caseF1,
      l.caseF2,
      l.caseG,
      l.caseG1,
      l.caseG2,
      l.caseH,
      l.caseH1,
      l.caseH2,
      l.caseI,
      l.caseI1,
      l.caseI2,
      l.caseJ,
      l.caseJ1,
      l.law_status,
      l.count_line
      FROM user as u  
      INNER JOIN lawcase as l ON u.ID = l.id_u 
      WHERE u.Partwork = {$_SESSION['Partwork']}  
      ORDER BY l.casedate DESC";

    }elseif($_SESSION['Userlevel'] == '3' /**นิติกร(4)**/ 
        AND $_SESSION['Partwork'] == '23'  
          ||$_SESSION['Partwork'] == '24'
          ||$_SESSION['Partwork'] == '25'
          ||$_SESSION['Partwork'] == '26'){ 

$sql = "SELECT 
      u.ID,
      u.BFL,
      u.Firstname,
      u.Lastname,
      u.Idpass,
      u.Position,
      u.Office,
      u.Partwork,
      u.Work,
      u.Regidate,
      u.Userlevel,
      u.case_count,
      u.Phone,
      u.Email,
      u.lineTK,
      l.id_case,
      l.id_u,
      l.casedate,
      l.sdate,
      l.stime,
      l.edate,
      l.etime,
      l.latitude,
      l.longitude,
      l.case_area,
      l.case_name_p,
      l.case_date_p,
      l.case0,
      l.case1,
      l.case2,
      l.caseA,
      l.caseA1,
      l.caseA2,
      l.caseB,
      l.caseB1,
      l.caseB2,
      l.caseC,
      l.caseC1,
      l.caseC2,
      l.caseD,
      l.caseD1,
      l.caseD2,
      l.caseE,
      l.caseE1,
      l.caseE2,
      l.caseF,
      l.caseF1,
      l.caseF2,
      l.caseG,
      l.caseG1,
      l.caseG2,
      l.caseH,
      l.caseH1,
      l.caseH2,
      l.caseI,
      l.caseI1,
      l.caseI2,
      l.caseJ,
      l.caseJ1,
      l.law_status,
      l.count_line
      FROM user as u  
      INNER JOIN lawcase as l ON u.ID = l.id_u 
      WHERE u.Partwork = {$_SESSION['Partwork']} AND u.Idpass = {$_SESSION['Idpass']}
      ORDER BY  l.count_line ASC";

    }elseif($_SESSION['Userlevel'] == '2' /**ลูกจ้าง(4)**/
        AND $_SESSION['Partwork'] == '23'
          ||$_SESSION['Partwork'] == '24'
          ||$_SESSION['Partwork'] == '25'
          ||$_SESSION['Partwork'] == '26'){

$sql = "SELECT 
      u.ID,
      u.BFL,
      u.Firstname,
      u.Lastname,
      u.Idpass,
      u.Position,
      u.Office,
      u.Partwork,
      u.Work,
      u.Regidate,
      u.Userlevel,
      u.case_count,
      u.Phone,
      u.Email,
      u.lineTK,
      l.id_case,
      l.id_u,
      l.casedate,
      l.sdate,
      l.stime,
      l.edate,
      l.etime,
      l.latitude,
      l.longitude,
      l.case_area,
      l.case_name_p,
      l.case_date_p,
      l.case0,
      l.case1,
      l.case2,
      l.caseA,
      l.caseA1,
      l.caseA2,
      l.caseB,
      l.caseB1,
      l.caseB2,
      l.caseC,
      l.caseC1,
      l.caseC2,
      l.caseD,
      l.caseD1,
      l.caseD2,
      l.caseE,
      l.caseE1,
      l.caseE2,
      l.caseF,
      l.caseF1,
      l.caseF2,
      l.caseG,
      l.caseG1,
      l.caseG2,
      l.caseH,
      l.caseH1,
      l.caseH2,
      l.caseI,
      l.caseI1,
      l.caseI2,
      l.caseJ,
      l.caseJ1,
      l.law_status,
      l.count_line
      FROM user as u  
      INNER JOIN lawcase as l ON u.ID = l.id_u 
      WHERE u.Partwork = {$_SESSION['Partwork']} AND u.Idpass = {$_SESSION['Idpass']}
      ORDER BY   l.casedate DESC";
    }

    $result  = $conn->query($sql);
    //echo $sql;
    ?>
    
    <div class="card">
      <div class="card-header card-navy card-outline">

       <?php if ($_SESSION['Userlevel'] != '5') { ?>

       <div align="center"> 
        <a href="page2-1.php">      
          <button type="button" class="btn btn-success btn-lg" ><i class="nav-icon fas fa-solid fa-newspaper"></i>+ เพิ่มข้อมูล </button>
        </a>
      </div>
      <?php } ?>

    </div>

    <br>
    <div class="card-body p-1">
      <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-12">

          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" border="1" width="100%">
            <thead>
              <tr role="row" class="info" align="center">
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ลำดับที่ /<br>ID-Case</th>
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">วันที่เริ่มงาน<br>วันที่สิ้นสุดงาน</th>
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สถานที่ปฏิบัติงาน</th>
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">พื้นที่ปฏิบัติงาน<br>ลักษณะงาน รายละเอียด</th>
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สถานะ Check in</th>
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สถานะ Case</th>

                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ผู้ปฏิบัติงาน/<br>แจ้งLine</th>
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;"></th>

              </tr>
            </thead>
            <tbody>
              <?php
              $count_num  = 1;
              while($row  = $result->fetch_array(MYSQLI_ASSOC)){
                $ID        = $row['ID'];
                $BFL       = $row['BFL'];
                $Firstname = $row['Firstname'];
                $Lastname  = $row['Lastname'];
                $Idpass    = $row['Idpass'];
                $Position  = $row['Position'];
                $Office    = $row['Office'];
                $Partwork  = $row['Partwork'];
                $Work      = $row['Work'];
                $Phone     = $row['Phone'];
                $Email     = $row['Email'];
                $Regidate  = $row['Regidate'];
                $lineTK    = $row['lineTK'];
                $Userlevel = $row['Userlevel'];
                $id_case    = $row['id_case'];
                $id_u       = $row['id_u'];
                $casedate   = $row['casedate'];
                $sdate      = $row['sdate'];
                $stime      = $row['stime'];
                $edate      = $row['edate'];
                $etime      = $row['etime'];
                $latitude     = $row['latitude'];
                $longitude    = $row['longitude'];
                $case_area    = $row['case_area'];
                $case_name_p  = $row['case_name_p'];
                $case_date_p  = $row['case_date_p'];

                $case0      = $row['case0'];
                $case1      = $row['case1'];
                $case2      = $row['case2'];

                $caseA      = $row['caseA'];
                $caseA1     = $row['caseA1'];
                $caseA2     = $row['caseA2'];

                $caseB      = $row['caseB'];
                $caseB1     = $row['caseB1'];
                $caseB2     = $row['caseB2'];

                $caseC      = $row['caseC'];
                $caseC1     = $row['caseC1'];
                $caseC2     = $row['caseC2'];

                $caseD      = $row['caseD'];
                $caseD1     = $row['caseD1'];
                $caseD2     = $row['caseD2'];

                $caseE      = $row['caseE'];
                $caseE1     = $row['caseE1'];
                $caseE2     = $row['caseE2'];

                $caseF      = $row['caseF'];
                $caseF1     = $row['caseF1'];
                $caseF2     = $row['caseF2'];

                $caseG      = $row['caseG'];
                $caseG1     = $row['caseG1'];
                $caseG2     = $row['caseG2'];

                $caseH      = $row['caseH'];
                $caseH1     = $row['caseH1'];
                $caseH2     = $row['caseH2'];

                $caseI      = $row['caseI'];
                $caseI1     = $row['caseI1'];
                $caseI2     = $row['caseI2'];

                $caseJ      = $row['caseJ'];
                $caseJ1     = $row['caseJ1'];
                $law_status = $row['law_status'];
                $count_line = $row['count_line'];

                $_SESSION['id_case'] = $id_case;     
                $_SESSION['id_u']    = $id_u;        
                ?>
                <tr>
                  <td align="middle">
                    <br><br><br><br>
                    <?php echo $count_num.". / ".$id_case;?>
                  </td>
                  <td align="middle">
                    <br><br>
                      <p style="color: green;"><?php echo date("d/m/Y",strtotime($sdate."+543year"))."<br>".date("H:i:s",strtotime($stime));?><p>
                      <p style="color: maroon;  "><?php echo date("d/m/Y",strtotime($edate."+543year"))."<br>".date("H:i:s",strtotime($etime));?><p>
                  </td> 
                  <td align="middle">
                        <br><br>
                    <?php  if ($case_area == '1') { ?>

                    <?php  echo $case_areaname[$case_area]; ?>

                  <?php  }elseif ($case_area == '2') { ?>

                     <?php  echo $case_areaname[$case_area]."<br><br>"; ?>
                     <?php echo "ผู้อนุมัติ"; ?>
                     <p style="color: navy">
                      <?php echo $case_name_p; ?>
                     </p>
                     <?php echo "วันที่อนุมัติ"; ?>
                     <p style="color: green">
                     <?php echo date("d-m-Y",strtotime("+543year".$case_date_p)); ?>
                      </p>
                   <?php } ?>

                  
                  </td>
                      <td align="middle">
                        <br><br>
                        <?php if ($case0) {echo $case0."<br/>";} if ($caseA) {echo $caseA."<br/>";} if ($caseB) {echo $caseB."<br/>";} if ($caseC) {echo $caseC."<br/>";} if ($caseD) {echo $caseD."<br/>";} if ($caseE) {echo $caseE."<br/>";} if ($caseF) {echo $caseF."<br/>";} if ($caseG) {echo $caseG."<br/>";} if ($caseH) {echo $caseH."<br/>";} if ($caseI) {echo $caseI."<br/>";} if ($caseJ) {echo $caseJ."<br/>";} ?>
                      <br>
                       <?php if ($case1) {echo $case1."<br/>";} if ($caseA1) {echo $caseA1."<br/>";} if ($caseB1) {echo $caseB1."<br/>";} if ($caseC1) {echo $caseC1."<br/>";} if ($caseD1) {echo $caseD1."<br/>";} if ($caseE1) {echo $caseE1."<br/>";} if ($caseF1) {echo $caseF1."<br/>";} if ($caseG1) {echo $caseG1."<br/>";} if ($caseH1) {echo $caseH1."<br/>";} if ($caseI1) {echo $caseI."<br/>";} if ($caseJ1) {echo $caseJ1."<br/>";} ?>
                      <br>
                        <?php if ($case2) {echo $case2."<br/>";} if ($caseA2) {echo $caseA2."<br/>";} if ($caseB2) {echo $caseB2."<br/>";} if ($caseC2) {echo $caseC2."<br/>";} if ($caseD2) {echo $caseD2."<br/>";} if ($caseE2) {echo $caseE2."<br/>";} if ($caseF2) {echo $caseF2."<br/>";} if ($caseG2) {echo $caseG2."<br/>";} if ($caseH2) {echo $caseH2."<br/>";} if ($caseI2) {echo $caseI2."<br/>";} ?>
                      <br>
                     </td>
                    
                       
<?php if ($latitude AND $longitude) { ?>
                         <td align="middle">
                          <br><br><br><br>
                          <button class="btn btn-success btn-sm">Active</button><br>
                         <button class="btn btn-light btn-sm"><?php echo $latitude." , ".$longitude; ?></button>
                         </td>
<?php }else{ ?>
                        <td align="middle">
                          <br><br><br><br>
                         <button class="btn btn-warning btn-sm">Waite</button>  
                        </td>
<?php } ?>
                       
                     
                     <td align="middle">
                      <br><br><br><br>
                     <?php if ($law_status =='1') { ?>
                     <a class="btn btn-warning"    ><?php echo $law_statusname[$law_status]; ?></a>
                     <?php }else{ ?>
                      <a class="btn btn-success" ><?php echo $law_statusname[$law_status]; ?></a>
                     <?php } ?>

                     </td>
                      <td align="center"><?php echo $Idpass."<br>".$BFLname[$BFL]." ".$Firstname." ".$Lastname."<br>".$Partworkname[$Partwork]."<br>"; ?>
                      <br>

                      <?php if ($latitude && $longitude) { ?>
                      <center>
                        <a class="btn btn-warning btn-lg" href="page2-1_view.php?id_case=<?php echo $id_case; ?>&latitude=<?php echo $latitude; ?>&longitude=<?php echo $longitude; ?>">
                          <i class="fas fa-eye"> </i> <i class="fas fa-edit"> </i>             
                        </a> <br><br>
                      </center>
                  <?php }else{ ?>
                      <center>
                        <a class="btn btn-warning btn-lg" href="page2-1_view.php?id_case=<?php echo $id_case; ?>">
                          <i class="fas fa-eye"> </i> <i class="fas fa-edit"> </i>             
                        </a> <br><br>
                      </center>
                  <?php } ?>

                  <?php if ($count_line > '0' ) { ?> 
       
                     <img src="img/line-b.png" alt="line" width="20%" height="20%" ><br>
                   
                    <?php }else{  ?>

                     <?php if($_SESSION['Userlevel'] != '5' AND $_SESSION['Userlevel'] != '4') {?> 

                       <a href="line_notify.php?id_u=<?php echo $_SESSION['id_u']; ?>&id_case=<?php echo $_SESSION['id_case']; ?>" >
                     <img src="img/line-g.png" alt="line" width="20%" height="20%" >
                    </a>

                    <?php  }  ?>

                  <?php  }  ?>

                    </td>
                   
                    <td align="middle">
                     <br><br><br><br>
 
<?php if ($_SESSION['Userlevel'] == '1' || $_SESSION['Userlevel'] == '4' ) { ?>

                    <?php if ($_SESSION['Partwork'] == $Partwork || $_SESSION['Userlevel'] == '1' ) { ?>
               
                    <a class="btn btn-danger btn-lg" href="page2-1_bdel.php?id_case=<?php echo $id_case; ?>&ID=<?php echo $ID; ?>">
                    <i class="fas fa-solid fa-trash"></i>              
                    </a>
                   <?php } ?>   
<?php }else{ ?>
 
            <!--Fuction On Click Alert MSG-->
                      <a class="btn btn-dark btn-lg" href="##page2-1_del.php?id_case=<?php echo $id_case; ?>&ID=<?php echo $ID; ?>" readonly="readonly" onclick='return confirm_del();' >
                    <i class="fas fa-solid fa-trash"></i>              
                    </a>
                   <script type="text/javascript">
                       function confirm_del(event){
                           alert("!! ติดต่อหัวหน้าส่วนงาน เพื่อทำการ ลบข้อมูล ดังกล่าว");
                           return true;
                       }
                   </script>
            <!--Fuction On Click Alert MSG-->
                    <?php } ?>

                    </td>
          
                </td>   
              </tr>
              <?php $count_num++; } ?>                              
            </tbody>             
          </table>          

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