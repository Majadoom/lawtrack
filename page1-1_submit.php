<!DOCTYPE html>
<?php
@session_start();
include 'mysql/config.php';
date_default_timezone_set("Asia/Bangkok");

$Username  = $_POST['Username'];
$Password  = $_POST['Password'];
$BFL       = $_POST['BFL'];
$Firstname = $_POST['Firstname'];
$Lastname  = $_POST['Lastname'];
$Idpass    = $_POST['Idpass'];
$Position  = $_POST['Position'];
$Office    = $_POST['Office'];
$Partwork  = $_POST['Partwork'];
$Work      = $_POST['Work'];
$Phone     = $_POST['Phone'];
$Email     = $_POST['Email'];
$Userlevel = $_POST['Userlevel'];
$Regidate  = date("Y-m-d H:i:s",strtotime("NOW"));
$lineTK    = $_POST['lineTK'];

$sql = "INSERT INTO user(Username,
                        Password,
                        BFL,
                        Firstname,
                        Lastname,
                        Idpass,
                        Position,
                        Office,
                        Partwork,
                        Work,
                        Phone,
                        Email,
                        Regidate,
                        Userlevel,
                        lineTK) "
        . "VALUES('$Username',
                  '$Password',
                  '$BFL',
                  '$Firstname',
                  '$Lastname',
                  '$Idpass',
                  '$Position',
                  '$Office',
                  '$Partwork',
                  '$Work',
                  '$Phone',
                  '$Email',
                  '$Regidate',
                  '$Userlevel',      
                  '$lineTK')";


$result = $conn->query($sql);
$v1 = ($result == 1) ? 1 : 0;
//echo $sql;
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>PWO EWS System </title>
    </head>
    <body>
        <script>
            var v1 =<?php echo $v1; ?>;
            if(v1==1){
                alert('การเพิ่มผู้ใช้ดำเนินการ เสร็จสิ้น');
                window.location.replace("page1.php");
            }else{
                alert('การเพิ่มผู้ใช้ดำเนินการ ล้มเหลว');
               window.history.back();
            }
        </script>
    </body>
</html>


   