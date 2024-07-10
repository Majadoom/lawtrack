<?php
@ob_start();
@session_start();
        if(isset($_REQUEST['Username'])){
				
                  include 'mysql/config.php';
				
                  $Username = $_REQUEST['Username'];
                  $Password = $_REQUEST['Password'];

                  $sql = "SELECT * FROM user  WHERE Username ='$Username' AND Password ='$Password' ";

                  $result = mysqli_query($conn,$sql);
				
                  if(mysqli_num_rows($result) == 1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"]     = $row["ID"];                             //ไอดีผู้ใช้ระบบ
                      $_SESSION["BFL"]        = $row["BFL"];                            //คำนำหน้าชื่อ
                      $_SESSION["User"]       = $row["Firstname"]." ".$row["Lastname"]; //ชื่อ-สกุลผู้ใช้ระบบ
                      $_SESSION["Idpass"]     = $row["Idpass"];  
                      $_SESSION["Firstname"]  = $row["Firstname"];
                      $_SESSION["Lastname"]   = $row["Lastname"];

                      $_SESSION["Userlevel"]  = $row["Userlevel"];                      //ระดับผู้ใช้งาน
                      $_SESSION["Position"]   = $row["Position"];                       //ตำแหน่ง
                      $_SESSION["Office"]     = $row["Office"];                         //สำนัก
                      $_SESSION["Partwork"]   = $row["Partwork"];                       //ส่วนงาน
                      $_SESSION["Work"]       = $row["Work"];                           //งาน
                      $_SESSION["lineTK"]     = $row["lineTK"];                         //line Office

                     

                      if ($_SESSION["Userlevel"] == "1" ){   //แอดมิน
                        Header("Location: ../lawtrack.pwo.co.th/home.php");   

                      }
                      if ($_SESSION["Userlevel"] == "2" || $_SESSION["Userlevel"] == "3"){   //ลูกจ้าง 

                        Header("Location: ../lawtrack.pwo.co.th/page2.php");                  

                      }
                      if ($_SESSION["Userlevel"] == "4" ){  /*นิติกร*/

                        Header("Location: ../lawtrack.pwo.co.th/home.php"); 

                      }
                       if ($_SESSION["Userlevel"] == "5" ){  /*หัวหน้าส่วนงาน*/

                        Header("Location: ../lawtrack.pwo.co.th/home.php"); 

                      }
                      if ($_SESSION["Userlevel"] == "6" ){  /*ผู้ใช้งานยังไม่ได้อนุญาต*/

                      echo "<script>";
                      //echo "<h2>";
                        echo "alert(\" กรุณาติดต่อ-ผู้ดูแลระบบเพื่อใช้งาน \");"; 
                        echo "alert(\" สำนักเทคโนโลยีดิจิทัล ส่วนงานพัฒนาเทคโนโลยี #5135 \");"; 
                        echo "window.history.back()";
                      //echo "</h2>";
                      echo "</script>"; 

                      }
                       
                  }else{
                    echo "<script>";
                        echo "alert(\" Username Or Password Wrong  !!!\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                   
                  }
        }else{
             Header("Location: form_login.php"); 
        }
        
      ?>  

