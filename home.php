<?php 
@session_start();
if (!$_SESSION["UserID"]){
  Header("Location: form_login.php");
}else{ ?>

  <?php

  $menu = "home";

  ?>

  <?php include("header.php"); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"> 
      <h1><i class="nav-icon fas fa-address-card"></i> Dash Board</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header card-navy card-outline">


        <div align="center"> 
         
        </div>

      </div>
      <br>

      <div class="card-body p-1">
        <div class="row">
          <div class="col-md-1">

          

          </div>
          <div class="col-md-12">
            <!---->



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col col-sm-12">
          <div class="alert alert-success" role="alert">
            <h4 align="center"> Dashboard PWO Law Track</h4><br>
            <center><label style="color: black;" ><h6>สำนักคดี</h6></label></center>
          </div>
        </div>
      </div>
      <?php 
      include"mysql/config.php";  
       /**ส่วนงานคดีแพ่งและปกครอง1**/
      $sql1    = "SELECT COUNT(Partwork) as p23, SUM(case_count) as cc23 FROM user WHERE Partwork = 23;";
      $result1 = $conn->query($sql1);
      $row1    = $result1->fetch_array(MYSQLI_ASSOC);
      $p23     = $row1['p23'];
      $cc23    = $row1['cc23'];

      /**ส่วนงานคดีแพ่งและปกครอง2**/
      $sql2    = "SELECT COUNT(Partwork) as p24, SUM(case_count) as cc24 FROM user WHERE Partwork = 24;";
      $result2 = $conn->query($sql2);
      $row2    = $result2->fetch_array(MYSQLI_ASSOC);
      $p24     = $row2['p24'];
      $cc24    = $row2['cc24'];

      /**ส่วนงานคดีอาญา**/
      $sql3    = "SELECT COUNT(Partwork) as p25, SUM(case_count) as cc25 FROM user WHERE Partwork = 25;";
      $result3 = $conn->query($sql3);
      $row3    = $result3->fetch_array(MYSQLI_ASSOC);
      $p25     = $row3['p25'];
      $cc25    = $row3['cc25'];

      /**ส่วนงานบังคับคดี**/
      $sql4    = "SELECT COUNT(Partwork) as p26, SUM(case_count) as cc26 FROM user WHERE Partwork = 26;";
      $result4 = $conn->query($sql4);
      $row4    = $result4->fetch_array(MYSQLI_ASSOC);
      $p26     = $row4['p26'];
      $cc26    = $row4['cc26'];




      ?>

      
      <div class="row">
        <div class="col-6 col-sm-3">
          <div class="card text-white bg-yellow mb-3" style="max-width: 22rem;">
            <div class="card-header" align="center">
            ส่วนงาน คดีแพ่งและปกครอง1  
          </div> 
          </div>
          <div class="card text-white bg-light mb-3" style="max-width: 22rem;">
            <div class="card-body">
              <center><ion-icon name="people-outline"></ion-icon></center>
             <h5 align="center">พนักงาน <label style="color: black"><?php echo $p23; ?></label> คน <br>จำนวน <label style="color: Crimson;"><?php echo $cc23; ?></label> เคส </h5>
              <p class="card-text">
               
              </p> 
            </div>
          </div>
        </div>

       <div class="col-6 col-sm-3">
          <div class="card text-white bg-orange mb-3" style="max-width: 22rem;">
            <div class="card-header" align="center">
            ส่วนงาน คดีแพ่งและปกครอง2
          </div>
            </div>
          <div class="card text-white bg-light mb-3" style="max-width: 22rem;">
            <div class="card-body">
              <center><ion-icon name="people-outline"></ion-icon></center>
              <h5 align="center">พนักงาน <label style="color: black"><?php echo $p24; ?></label> คน <br>จำนวน <label style="color: Crimson;"><?php echo $cc24; ?></label> เคส </h5>
              <p class="card-text">
               
              </p>
            </div>
          </div>
        </div>

       
       <div class="col-6 col-sm-3">
          <div class="card text-white bg-lime mb-3" style="max-width: 22rem;">
            <div class="card-header" align="center">
            ส่วนงาน คดีอาญา 
          </div>
          </div>
          <div class="card text-white bg-light mb-3" style="max-width: 22rem;">
            <div class="card-body">
              <center><ion-icon name="people-outline"></ion-icon></center>
              <h5 align="center">พนักงาน <label style="color: sky black,0.8"><?php echo $p25; ?></label> คน<br>จำนวน <label style="color: Crimson;"><?php echo $cc25; ?></label> เคส </h5>
              <p class="card-text">
                
              </p>
            </div>
          </div>
        </div>

        <div class="col-6 col-sm-3">
          <div class="card text-dark bg-pink mb-3" style="max-width: 22rem;">
            <div class="card-header" align="center">
            ส่วนงาน บังคับคดี
          </div>
          </div>
          <div class="card text-white bg-light mb-3" style="max-width: 22rem;">
            <div class="card-body">
              <center><ion-icon name="people-outline"></ion-icon></center>
              <h5 align="center">พนักงาน <label style="color: black"><?php echo $p26; ?></label> คน<br>จำนวน <label style="color: Crimson;"><?php echo $cc26; ?></label> เคส </h5>
              <p class="card-text">
              </p>
            </div>
          </div>
        </div>
      </div> <!-- //row -->
 
      
    </div> <!-- //container -->


    
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
  </body>
</html>




<!---->            
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