<!--ss-->
<?php
@session_start();
date_default_timezone_set("Asia/Bangkok");
error_reporting(0);

include('mysql/config.php');

$id_u    = (isset($_GET['id_u']))    ? $_GET['id_u']    : "";


if ($id_u ) {
   
   $sql1 = "UPDATE lawcase SET count_line = count_line+1 WHERE id_u = '$id_u'";
   $result1 = $conn->query($sql1);

}


$id_case = (isset($_GET['id_case'])) ? $_GET['id_case'] : "";

$sql = "SELECT 
u.ID,
u.BFL,
u.Firstname,
u.Lastname,
u.Position,
u.Office,
u.Partwork,
u.Work,
u.lineTK,
u.Userlevel,
l.id_u,
l.id_case,
l.casedate,
l.sdate,
l.stime,
l.edate,
l.etime,
l.case0,
l.case1,
l.caseA,
l.caseA1,
l.caseB,
l.caseB1,
l.caseC,
l.caseC1,
l.caseD,
l.caseD1,
l.caseE,
l.caseE1,
l.caseF,
l.caseF1,
l.caseG,
l.caseG1,
l.caseH,
l.caseH1,
l.caseI,
l.caseI1,
l.caseJ,
l.caseJ1,
l.pbcase,
l.law_status,
l.caseUlaw,
l.casePlaw,
l.caseUlawdate,
l.caseUlawtime,
l.caseUser,
l.casePosition,
l.caseUdate
FROM user as u 
INNER JOIN lawcase as l 
ON l.id_u = u.ID 
WHERE u.ID = '$id_u' AND l.id_case = '$id_case' ORDER BY id_case DESC";

$result = $conn->query($sql);
$row    = $result->fetch_array(MYSQLI_ASSOC);

$ID        = $row['ID'];
$BFL       = $row['BFL'];
$Firstname = $row['Firstname'];
$Lastname  = $row['Lastname'];
$Position  = $row['Position'];
$Office    = $row['Office'];
$Partwork  = $row['Partwork'];
$Work      = $row['Work'];
$Userlevel = $row['Userlevel'];
$lineTK    = $row['lineTK'];

$id_u      = $row['id_u'];
$id_case   = $row['id_case'];
$casedate  = $row['casedate'];
$sdate     = $row['sdate'];
$stime     = $row['stime'];
$edate     = $row['edate'];
$etime     = $row['etime'];

$case0     = $row['case0'];
$case1     = $row['case1'];

$caseA     = $row['caseA'];
$caseA1    = $row['caseA1'];

$caseB     = $row['caseB'];
$caseB1    = $row['caseB1'];

$caseC     = $row['caseC'];
$caseC1    = $row['caseC1'];

$caseD     = $row['caseD'];
$caseD1    = $row['caseD1'];

$caseE     = $row['caseE'];
$caseE1    = $row['caseE1'];

$caseF     = $row['caseF'];
$caseF1    = $row['caseF1'];

$caseG     = $row['caseG'];
$caseG1    = $row['caseG1'];

$caseH     = $row['caseH'];
$caseH1    = $row['caseH1'];

$caseI     = $row['caseI'];
$caseI1    = $row['caseI1'];

$caseJ     = $row['caseJ'];
$caseJ1    = $row['caseJ1'];


$pbcase     = $row['pbcase'];
$law_status = $row['law_status'];

$caseUser     = $row['caseUser'];
$casePosition = $row['casePosition'];
$caseUdate    = $row['caseUdate'];


//$tokens =["mvPAVZVZfOaHXfAyl2BfeW2zhjLIOnQdz57sSdV7uud"]; 
/*สำนักคดี line Group pwo law */

//$tokens =["5qlMfLj6FWa7Sr9aIzgco4octbjZWBnrnVwKmZqR1Ha"]; //admin

$tokens = ["mvPAVZVZfOaHXfAyl2BfeW2zhjLIOnQdz57sSdV7uud"];

$str = "[ แจ้งปฏิบัติงาน ]"
."\r\n"
."\r\n"."[ สำนัก ]"
."\r\n".$Officename[$Office]
."\r\n"
."\r\n"."[ ส่วนงาน ]"
."\r\n".$Partworkname[$Partwork]
."\r\n"
."\r\n"."[ ผู้ปฏิบัติงาน ]"
."\r\n".$caseUser
."\r\n"
."\r\n"."[ ตำแหน่ง ]"
."\r\n".$Positionname[$casePosition]
."\r\n"
."\r\n"."[ วันที่เริ่มปฏิบัติงาน ]"
."\r\n".date("d-m-Y",strtotime("+543year".$sdate))." ".$stime
."\r\n"
."\r\n"."[ วันที่สิ้นสุดปฏิบัติงาน ]"
."\r\n".date("d-m-Y",strtotime("+543year".$edate))." ".$etime
."\r\n"
."\r\n"."[ID-Case]".$id_case
."\r\n"
."\r\n"."[ สถานที่ปฏิบัติงาน ] "
."\r\n".$case0.$caseA.$caseB.$caseC.$caseD.$caseE.$caseF.$caseG.$caseH.$caseI.$caseJ 
."\r\n"
."\r\n"."[ ลักษณะงานที่ไปปฏิบัติ ]"
."\r\n".$case1.$caseA1.$caseB1.$caseC1.$caseD1.$caseE1.$caseF1.$caseG1.$caseH1.$caseI1.$caseJ1; 




$res = []; 
foreach ($tokens as $token) {
    $res[] = notify_message($str, $token);
}

function notify_message($message, $token) {
    $queryData = ['message' => $message];
    $queryData = http_build_query($queryData, '', '&');
    $headerOptions = [ 
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
            ."Authorization: Bearer ".$token."\r\n"
            ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        ],
    ];

    $context = stream_context_create($headerOptions);
    $result = file_get_contents("https://notify-api.line.me/api/notify", FALSE, $context);
    $res = json_decode($result);
    //return $res;

}
$v1 = ($result == 1) ? 1 : 0;

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
        var v1 = <?php echo $v1; ?>;
        if(v1 == 1){
            alert('แจ้งเตือน line เสร็จสิ้น');
            window.location.replace("page2.php");
            
        }else{
            alert('แจ้งเตือน line ล้มเหลว');
            
            window.history.back();
        }
    </script>
</body>
</html>

<!--end-->




