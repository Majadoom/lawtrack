<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-light-navy elevation-4">
 <?php 
 @session_start();
 include 'mysql/config.php';
 ?>
 <!-- Brand Logo -->
 <a href="" class="brand-link bg-navy">
  <img src="assets/dist/img/pwologo.png"
  alt="AdminLTE Logo"
  class="brand-image img-circle elevation-3"
  style="opacity: .7">
  <span class="brand-text font-weight-light">PWO Law-Track</span>
</a>
<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex" align="center">
    <div class="image">
      <img src="assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info" >
      <a href="#"  class="d-block" style="color: navy;"><b><?php echo $_SESSION['Idpass']."<br>".$BFLname[$_SESSION["BFL"]]." ".$_SESSION["User"].
      "<br>".$Positionname[$_SESSION['Position']].
      "<br>".$Partworkname[$_SESSION['Partwork']].
      "<br>".$Officename[$_SESSION['Office']]; ?> <b></a>
      </div>
    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <!-- nav-compact -->
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          

          <?php if ($_SESSION['Userlevel'] == 1) { ?>
            <div>
              
             <li class="nav-header" style="color: navy;">ADMIN</li>
            </div>
            <li class="nav-item" >
              <a href="page1.php" class="nav-link <?php if($menu=="page1"){echo "active";} ?> ">
                <i class="nav-icon fas fa-address-card"></i>
                <p>ผู้ใช้งานระบบ</p>
              </a>
            </li>

         
        
        <div class="user-panel mt-2 pb-3 mb-2 d-flex">



        </div>
 <?php } ?>
 <li class="nav-header">MENU</li>
           <?php if($_SESSION['Userlevel'] == 4 || $_SESSION['Userlevel'] == 5 || $_SESSION['Userlevel'] == 1 ){ ?>

          <li class="nav-item">
            <a href="home.php" class="nav-link <?php if($menu=="home"){echo "active";} ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>Dash Board</p>
            </a>
          </li>

        <?php }?>

          <li class="nav-item">
            <a href="page2.php" class="nav-link <?php if($menu=="page2"){echo "active";} ?> ">
              <i class="nav-icon fas fa-solid fa-newspaper"></i>
              <!--i class="nav-icon fas fa-store-alt"></i-->
              <p>ปฏิบัติงานนอกสถานที่</p>
            </a>
          </li>

          <?php if ($_SESSION['Userlevel'] == 5 || $_SESSION['Userlevel'] == 4 || $_SESSION['Userlevel'] == 1  ) { ?>
           <li class="nav-item">
            <a href="page3.php" class="nav-link <?php if($menu=="page3"){echo "active";} ?> ">
              <i class="nav-icon fas fa-solid fa-chart-pie"></i>
              <p> รายงาน-รายเดือน</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="page4.php" class="nav-link <?php if($menu=="page4"){echo "active";} ?> ">
              <i class="nav-icon fas fa-solid fa-chart-pie"></i>
              <p> รายงาน-รายปี</p>
            </a>
          </li>

        <?php } ?>         



        <div class="user-panel mt-2 pb-3 mb-2 d-flex">



        </div>

        <li class="nav-item">
          <a href="logout.php" class="nav-link text-danger">
            <i class="nav-icon fas fa-power-off"></i>
            <p>ออกจากระบบ</p>
          </a>
        </li>




      </ul>
    </nav>

    <!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->
</aside>