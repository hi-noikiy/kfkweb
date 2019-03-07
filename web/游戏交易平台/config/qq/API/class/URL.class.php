<?php
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

require_once(CLASS_PATH."ErrorCase.class.php");

/*
 * @brief url封装类，将常用的url请求�ո��封装在一�?
 * */
class URL{
    private $error;

    public function __construct(){
        $this->error = new ErrorCase();
    }

    /**
     * combineURL
     * 拼接url
     * @param string $baseURL   基于�Єurl
     * @param array  $keysArr   参数列表数组
     * @return string           返回拼接�Єurl
     */
    public function combineURL($baseURL,$keysArr){
        $combined = $baseURL."?";
        $valueArr = array();

        foreach($keysArr as $key => $val){
            $valueArr[] = "$key=$val";
        }

        $keyStr = implode("&",$valueArr);
        $combined .= ($keyStr);
        
        return $combined;
    }

    /**
     * get_contents
     * ���务器�뵱�get请求�Ƿ���内容
     * @param string $url       请求�Єurl,拼接后的
     * @return string           请求返回�Є内�?
     */
    public function get_contents($url){
        if (ini_get("allow_url_fopen") == "1") {
            $response = file_get_contents($url);
        }else{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $url);
            $response =  curl_exec($ch);
            curl_close($ch);
        }

        //-------请求为空
        if(empty($response)){
            $this->error->showError("50001");
        }

        return $response;
    }

    /**
     * get
     * get方��请求资源
     * @param string $url     基于�ЄbaseUrl
     * @param array $keysArr  参数列表数组      
     * @return string         返回�Є资源内�?
     */
    public function get($url, $keysArr){
        $combined = $this->combineURL($url, $keysArr);
        return $this->get_contents($combined);
    }

    /**
     * post
     * post方��请求资源
     * @param string $url       基于�ЄbaseUrl
     * @param array $keysArr    请求�Є参数列�?
     * @param int $flag         �݇�֯�?
     * @return string           返回�Є资源内�?
     */
    public function post($url, $keysArr, $flag = 0){

        $ch = curl_init();
        if(! $flag) curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_POST, TRUE); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $keysArr); 
        curl_setopt($ch, CURLOPT_URL, $url);
        $ret = curl_exec($ch);

        curl_close($ch);
        return $ret;
    }
}
