<?php
@session_start();
date_default_timezone_set("Asia/Bangkok");
include ('mysql/config.php');
error_reporting(0);
$id_case      = $_POST['id_case'];
$id_u         = $_POST['id_u'];
$casedate     = $_POST['casedate'];
$sdate        = date('Y-m-d',strtotime("-543year".$_POST['sdate']));
$stime        = $_POST['stime'];
$edate        = date('Y-m-d',strtotime("-543year".$_POST['edate']));
$etime        = $_POST['etime'];
$latitude    = $_POST['latitude'];
$longitude   = $_POST['longitude'];
$case_area   = $_POST['case_area'];
$case_name_p = $_POST['case_name_p'];

if ($case_date_p) {

$case_date_p = date("Y-m-d",strtotime("-543year".$_POST['case_date_p'])); 

}else{

 $case_date_p  = $_POST['case_date_p']; 

}
$law_status   = $_POST['law_status'];
$caseA        = $_POST['caseA'];
$caseA1       = $_POST['caseA1'];
$caseA2       = $_POST['caseA2'];
$caseB        = $_POST['caseB'];
$caseB1       = $_POST['caseB1'];
$caseB2       = $_POST['caseB2'];
$caseC        = $_POST['caseC'];
$caseC1       = $_POST['caseC1'];
$caseC2       = $_POST['caseC2'];
$caseD        = $_POST['caseD'];
$caseD1       = $_POST['caseD1'];
$caseD2       = $_POST['caseD2'];
$caseE        = $_POST['caseE'];
$caseE1       = $_POST['caseE1'];
$caseE2       = $_POST['caseE2'];
$caseF        = $_POST['caseF'];
$caseF1       = $_POST['caseF1'];
$caseF2       = $_POST['caseF2'];
$caseG        = $_POST['caseG'];
$caseG1       = $_POST['caseG1'];
$caseG2       = $_POST['caseG2'];
$caseH        = $_POST['caseH'];
$caseH1       = $_POST['caseH1'];
$caseH2       = $_POST['caseH2'];
$caseI        = $_POST['caseI'];
$caseI1       = $_POST['caseI1'];
$caseI2       = $_POST['caseI2'];
$caseJ        = $_POST['caseJ'];
$caseJ1       = $_POST['caseJ1'];
$pbcase       = $_POST['pbcase'];
/*ผู้ปฏิบัติงาน*/
$caseUser     = $_POST['caseUser'];     
$casePosition = $_POST['casePosition'];
$caseUdate    = $_POST['caseUdate'];
/*เจ้าหน้าที่*/
$caseUlaw     = $_POST['caseUlaw'];    
$casePlaw     = $_POST['casePlaw'];
$caseUlawtime = $_POST['caseUlawtime'];
$caseUlawdate = $_POST['caseUlawdate'];


$sql = "UPDATE lawcase SET "
. "id_u           = '$id_u', "  
. "casedate       = '$casedate', "
. "sdate          = '$sdate', "
. "stime          = '$stime', "
. "edate          = '$edate', "
. "etime          = '$etime', "
. "latitude       = '$latitude', "
. "longitude      = '$longitude', "
. "case_area      = '$case_area ', "
. "case_name_p    = '$case_name_p', "
. "case_date_p    = '$case_date_p', "
. "law_status     = '$law_status', "
. "caseA          = '$caseA', "
. "caseA1         = '$caseA1', "
. "caseA2         = '$caseA2', "
. "caseB          = '$caseB', "
. "caseB1         = '$caseB1', "
. "caseB2         = '$caseB2', "
. "caseC          = '$caseC', "
. "caseC1         = '$caseC1', "
. "caseC2         = '$caseC2', "
. "caseD          = '$caseD', "
. "caseD1         = '$caseD1', "
. "caseD2         = '$caseD2', "
. "caseE          = '$caseE', "
. "caseE1         = '$caseE1', "
. "caseE2         = '$caseE2', "
. "caseF          = '$caseF', "
. "caseF1         = '$caseF1', "
. "caseF2         = '$caseF2', "
. "caseG          = '$caseG', "
. "caseG1         = '$caseG1', "
. "caseG2         = '$caseG2', "
. "caseH          = '$caseH', "
. "caseH1         = '$caseH1', "
. "caseH2         = '$caseH2', "
. "caseI          = '$caseI', "
. "caseI1         = '$caseI1', "
. "caseI2         = '$caseI2', "
. "pbcase         = '$pbcase', "
. "caseUser       = '$caseUser', "
. "casePosition   = '$casePosition', "
. "caseUdate      = '$casedate', "
. "caseUlaw       = '$caseUlaw', "
. "casePlaw       = '$casePlaw', "
. "caseUlawtime   = '$caseUlawtime', "
. "caseUlawdate   = '$caseUlawdate' "
. "WHERE id_case  = '$id_case'";
$result = $conn->query($sql);
$v1 = ($result == 1) ? 1 : 0;
//echo $sql;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>PWO Law Track</title>
</head>
<body>
    <script>
        var v1 =<?php echo $v1; ?>;
        if(v1==1){
            alert('การอัพเดทดำเนินการ เสร็จสิ้น');
            window.location.replace("page2-1_view.php?id_case=<?php echo $id_case; ?>");
            
        }else{
            alert('การอัพเดทดำเนินการ ล้มเหลว');
            window.history.back();
        }
    </script>
</body>
</html>


