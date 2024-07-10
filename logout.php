<?php
@session_start();

unset($_SESSION["UserID"]);
unset($_SESSION["Userlevel"]);    
@session_destroy(); 



@ob_end_clean();
@ob_end_flush();
header("Location: ../lawtrack.pwo.co.th/form_login.php ");  
?>

