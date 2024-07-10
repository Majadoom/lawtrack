<?php
@session_start();
date_default_timezone_set("Asia/Bangkok");
include ('mysql/config.php');
error_reporting(0);

$ID        = $_POST['ID'];
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
$Editdate  = date("Y-m-d H:i:s");
$lineTK    = $_POST['lineTK'];
$Userlevel = $_POST['Userlevel'];

$sql = "UPDATE user SET "
        . "Username       = '$Username', "  
        . "Password       = '$Password', "
        . "BFL            = '$BFL', "
        . "Firstname      = '$Firstname', "
        . "Lastname       = '$Lastname', "
        . "Idpass         = '$Idpass', "
        . "Position       = '$Position', "
        . "Office         = '$Office', "
        . "Partwork       = '$Partwork', "
        . "Work           = '$Work', "
        . "Phone          = '$Phone', "
        . "Email          = '$Email', "
        . "Editdate       = '$Editdate', "
        . "lineTK         = '$lineTK', "
        . "Userlevel      = '$Userlevel' "
        . "WHERE ID       = '$ID'";


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
                window.location.replace("page1.php");
            
            }else{
                alert('การอัพเดทดำเนินการ ล้มเหลว');
                window.history.back();
            }
        </script>
    </body>
</html>


   