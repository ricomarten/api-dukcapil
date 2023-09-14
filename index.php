<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION['username'])){
  include "views/statis/head.php";
  echo '<body class="hold-transition sidebar-mini layout-fixed">';
  echo '<div class="wrapper">';

  include "views/statis/navbar.php";
  include "views/statis/sidebar.php";

  echo '<div class="content-wrapper">';
  if(!isset($_GET['menu'])){
    //include "backend/createRekap.php";
    //include "backend/createRekapSP.php";
    include "views/home.php";
  }else if($_GET['menu']=="cekapi"){
    include "views/cekapi.php";
  }else if($_GET['menu']=="testapi"){
    include "views/testapi.php";
  }else if($_GET['menu']=="list"){
    include "views/list.php";
  }else if($_GET['menu']=="user"){
    include "views/user.php";
  }

  echo "</div>";
  include "views/statis/footer.php";
  echo '<aside class="control-sidebar control-sidebar-dark"></aside>';
  echo "</div>";
  include "views/statis/js.php";

}else{  
  header("location: login.php"); 
}

