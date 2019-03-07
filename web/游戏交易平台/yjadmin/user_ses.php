<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("х╗оч╡╩╧╩","default.php");}
$_SESSION["SHOPUSER"]=$_GET[uid];
php_toheader("../user/");
?>