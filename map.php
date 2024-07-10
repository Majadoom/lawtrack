<?php 
error_reporting(0);
?>
<DOCTYPE html>
<html>
<body>
  <form method="POST" accept-charset="utf-8">
    <!--ใส่ id="demo" เพื่อที่จะใช้ document.getElementById("demo") ใน JavaScript -->
    <input type="text" name="latitude" id="latitude" value="" placeholder="latitude" size="20%"  required class="btn btn-light" size="20%"></input>
    <input type="text" name="longitude" id="longitude" value="" placeholder="longitude" size="20%"  required class="btn btn-light" size="20%"></input>
    <input type="submit" name="submit" value="ค้นหา" onclick="getLocation()" class="btn-success btn-sm">
    <button onclick="location.reload()">ล้างข้อมูล</button>
  </form>
</body>
</html>

<!-- โหลด Google Maps JavaScript API -->
<?php 
if (isset($_POST['submit'])) {
$latitude  = $_POST['latitude'];
$longitude = $_POST['longitude']; 
}
?>

<?php if ($latitude & $longitude) { ?>
  <iframe width="80%" height="600" src="https://map.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>
  <?php 
  echo "<br>";
  echo $latitude  = $_POST['latitude']."<br>";
  echo $longitude = $_POST['longitude'];

  ?>
<?php }else{ ?>
  <iframe width="80%" height="600" src="https://map.google.com/maps?q=&output=embed"></iframe>
<?php } ?>

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
  //  document.getElementById("demo1").value = "latitude: " + position.coords.latitude + ", longitude: " + position.coords.longitude;
    document.getElementById("latitude").value = position.coords.latitude;
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
<hr>

<!------------------------------step 2--------------------------->