<?
if (@!get_magic_quotes_gpc ()) {
$_GET = sec ( $_GET );
$_POST = sec ( $_POST );
$_COOKIE = sec ( $_COOKIE );
}
$_SERVER = sec ( $_SERVER );
function sec(&$array) {
//��������飬�������飬�ݹ����
if (is_array ( $array )) {
foreach ( $array as $k => $v ) {
$array [$k] = sec ( $v );
}
} else if (is_string ( $array )) {
//ʹ��addslashes����������
$array = addslashes ( $array );
} else if (is_numeric ( $array )) {
$array = intval ( $array );
}
return $array;
}
//���͹��˺���
function num_check($id) {
if (! $id) {
die ( '��������Ϊ�գ�' );
} //�Ƿ�Ϊ�յ��ж�
else if (inject_check ( $id )) {
die ( '�Ƿ�����' );
} //ע���ж�
else if (! is_numetic ( $id )) {
die ( '�Ƿ�����' );
}
//�����ж�
$id = intval ( $id );
//���ͻ�
return $id;
}
//�ַ����˺���
function str_check($str) {
if (inject_check ( $str )) {
die ( '�Ƿ�����' );
}
//ע���ж�
$str = htmlspecialchars ( $str );
//ת��html
return $str;
}
function search_check($str) {
$str = str_replace ( "_", "\_", $str );
//��"_"���˵�
$str = str_replace ( "%", "\%", $str );
//��"%"���˵�
$str = htmlspecialchars ( $str );
//ת��html
return $str;
}
//�����˺���
function post_check($str, $min, $max) {
if (isset ( $min ) && strlen ( $str ) < $min) {
die ( '����$min�ֽ�' );
} else if (isset ( $max ) && strlen ( $str ) > $max) {
die ( '���$max�ֽ�' );
}
return stripslashes_array ( $str );
}
//��ע�뺯��
function inject_check($sql_str) {
return eregi ( 'select|inert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|UNION|into|load_file|outfile', $sql_str );
// ���й��ˣ���ע��
}
function stripslashes_array(&$array) {
if (is_array ( $array )) {
foreach ( $array as $k => $v ) {
$array [$k] = stripslashes_array ( $v );
}
} else if (is_string ( $array )) {
$array = stripslashes ( $array );
}
return $array;
}
?>