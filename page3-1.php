<?php 
@session_start();
if (!$_SESSION["UserID"]){
Header("Location: form_login.php");
}else{ ?>

<?php

$menu = "page3";

?>
<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> รายงานการปฏิบัติงาน รายเดือน</h1>
    </div><!-- /.container-fluid -->
  </section>
<meta name="viewport" content="width=640">
  <!-- Main content -->
  <section class="content">
    
 
    <div class="card">
      <div class="card-header card-navy card-outline">

<style>
 @media print{#hid{display:hide;}}
</style> 

<p align="right" class="hid" id="hid" name="hid"><button id="hid" name="hid"  onclick="window.print();" class="btn btn-dark" style="width: 10%;"> พิมพ์รายงาน</button></p>       

</div>
<?php 
include('mysql/config.php'); 
date_default_timezone_set("Asia/Bangkok");
$RPartwork =  $_POST['RPartwork'];
$Lmonth    =  $_POST['Lmonth'];
$Lyear     =  $_POST['Lyear']-543; 

echo "<br><center><label><h3>";
echo  "<u>".$Partworkname[$RPartwork]."</u>"."<br><br>";

if     ($Lmonth == '01' ) {
  echo "มกราคม"; 
}
elseif ($Lmonth == '02' ) {
  echo "กุมภาพันธ์";
}
elseif ($Lmonth == '03' ) {
  echo "มีนาคม";
}
elseif ($Lmonth == '04' ) {
  echo "เมษายน";
}
elseif ($Lmonth == '05' ) {
  echo "พฤษภาคม";
}
elseif ($Lmonth == '06' ) {
  echo "มิถุนายน";
}
elseif ($Lmonth == '07' ) {
  echo "กรกฎาคม";
}
elseif ($Lmonth == '08' ) {
  echo "สิงหาคม";
}
elseif ($Lmonth == '09' ) {
  echo "กันยายน";
}
elseif ($Lmonth == '10' ) {
  echo "ตุลาคม";
}
elseif ($Lmonth == '11' ) {
  echo "พฤษศจิกายน";
}
elseif ($Lmonth == '12' ) {
  echo "ธันวาคม";
}
echo " พ.ศ. ".($Lyear+543);
echo "</h3></label></center>";


?>
<?php 

if ($_SESSION['Userlevel'] != '1' || $RPartwork != '44' ) {
$sql = "SELECT  
                lawcase.id_case,
                lawcase.id_u,
                lawcase.casedate,

                lawcase.sdate,
                lawcase.stime,
                lawcase.edate,
                lawcase.etime,

                lawcase.caseA,
                lawcase.caseA1,
                lawcase.caseA2,

                lawcase.caseB,
                lawcase.caseB1,
                lawcase.caseB2,

                lawcase.caseC,
                lawcase.caseC1,
                lawcase.caseC2,

                lawcase.caseD,
                lawcase.caseD1,
                lawcase.caseD2,

                lawcase.caseE,
                lawcase.caseE1,
                lawcase.caseE2,

                lawcase.caseF,
                lawcase.caseF1,
                lawcase.caseF2,

                lawcase.caseG,
                lawcase.caseG1,
                lawcase.caseG2,

                lawcase.caseH,
                lawcase.caseH1,
                lawcase.caseH2,

                lawcase.caseI,
                lawcase.caseI1,
                lawcase.caseI2,

                lawcase.caseJ,
                lawcase.caseJ1,
               

                lawcase.pbcase,
                lawcase.law_status,

                lawcase.caseUser,
                lawcase.casePosition,
                lawcase.caseUdate,

                lawcase.caseUlaw,
                lawcase.casePlaw,
                lawcase.caseUlawdate,
                lawcase.caseUlawtime,

                user.ID,
                user.BFL,
                user.Firstname,
                user.Lastname,
                user.Idpass,
                user.Position,
                user.Office,
                user.Partwork,
                user.Work,
                user.Phone,
                user.Email,
                user.Regidate,
                user.Editdate,
                user.lineTK,
                user.Userlevel,
                user.case_count
FROM lawcase      
INNER JOIN user
ON user.ID = lawcase.id_u
WHERE MONTH(lawcase.casedate)  = '$Lmonth' 
AND    YEAR(lawcase.casedate)  = '$Lyear'
AND   user.Partwork            = '$RPartwork'
GROUP BY user.ID
ORDER BY user.ID DESC";

}else{

$sql = "SELECT  
                lawcase.id_case,
                lawcase.id_u,
                lawcase.casedate,

                lawcase.sdate,
                lawcase.stime,
                lawcase.edate,
                lawcase.etime,

                lawcase.caseA,
                lawcase.caseA1,
                lawcase.caseA2,

                lawcase.caseB,
                lawcase.caseB1,
                lawcase.caseB2,

                lawcase.caseC,
                lawcase.caseC1,
                lawcase.caseC2,

                lawcase.caseD,
                lawcase.caseD1,
                lawcase.caseD2,

                lawcase.caseE,
                lawcase.caseE1,
                lawcase.caseE2,

                lawcase.caseF,
                lawcase.caseF1,
                lawcase.caseF2,

                lawcase.caseG,
                lawcase.caseG1,
                lawcase.caseG2,

                lawcase.caseH,
                lawcase.caseH1,
                lawcase.caseH2,

                lawcase.caseI,
                lawcase.caseI1,
                lawcase.caseI2,

                lawcase.caseJ,
                lawcase.caseJ1,
               

                lawcase.pbcase,
                lawcase.law_status,

                lawcase.caseUser,
                lawcase.casePosition,
                lawcase.caseUdate,

                lawcase.caseUlaw,
                lawcase.casePlaw,
                lawcase.caseUlawdate,
                lawcase.caseUlawtime,

                user.ID,
                user.BFL,
                user.Firstname,
                user.Lastname,
                user.Idpass,
                user.Position,
                user.Office,
                user.Partwork,
                user.Work,
                user.Phone,
                user.Email,
                user.Regidate,
                user.Editdate,
                user.lineTK,
                user.Userlevel,
                user.case_count
FROM lawcase      
INNER JOIN user
ON user.ID = lawcase.id_u
WHERE MONTH(lawcase.casedate)  = '$Lmonth' 
AND    YEAR(lawcase.casedate)  = '$Lyear'
AND   user.Partwork            = '$RPartwork'
GROUP BY user.ID
ORDER BY user.ID DESC";


  
}
if ($RPartwork == '44' ) {
  $sql = "SELECT  
                lawcase.id_case,
                lawcase.id_u,
                lawcase.casedate,

                lawcase.sdate,
                lawcase.stime,
                lawcase.edate,
                lawcase.etime,

                lawcase.caseA,
                lawcase.caseA1,
                lawcase.caseA2,

                lawcase.caseB,
                lawcase.caseB1,
                lawcase.caseB2,

                lawcase.caseC,
                lawcase.caseC1,
                lawcase.caseC2,

                lawcase.caseD,
                lawcase.caseD1,
                lawcase.caseD2,

                lawcase.caseE,
                lawcase.caseE1,
                lawcase.caseE2,

                lawcase.caseF,
                lawcase.caseF1,
                lawcase.caseF2,

                lawcase.caseG,
                lawcase.caseG1,
                lawcase.caseG2,

                lawcase.caseH,
                lawcase.caseH1,
                lawcase.caseH2,

                lawcase.caseI,
                lawcase.caseI1,
                lawcase.caseI2,

                lawcase.caseJ,
                lawcase.caseJ1,
               

                lawcase.pbcase,
                lawcase.law_status,

                lawcase.caseUser,
                lawcase.casePosition,
                lawcase.caseUdate,

                lawcase.caseUlaw,
                lawcase.casePlaw,
                lawcase.caseUlawdate,
                lawcase.caseUlawtime,

                user.ID,
                user.BFL,
                user.Firstname,
                user.Lastname,
                user.Idpass,
                user.Position,
                user.Office,
                user.Partwork,
                user.Work,
                user.Phone,
                user.Email,
                user.Regidate,
                user.Editdate,
                user.lineTK,
                user.Userlevel,
                user.case_count
FROM lawcase      
INNER JOIN user
ON user.ID = lawcase.id_u
WHERE MONTH(lawcase.casedate)  = '$Lmonth' 
AND    YEAR(lawcase.casedate)  = '$Lyear'
AND   user.Office              = '8'
GROUP BY user.ID
ORDER BY user.ID DESC";
}


$result = $conn->query($sql);
//echo $sql;
?>    

 <table id="example1" class="table table-bordered table-striped dataTable" 
        role="grid" aria-describedby="example1_info" border="1">
              <thead>
                <tr role="row" class="info">
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;"><center>NO.</center></th>
                  <!--th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;"><center>ID-Case</center></th-->
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;"><center>วันที่บันทึก</center></th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 3%;"><center>ผู้ปฏิบัติงาน</center></th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 3%;"><center>สังกัด</center></th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 3%;"><center>ไปปฏิบัติงานสถานที่</center></th>
                  <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;"><center>จำนวนงาน</center></th>
                  
                </tr>
              </thead>
              <tbody>
<?php
            
$count_row = 1;

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
$id_case      = $row['id_case'];
$id_u         = $row['id_u'];
$casedate     = $row['casedate'];

$sdate        = $row['sdate'];
$stime        = $row['stime'];
$edate        = $row['edate'];
$etime        = $row['etime'];

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
$law_status   = $row['law_status'];

$caseUser     = $row['caseUser'];
$casePosition = $row['casePosition'];
$caseUdate    = $row['caseUdate'];

$caseUlaw     = $row['caseUlaw'];
$casePlaw     = $row['casePlaw'];
$caseUlawdate = $row['caseUlawdate'];
$caseUlawtime = $row['caseUlawtime'];

$ID           = $row['ID'];
$BFL          = $row['BFL'];
$Firstname    = $row['Firstname'];
$Lastname     = $row['Lastname'];
$Idpass       = $row['Idpass'];
$Position     = $row['Position'];
$Office       = $row['Office'];
$Partwork     = $row['Partwork'];
$Work         = $row['Work'];
$Phone        = $row['Phone'];
$Email        = $row['Email'];
$Regidate     = $row['Regidate'];
$Editdate     = $row['Editdate'];
$lineTK       = $row['lineTK'];
$Userlevel    = $row['Userlevel'];
$case_count   = $row['case_count'];
?>
<tr align="center">
<td><center><?php echo $count_row; ?></center></td>
<td><center><?php echo date("d/m/Y H:i:s",strtotime("+543year".$casedate));?></center></td>
<td><?php echo $caseUser."<br>".$Positionname[$casePosition]; ?></td>
<td><?php echo $Partworkname[$Partwork]."<br>".$Officename[$Office]; ?></td>
<td><center><?php echo $caseA."\r\n".$caseB."\r\n".$caseC."\r\n".$caseD."\r\n".$caseE."\r\n".$caseF."\r\n".$caseG."\r\n".$caseH."\r\n".$caseI."\r\n".$caseJ; ?></center></td> 
<td><center><?php echo $case_count." /Case"; ?></center></td>
</tr>
                    
               <?php $count_row++; } ?>
                                    
              </tbody>  
            </table>
            <hr>
 
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
           
<?php
include('mysql/config.php');

if ($RPartwork != '44' ) {

  $quary ="SELECT * FROM user WHERE Userlevel != '1' AND Partwork = '$RPartwork'"; 

}else{

  $quary ="SELECT * FROM user WHERE Userlevel != '1' AND Office = '8'"; 

}

$result1 = $conn->query($quary);

$dataPoints =  array();

   while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {

    // Accumulate data points in each iteration

    $dataPoints[] = array(

        "label" => $row1['Firstname'] ,
        "y"     => $row1['case_count']

    );
}

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title: {
    text: "PWO Law Track "
  },
  subtitles: [{
    text: "<?php echo date("d/m/Y H:i:s",strtotime("+543year"."Now")); ?>"
  }],
  data: [{
    type: "pie",
    yValueFormatString: "#,##0\"\"",
    indexLabel: "{label} ({y})",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}

/**
pie
line
bar
area
scatter
pyramid
doughnut
stackedArea
**/

</script>
</head>
<body>
<div id="chartContainer" style="height: 500px; width: 100%;" align="center"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                              
            
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