<?php

if (!isset($_GET['act'])) {
    exit;
}
$act = htmlspecialchars($_GET['act']) ? htmlspecialchars($_GET['act']) : htmlspecialchars($_POST['act']);
if ($act == 'addCard') {
    echo 1;
} else if ($act == 'position') {
    echo '[{"uniid":10170,"uniname":"河南中医学院第一临床学院","distance":"2.1","supnum":' . rand(1, 100) . '},{"uniid":10871,"uniname":"财富广场","distance":"2.1","supnum":' . rand(1, 100) . '}]';
} else if ($act == 'getShopInfo') {
    $arr = array(
        "BusinessState"=>4,
        "RecommendValue"=>"0.0",
        "SupplierID"=>120307804,
        "SendFoodPrice"=>"8元起送！",
        "SupplierRemark"=>"",
        "SupplierName"=>"闫记鸡丁烩面",
        "Location"=>"郑州东风路轻工业学院对面姜砦往北100米学友美食城",
        "sendPrice"=>"8.0",
        "SupplierIntro"=>"",
        "PrimaryBusiness"=>"中式",
        "OrderCommentNum"=>"0",
        "BusinessMode"=>"1",
        "SendFoodRate"=>"0",
        "SupplierBusinessTime"=>"10:00至22:00",
        "DeliveryFeeType"=>"0",
        "DeliveryFee"=>"",
        "FreeDeliveryFeePrice"=>"",
        "MessageNum"=>"0",
        "SupDynamicActivityList"=>null
        );
    echo json_encode($arr);
}
?>

