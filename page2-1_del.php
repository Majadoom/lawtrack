<?php
@session_start();
include('mysql/config.php');

$id_case  = (isset($_GET['id_case'])) ? $_GET['id_case']  : "";
$ID       = (isset($_GET['ID']))      ? $_GET['ID']       : "";

if ($id_case && $ID) {

    $sql1 ="UPDATE user 
    SET case_count = case_count-1 
    WHERE ID  = '{$ID}'";

    $result1 = $conn->query($sql1);

   
}

$sql = "DELETE FROM lawcase WHERE id_case ='$id_case'";
$result = $conn->query($sql);

$v1 = ($result == 1) ? 1 : 0;
//echo $sql1."<br>".$sql;
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
        if (v1 == 1) {
            alert('ดำเนินการ ลบ เสร็จสิ้น');
            window.location.replace("page2.php");
        } else {
            alert('การดำเนิน ลบ การล้มเหลว');
            window.history.back();
        }
    </script>
</body>
</html>
