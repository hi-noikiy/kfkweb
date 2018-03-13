<?php
header("Content-type: text/html; charset=utf-8");
$act = $_GET['act'];
if($act == 'restaurantCount'){
    echo '{"status":"ok","data":['.mt_rand(5,95).']}';
}else if($act == 'searchPoi'){
    echo '{"status":"ok","data":[{"name":"\u58f9\u9636\u5c42","address":"\u4e0a\u6d77\u5e02\u6d66\u4e1c\u65b0\u533a\u5f20\u6768\u8def777\u53f7\u4e0a\u6d77\u9526\u6c5f\u6c64\u81e3\u6d32\u9645\u5927\u9152\u5e971\u5c42","x":121.52138,"y":31.22953,"count":675}]}';
}else if($act == 'entries'){
    echo '{"status":"ok","data":[{"zones":[{"needAz":0,"name":"\u5927\u5b66\u6821\u533a","value":2039,"entries":[{"psn":"820af9b3d9eb","name":"\u5b89\u9633\u5e08\u8303\u5b66\u9662","longitude":114.369864,"sn":"12345","latitude":36.057252,"id":43806},{"psn":"f9aa336d9e5e","name":"\u5b89\u9633\u5de5\u5b66\u9662","longitude":114.34891,"sn":"aygxy","latitude":36.064412,"id":43645}]}],"needAz":0,"name":"\u6587\u5cf0\u533a","value":606}]}';
}else if($act == 'getShopsLists'){
    echo "经度：".$_GET['lat']."| 纬度：".$_GET['lng'];
}
?>