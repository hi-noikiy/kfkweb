<?php
/**
 * TOP SDK 入口文件
 * 请不要修改这个文件，除非你知�ϓ怎样修改以�ǿ��样恢复
 * @author xuteng.xt
 */

/**
 * ��⹉常量开�?
 * 在include("TopSdk.php")��ɉ���⹉这些常量，不要直接修改本文件，以利于升级覆盖
 */
/**
 * SDK工作目录
 * 存放�ߥ�֯，TOP��쭘数据
 */
if (!defined("TOP_SDK_WORK_DIR"))
{
	define("TOP_SDK_WORK_DIR", "/tmp/");
}

/**
 * 是否处于开发模�?
 * 在你���己电脑上开发程序的�߶�額�万不要设为false，以�᫼�存造成你的代码修改了不生效
 * 部署到生产环境正式运营后，如枲׀�能ա�Ɋ�大，可以把此常量设定为false，能提���运行�͟度�������욄代价就是你下次升级程序时要清一下缓��㼶
 */
if (!defined("TOP_SDK_DEV_MODE"))
{
	define("TOP_SDK_DEV_MODE", true);
}

if (!defined("TOP_AUTOLOADER_PATH"))
{
	define("TOP_AUTOLOADER_PATH", dirname(__FILE__));
}

/**
* 注册autoLoader,此注册autoLoader只加载top文件
* 不要删除，除�Ǟ你���己�ɠ载文件�?
**/
require("Autoloader.php");
