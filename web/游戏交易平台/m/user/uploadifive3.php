<?php
set_time_limit(0);
include("../../config/conn.php");
include("../../config/function.php");
require("../../config/tpclass.php");
$userid=sqlzhuru($_POST[uid]);
while1("*","yjcode_user where id=".$userid." and pwd='".sqlzhuru($_POST[pwd])."' and (sfzrz=2 or sfzrz=3)");if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}
$mbh=strgb2312($row1[sfz],0,15)."-2";
$targetFolder = "upload/".$userid."/";
$verifyToken = md5('unique_salt' . sqlzhuru($_POST['timestamp']));
if (!empty($_FILES) && sqlzhuru($_POST['token']) == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = "../../".$targetFolder;
	$targetFile = $targetPath.$mbh.".jpg";
	
	$fileTypes = array('jpg','jpeg','gif','png');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
		
		move_uploaded_file($tempFile,$targetFile);
		$cm=new CreatMiniature();
		$bw=800;$bg=0;
		$imgsrc="../../".$targetFolder.$mbh.".jpg";
		
        list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
        $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>