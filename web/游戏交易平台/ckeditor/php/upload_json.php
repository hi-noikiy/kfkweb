<?php

/**
���PHP��ɺ�属于一个服�ɡ器端程序的��ɭ�，不正确�Є使用可能威胁服�ɡ器�Є安全，使用��ɉ�请仔细确认相关安全设置�?
*/

//文件保存目录路��
$save_path = '../../image/image/';
//文件保存目录URL
$save_url = '../image/image/';
//��⹉允许�¦���Є文件扩展名
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'php', 'bmp');
//���大文件大�?
$max_size = 1000000;

//���上传文件时
if (empty($_FILES) === false) {
	//ա�文件名
	$file_name = $_FILES['imgFile']['name'];
	//���务器上临时文件�?
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	//文件大小
	$file_size = $_FILES['imgFile']['size'];
	//检�ҥ文件名
	if (!$file_name) {
		alert("请选择文件�?);
	}
	//检�ҥ目�?
	if (@is_dir($save_path) === false) {
		alert("�¦��目录不存在�?);
	}
	//检�ҥ目录写权限
	if (@is_writable($save_path) === false) {
		alert("�¦��目录没有写权限�?);
	}
	//检�ҥ是否已�¦��
	if (@is_uploaded_file($tmp_name) === false) {
		alert("临时文件可能不是�¦��文件�?);
	}
	//检�ҥ文件大�?
	if ($file_size > $max_size) {
		alert("�¦��文件大小超��限制�?);
	}
	//�Ƿ���文件�ة展�?
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//检�ҥ扩展名
	if (in_array($file_ext, $ext_arr) === false) {
		alert("�¦��文件�ة展名是不允许的�ة展名�?);
	}
	//新文件名
	$new_file_name = date("YmdHms") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//移动文件
	$file_path = $save_path . $new_file_name;
	if (move_uploaded_file($tmp_name, $file_path) === false) {
		alert("�¦��文件失败�?);
	}
	@chmod($file_path, 0644);
	$file_url = $save_url . $new_file_name;
	
	header('Content-type: text/html; charset=UTF-8');
	echo json_encode(array('error' => 0, 'url' => $file_url));
	exit;
}

function alert($msg) {
	header('Content-type: text/html; charset=UTF-8');
	echo json_encode(array('error' => 1, 'message' => $msg));
	exit;
}
?>