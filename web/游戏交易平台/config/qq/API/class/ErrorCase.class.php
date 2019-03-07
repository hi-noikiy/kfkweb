<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

require_once(CLASS_PATH."Recorder.class.php");

/*
 * @brief ErrorCase类，封闭异常
 * */
class ErrorCase{
    private $errorMsg;

    public function __construct(){
        $this->errorMsg = array(
            "20001" => "<h2>�᫽�文件损坏或无法读取，请��新执行intall</h2>",
            "30001" => "<h2>The state does not match. You may be a victim of CSRF.</h2>",
            "50001" => "<h2>可能是服�ɡ器�ߠ法请求https协议</h2>可能���开启curl支持,请尝试开启curl支持，��吱�eb���务器，如果问题仍未解决，请��쳻我们"
            );
    }

    /**
     * showError
     * 显示���ﯯ信息
     * @param int $code    ���ﯯ代码
     * @param string $description 描述信息������͉Ｖ
     */
    public function showError($code, $description = '$'){
        $recorder = new Recorder();
        if(! $recorder->readInc("errorReport")){
            die();//die quietly
        }


        echo "<meta charset=\"UTF-8\">";
        if($description == "$"){
            die($this->errorMsg[$code]);
        }else{
            echo "<h3>error:</h3>$code";
            echo "<h3>msg  :</h3>$description";
            exit(); 
        }
    }
    public function showTips($code, $description = '$'){
    }
}
