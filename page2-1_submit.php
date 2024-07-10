<?php
@session_start();
date_default_timezone_set("Asia/Bangkok");
include ('mysql/config.php');
error_reporting(0);

if ($_SESSION['UserID'] != "") {

    $sql1 = "UPDATE user SET case_count = case_count+1 WHERE ID = {$_SESSION['UserID']} ";
    $result1 = $conn->query($sql1);

}


$id_u        = $_POST['id_u'];
$casedate    = date("Y/m/d H:i",strtotime("Now"));

$sdate       = $_POST['sdate'];
$stime       = $_POST['stime'];
$edate       = $_POST['edate'];
$etime       = $_POST['etime'];

$case_area   = $_POST['case_area'];
$case_name_p = $_POST['case_name_p'];
$case_date_p = $_POST['case_date_p'];

$case0       = $_POST['case0'];
$case1       = $_POST['case1'];
$case2       = $_POST['case2'];

$caseA     = $_POST['caseA'];
$caseA1    = $_POST['caseA1'];
$caseA2    = $_POST['caseA2'];
$caseB     = $_POST['caseB'];
$caseB1    = $_POST['caseB1'];
$caseB2    = $_POST['caseB2'];
$caseC     = $_POST['caseC'];
$caseC1    = $_POST['caseC1'];
$caseC2    = $_POST['caseC2'];
$caseD     = $_POST['caseD'];
$caseD1    = $_POST['caseD1'];
$caseD2    = $_POST['caseD2'];
$caseE     = $_POST['caseE'];
$caseE1    = $_POST['caseE1'];
$caseE2    = $_POST['caseE2'];
$caseF     = $_POST['caseF'];
$caseF1    = $_POST['caseF1'];
$caseF2    = $_POST['caseF2'];
$caseG     = $_POST['caseG'];
$caseG1    = $_POST['caseG1'];
$caseG2    = $_POST['caseG2'];
$caseH     = $_POST['caseH'];
$caseH1    = $_POST['caseH1'];
$caseH2    = $_POST['caseH2'];
$caseI     = $_POST['caseI'];
$caseI1    = $_POST['caseI1'];
$caseI2    = $_POST['caseI2'];
$caseJ     = $_POST['caseJ'];
$caseJ1    = $_POST['caseJ1'];
$pbcase    = $_POST['pbcase'];

if ($law_status !="") {
    $law_status   = $_POST['law_status'];
}else{
    $law_status   = "1";   
}

$caseUlaw     = $_POST['caseUlaw'];     /*เจ้าหน้าที่*/
$casePlaw     = $_POST['casePlaw'];
$caseUlawtime = $_POST['caseUlawtime'];
$caseUlawdate = $_POST['caseUlawdate'];
$caseUser     = $_POST['caseUser'];     /*ผู้ปฏิบัติงาน*/
$casePosition = $_POST['casePosition'];
$caseUdate    = $_POST['caseUdate'];

$sql = "INSERT INTO lawcase(
    id_u,
    casedate,
    sdate,
    stime,
    edate,
    etime,
    case_area,
    case_name_p,
    case_date_p,
    case0,
    case1,
    case2,
    caseA,
    caseA1,
    caseA2,
    caseB,
    caseB1,
    caseB2,
    caseC,
    caseC1,
    caseC2,
    caseD,
    caseD1,
    caseD2,              
    caseE,
    caseE1,
    caseE2,                    
    caseF,
    caseF1,
    caseF2,
    caseG,
    caseG1,
    caseG2,
    caseH,
    caseH1,
    caseH2,
    caseI,
    caseI1,
    caseI2,
    caseJ,
    caseJ1,
    pbcase,
    law_status,
    caseUser,
    casePosition,
    caseUdate,
    caseUlaw,
    casePlaw,
    caseUlawdate,
    caseUlawtime) "
. "VALUES(
  '$id_u',
  '$casedate',
  '$sdate',
  '$stime',
  '$edate',
  '$etime',
  '$case_area',
  '$case_name_p',
  '$case_date_p',
  '$case0',
  '$case1',
  '$case2',
  '$caseA',
  '$caseA1',
  '$caseA2',
  '$caseB',
  '$caseB1',
  '$caseB2',
  '$caseC',
  '$caseC1',
  '$caseC2',
  '$caseD',
  '$caseD1',
  '$caseD2',
  '$caseE',
  '$caseE1',
  '$caseE2',
  '$caseF',
  '$caseF1',
  '$caseF2',
  '$caseG',
  '$caseG1',
  '$caseG2',
  '$caseH',
  '$caseH1',
  '$caseH2',
  '$caseI',
  '$caseI1',
  '$caseI2',
  '$caseJ',
  '$caseJ1',
  '$pbcase',
  '$law_status',
  '$caseUser',
  '$casePosition',
  '$caseUdate',
  '$caseUlaw',
  '$casePlaw',
  '$caseUlawtime',
  '$caseUlawdate')";


$result = $conn->query($sql);
$v1 = ($result == 1) ? 1 : 0;
//echo $sql;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>PWO Law Track</title>
</head>
<body>
    <script>
        var v1 =<?php echo $v1; ?>;
        if(v1==1){
            alert('การบันทึกดำเนินการ เสร็จสิ้น');
            window.location.replace("page2.php");
        }else{
            alert('การบันทึกดำเนินการ ล้มเหลว');
            window.history.back();
        }
    </script>
</body>
</html>



