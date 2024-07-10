<?php 
@session_start();
if (!$_SESSION["UserID"]){
Header("Location: form_login.php");
}else{ ?>

<?php
date_default_timezone_set("Asia/Bangkok");
$menu = "page3";

?>



<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> รายงานการปฏิบัติงาน รายเดือน</h1>
    </div><!-- /.container-fluid -->
  </section>
<meta name="viewport" content="width=640">
  <!-- Main content -->
  <section class="content">
    

    
    <div class="card">
      <div class="card-header card-navy card-outline">
       
        <div align="center"> 
        <!--a href="page3-1.php">      
        <button type="button" class="btn btn-success btn-lg" ><i class="nav-icon fas fa-solid fa-paper"></i>+ รายงานการปฏิบัติงานนอกสถานที่ รายเดือน </button>
        </a-->
        </div>
   </div>
<form action="page3-1.php" method="POST" accept-charset="UTF-8">
   <table width="auto" align="center">
     <thead>
       <tr>
        <th><center>ส่วนงาน</center></th>
         <th><center>เดือน</center></th>
         <th><center>ปี พ.ศ.</center></th>
       </tr>
     </thead>
     <tbody>
       <tr>
        <td>
          <select name="RPartwork" id="RPartwork" class="form-control is-warning">
            <optgroup label="สำนักคดี">
            <optgroup label="ส่วนงาน">
            <option value="0" >...</option>
            <option value="23">คดีแพ่งและปกครอง1</option>
            <option value="24">คดีแพ่งและปกครอง2</option>
            <option value="25">คดีอาญา</option>
            <option value="26">บังคับคดี</option>
            <option value="44">ทุกส่วนงานคดี(4)</option>
            </optgroup>
            </optgroup>
          </select>
        </td>

         <td>
          <select id="Lmonth" name="Lmonth" class="form-control is-warning" required style="width:auto ;"> 
            <option value="" selected disabled >เดือน..</option>
            <option value="01">มกราคม</option>
            <option value="02">กุมภาพันธ์</option>
            <option value="03">มีนาคม</option>
            <option value="04">เมษายน</option>
            <option value="05">พฤษภาคม</option>
            <option value="06">มิถุนายน</option>
            <option value="07">กรกฎาคม</option>
            <option value="08">สิงหาคม</option>
            <option value="09">กันยายน</option>
            <option value="10">ตุลาคม</option>
            <option value="11">พฤศจิกายน</option>
            <option value="12">ธันวาคม</option>
          </select>
        </td>
        <td>
          <input type="text" name="Lyear" value="" pattern="[0-9]{4,}" title="ระบุ ปี พ.ศ. ตัวเลข 4 หลัก เท่านั้น" class="form-control is-warning" style="width:100% ;" placeholder="ปี พ.ศ. ตัวเลข 4 หลัก" required>
        </td>

        <tr>
          <td><br></td>
        </tr>
       </tr>
       <tr align="center">
         <td colspan="3">
           <input type="submit" value="submit" class="form-control btn-success ">
         </td>
       </tr>
     </tbody>
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