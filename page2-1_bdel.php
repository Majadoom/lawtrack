<?php 
@session_start();
error_reporting(0);
include('mysql/config.php');

$id_case  = (isset($_GET['id_case'])) ? $_GET['id_case']  : "";
$ID       = (isset($_GET['ID']))      ? $_GET['ID']       : "";


 $sql2 = "SELECT  id_case,casedate,id_u,sdate,stime,edate,etime,caseA,caseA1,caseA2,caseB,caseB1,caseB2,caseC,caseC1,caseC2,caseD,caseD1,caseD2,caseE,caseE1,caseE2,caseF,caseF1,caseF2,caseG,caseG1,caseG2,caseH,caseH1,caseH2,caseI,caseI1,caseI2,caseJ,caseJ1,pbcase,law_status,caseUlaw,casePlaw,caseUlawdate,caseUlawtime,caseUser,casePosition,caseUdate
             FROM lawcase  
             WHERE id_case = '{$id_case}'";

    $result2 = $conn->query($sql2);
    $row  = $result2->fetch_array(MYSQLI_ASSOC);

    $id_case      = $row['id_case'];
    $casedate     = $row['casedate'];
    $id_u         = $row['id_u'];
    $sdate        = $row['sdate'];
    $stime        = $row['stime'];
    $edate        = $row['edate'];
    $etime        = $row['etime'];
    $caseA        = $row['caseA'];
    $caseA1       = $row['caseA1'];
    $caseB        = $row['caseB'];
    $caseB1       = $row['caseB1'];
    $caseC        = $row['caseC'];
    $caseC1       = $row['caseC1'];
    $caseD        = $row['caseD'];
    $caseD1       = $row['caseD1'];
    $caseE        = $row['caseE'];
    $caseE1       = $row['caseE1'];
    $caseF        = $row['caseF'];
    $caseF1       = $row['caseF1'];
    $caseG        = $row['caseG'];
    $caseG1       = $row['caseG1'];
    $caseH        = $row['caseH'];
    $caseH1       = $row['caseH1'];
    $caseI        = $row['caseI'];
    $caseI1       = $row['caseI1'];
    $caseI2       = $row['caseI2'];
    $caseJ        = $row['caseJ'];
    $caseJ1       = $row['caseJ1'];
    $pbcase       = $row['pbcase'];
    $law_status   = $row['law_status'];
    $caseUlaw     = $row['caseUlaw'];
    $casePlaw     = $row['casePlaw'];
    $caseUlawdate = $row['caseUlawdate'];
    $caseUlawtime = $row['caseUlawtime'];
    $caseUser     = $row['caseUser'];
    $casePosition = $row['casePosition'];
    $caseUdate    = $row['caseUdate'];
	$deleted_by	  = $_SESSION["UserID"]."-".$_SESSION["User"];

if ($result2) {

    $sql3 = "INSERT INTO del_lawcase(del_id_case,del_id_u,del_casedate,del_sdate,del_stime,del_edate,del_etime,del_caseA,del_caseA1,del_caseA2,del_caseB,del_caseB1,del_caseB2,del_caseC,del_caseC1,del_caseC2,del_caseD,del_caseD1,del_caseD2,del_caseE,del_caseE1,del_caseE2,del_caseF,del_caseF1,del_caseF2,del_caseG,del_caseG1,del_caseG2,del_caseH,del_caseH1,del_caseH2,del_caseI,del_caseI1,del_caseI2,del_caseJ,del_caseJ1,del_pbcase,del_law_status,del_caseUlaw,del_casePlaw,del_caseUlawdate,del_caseUlawtime,del_caseUser,del_casePosition,del_caseUdate,del_by)" 
    . "VALUES('$id_case','$casedate','$id_u','$sdate','$stime','$edate','$etime','$caseA','$caseA1','$caseA2','$caseB','$caseB1','$caseB2','$caseC','$caseC1','$caseC2','$caseD','$caseD1','$caseD2','$caseE','$caseE1','$caseE2','$caseF','$caseF1','$caseF2','$caseG','$caseG1','$caseG2','$caseH','$caseH1','$caseH2','$caseI','$caseI1','$caseI2','$caseJ','$caseJ1','$pbcase','$law_status','$caseUlaw','$casePlaw','$caseUlawdate','$caseUlawtime','$caseUser','$casePosition','$caseUdate','$deleted_by')";
          
}

$result3 = $conn->query($sql3); 
//echo $sql3;
$v1 = ($result3 == 1) ? 1 : 0;
 ?>

 <html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>PWO Law Track</title>
</head>
<body>
    <script>
        var v1 =<?php echo $v1; ?>;
        if (v1 == 1) {
            alert('ยืนยัน การลบข้อมูล');
            window.location.replace("page2-1_del.php?id_case=<?php echo $id_case; ?>&ID=<?php echo $ID; ?>");
        } else {
            alert('ยืนยัน การลบข้อมูล ล้มเหลว');
           window.history.back();
        }
    </script>
</body>
</html>