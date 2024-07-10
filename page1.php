<?php 
@session_start();
if (!$_SESSION["UserID"]){
Header("Location: form_login.php");
}else{ ?>

<?php

$menu = "page1";

?>

<?php include("header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid"> 
    <h1><i class="nav-icon fas fa-address-card"></i> รายงานข้อมูลผู้ใช้งานระบบ</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    
    <div class="card">
      <div class="card-header card-navy card-outline">
       
    
        <div align="center"> 
        <a href="page1-1.php">      
        <button type="button" class="btn btn-success btn-lg" ><i class="fa fa-user-plus"></i> เพิ่มข้อมูล </button></a>
          
        </div>
      </div>
      <br>
      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" border="1">
              <thead>
                <tr role="row" class="info" align="center">
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ID</th>
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ชื่อผู้ใช้งาน</th>
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ตำแหน่ง</th>
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">สังกัด</th>
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">Line Group</th>
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">ระดับผู้ใช้งาน</th>
                   <th  tabindex="0" rowspan="1" colspan="1" style="width: 1%;">วันที่บันทึก</th> 
                </tr>
              </thead>
              <tbody>   
              <?php
include('mysql/config.php');
$sql1 ="SELECT * FROM user WHERE Userlevel ORDER BY Regidate ASC";
$result1  = $conn->query($sql1);

$C_row = 1;
while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) {
$ID        = $row1['ID'];
$BFL       = $row1['BFL'];
$Username  = $row1['Username'];
$Password  = $row1['Password'];
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

              
              <tr align="center">
          
                <td><?php echo $ID; ?></td>
                <td><?php echo $BFLname[$BFL]." ".$Firstname." ".$Lastname; ?></td>
                <td><?php echo $Positionname[$Position]; ?></td>
                <td><?php echo $Officename[$Office]."<br>".$Partworkname[$Partwork]."<br>".$Workname[$Work]; ?></td>
                <td><?php echo $Officename[$lineTK]; ?></td>
                <td>

                <?php if ($Userlevel == 1) { ?>
                  <input type="button" value="<?php echo $Userlevelname[$Userlevel]; ?>" class="btn btn-dark btn-lg" readonly >
                <?php } ?>

                <?php if ($Userlevel == 2 || $Userlevel == 3) { ?>
                  <input type="button" value="<?php echo $Userlevelname[$Userlevel]; ?>" class="btn btn-primary btn-lg" readonly >
                <?php } ?>

                <?php if ($Userlevel == 4) { ?>
                  <input type="button" value="<?php echo $Userlevelname[$Userlevel]; ?>" class="btn btn-warning btn-lg" readonly >
                <?php } ?>

                <?php if ($Userlevel == 5) { ?>
                  <input type="button" value="<?php echo $Userlevelname[$Userlevel]; ?>" class="btn btn-success btn-lg" readonly >
                <?php } ?>

                <?php if ($Userlevel == 6) { ?>
                  <input type="button" value="<?php echo $Userlevelname[$Userlevel]; ?>" class="btn btn-danger btn-lg" readonly >
                <?php } ?>

                </td>
                <td><?php echo date("d/m/Y H:i",strtotime("+543year".$Regidate)); ?>
<br><br>

   <center>
<a class="btn btn-warning btn-xs" href="page1-1_view.php?ID=<?php echo $ID; ?>">
<i class="fas fa-eye"> </i> / <i class="fas fa-edit"> </i>               
</a> 
   </center>
              </td>
              </tr>
              <?php 

              $C_row++;

                 } 

                 ?>
              </tbody>
            </table>
            
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
<?php }?>