<?php 
@session_start();
if (!$_SESSION["UserID"]){
  Header("Location: form_login.php");
}else{ ?>
  <?php

  $menu = "page2";

  date_default_timezone_set("Asia/Bangkok");

  ?>

  <?php include("header.php"); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"> 
      <h1><i class="nav-icon fas fa-solid fa-newspaper"></i> 
      ฟอร์มการปฏิบัติงานนอกสถานที่</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <style>

      textarea {resize: none;}

      input.sizebig{width: 30px;height: 30px;}

    </style>

    <div class="card">
      <div class="card-header card-navy card-outline">

      </div><br>

      <form action="page2-1_submit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
       <table width="auto"  align="center">
        <tr>
          <th colspan="4">

            <button class="form-control btn-light" style="height: 120%;" disabled>
              <label style="font-size: 100%"> วันที่  <?php echo date("d");?></label>
              <label style="font-size: 100%"> เดือน  <?php echo date("m");?></label>
              <label style="font-size: 100%"> พ.ศ. <?php echo date("Y",strtotime("+543year"."NOW"));?></label> 
              <label style="font-size: 100%"> เวลา  <?php echo date("H:i");?> น. </label>
            </button>     
          </th>
        </tr>
        <input type="hidden" name="id_u" value="<?php echo $_SESSION["UserID"];?>" >
        <tr>
          <?php if ($_SESSION['BFL']) { ?>
           <td>
            <input type="text" name="BFL" value="<?php echo $BFLname[$_SESSION['BFL']];?>" class="form-control is-warning" readonly="readonly" >
          </td>
        <?php }else{ ?>
          <td>
            <select name="BFL" id="BFL" class="form-control is-warning" required>
              <option value="0"disabled selected>คำนำหน้า...</option>
              <option value="1">นาย</option>
              <option value="2">นาง</option>
              <option value="3">นางสาว</option>
            </select> 
          </td>
        <?php } ?>
        <td><input type="text" name="Firstname" value="<?php echo $_SESSION['Firstname'];?>" readonly="readonly" class="form-control is-warning" placeholder="ชื่อ" required autocomplete="off"></td>
        <td><input type="text" name="Lastname" value="<?php echo $_SESSION['Lastname'];?>" readonly="readonly" class="form-control is-warning" placeholder="นามสกุล" required autocomplete="off"></td>
        <td> 
          <input type="text"  value="<?php echo $Positionname[$_SESSION['Position']];?>" readonly="readonly" disabled="disabled" class="form-control is-warning" placeholder="ตำแหน่ง" required autocomplete="off"> 

          <input type="hidden" name="casePosition" value="<?php echo $_SESSION['Position'];?>">
        </td>
      </tr>

      <tr>
        <td></td>
        <td>
          <select name="Work" id="Work" class="form-control is-warning" readonly="readonly" disabled="disabled">
            <option value=" " disabled selected >งาน...</option>
            <option value="1">ไม่มีสังกัดงาน</option>
            <option value="4">งานสืบสวนสอบสวน</option>
            <option value="9">งานคดีและอื่นๆ</option>

          </select> 
        </td>

        <td>
          <select name="Partwork" id="Partwork" class="form-control is-warning" readonly="readonly" disabled="disabled">
            <option value=" " disabled selected >ส่วนงาน...</option>
            <option value="23">ส่วนงานคดีแพ่งและปกครอง1</option>
            <option value="24">ส่วนงานคดีแพ่งและปกครอง2</option>
            <option value="25">ส่วนงานคดีอาญา</option>
            <option value="26">ส่วนงานบังคับคดี</option>
            <option value="18"disabled>ส่วนงานพัฒนาเทคโนโลยีดิจิทัล</option>
          </select> 
        </td>
        <td>
          <select name="Office" id="Office" class="form-control is-warning" readonly="readonly" disabled="disabled">
            <option value=" " disabled selected >สำนัก...</option>
            <option value="8">สำนักคดี</option>
            <option value="6"disabled>สำนักเทคโนโลยีดิจิทัล</option>
          </select> 
        </td>
      </tr>
      <tr>
        <td>
          <hr>
        </td>
        <td>
          <hr>
        </td>
        <td>
          <hr>
        </td>
        <td>
          <hr>
        </td>
      </tr>
      <tr>
        <td>
          <center><label>ตั้งแต่ วันที่</label></center>
        </td>
        <td>
          <input type="date" name="sdate" value="" min="<?php echo date('Y-m-d');?>"  class="form-control is-warning" required="required">
        </td>
        <td>
          <center><label>เวลา</label></center>
        </td>
        <td>
          <input type="time" name="stime" value="" min="<?php echo time(); ?>" class="form-control is-warning" required="required"> 
        </td>
      </tr>

      <tr>
        <td>
          <center><label>ถึง วันที่</label></center>
        </td>
        <td>
          <input type="date" name="edate" value="" min="<?php echo date('Y-m-d');?>" class="form-control is-warning" required="required">
        </td>
        <td>
          <center><label>เวลา</label></center>
        </td>
        <td>
          <input type="time" name="etime" value="" min="<?php echo time(); ?>" class="form-control is-warning" required="required">  
        </td>
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <tr>
        <td align="right">
          <input type="radio" id="a1" name="case_area" value="1"  class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
          <label style="font-size: 125%;">กรุงเทพฯและปริมณฑล</label>
        </td>
        <td align="right">
          <input type="radio" id="a2" name="case_area" value="2"  class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
          <label style="font-size: 125%;">ปฏิบัติงานต่างจังหวัด</label>
        </td>
      </tr>
      <tr>
        <td align="right"><label style="font-size: 125%;">ผู้อนุมัติ</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="center" >
        <input type="text" name="case_name_p" value=""  class="form-control is-warning">
        </td>
      <td  align="right"><label style="font-size: 125%;">วันที่อนุมัติ</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
        <input type="date" name="case_date_p" value="" class="form-control is-warning">
      </td>
      
      </tr>
      <tr>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
        <td><hr></td>
      </tr>
      <tr>
       <td colspan="4">
        <h4 align="center">สถานที่ / ลักษณะงานที่ไปปฏิบัติงาน</h4><hr>
      </td>
    </tr>
<!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="caseA" value="ศาลปกครองกลาง/ศาลปกครองสูงสุด" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">ศาลปกครองกลาง /<br>ศาลปกครองสูงสุด</label></td>
      <td colspan="2">
        <select name="caseA1" id="caseA1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
          <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="caseA2" name="caseA2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="caseB" value="ศาลแพ่ง/ศาลอุทธรณ์/ศาลฎีกา" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">ศาลแพ่ง / ศาลอุทธรณ์ /<br>ศาลฎีกา</label></td>
      <td colspan="2">
        <select name="caseB1" id="caseB1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
          <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="caseB2" name="caseB2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="caseC" value="ศาลอาญาคดีทุจริตฯ" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">ศาลอาญาคดีทุจริตฯ</label></td>

      <td colspan="2">
        <select name="caseC1" id="caseC1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
          <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="caseC2" name="caseC2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="case0" value="ศาลจังหวัด/ศาลแขวง" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">ศาลจังหวัด/ศาลแขวง</label></td>
      <td colspan="2">
        <select name="case1" id="case1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ยื่นคำร้อง">ยื่นคำร้อง</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นั่งพิจารณาคดีครั้งแรก">นั่งพิจารณาคดีครั้งแรก</option>
          <option value="ฟังคำพิพากษา">ฟังคำพิพากษา</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="case2" name="case2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <tr>
      <td align="right">
        <input type="checkbox" name="caseD" value="สำนักงานอัยการสูงสุด" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">สำนักงานอัยการสูงสุด</label></td>

      <td colspan="2">
        <select name="caseD1" id="caseD1" class="form-control is-warning"  > 
          <option value="">...</option>
          <option value="ชี้แจงข้อเท็จจริงต่อพนักงานอัยการ">ชี้แจงข้อเท็จจริงต่อพนักงานอัยการ</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="caseD2" name="caseD2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="caseE" value="สำนักงาน ป.ป.ช."   class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">สำนักงาน ป.ป.ช.</label></td>

      <td colspan="2">
        <select name="caseE1" id="caseE1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="caseE2" name="caseE2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="caseF" value="สำนักงาน ป.ป.ท." class="sizebig">&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">สำนักงาน ป.ป.ท.</label></td>

      <td colspan="2">
        <select name="caseF1" id="caseF1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"><textarea id="caseF2" name="caseF2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
    </tr>
    <tr>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
      <td><hr></td>
    </tr>
    <!--***-->
    <tr>
      <td align="right">
        <input type="checkbox" name="caseG" value="สถานีตำรวจ" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td><label style="font-size: 125%;">สถานีตำรวจ</label></td>

      <td colspan="2">
        <select name="caseG1" id="caseG1" class="form-control is-warning" > 
          <option value="">...</option>
          <option value="ให้ถ้อยคำ/ปากคำ">ให้ถ้อยคำ/ปากคำ</option>
          <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
          <option value="นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ">นำพาเจ้าหน้าที่เข้าให้ถ้อยคำ/ปากคำ</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </td>
    </tr>
    <tr>
     <td></td>
     <td></td>
     <td colspan="2"><textarea id="caseG2" name="caseG2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
   </tr>
   <tr>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
  </tr>
  <!--***-->
  <tr>
    <td align="right">
      <input type="checkbox" name="caseH" value="เทศบาลนครนนทบุรี" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td><label style="font-size: 125%;">เทศบาลนครนนทบุรี</label></td>

    <td colspan="2">
      <select name="caseH1" id="caseH1" class="form-control is-warning" > 
        <option value="">...</option>
        <option value="คัดทะเบียนราษฎร">คัดทะเบียนราษฎร</option>
        <option value="คัดใบมรณะบัตร">คัดใบมรณะบัตร</option>
        <option value="อื่นๆ">อื่นๆ</option>
      </select>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td colspan="2"><textarea id="caseH2" name="caseH2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
  </tr>
<!--***-->
  <tr>
    <td align="right">
      <input type="checkbox" name="caseI" value="กรมบังคับคดี" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td><label style="font-size: 125%;">กรมบังคับคดี</label></td>
    <td colspan="2">
      <select name="caseI1" id="caseI1" class="form-control is-warning" >
        <option value="">...</option> 
        <option value="ยื่น/ตรวจคำขอรับชำระหนี้">ยื่น/ตรวจคำขอรับชำระหนี้</option>
        <option value="ประชุมเจ้าหนี้">ประชุมเจ้าหนี้</option>
        <option value="นำส่งเอกสาร">นำส่งเอกสาร</option>
        <option value="รับเงินที่ได้จากการแบ่งทรัพย์สินของลูกหนี้">รับเงินที่ได้จากการแบ่งทรัพย์สินของลูกหนี้</option>
        <option value="ตั้งเรื่องยึด/อายัด">ตั้งเรื่องยึด/อายัด</option>
        <option value="อื่นๆ">อื่นๆ</option>
      </select>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td colspan="2"><textarea id="caseI2" name="caseI2" rows="4"  class="form-control is-warning" placeholder="รายละเอียดเพิ่มเติม"></textarea></td>
  </tr>
  <tr>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
  </tr>
  <!--***-->
  <tr>
    <td align="right">
      <input type="checkbox" name="caseJ" value="อื่นๆ" class="sizebig" >&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td><label style="font-size: 125%;">อื่นๆ</label></td>
    <style>
      textarea {resize: none;}
    </style>
    <td colspan="4">
      <textarea id="caseJ1" name="caseJ1" cols="2" rows="4" placeholder="รายละเอียดเพิ่มเติม" class="form-control is-warning"></textarea>
    </td>
  </tr>
  <tr>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
  </tr>
  <!--***-->
  <tr>
    <td colspan="4">
      <textarea id="pbcase" name="pbcase" cols="2" rows="4" class="form-control is-warning"placeholder="ปัญหา/อุปสรรคของผู้ปฏิบัติงาน"></textarea>
    </td>
  </tr>
  <tr>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
  </tr>
<!--***-->
  <tr hidden>
    <td colspan="4">
     <label style="font-size: 125%;">ผลการปฏิบัติงาน</label>
     <input type="checkbox" name="law_status" value="ดำเนินการแล้วเสร็จ" class="sizebig" class="btn btn-outline-success">
     <label style="font-size: 125%;">ดำเนินการแล้วเสร็จ</label>
   </td>
 </tr>
<!--***-->
<tr>
  <td></td>
  <td><label style="font-size: 125%;">ลงชื่อ<br>เจ้าหน้าที่</label></td>
  <td colspan="2">
    <input type="text" value="" name="caseUlaw" placeholder="ชื่อ-นามสกุล" class="form-control is-warning">
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td>
    <input type="text" value="" name="casePlaw" placeholder="ตำแหน่ง" class="form-control is-warning">
  </td>
</tr>
<tr>
  <td></td>
  <td></td>
  <td>
    <input type="date" value="" name="caseUlawdate" placeholder="วันที่" class="form-control is-warning">
  </td>
  <td>
    <input type="time" value="" name="caseUlawtime" placeholder="เวลา" class="form-control is-warning">
  </td>
</tr>

<tr>
  <tr>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
    <td><hr></td>
  </tr>
  <tr>
    <td></td>
    <td><label style="font-size: 125%;">ลงชื่อ<br>ผู้ปฏิบัติงาน</label></td>
    <td colspan="2">
      <input type="text" value="<?php echo $_SESSION['User'];?>" name="caseUser" placeholder="ชื่อ-นามสกุล" class="form-control is-warning" readonly="readonly">
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <input type="text" value="<?php echo $Positionname[$_SESSION['Position']];?>"  placeholder="ตำแหน่ง" class="form-control is-warning" readonly="readonly">
    </td>
    <td>
      <input type="text" value="<?php echo date("Y/m/d H:i",strtotime("NOW"));?>" name="caseUdate" placeholder="วันที่" class="form-control is-warning" readonly="readonly">
    </td>
  </tr>
 <tr>
    <td colspan="4">
       <label></label>
       <label style="font-size: 100%; color:Gray ;">หมายเหตุ<br>  
       - เจ้าหน้าที่ ได้แก่ บุคคลภายนอกที่ผู้ปฏิบัติงานไปติดต่อราชการ<br>
       หากไม่มีการลงลายมือชื่อของเจ้าหน้าที่ ขอให้เช็คอินสถานที่<br>ที่ไปติดต่อจาก Google Map ของระบบ PWO LAW TRACK<br>
       - ผู้ปฏิบัติงาน ได้แก่ นิติกร ผู้รับผิดชอบ 
     </label>
   </td>
 </tr>
 <tr>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
  <td><hr></td>
</tr>
<tr>
 <td></td>
 <td></td>
 <td>
  <input type="reset" value="ล้างข้อมูล" class="btn btn-warning btn-sm">
  <input type="submit" value="บันทึกข้อมูล" class="btn btn-success btn-lg">
</td>
<td></td>
</tr>

</table>
<script>
  document.getElementById('Office').value   = '<?php echo $_SESSION['Office']; ?>';
  document.getElementById('Partwork').value = '<?php echo $_SESSION['Partwork']; ?>';
  document.getElementById('Work').value     = '<?php echo $_SESSION['Work']; ?>';

</script>
</form><br><br><br>



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