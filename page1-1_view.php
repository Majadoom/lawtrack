<?php 
@session_start();
if (!$_SESSION["UserID"]){
Header("Location: form_login.php");
}else{ ?>
<?php

$menu = "page1";

date_default_timezone_set("Asia/Bangkok");

?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> ฟอร์มการปฏิบัติงานนอกสถานที่</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    
<?php
date_default_timezone_set("Asia/Bangkok");
include('mysql/config.php');

$ID = (isset($_GET['ID'])) ? $_GET['ID'] : "";

$sql1 ="SELECT * FROM user WHERE ID = '$ID'";
$result1  = $conn->query($sql1);
$row1 = $result1->fetch_array(MYSQLI_ASSOC);

$ID        = $row1['ID'];
$Username  = $row1['Username'];
$Password  = $row1['Password'];
$BFL       = $row1['BFL'];
$Firstname = $row1['Firstname'];
$Lastname  = $row1['Lastname'];
$Idpass    = $row1['Idpass'];
$Position  = $row1['Position'];
$Office    = $row1['Office'];
$Partwork  = $row1['Partwork'];
$Work      = $row1['Work'];
$Phone     = $row1['Phone'];
$Email     = $row1['Email'];
$Regidate  = $row1['Regidate'];
$lineTK    = $row1['lineTK'];
$Userlevel = $row1['Userlevel'];


?>
   
    
    <div class="card">
      <div class="card-header card-navy card-outline">

         </div><br>

        <form action="page1-1_update.php" method="POST" accept-charset="utf-8">
   <table width="auto" align="center">

    <tr>
      <td colspan="3">
        <input type="text" name="Regidate" value="<?php echo date("d/m/Y  เวลา H:i:s น.",strtotime("+543year".$Regidate)); ?>"class="form-control is-danger" readonly="readonly" disabled="disabled">
      </td>
    </tr>
    <tr>
      <td>
       <input type="text" name="ID" value="<?php echo $ID; ?>" class="form-control is-warning" readonly="readonly">
       </td>      
      <td>
        <input type="text" name="Username" value="<?php echo $Username; ?>" placeholder="Username" class="form-control text-danger" required>
      </td>
       <td>
        <input type="password" name="Password" value="<?php echo $Password; ?>" placeholder="Password" class="form-control text-danger" required id="myInput">
      </td>
      <td><input type="button" onclick="myFunction()" class="btn btn-warning btn-sm" value="*"></td>
    </tr>
    <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <tr>    
      <td>
        <select name="BFL" id="BFL" class="form-control is-warning" required>
        <option value="0"disabled selected>คำนำหน้า...</option>
        <option value="1">นาย</option>
        <option value="2">นาง</option>
        <option value="3">นางสาว</option>
      </select> 
    </td>
   
          <td>
            <input type="text" name="Firstname" value="<?php echo $Firstname; ?>" class="form-control is-warning" placeholder="ชื่อ" required  >
          </td>
          <td>
            <input type="text" name="Lastname" value="<?php echo $Lastname; ?>" class="form-control is-warning" placeholder="นามสกุล" required  >
          </td>
          
        </tr>

        <tr>
          <td> 
      <select name="Position" id="Position" class="form-control text-danger" required>
        <option value="0"disabled selected>ตำแหน่ง...</option>
        <option value="1">ผู้ดูแลระบบ</option>
        <option value="2">ลูกจ้าง</option>
        <option value="3">นิติกร</option>
        <option value="4">หัวหน้าส่วนงาน</option>
        <option value="5">ผู้อำนวยการสำนัก</option>
        <option value="6">ยกเลิกใช้งาน</option>
      </select> 
          </td>
             <td> 
            <input type="text" name="Idpass" value="<?php echo $Idpass; ?>" class="form-control is-warning" placeholder="รหัสพนักงาน" > 
          </td>
      <td>
         <input type="text" name="Phone" value="<?php echo $Phone; ?>" class="form-control is-warning" placeholder="เบอร์ติดต่อ" > 
    </td>
    
        </tr>
        <tr>
             <td>
          <input type="email" name="Email" value="<?php echo $Email; ?>" class="form-control is-warning" placeholder="อีเมล" > 
            </td>
                 <td>
           <select  name="lineTK" id="lineTK"  class="form-control is-warning">
                <option value="0"disabled selected>ไลน์แจ้งสำนัก..</option>
                <option value="8" title="สำนักคดี">สำนักคดี</option>
                <option value="6" title="สำนักเทคโนโลยีดิจิทัล">สำนักเทคโนโลยีดิจิทัล</option>
            </select>
            </td>
              
          <td>
            <select name="Userlevel" id="Userlevel"  class="form-control text-danger">
               <option value="0"disabled selected>ระดับผู้ใช้งาน..</option>
                <option value="1">แอดมิน</option>
                <option value="2">ลูกจ้าง</option>
                <option value="3">นิติกร</option>
                <option value="4">หัวหน้าส่วนงาน</option>
                <option value="5">ผู้อำนวยการสำนัก</option>
                <option value="6">ยกเลิกใช้งาน</option>
            </select>
          </td> 
           
        </tr>
             <tr>

      
               <td>
          <select name="Work" id="Work" class="form-control is-warning" >
        <option value=" " disabled selected >งาน...</option>
        <option value="0">...</option>
        <option value="1">ไม่มีสังกัดงาน</option>
        <option value="4">งานสืบสวนสอบสวน</option>
        <option value="9">งานคดีและอื่นๆ</option>

      </select> 
    </td>
 
         <td>
          <select name="Partwork" id="Partwork" class="form-control is-warning" >
        <option value=" " disabled selected >ส่วนงาน...</option>
        <option value="23">ส่วนงานคดีแพ่งและปกครอง1</option>
        <option value="24">ส่วนงานคดีแพ่งและปกครอง2</option>
        <option value="25">ส่วนงานคดีอาญา</option>
        <option value="26">ส่วนงานบังคับคดี</option>
        <option value="18"disabled>ส่วนงานพัฒนาเทคโนโลยีดิจิทัล</option>
      </select> 
    </td>
         <td>
          <select name="Office" id="Office" class="form-control is-warning" required>
        <option value=" " disabled selected >สำนัก...</option>
        <option value="8">สำนักคดี</option>
        <option value="6"disabled>สำนักเทคโนโลยีดิจิทัล</option>
      </select> 
    </td>
        </tr>

</tr>

  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
        <tr align="center">
           <td></td>

          <td>
            <!--input type="reset" value="ล้างข้อมูล" class="btn btn-danger btn-sm"-->
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success btn-lg">
          </td>
          
        </tr>
         
</table>
 <script>
            document.getElementById('Office').value    = '<?php echo $Office; ?>';
            document.getElementById('Partwork').value  = '<?php echo $Partwork; ?>';
            document.getElementById('Work').value      = '<?php echo $Work; ?>';
            document.getElementById('BFL').value       = '<?php echo $BFL; ?>';
            document.getElementById('Position').value  = '<?php echo $Position; ?>';
            document.getElementById('Userlevel').value = '<?php echo $Userlevel; ?>';
            document.getElementById('lineTK').value    = '<?php echo $lineTK; ?>';
        
        </script>
       </form>
   

     
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
           
            
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