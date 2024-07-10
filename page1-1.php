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
    <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> ฟอร์มการเพิ่มข้อมูลผู้ใช้งานระบบ</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    
    
    
    <div class="card">
      <div class="card-header card-navy card-outline">

         </div><br>

       <form action="page1-1_submit.php" method="POST" accept-charset="utf-8">
   <table width="auto" align="center">

    <tr>
      <td>
        <input type="text" name="Regidate" value="<?php echo date("d/m/Y  เวลา H:i น.",strtotime("+543year"."NOW")) ?>"class="form-control is-danger" readonly="readonly" disabled="disabled">
      </td>
      <td>
        <input type="text" name="Username" value="" placeholder="Username" class="form-control is-danger" required>
      </td>
       <td>
        <input type="text" name="Password" value="" placeholder="Password" class="form-control is-danger" required>
      </td>
    </tr>
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
            <input type="text" name="Firstname" value="" class="form-control is-warning" placeholder="ชื่อ" required  >
          </td>
          <td>
            <input type="text" name="Lastname" value="" class="form-control is-warning" placeholder="นามสกุล" required  >
          </td>
          
        </tr>

        <tr>
          <td> 
      <select name="Position" id="Position" class="form-control is-warning" required>
        <option value="0"disabled selected>ตำแหน่ง...</option>
        <option value="1">ผู้ดูแลระบบ</option>
        <option value="2">ลูกจ้าง</option>
        <option value="3">นิติกร</option>
        <option value="4">หัวหน้าส่วนงาน</option>
        <option value="5">ผู้อำนวยการสำนัก</option>
      </select> 
          </td>
             <td> 
            <input type="text" name="Idpass" value="" class="form-control is-warning" placeholder="รหัสพนักงาน" > 
          </td>
      <td>
         <input type="text" name="Phone" value="" class="form-control is-warning" placeholder="เบอร์ติดต่อ" > 
    </td>
    
        </tr>
        <tr>
             <td>
          <input type="email" name="Email" value="" class="form-control is-warning" placeholder="อีเมล" > 
            </td>
                 <td>
           <select  name="lineTK" id="lineTK"  class="form-control is-warning">
                <option value="0"disabled selected>ไลน์แจ้งสำนัก..</option>
                <option value="8" title="สำนักคดี">สำนักคดี</option>
                <option value="6" title="สำนักเทคโนโลยีดิจิทัล">สำนักเทคโนโลยีดิจิทัล</option>
            </select>
            </td>
              
          <td>
            <select name="Userlevel" id="Userlevel"  class="form-control is-warning">
               <option value="0"disabled selected>ระดับผู้ใช้งาน..</option>
                <option value="1">แอดมิน</option>
                <option value="2">ลูกจ้าง</option>
                <option value="3">นิติกร</option>
                <option value="4">หัวหน้าส่วนงาน</option>
                <option value="5">ผู้อำนวยการสำนัก</option>
                <option value="6">ผู้ใช้งาน(wait)</option>
            </select>
          </td> 
           
        </tr>
             <tr>

      
               <td>
          <select name="Work" id="Work" class="form-control is-warning" required>
        <option value=" " disabled selected >งาน...</option>
        <option value="1">ไม่มีสังกัดงาน</option>
        <option value="4">งานสืบสวนสอบสวน</option>
        <option value="9">งานคดีและอื่นๆ</option>

      </select> 
    </td>
 
         <td>
          <select name="Partwork" id="Partwork" class="form-control is-warning" required>
        <option value=" " disabled selected >ส่วนงาน...</option>
        <option value="23">ส่วนงานคดีแพ่งและปกครอง1</option>
        <option value="24">ส่วนงานคดีแพ่งและปกครอง2</option>
        <option value="25">ส่วนงานคดีอาญา</option>
        <option value="26">ส่วนงานบังคับคดี</option>
        <option value="18"disabled>ส่วนงานพัฒนาเทคโนโลยีดิจิทัล</option>
      </select> 
    </td>
         <td>
          <select name="Office" id="Office" class="form-control is-warning">
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
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger btn-sm">
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success btn-lg">
          </td>
          
        </tr>
         
</table>

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