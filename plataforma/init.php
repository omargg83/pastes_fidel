<?php
$server=3;
$_SESSION['des']=0;
if($server==2){
  //////////localhost
  define("MYSQLUSER", "root");
  define("MYSQLPASS", "root");
  define("SERVIDOR", "localhost");
  define("BDD", "sagycrmr_pastes_fidel");
  define("PORT", "3306");
  define("SERVER", "LOCALHOST");
  $_SESSION['des']=1;
}
else if($server==3){
  //////////localhost
  define("MYSQLUSER", "sagyccom_esponda");
  define("MYSQLPASS", "esponda123$");
  define("SERVIDOR", "sagyc.com.mx");
  define("BDD", "sagycrmr_pastes_fidel");
  define("PORT", "3306");
  define("SERVER", "NUBE");
  $_SESSION['des']=0;
}
?>
