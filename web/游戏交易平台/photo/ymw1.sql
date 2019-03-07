/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : ymw1
Target Host     : localhost:3306
Target Database : ymw1
Date: 2017-05-14 14:15:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for yjcode_ad
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_ad`;
CREATE TABLE `yjcode_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `type1` char(30) DEFAULT NULL,
  `jpggif` char(20) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `adbh` char(30) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `aurl` text,
  `sm` varchar(250) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `aw` int(11) DEFAULT NULL,
  `ah` int(11) DEFAULT NULL,
  `dqsj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_ad
-- ----------------------------
INSERT INTO `yjcode_ad` VALUES ('8', '1414141966ad63', '�ƾ片', 'jpg', '�벑�中弨叴���广告', 'ADU01', '', '2014-10-24 17:12:46', 'www.719xi.com', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('9', '1414141969ad100', '�ƾ片', 'jpg', '�벑�中弨叴���广告', 'ADU01', '', '2014-10-24 17:12:49', 'www.719xi.com', null, '2', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('10', '1414141971ad11', '�ƾ片', 'jpg', '�벑�中弨叴���广告', 'ADU01', '', '2014-10-24 17:12:51', 'www.719xi.com', null, '3', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('12', '1415976888ad14', '�ƾ片', 'jpg', '商品列表左上广告', 'ADP02', '', '2014-11-14 22:54:48', 'http://shopt5.yj99.cn/help/view8.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('14', '1416020955ad88', '�ƾ片', 'png', '登录框左侧广��?, 'ADO01', '', '2014-11-15 11:09:15', 'http://shopt5.yj99.cn/help/view8.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('15', '1416024835ad70', '�ƾ片', 'jpg', '商家列表页左上广��?, 'ADS01', '', '2014-11-15 12:13:55', 'http://www.719xi.com/news/', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('17', '1416115010ad94', '�ƾ片', 'jpg', '双十一来��', 'ADI04', '', '2014-11-16 13:16:50', 'http://shopt5.yj99.cn/help/view8.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('18', '1416115023ad76', '�ƾ片', 'jpg', '华为', 'ADI04', '', '2014-11-16 13:17:03', 'http://shopt5.yj99.cn/help/view8.html', null, '2', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('19', '1416208251ad54', '文字', 'jpg', '�벑�也可以再�벑�中弨抿���发布文章，增�ɠ订单哦', 'ADN01', '', '2014-11-17 15:10:51', 'http://www.719xi.com/news/', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('20', '1416210641ad45', '�ƾ片', 'jpg', '资讯正文页右侧广��?, 'ADNV01', '', '2014-11-17 15:50:41', 'http://www.719xi.com/product/search.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('21', '1416210731ad4', '�ƾ片', 'jpg', '资讯详情页最新发布上方横�?, 'ADNV02', '', '2014-11-17 15:52:11', 'http://www.719xi.com/product/search.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('22', '1416211155ad4', '文字', '', '咨讯/知识', 'ADI02', '', '2014-11-17 15:59:15', '/news/', null, '3', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('23', '1416211172ad39', '文字', '', '商家风采', 'ADI02', '', '2014-11-17 15:59:32', '/shop/', null, '4', '0', '0', '2049-12-12 12:12:12', '1', null, null);
INSERT INTO `yjcode_ad` VALUES ('24', '1416212227ad5', '�ƾ片', 'jpg', '资讯列表页右侧广��?, 'ADNV04', '', '2014-11-17 16:17:07', 'http://www.719xi.com/product/search.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('25', '1416230127ad47', '�ƾ片', 'jpg', 'Pinterest: 下一代社交巨�?, 'ADN00', '', '2014-11-17 21:15:27', 'http://www.719xi.com/product/search_j1v.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('26', '1416230204ad53', '�ƾ片', 'jpg', '饿��么VS美团外��：来���一个大学生�Є���碰硬�؝报��?, 'ADN00', '', '2014-11-17 21:16:44', 'http://www.719xi.com/product/search_j1v.html', null, '2', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('27', '1416235302ad45', '�ƾ片', 'jpg', '资讯首页切换下方横幅', 'ADN02', '', '2014-11-17 22:41:42', 'http://www.719xi.com/product/search.html', null, '1', '0', '0', '2049-12-12 12:12:12', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('32', '1492319297ad61', '�ƾ片', 'png', '�߶光', 'shang_01', '', '2017-04-16 13:08:17', 'www.719xi.com', null, '1', '0', '0', '2017-11-16 13:08:42', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('35', '1492523099ad99', '�ƾ片', 'png', '111', 'shang_01', '', '2017-04-18 21:44:59', 'http://www.719xi.com/product/search_j1v.html', null, '3', '0', '0', '2038-04-18 21:45:30', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('36', '1492595244ad99', '�ƾ片', 'gif', 'ces', 'shang_02', '', '2017-04-19 17:47:24', 'http://www.719xi.com/reg/', null, '1', '0', '0', '2039-04-19 17:47:53', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('38', '1492694151ad19', '�ƾ片', 'jpg', '���动发货', 'shang_01', '', '2017-04-20 21:15:51', 'http://www.719xi.com/news/', null, '4', '0', '0', '2047-04-20 21:16:50', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('39', '1492694228ad80', '�ƾ片', 'jpg', '�߶时�͚知', 'shang_01', '', '2017-04-20 21:17:08', 'http://www.719xi.com/help/ggview5.html', null, '5', '0', '0', '2050-04-20 21:17:18', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('40', '1492750523ad24', '�ƾ片', 'jpg', '2', 'shang_02', '', '2017-04-21 12:55:23', 'http://www.719xi.com/help/ggview4.html', null, '2', '0', '0', '2063-04-21 12:55:45', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('42', '1492750894ad94', '�ƾ片', 'jpg', '3', 'shang_02', '', '2017-04-21 13:01:34', 'http://www.719xi.com/help/ggview4.html', null, '3', '0', '0', '2041-04-21 13:01:47', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('44', '1492759620ad5', '�ƾ片', 'jpg', '1', 'ADI05', '', '2017-04-21 15:27:00', 'http://www.719xi.com/help/view9.html', null, '1', '0', '0', '2051-04-21 15:27:26', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('45', '1492762340ad81', '�ƾ片', 'gif', '1', 'shang_03', '', '2017-04-21 16:12:20', 'http://www.719xi.com/shop/', null, '1', '0', '0', '2064-04-21 16:12:36', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('46', '1492786964ad3', '�ƾ片', 'gif', '', 'ADTASK01', '', '2017-04-21 23:02:44', '/task/taskadd.php', null, '1', '0', '0', '2048-04-21 23:03:38', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('47', '1492787179ad59', '�ƾ片', 'png', '', 'ADSHOP01', '', '2017-04-21 23:06:19', 'http://www.719xi.com/news/', null, '1', '0', '0', '2048-04-21 23:06:41', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('49', '1492788260ad55', '�ƾ片', 'jpg', '1', 'ADP01', '', '2017-04-21 23:24:20', 'http://www.719xi.com/product/search_j1v.html', null, '1', '0', '0', '2049-04-21 23:24:46', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('51', '1493465244ad46', '�ƾ片', 'jpg', '�߶光', 'ADI00', '', '2017-04-29 19:27:24', '/help/view6.html', null, '1', '0', '0', '2032-04-29 19:27:48', '1', null, null);
INSERT INTO `yjcode_ad` VALUES ('54', '1493972881ad71', '文字', '', '�؋机�?, 'ADI02', '', '2017-05-05 16:28:01', '/mt/', null, '5', '0', '0', '2048-05-05 16:28:11', '1', null, null);
INSERT INTO `yjcode_ad` VALUES ('55', '1494210839ad1', '文字', '', '需�?接单', 'ADI02', '', '2017-05-08 10:33:59', '/task', null, '6', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('56', '1494212731ad78', '�ƾ片', 'jpg', '', 'mi_02', '', '2017-05-08 11:05:31', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('57', '1494212743ad40', '�ƾ片', 'jpg', '', 'mi_02', '', '2017-05-08 11:05:43', '', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('58', '1494212783ad54', '�ƾ片', 'jpg', '', 'mi_01', '', '2017-05-08 11:06:23', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('59', '1494212814ad54', '�ƾ片', 'jpg', '', 'mi_03', '', '2017-05-08 11:06:54', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('60', '1494212892ad77', '�ƾ片', 'jpg', '', 'mi_04', '', '2017-05-08 11:08:12', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('61', '1494212904ad44', '�ƾ片', 'jpg', '', 'mi_04', '', '2017-05-08 11:08:24', '', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('62', '1494212929ad65', '�ƾ片', 'jpg', '', 'mi_04', '', '2017-05-08 11:08:49', '', null, '3', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('63', '1494212957ad46', '�ƾ片', 'jpg', '', 'mi_05', '', '2017-05-08 11:09:17', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('64', '1494212990ad76', '�ƾ片', 'jpg', '', 'mi_06', '', '2017-05-08 11:09:50', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('65', '1494213001ad89', '�ƾ片', 'jpg', '', 'mi_06', '', '2017-05-08 11:10:01', '', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('67', '1494313852ad49', '�ƾ片', 'jpg', 'M1', 'jiandan_01', '', '2017-05-09 15:10:52', '', null, '1', '0', '0', '2018-08-09 15:11:02', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('68', '1494314586ad71', '�ƾ片', 'jpg', 'B2', 'jiandan_01', '', '2018-05-09 15:23:06', '', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('72', '1494562166ad64', '�ƾ片', 'jpg', 'VIP�벑�', 'jiandan_01', '', '2017-05-12 12:09:26', '', null, '3', '0', '0', '2018-05-31 12:09:19', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('73', '1494659637ad74', '�ƾ片', 'jpg', '', 'ke_qh', '', '2017-05-13 15:13:57', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('74', '1494659653ad16', '�ƾ片', 'jpg', '', 'ke_qh', '', '2017-05-13 15:14:13', '', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('75', '1494659670ad46', '�ƾ片', 'jpg', '', 'ke_qh', '', '2017-05-13 15:14:30', '', null, '3', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('76', '1494659906ad8', '�ƾ片', 'jpg', '', 'ke_06', '', '2017-05-13 15:18:26', '', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('77', '1494659934ad9', '�ƾ片', 'jpg', '', 'ke_06', '', '2017-05-13 15:18:54', '', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('78', '1494659946ad53', '�ƾ片', 'jpg', '', 'ke_06', '', '2017-05-13 15:19:06', '', null, '3', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('79', '1494660020ad94', '�ƾ片', 'jpg', '', 'ke_03', '', '2017-05-13 15:20:20', 'http://www.xqwzjs.cn/', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('80', '1494660204ad39', '�ƾ片', 'jpg', '', 'ke_01', '', '2017-05-13 15:23:24', 'http://www.xqwzjs.cn/', null, '1', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('82', '1494660389ad65', '�ƾ片', 'jpg', '', 'ke_01', '', '2017-05-13 15:26:29', 'http://www.xqwzjs.cn/', null, '2', '0', '0', '2049-09-09 09:09:09', '0', null, null);
INSERT INTO `yjcode_ad` VALUES ('83', '1494660608ad16', '�ƾ片', 'jpg', '', 'ke_01', '', '2017-05-13 15:30:08', 'http://www.xqwzjs.cn/', null, '3', '0', '0', '2049-09-09 09:09:09', '0', null, null);

-- ----------------------------
-- Table structure for yjcode_adlx
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_adlx`;
CREATE TABLE `yjcode_adlx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `adbh` char(50) DEFAULT NULL,
  `maxnum` int(10) DEFAULT NULL,
  `adw` int(10) DEFAULT NULL,
  `adh` int(10) DEFAULT NULL,
  `adty` char(50) DEFAULT NULL,
  `fflx` int(10) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `tianshu` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_adlx
-- ----------------------------
INSERT INTO `yjcode_adlx` VALUES ('1', '1492489678a20', null, null, '0', '0', '0', null, '1', '1', null, null, null, '2017-04-18 12:27:58', '99');
INSERT INTO `yjcode_adlx` VALUES ('2', '1492752469a96', null, null, '0', '0', '0', null, '1', '1', null, null, null, '2017-04-21 13:27:49', '99');
INSERT INTO `yjcode_adlx` VALUES ('3', '1494214674a24', null, null, '0', '0', '0', null, '1', '1', null, null, null, '2017-05-08 11:37:54', '99');
INSERT INTO `yjcode_adlx` VALUES ('4', '1494329001a5', null, null, '0', '0', '0', null, '1', '1', null, null, null, '2017-05-09 19:23:21', '99');

-- ----------------------------
-- Table structure for yjcode_admin
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_admin`;
CREATE TABLE `yjcode_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminuid` char(50) DEFAULT NULL,
  `adminpwd` char(50) DEFAULT NULL,
  `uname` char(50) DEFAULT NULL,
  `qx` varchar(250) DEFAULT NULL,
  `proid` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_admin
-- ----------------------------
INSERT INTO `yjcode_admin` VALUES ('4', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '管理��?, ',0,', null);

-- ----------------------------
-- Table structure for yjcode_baomoneyrecord
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_baomoneyrecord`;
CREATE TABLE `yjcode_baomoneyrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `moneynum` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_baomoneyrecord
-- ----------------------------
INSERT INTO `yjcode_baomoneyrecord` VALUES ('1', '1493109283', '1', '缴纳保证�?, '1000', '2017-04-25 16:34:43', '119.0.167.80');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('2', '1493440058', '1', '缴纳保证�?, '5000', '2017-04-29 12:27:38', '61.159.165.77');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('3', '1493440076', '5', '缴纳保证�?, '2000', '2017-04-29 12:27:56', '61.159.165.77');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('4', '1493440097', '7', '缴纳保证�?, '3000', '2017-04-29 12:28:17', '61.159.165.77');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('5', '1493440113', '8', '缴纳保证�?, '2000', '2017-04-29 12:28:33', '61.159.165.77');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('6', '1494316039', '1', '缴纳保证�?, '4000', '2017-05-09 15:47:19', '123.119.239.179');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('7', '1494411511', '25', '缴纳保证�?, '3000000', '2017-05-10 18:18:31', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('8', '1494411935', '25', '解冻保证�?, '-50000', '2017-05-10 18:25:35', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('9', '1494411986', '25', '解冻保证�?, '-2500000', '2017-05-10 18:26:26', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('10', '1494412028', '25', '缴纳保证�?, '50000', '2017-05-10 18:27:08', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('11', '1494426828', '25', '缴纳保证�?, '500000', '2017-05-10 22:33:48', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('12', '1494426893', '25', '解冻保证�?, '-800000', '2017-05-10 22:34:53', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('13', '1494607261', '27', '缴纳保证�?, '50000', '2017-05-13 00:41:01', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('14', '1494607358', '8', '缴纳保证�?, '8000', '2017-05-13 00:42:38', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('15', '1494607435', '7', '缴纳保证�?, '47000', '2017-05-13 00:43:55', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('16', '1494607531', '5', '缴纳保证�?, '48000', '2017-05-13 00:45:31', '27.187.255.1');
INSERT INTO `yjcode_baomoneyrecord` VALUES ('17', '1494607573', '1', '缴纳保证�?, '40000', '2017-05-13 00:46:13', '27.187.255.1');

-- ----------------------------
-- Table structure for yjcode_car
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_car`;
CREATE TABLE `yjcode_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `tcid` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_car
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_city
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_city`;
CREATE TABLE `yjcode_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(40) DEFAULT NULL,
  `name1` char(40) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `parentid` char(30) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3629 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_city
-- ----------------------------
INSERT INTO `yjcode_city` VALUES ('1', '111', '北京', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('2', '112', '天津', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('3', '113', '河北', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('4', '114', '山西', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('5', '115', '内蒙�?, '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('6', '121', '辽宁', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('7', '122', '吉���', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('8', '123', '黑龙�?, '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('9', '131', '上海', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('10', '132', '江苏', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('11', '133', '浙江', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('12', '134', '安徽', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('13', '135', '福建', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('14', '136', '江西', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('15', '137', '山东', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('16', '141', '河南', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('17', '142', '湖北', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('18', '143', '湖南', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('19', '144', '广东', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('20', '145', '广西', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('21', '146', '海南', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('22', '150', '重��', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('23', '151', '�ƛ川', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('24', '152', '贵州', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('25', '153', '云南', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('26', '154', '西藏', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('27', '161', '陕西', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('28', '162', '甘���', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('29', '163', '�ǒ海', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('30', '164', '宁夏', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('31', '165', '新疆', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('32', '171', '台湾', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('33', '172', '香港', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('34', '173', '澳门', '1', '0', '0');
INSERT INTO `yjcode_city` VALUES ('35', '1', '北京�?, '2', '111', '0');
INSERT INTO `yjcode_city` VALUES ('36', '14', '天津�?, '2', '112', '0');
INSERT INTO `yjcode_city` VALUES ('37', '601', '石家庄徺', '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('38', '605', '唐山�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('39', '604', '秦皇岛徺', '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('40', '607', '�̯郸�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('41', '606', '�̢台�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('42', '608', '保定�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('43', '602', '张家口徺', '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('44', '603', '�ؿ德�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('45', '609', '沧州�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('46', '610', '廊����?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('47', '11311', '衡水�?, '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('48', '9906', '其他城徺', '2', '113', '0');
INSERT INTO `yjcode_city` VALUES ('49', '1201', '太�ʦ�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('50', '1202', '大同�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('51', '1204', '�ֳ泉�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('52', '1206', '长治�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('53', '1205', '��ɟ��?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('54', '1207', '晋中�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('55', '1210', '运城�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('56', '1224', '忻州�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('57', '1211', '临汾�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('58', '11410', '吕梁�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('59', '1203', '���州�?, '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('60', '9912', '其他城徺', '2', '114', '0');
INSERT INTO `yjcode_city` VALUES ('61', '1001', '�ͼ和浩特�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('62', '1003', '包头�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('63', '1004', '赤峰�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('64', '1005', '��뵾��?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('65', '11505', '鄂尔多斯�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('66', '11506', '�ͼ伦贝尔�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('67', '11507', '巴彦淖尔�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('68', '11508', '乌兰察布�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('69', '11509', '兴安�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('70', '11510', '�ӡ���郭勒�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('71', '11511', '�ֿ拉善盟', '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('72', '1002', '乌海�?, '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('73', '9910', '其他城徺', '2', '115', '0');
INSERT INTO `yjcode_city` VALUES ('74', '12', '沈阳�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('75', '906', '大连�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('76', '907', '鞍山�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('77', '905', '抚顺�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('78', '915', '���溪�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('79', '908', '丹东�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('80', '910', '�Ӧ州�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('81', '909', '营口�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('82', '911', '辽阳�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('83', '914', '盘锦�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('84', '904', '�Ё岭�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('85', '902', '���阳�?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('86', '912', '葫��岛徺', '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('87', '903', '�ֲז��?, '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('88', '9909', '其他城徺', '2', '121', '0');
INSERT INTO `yjcode_city` VALUES ('89', '801', '长春�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('90', '804', '吉����?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('91', '805', '�ƛ平�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('92', '12204', '辽源�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('93', '807', '��벌��?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('94', '12206', '白山�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('95', '803', '松�ʦ�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('96', '802', '白城�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('97', '12209', '延边�?, '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('98', '9908', '其他城徺', '2', '122', '0');
INSERT INTO `yjcode_city` VALUES ('99', '701', '�����滨徺', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('100', '702', '齐��������?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('101', '708', '鸡西�?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('102', '709', '鹤岗�?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('103', '12305', '双鸭山徺', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('104', '704', '大���?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('105', '705', '伊春�?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('106', '706', '佳木斯徺', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('107', '12309', '七台河徺', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('108', '707', '牡丹江徺', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('109', '703', '黑河�?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('110', '12312', '绥化�?, '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('111', '12313', '大兴安岭地区', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('112', '9907', '其他城徺', '2', '123', '0');
INSERT INTO `yjcode_city` VALUES ('113', '3', '上海�?, '2', '131', '0');
INSERT INTO `yjcode_city` VALUES ('114', '1601', '南京�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('115', '1607', '�ߠ���?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('116', '1603', '徐州�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('117', '1608', '常州�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('118', '1602', '苏州�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('119', '1620', '南�벾�', '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('120', '1604', '连云港徺', '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('121', '1606', '淮安�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('122', '13209', '盐城�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('123', '1610', '�ج州�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('124', '1609', '镇江�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('125', '1612', '泰州�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('126', '1605', '宿迁�?, '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('127', '9916', '其他城徺', '2', '132', '0');
INSERT INTO `yjcode_city` VALUES ('128', '1901', '杭州�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('129', '1905', '宁波�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('130', '1906', '温州�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('131', '1903', '嘉兴�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('132', '1902', '湖州�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('133', '1914', '绍兴�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('134', '1910', '金华�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('135', '1908', '衢州�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('136', '1904', '舟山�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('137', '1939', '台州�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('138', '1943', '丽水�?, '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('139', '9919', '其他城徺', '2', '133', '0');
INSERT INTO `yjcode_city` VALUES ('140', '1501', '合�ΰ�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('141', '1508', '芲׹��?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('142', '1506', '蚌埠�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('143', '1503', '淮南�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('144', '1510', '马鞍山徺', '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('145', '1502', '淮北�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('146', '1514', '�М����?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('147', '1516', '安���?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('148', '1507', '黄山�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('149', '1505', '滁州�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('150', '1513', '�֜阳�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('151', '1509', '宿州�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('152', '1511', '巢湖�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('153', '1521', '六安�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('154', '1504', '亳州�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('155', '1519', '池州�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('156', '1515', '宣城�?, '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('157', '9915', '其他城徺', '2', '134', '0');
INSERT INTO `yjcode_city` VALUES ('158', '2101', '福州�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('159', '2105', 'ա�门�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('160', '2103', '�ǆ田�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('161', '2102', '三明�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('162', '2104', '泉州�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('163', '2106', '漳州�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('164', '2107', '南平�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('165', '2113', '�顲��?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('166', '2109', '宁德�?, '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('167', '9921', '其他城徺', '2', '135', '0');
INSERT INTO `yjcode_city` VALUES ('168', '2001', '南�ǹ�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('169', '2003', '景德镇徺', '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('170', '2006', '�ո���?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('171', '2002', '九江�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('172', '2005', '新余�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('173', '2004', '鹰潭�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('174', '2008', '赣州�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('175', '2007', '吉安�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('176', '2012', '宲ט��?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('177', '2009', '�벷��?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('178', '2011', '上饶�?, '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('179', '9920', '其他城徺', '2', '136', '0');
INSERT INTO `yjcode_city` VALUES ('180', '1101', '济南�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('181', '1106', '�ǒ岛�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('182', '1104', '淄博�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('183', '13704', '枣����?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('184', '1105', '东营�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('185', '1110', '烟台�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('186', '1103', '潍����?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('187', '1113', '威海�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('188', '13710', '济宁�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('189', '13711', '泰安�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('190', '1108', '�ߥ照�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('191', '1112', '�Ǳ芜�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('192', '1107', '临沂�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('193', '1102', '德州�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('194', '1115', '聊城�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('195', '1109', '滨州�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('196', '13718', '��泽�?, '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('197', '9911', '其他城徺', '2', '137', '0');
INSERT INTO `yjcode_city` VALUES ('198', '14118', '济源�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('199', '1401', '郑州�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('200', '1408', '开封徺', '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('201', '1403', '洛阳�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('202', '1413', '平顶山徺', '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('203', '1404', '辶作�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('204', '1411', '鹤壁�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('205', '1405', '新乡�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('206', '1406', '安阳�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('207', '1414', '濮阳�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('208', '1409', '许�ǹ�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('209', '1407', '漯河�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('210', '1402', '三门峡徺', '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('211', '1415', '南阳�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('212', '1412', '商丘�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('213', '1410', '信阳�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('214', '14116', '�ͨ口�?, '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('215', '1416', '驻马店徺', '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('216', '9914', '其他城徺', '2', '141', '0');
INSERT INTO `yjcode_city` VALUES ('217', '16', '武汉�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('218', '1708', '黄石�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('219', '1706', '襄樊�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('220', '1702', '十堰�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('221', '1714', '��州�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('222', '1709', '宲�ǹ�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('223', '1704', '��门�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('224', '1710', '鄂州�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('225', '1705', '孝感�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('226', '1712', '黄����?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('227', '1713', '咸宁�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('228', '14212', '随州�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('229', '14213', '恩施�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('230', '1707', '仙桃�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('231', '14215', '潲ױ��?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('232', '14216', '天门�?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('233', '14217', '神农架����?, '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('234', '9917', '其他城徺', '2', '142', '0');
INSERT INTO `yjcode_city` VALUES ('235', '1801', '长沙�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('236', '1811', '�ݪ洲�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('237', '1803', '湘潭�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('238', '1808', '衡阳�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('239', '1810', '�̵阳�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('240', '1807', '岳阳�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('241', '1805', '常德�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('242', '1802', '张家界徺', '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('243', '1806', '益阳�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('244', '1809', '郴州�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('245', '14311', '永州�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('246', '1804', '��化徺', '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('247', '1812', '娄底�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('248', '14314', '湘西�?, '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('249', '9918', '其他城徺', '2', '143', '0');
INSERT INTO `yjcode_city` VALUES ('250', '5', '广州�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('251', '7', '深圳�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('252', '504', '珠海�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('253', '507', '汕头�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('254', '533', '���关�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('255', '521', '佛山�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('256', '509', '江门�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('257', '516', '湛江�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('258', '511', '���名�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('259', '534', '�����?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('260', '508', '惠州�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('261', '545', '梅州�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('262', '529', '汕尾�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('263', '544', '河源�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('264', '531', '�ֳ江�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('265', '512', '清远�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('266', '510', '东莞�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('267', '515', '中山�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('268', '506', '潮州�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('269', '540', '揭阳�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('270', '546', '云浮�?, '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('271', '9905', '其他城徺', '2', '144', '0');
INSERT INTO `yjcode_city` VALUES ('272', '2201', '南宁�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('273', '2203', '�ҳ州�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('274', '2202', '桂����?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('275', '2204', '梧州�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('276', '2206', '北海�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('277', '14506', '�ֲ城港徺', '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('278', '2205', '�Ԧ州�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('279', '14508', '贵港�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('280', '2207', '玉����?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('281', '14510', '百色�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('282', '14511', '贺州�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('283', '14512', '河����?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('284', '14513', '来宾�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('285', '14514', '崇左�?, '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('286', '9922', '其他城徺', '2', '145', '0');
INSERT INTO `yjcode_city` VALUES ('287', '2301', '海口�?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('288', '2302', '三亚�?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('289', '2303', '文�ǹ�?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('290', '2304', '琼海�?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('291', '2305', '万宁�?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('292', '14606', '五指山徺', '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('293', '14607', '串ז��?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('294', '14608', '��ɷ��?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('295', '14609', '临���ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('296', '14610', '澄迈ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('297', '14611', '�벮�ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('298', '14612', '屯�ǹա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('299', '14613', '昌江ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('300', '14614', '白沙ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('301', '14615', '琼中ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('302', '14616', '陵水ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('303', '14617', '保亭ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('304', '14618', '乐东ա?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('305', '14619', '西南中沙群岛�ɞ事处�ֽա�级�?, '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('306', '9923', '其他城徺', '2', '146', '0');
INSERT INTO `yjcode_city` VALUES ('307', '401', '重���?, '2', '150', '0');
INSERT INTO `yjcode_city` VALUES ('308', '3001', '成都�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('309', '3010', '���贡�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('310', '15103', '攀枝花�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('311', '3009', '泸州�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('312', '3005', '德阳�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('313', '3007', '绵阳�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('314', '3013', '广元�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('315', '15108', '�ς宁�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('316', '15109', '内江�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('317', '3012', '乐山�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('318', '3008', '南充�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('319', '15112', '宜宾�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('320', '15113', '广安�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('321', '15114', '达州�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('322', '15115', '眉山�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('323', '15116', '��安�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('324', '15117', '巴中�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('325', '15118', '资阳�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('326', '15119', '�ֿ坝�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('327', '15120', '��뭜�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('328', '15121', '凉山�?, '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('329', '9930', '其他城徺', '2', '151', '0');
INSERT INTO `yjcode_city` VALUES ('330', '2501', '贵阳�?, '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('331', '2502', '六盘水徺', '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('332', '2503', '�ϵ义�?, '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('333', '2504', '安顺�?, '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('334', '15205', '�М仁地区', '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('335', '2505', '毕节地区', '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('336', '15207', '黔西南州', '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('337', '15208', '黔东南州', '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('338', '15209', '黔南�?, '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('339', '9925', '其他城徺', '2', '152', '0');
INSERT INTO `yjcode_city` VALUES ('340', '2401', '昆明�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('341', '2402', '��靖�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('342', '2403', '玉溪�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('343', '2404', '保山�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('344', '15306', '昭�벾�', '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('345', '2405', '丽江�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('346', '15308', '普洱�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('347', '15309', '临沧�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('348', '15310', '文山�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('349', '15311', '红河�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('350', '15312', '西双版纳�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('351', '15313', '楚雄�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('352', '15314', '大理�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('353', '15315', '德宏�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('354', '15316', '��江�?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('355', '15317', '迪���?, '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('356', '9924', '其他城徺', '2', '153', '0');
INSERT INTO `yjcode_city` VALUES ('357', '2901', '拉萨�?, '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('358', '2903', '昌都地区', '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('359', '2905', '山南地区', '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('360', '15404', '�ߥ喀�顜��?, '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('361', '2902', '�̣曲地区', '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('362', '15406', '�ֿ里地区', '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('363', '2904', '林芝地区', '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('364', '9929', '其他城徺', '2', '154', '0');
INSERT INTO `yjcode_city` VALUES ('365', '20', '西安�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('366', '1309', '�М川�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('367', '1307', '宝鸡�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('368', '1302', '咸阳�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('369', '1305', '渭南�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('370', '1306', '延安�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('371', '1308', '汉中�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('372', '1303', '榆����?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('373', '1304', '安康�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('374', '16110', '商洛�?, '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('375', '9913', '其他城徺', '2', '161', '0');
INSERT INTO `yjcode_city` VALUES ('376', '2701', '兰州�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('377', '2702', '嘉峪关徺', '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('378', '2703', '金�ǹ�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('379', '16204', '白银�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('380', '2704', '天水�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('381', '16206', '武威�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('382', '16207', '张掖�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('383', '16208', '平凉�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('384', '2706', '酒泉�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('385', '16210', '庆阳�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('386', '16211', '�뵥��?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('387', '16212', '陇南�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('388', '16213', '临夏�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('389', '16214', '��덗�?, '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('390', '9927', '其他城徺', '2', '162', '0');
INSERT INTO `yjcode_city` VALUES ('391', '3101', '西宁�?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('392', '3102', '海东地区', '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('393', '3103', '海北�?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('394', '3105', '黄南�?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('395', '3104', '海南�?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('396', '16306', '枲״��?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('397', '16307', '玉树�?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('398', '16308', '海西�?, '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('399', '9931', '其他城徺', '2', '163', '0');
INSERT INTO `yjcode_city` VALUES ('400', '2801', '�ж川�?, '2', '164', '0');
INSERT INTO `yjcode_city` VALUES ('401', '2802', '石嘴山徺', '2', '164', '0');
INSERT INTO `yjcode_city` VALUES ('402', '2803', '吴忠�?, '2', '164', '0');
INSERT INTO `yjcode_city` VALUES ('403', '2804', '�ƺ�ʦ�?, '2', '164', '0');
INSERT INTO `yjcode_city` VALUES ('404', '16405', '中卫�?, '2', '164', '0');
INSERT INTO `yjcode_city` VALUES ('405', '9928', '其他城徺', '2', '164', '0');
INSERT INTO `yjcode_city` VALUES ('406', '2601', '乌鲁������?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('407', '2613', '克拉玛依�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('408', '16503', '吐鲁番地�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('409', '16504', '�����地区', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('410', '2604', '和田地区', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('411', '2603', '�ֿ克苏地�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('412', '2602', '喀什地区', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('413', '16508', '��ɭ�勒苏�ү尔��ɭ����治�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('414', '16509', '巴音郭楞�顏����治�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('415', '2605', '昌吉�ƞ族���治�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('416', '16511', '�벰�塔拉�顏����治�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('417', '16512', '伊犁哈萨克自治州', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('418', '16513', '塔城地区', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('419', '16514', '�ֿ勒泰地�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('420', '2612', '石河子徺', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('421', '16516', '�ֿ拉尔徺', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('422', '16517', '�ƾ木舒克�?, '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('423', '16518', '五家渠徺', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('424', '9926', '其他城徺', '2', '165', '0');
INSERT INTO `yjcode_city` VALUES ('425', '3501', '台北�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('426', '3502', '高雄�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('427', '3503', '台中�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('428', '17105', '台南�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('429', '3506', '新竹�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('430', '3509', '嘉义�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('431', '17108', '台北ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('432', '3507', '桃园ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('433', '17111', '新竹ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('434', '17112', '苗栗ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('435', '17113', '台中ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('436', '3508', '彰化ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('437', '3510', '南投ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('438', '17116', '云���ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('439', '17117', '嘉义ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('440', '17118', '台南ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('441', '17119', '高雄ա?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('442', '17124', '南投�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('443', '17125', '彰化�?, '2', '171', '0');
INSERT INTO `yjcode_city` VALUES ('444', '10', '香港特别行����?, '2', '172', '0');
INSERT INTO `yjcode_city` VALUES ('445', '3401', '澳门特别行����?, '2', '173', '0');
INSERT INTO `yjcode_city` VALUES ('446', '1110101', '东城�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('447', '1110102', '西城�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('448', '1110103', '崇文�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('449', '1110104', '宣武�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('450', '1110105', '���阳�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('451', '1110106', '丰台�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('452', '1110107', '石景山区', '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('453', '1110108', '海����?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('454', '11109', '门头沟区', '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('455', '11110', '房山�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('456', '104', '��벷��?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('457', '101', '顺义�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('458', '103', '昌平�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('459', '102', '大兴�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('460', '1110115', '���Ҕ区', '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('461', '1110116', '平谷�?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('462', '1110117', '延��ա?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('463', '1110118', '密云ա?, '3', '1', '0');
INSERT INTO `yjcode_city` VALUES ('464', '1120101', '和平�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('465', '1120102', '沴����?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('466', '1120103', '河西�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('467', '1120104', '南开�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('468', '1120105', '河北�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('469', '1120106', '红桥�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('470', '1120107', '塘沽�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('471', '1120108', '汉沽�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('472', '1120109', '大港�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('473', '1120110', '东丽�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('474', '1120111', '西青�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('475', '1120112', '津南�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('476', '1120113', '北辰�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('477', '1120114', '武清�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('478', '1120115', '宝坻�?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('479', '1120116', '蓟县', '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('480', '1120117', '宁河ա?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('481', '1120118', '�Ǚ海ա?, '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('482', '1120199', '其他区县', '3', '14', '0');
INSERT INTO `yjcode_city` VALUES ('483', '1130118', '高新技���产�벼�发区', '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('484', '1130101', '长安�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('485', '1130102', '桥东�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('486', '1130103', '桥西�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('487', '1130104', '新华�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('488', '1130105', '裕华�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('489', '1130106', '井���矿区', '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('490', '1130107', '辛集�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('491', '1130108', '藁城�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('492', '1130109', '��ɷ��?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('493', '1130110', '新乐�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('494', '1130111', '鹿泉�?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('495', '1130112', '井���ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('496', '1130113', '正定ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('497', '1130114', '�ݾ城ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('498', '1130115', '行唐ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('499', '1130116', '灵寿ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('500', '1130117', '高邑ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('501', '1130199', '其他区县', '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('502', '1130122', '深泽ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('503', '1130120', '赞皇ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('504', '1130123', '�ߠ极ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('505', '1130119', '元氏ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('506', '1130121', '赵县', '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('507', '1130124', '平山ա?, '3', '601', '0');
INSERT INTO `yjcode_city` VALUES ('508', '1130201', '路北�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('509', '1130202', '路南�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('510', '1130203', '古冶�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('511', '1130204', '开平区', '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('512', '1130205', '丰润�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('513', '1130206', '丰南�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('514', '1130207', '�ϵ化�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('515', '1130208', '迁安�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('516', '1130209', '滦县', '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('517', '1130210', '滦南ա?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('518', '1130211', '乐亭ա?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('519', '1130212', '迁西ա?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('520', '1130213', '玉田ա?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('521', '1130214', '唐海ա?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('522', '1130299', '其他区县', '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('523', '1130215', '高新�?, '3', '605', '0');
INSERT INTO `yjcode_city` VALUES ('524', '1130301', '海港�?, '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('525', '1130302', '山海关区', '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('526', '1130303', '北戴河区', '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('527', '1130304', '昌黎ա?, '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('528', '1130305', '�벮�ա?, '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('529', '1130306', '卢龙ա?, '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('530', '1130307', '�ǒ龙满族���治ա?, '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('531', '1130399', '其他区县', '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('532', '1130308', '经济技���开发区', '3', '604', '0');
INSERT INTO `yjcode_city` VALUES ('533', '1130420', '��뼀�?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('534', '1130401', '丛台�?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('535', '1130402', '�̯山�?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('536', '1130403', '复兴�?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('537', '1130404', '峰峰矿区', '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('538', '1130405', '武安�?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('539', '1130406', '�̯郸ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('540', '1130407', '临漳ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('541', '1130408', '成安ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('542', '1130409', '大名ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('543', '1130410', '涉县', '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('544', '1130411', '磁县', '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('545', '1130412', '��乡ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('546', '1130413', '永年ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('547', '1130414', '�̱县', '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('548', '1130415', '鸡泽ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('549', '1130416', '广平ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('550', '1130417', '馆陶ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('551', '1130418', '魏县', '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('552', '1130419', '��周ա?, '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('553', '1130499', '其他区县', '3', '607', '0');
INSERT INTO `yjcode_city` VALUES ('554', '1130501', '桥东�?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('555', '1130502', '桥西�?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('556', '1130503', '南宫�?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('557', '1130504', '沙河�?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('558', '1130505', '�̢台ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('559', '1130506', '临城ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('560', '1130507', '内丘ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('561', '1130508', '�ҏ乡ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('562', '1130509', '隆尧ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('563', '1130510', '任县', '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('564', '1130511', '南和ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('565', '1130512', '宁晋ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('566', '1130513', '巨鹿ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('567', '1130514', '新河ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('568', '1130515', '广宗ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('569', '1130516', '年���ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('570', '1130517', '威县', '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('571', '1130518', '清河ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('572', '1130519', '临西ա?, '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('573', '1130599', '其他区县', '3', '606', '0');
INSERT INTO `yjcode_city` VALUES ('574', '1130601', '新徺�?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('575', '1130602', '北徺�?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('576', '1130603', '南徺�?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('577', '1130604', '�벷��?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('578', '611', '涿州�?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('579', '1130606', '安国�?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('580', '1130607', '高碑店徺', '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('581', '1130608', '满城ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('582', '1130609', '清苑ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('583', '1130610', '��쎿', '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('584', '1130611', '徐水ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('585', '1130612', '涞源ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('586', '1130613', '�벅�ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('587', '1130614', '顺平ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('588', '1130615', '唐县', '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('589', '1130616', '���都ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('590', '1130617', '涞水ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('591', '1130618', '高阳ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('592', '1130619', '安新ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('593', '1130620', '��县', '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('594', '1130621', '容城ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('595', '1130622', '��阳ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('596', '1130623', '�֜平ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('597', '1130624', '博鵱ա?, '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('598', '1130625', '蠡县', '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('599', '1130699', '其他区县', '3', '608', '0');
INSERT INTO `yjcode_city` VALUES ('600', '1130718', '高新�?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('601', '1130701', '桥西�?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('602', '1130702', '桥东�?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('603', '1130703', '宣化�?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('604', '1130704', '下花�ƭ区', '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('605', '1130705', '宣化ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('606', '1130706', '张北ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('607', '1130707', '康���ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('608', '1130708', '沽源ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('609', '1130709', '��⹉ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('610', '1130710', '�벎�', '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('611', '1130711', '�ֳ�ʦա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('612', '1130712', '��安县', '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('613', '1130713', '万全ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('614', '1130714', '��来县', '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('615', '1130715', '涿鹿ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('616', '1130716', '赤城ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('617', '1130717', '崇礼ա?, '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('618', '1130799', '其他区县', '3', '602', '0');
INSERT INTO `yjcode_city` VALUES ('619', '1130801', '双桥�?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('620', '1130802', '双滦�?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('621', '1130803', '鹰�׹营子矿区', '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('622', '1130804', '�ؿ德ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('623', '1130805', '兴隆ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('624', '1130806', '平泉ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('625', '1130807', '滦平ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('626', '1130808', '隆化ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('627', '1130809', '丰宁满族���治ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('628', '1130810', '宽城满族���治ա?, '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('629', '1130811', '�ƴ场满族�顏��ߏ自治县', '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('630', '1130899', '其他区县', '3', '603', '0');
INSERT INTO `yjcode_city` VALUES ('631', '1130901', '运河�?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('632', '1130902', '新华�?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('633', '1130903', '泊头�?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('634', '1130904', '任丘�?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('635', '1130905', '黄骅�?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('636', '1130906', '河间�?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('637', '1130907', '沧县', '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('638', '1130908', '�ǒ县', '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('639', '1130909', '东光ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('640', '1130910', '海兴ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('641', '1130911', '盐山ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('642', '1130912', '��宁ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('643', '1130913', '南皮ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('644', '1130914', '吴桥ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('645', '1130915', '献县', '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('646', '1130916', '孟村�ƞ族���治ա?, '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('647', '1130999', '其他区县', '3', '609', '0');
INSERT INTO `yjcode_city` VALUES ('648', '1131001', '安次�?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('649', '1131002', '广阳�?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('650', '1131003', '霸州�?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('651', '1131004', '三河�?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('652', '1131005', '�ƺ安ա?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('653', '1131006', '永清ա?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('654', '1131007', '香河ա?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('655', '1131008', '大城ա?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('656', '1131009', '文安ա?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('657', '1131010', '大厂�ƞ族���治ա?, '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('658', '1131099', '其他区县', '3', '610', '0');
INSERT INTO `yjcode_city` VALUES ('659', '1131101', '桃城�?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('660', '1131102', '冀州徺', '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('661', '1131103', '深州�?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('662', '1131104', '枣强ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('663', '1131105', '武邑ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('664', '1131106', '武强ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('665', '1131107', '饶阳ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('666', '1131108', '安平ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('667', '1131109', '故城ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('668', '1131110', '景县', '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('669', '1131111', '�֜城ա?, '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('670', '1131199', '其他区县', '3', '11311', '0');
INSERT INTO `yjcode_city` VALUES ('671', '1140101', '杏花岭区', '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('672', '1140102', '小店�?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('673', '1140103', '迎泽�?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('674', '1140104', '尖草坪区', '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('675', '1140105', '万柏林区', '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('676', '1140106', '晋源�?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('677', '1213', '古交�?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('678', '1212', '清徐ա?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('679', '1214', '�ֳ曲ա?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('680', '1140110', '娄索ա?, '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('681', '1140199', '其他区县', '3', '1201', '0');
INSERT INTO `yjcode_city` VALUES ('682', '1140201', '城区', '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('683', '1140202', '矿区', '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('684', '1140203', '南�٭�?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('685', '1140204', '新����?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('686', '1140205', '�ֳ���ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('687', '1140206', '天镇ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('688', '1140207', '广灵ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('689', '1140208', '灵丘ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('690', '1140209', '浑源ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('691', '1140210', '左云ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('692', '1140211', '大同ա?, '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('693', '1140299', '其他区县', '3', '1202', '0');
INSERT INTO `yjcode_city` VALUES ('694', '1140301', '城区', '3', '1204', '0');
INSERT INTO `yjcode_city` VALUES ('695', '1140302', '矿区', '3', '1204', '0');
INSERT INTO `yjcode_city` VALUES ('696', '1140303', '郊区', '3', '1204', '0');
INSERT INTO `yjcode_city` VALUES ('697', '1140304', '平定ա?, '3', '1204', '0');
INSERT INTO `yjcode_city` VALUES ('698', '1140305', '盂县', '3', '1204', '0');
INSERT INTO `yjcode_city` VALUES ('699', '1140399', '其他区县', '3', '1204', '0');
INSERT INTO `yjcode_city` VALUES ('700', '1140401', '城区', '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('701', '1140402', '郊区', '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('702', '1140403', '潞城�?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('703', '1140404', '长治ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('704', '1140405', '襄垣ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('705', '1140406', '屯留ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('706', '1140407', '平顺ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('707', '1140408', '黎城ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('708', '1140409', '壶关ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('709', '1140410', '长子ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('710', '1140411', '武乡ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('711', '1140412', '沁县', '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('712', '1140413', '沁源ա?, '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('713', '1140499', '其他区县', '3', '1206', '0');
INSERT INTO `yjcode_city` VALUES ('714', '1140501', '城区', '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('715', '1140502', '��빳�?, '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('716', '1140503', '泽州ա?, '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('717', '1140504', '沁水ա?, '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('718', '1140505', '�ֳ城ա?, '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('719', '1140506', '陵川ա?, '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('720', '1140599', '其他区县', '3', '1205', '0');
INSERT INTO `yjcode_city` VALUES ('721', '1208', '榆次�?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('722', '1220', '介休�?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('723', '1140603', '榆社ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('724', '1140604', '左权ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('725', '1140605', '和顺ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('726', '1140606', '昔阳ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('727', '1140607', '寿阳ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('728', '1218', '太谷ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('729', '1217', '祁县', '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('730', '1219', '平遥ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('731', '1140611', '灵石ա?, '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('732', '1140699', '其他区县', '3', '1207', '0');
INSERT INTO `yjcode_city` VALUES ('733', '1140701', '盐湖�?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('734', '1140702', '永济�?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('735', '1140703', '河津�?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('736', '1140704', '芮城ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('737', '1140705', '临猗ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('738', '1140706', '临���ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('739', '1140707', '新���ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('740', '1140708', '稷山ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('741', '1140709', '闻喜ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('742', '1140710', '夏县', '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('743', '1140711', '绛县', '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('744', '1140712', '平陆ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('745', '1140713', '垣曲ա?, '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('746', '1140799', '其他区县', '3', '1210', '0');
INSERT INTO `yjcode_city` VALUES ('747', '1140801', '忻府�?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('748', '1225', 'ա�平�?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('749', '1140803', '�뵥�ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('750', '1140804', '五台ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('751', '1140805', '代县', '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('752', '1140806', '繁峙ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('753', '1140807', '宁武ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('754', '1140808', '�Ǚ乐ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('755', '1140809', '神���ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('756', '1140810', '五寨ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('757', '1140811', '岢���ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('758', '1140812', '河曲ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('759', '1140813', '保德ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('760', '1140814', '���关ա?, '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('761', '1140899', '其他区县', '3', '1224', '0');
INSERT INTO `yjcode_city` VALUES ('762', '1140901', '尧都�?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('763', '1209', '侯马�?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('764', '1140903', '霍州�?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('765', '1140904', '��沃ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('766', '1140905', '翼城ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('767', '1140906', '襄汾ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('768', '1140907', '洪洞ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('769', '1140908', '古县', '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('770', '1140909', '安泽ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('771', '1140910', '浮山ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('772', '1140911', '吉县', '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('773', '1140912', '乡宁ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('774', '1140913', '蒲县', '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('775', '1140914', '大宁ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('776', '1140915', '永和ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('777', '1140916', '隰县', '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('778', '1140917', '汾西ա?, '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('779', '1140999', '其他区县', '3', '1211', '0');
INSERT INTO `yjcode_city` VALUES ('780', '1223', '离石�?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('781', '1215', '孝义�?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('782', '1216', '汾阳�?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('783', '1222', '文水ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('784', '1141005', '中阳ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('785', '1141006', '兴县', '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('786', '1141007', '临县', '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('787', '1141008', '方山ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('788', '1141009', '�ҳ���ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('789', '1141010', '�벎�', '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('790', '1141011', '交口ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('791', '1221', '交城ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('792', '1141013', '石楼ա?, '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('793', '1141099', '其他区县', '3', '11410', '0');
INSERT INTO `yjcode_city` VALUES ('794', '1141101', '���城�?, '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('795', '1141102', '平鲁�?, '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('796', '1141103', '山阴ա?, '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('797', '1141104', '应县', '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('798', '1141105', '右玉ա?, '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('799', '1141106', '��仁县', '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('800', '1141199', '其他区县', '3', '1203', '0');
INSERT INTO `yjcode_city` VALUES ('801', '1150110', '经济开发区', '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('802', '1150101', '�ƞ民�?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('803', '1150102', '新城�?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('804', '1150103', '玉泉�?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('805', '1150104', '赛罕�?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('806', '1150105', '���녋���뎿', '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('807', '1150106', '武川ա?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('808', '1150107', '和����ݼ尔ա?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('809', '1150108', '清水河县', '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('810', '1150109', '土默特左��?, '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('811', '1150199', '其他区县', '3', '1001', '0');
INSERT INTO `yjcode_city` VALUES ('812', '1150201', '昆都仑区', '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('813', '1150202', '串ײ��?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('814', '1150203', '�ǒ山�?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('815', '1150204', '石拐�?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('816', '1150205', '白云矿区', '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('817', '1150206', '九�ʦ�?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('818', '1150207', '�ƺ阳ա?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('819', '1150208', '土默特右��?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('820', '1150209', '达尔罕茂明安联合��?, '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('821', '1150299', '其他区县', '3', '1003', '0');
INSERT INTO `yjcode_city` VALUES ('822', '1150313', '新城�?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('823', '1150301', '红山�?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('824', '1150302', '元宝山区', '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('825', '1150303', '松山�?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('826', '1150304', '宁城ա?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('827', '1150305', '林西ա?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('828', '1150306', '�ֿ鲁科尔沁���', '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('829', '1150307', '巴���左���', '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('830', '1150308', '巴���右���', '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('831', '1150309', '克什克腾��?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('832', '1150310', '翁牛特���', '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('833', '1150311', '喀喇沁��?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('834', '1150312', '敖汉��?, '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('835', '1150399', '其他区县', '3', '1004', '0');
INSERT INTO `yjcode_city` VALUES ('836', '1150401', '科尔沁区', '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('837', '1150402', '霍���郭勒�?, '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('838', '1150403', '开鲁县', '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('839', '1150404', '��˼���?, '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('840', '1150405', '奈曼��?, '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('841', '1150406', '�؎鲁特���', '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('842', '1150407', '科尔沁左翼中��?, '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('843', '1150408', '科尔沁左翼后��?, '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('844', '1150499', '其他区县', '3', '1005', '0');
INSERT INTO `yjcode_city` VALUES ('845', '1150501', '东胜�?, '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('846', '1150502', '达拉特���', '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('847', '1150503', '准格尔���', '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('848', '1150504', '鄂托��ɉ���?, '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('849', '1150505', '鄂托克���', '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('850', '1150506', '杭锦��?, '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('851', '1150507', '乌审��?, '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('852', '1150508', '伊金霍洛��?, '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('853', '1150599', '其他区县', '3', '11505', '0');
INSERT INTO `yjcode_city` VALUES ('854', '1150601', '海拉尔区', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('855', '710', '满洲里徺', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('856', '1150603', '�؎兰屯徺', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('857', '1150604', '�顅�石徺', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('858', '1150605', '�ݹ河�?, '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('859', '1150606', '额尔古纳�?, '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('860', '1150607', '�ֿ�����?, '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('861', '1150608', '新巴尔���右���', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('862', '1150609', '新巴尔���左���', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('863', '1150610', '�����尔�����?, '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('864', '1150611', '鄱���春自治���', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('865', '1150612', '鄂温克族���治��?, '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('866', '1150613', '�ǫ力达瓦达��尔族���治��?, '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('867', '1150699', '其他区县', '3', '11506', '0');
INSERT INTO `yjcode_city` VALUES ('868', '1150701', '临河�?, '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('869', '1150702', '五�ʦա?, '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('870', '1150703', '磴口ա?, '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('871', '1150704', '乌拉特前��?, '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('872', '1150705', '乌拉特中��?, '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('873', '1150706', '乌拉特后��?, '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('874', '1150707', '杭锦后���', '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('875', '1150799', '其他区县', '3', '11507', '0');
INSERT INTO `yjcode_city` VALUES ('876', '1150801', '��宁�?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('877', '1150802', '丰镇�?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('878', '1150803', '卓资ա?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('879', '1150804', '化德ա?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('880', '1150805', '商都ա?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('881', '1150806', '兴和ա?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('882', '1150807', '凉城ա?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('883', '1150808', '察哈尔右翼前��?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('884', '1150809', '察哈尔右翼中��?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('885', '1150810', '察哈尔右翼后��?, '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('886', '1150811', '�ƛ子王���', '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('887', '1150899', '其他区县', '3', '11508', '0');
INSERT INTO `yjcode_city` VALUES ('888', '1150901', '乌兰浩特�?, '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('889', '1150902', '�ֿ尔山徺', '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('890', '1150903', '突泉ա?, '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('891', '1150904', '科尔沁右翼前��?, '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('892', '1150905', '科尔沁右翼中��?, '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('893', '1150906', '�؎赉特���', '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('894', '1150999', '其他区县', '3', '11509', '0');
INSERT INTO `yjcode_city` VALUES ('895', '1151001', '�ӡ���浩特�?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('896', '1151002', '二连浩特�?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('897', '1151003', '��⼦ա?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('898', '1151004', '�ֿ巴嘎���', '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('899', '1151005', '苏尼特左��?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('900', '1151006', '苏尼特右��?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('901', '1151007', '东乌珠穆沁���', '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('902', '1151008', '西乌珠穆沁���', '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('903', '1151009', '太仆寺���', '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('904', '1151010', '镶黄��?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('905', '1151011', '正镶白���', '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('906', '1151012', '正�����?, '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('907', '1151099', '其他区县', '3', '11510', '0');
INSERT INTO `yjcode_city` VALUES ('908', '1151101', '�ֿ拉善左��?, '3', '11511', '0');
INSERT INTO `yjcode_city` VALUES ('909', '1151102', '�ֿ拉善右��?, '3', '11511', '0');
INSERT INTO `yjcode_city` VALUES ('910', '1151103', '额济纳���', '3', '11511', '0');
INSERT INTO `yjcode_city` VALUES ('911', '1151199', '其他区县', '3', '11511', '0');
INSERT INTO `yjcode_city` VALUES ('912', '1151201', '海勃湾区', '3', '1002', '0');
INSERT INTO `yjcode_city` VALUES ('913', '1151202', '海南�?, '3', '1002', '0');
INSERT INTO `yjcode_city` VALUES ('914', '1151203', '乌达�?, '3', '1002', '0');
INSERT INTO `yjcode_city` VALUES ('915', '1151299', '其他区县', '3', '1002', '0');
INSERT INTO `yjcode_city` VALUES ('916', '1210114', '浑南经济开发区', '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('917', '1210101', '沈河�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('918', '1210102', '和平�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('919', '1210103', '大东�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('920', '1210104', '�Ї姑�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('921', '1210105', '�Ё西�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('922', '1210106', '苏家屯区', '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('923', '1210107', '东����?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('924', '1210108', '�����新区', '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('925', '1210109', '于洪�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('926', '1210110', '新民�?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('927', '1210111', '辽中ա?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('928', '1210112', '康平ա?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('929', '1210113', '法库ա?, '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('930', '1210199', '其他区县', '3', '12', '0');
INSERT INTO `yjcode_city` VALUES ('931', '1210201', '西岗�?, '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('932', '1210202', '中山�?, '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('933', '1210203', '沙河口区', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('934', '1210204', '�����子区', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('935', '1210205', '�߅顺口区', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('936', '918', '金州�?, '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('937', '1210207', '瓦房店徺', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('938', '1210208', '普兰店徺', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('939', '919', '庄河�?, '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('940', '1210210', '长海ա?, '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('941', '1210299', '其他区县', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('942', '1210211', '开发区', '3', '906', '0');
INSERT INTO `yjcode_city` VALUES ('943', '1210301', '�Ё东�?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('944', '1210302', '�Ё西�?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('945', '1210303', '��ɱ��?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('946', '1210304', '千山�?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('947', '1210305', '海城�?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('948', '1210306', '台安ա?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('949', '1210307', '岫岩满族���治ա?, '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('950', '1210399', '其他区县', '3', '907', '0');
INSERT INTO `yjcode_city` VALUES ('951', '1210401', '顺城�?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('952', '1210402', '新抚�?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('953', '1210403', '串״��?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('954', '1210404', '���花�?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('955', '1210405', '抚顺ա?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('956', '1210406', '新宾满族���治ա?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('957', '1210407', '清�ʦ满族���治ա?, '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('958', '1210499', '其他区县', '3', '905', '0');
INSERT INTO `yjcode_city` VALUES ('959', '1210501', '平山�?, '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('960', '1210502', '溪湖�?, '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('961', '1210503', '明山�?, '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('962', '1210504', '南芬�?, '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('963', '1210505', '���溪满族���治ա?, '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('964', '1210506', '��˻�满族���治ա?, '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('965', '1210599', '其他区县', '3', '915', '0');
INSERT INTO `yjcode_city` VALUES ('966', '1210601', '振兴�?, '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('967', '1210602', '元宝�?, '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('968', '1210603', '振安�?, '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('969', '1210604', '凤城�?, '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('970', '1210605', '串׸��?, '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('971', '1210606', '宽甸满族���治ա?, '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('972', '1210699', '其他区县', '3', '908', '0');
INSERT INTO `yjcode_city` VALUES ('973', '1210701', '太和�?, '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('974', '1210702', '古塔�?, '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('975', '1210703', '凌河�?, '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('976', '1210704', '凌海�?, '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('977', '1210705', '北镇�?, '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('978', '1210706', '黑山ա?, '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('979', '1210707', '义县', '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('980', '1210799', '其他区县', '3', '910', '0');
INSERT INTO `yjcode_city` VALUES ('981', '1210801', '�顉��?, '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('982', '1210802', '西徺�?, '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('983', '1210803', '鲅鱼�����', '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('984', '1210804', 'Կ�边�?, '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('985', '913', '大石桥徺', '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('986', '1210806', '盖州�?, '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('987', '917', '��岳�?, '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('988', '1210899', '其他区县', '3', '909', '0');
INSERT INTO `yjcode_city` VALUES ('989', '1210901', '白塔�?, '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('990', '1210902', '文圣�?, '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('991', '1210903', '宏伟�?, '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('992', '1210904', '�̢��岭区', '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('993', '1210905', '太子河区', '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('994', '1210906', '灯塔�?, '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('995', '1210907', '辽阳ա?, '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('996', '1210999', '其他区县', '3', '911', '0');
INSERT INTO `yjcode_city` VALUES ('997', '1211001', '兴隆台区', '3', '914', '0');
INSERT INTO `yjcode_city` VALUES ('998', '1211002', '双台子区', '3', '914', '0');
INSERT INTO `yjcode_city` VALUES ('999', '1211003', '大洼ա?, '3', '914', '0');
INSERT INTO `yjcode_city` VALUES ('1000', '1211004', '��뱱ա?, '3', '914', '0');
INSERT INTO `yjcode_city` VALUES ('1001', '1211099', '其他区县', '3', '914', '0');
INSERT INTO `yjcode_city` VALUES ('1002', '1211101', '�ж州�?, '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1003', '1211102', '清河�?, '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1004', '1211103', '调兵山徺', '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1005', '1211104', '开ա�徺', '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1006', '1211105', '�Ё岭ա?, '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1007', '1211106', '西丰ա?, '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1008', '1211107', '昌图ա?, '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1009', '1211199', '其他区县', '3', '904', '0');
INSERT INTO `yjcode_city` VALUES ('1010', '1211201', '双塔�?, '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1011', '1211202', '�顟��?, '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1012', '1211203', '北票�?, '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1013', '1211204', '凌源�?, '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1014', '1211205', '���阳ա?, '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1015', '1211206', '建平ա?, '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1016', '1211207', '喀喇沁左翼�顏��ߏ自治县', '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1017', '1211299', '其他区县', '3', '902', '0');
INSERT INTO `yjcode_city` VALUES ('1018', '1211301', '龙港�?, '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1019', '1211302', '连山�?, '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1020', '1211303', '南票�?, '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1021', '1211304', '兴城�?, '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1022', '1211305', '绥中ա?, '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1023', '1211306', '建�ǹա?, '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1024', '1211399', '其他区县', '3', '912', '0');
INSERT INTO `yjcode_city` VALUES ('1025', '1211401', '海州�?, '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1026', '1211402', '新邱�?, '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1027', '1211403', '太平�?, '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1028', '1211404', '清河门区', '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1029', '1211405', '细河�?, '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1030', '1211406', '彰武ա?, '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1031', '1211407', '�ֲז��顏��ߏ自治县', '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1032', '1211499', '其他区县', '3', '903', '0');
INSERT INTO `yjcode_city` VALUES ('1033', '1220111', '高新�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1034', '1220113', '经开�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1035', '1220112', '净������', '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1036', '1220114', '一汽厂�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1037', '1220101', '���阳�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1038', '1220102', '南关�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1039', '1220103', '宽城�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1040', '1220104', '二道�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1041', '1220105', '绿园�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1042', '1220106', '双阳�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1043', '1220107', '德惠�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1044', '1220108', '九台�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1045', '1220109', '榆树�?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1046', '1220110', '农安ա?, '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1047', '1220199', '其他区县', '3', '801', '0');
INSERT INTO `yjcode_city` VALUES ('1048', '1220201', '船营�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1049', '1220202', '龙潭�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1050', '1220203', '昌邑�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1051', '1220204', '丰满�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1052', '1220205', '磐石�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1053', '1220206', '蛟河�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1054', '1220207', '桦甸�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1055', '1220208', '舒兰�?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1056', '1220209', '永吉ա?, '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1057', '1220299', '其他区县', '3', '804', '0');
INSERT INTO `yjcode_city` VALUES ('1058', '1220301', '�Ё西�?, '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1059', '1220302', '�Ё东�?, '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1060', '1220303', '双辽�?, '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1061', '1220304', '公主岭徺', '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1062', '1220305', '梨树ա?, '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1063', '1220306', '伊通满�ߏ自治县', '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1064', '1220399', '其他区县', '3', '805', '0');
INSERT INTO `yjcode_city` VALUES ('1065', '1220401', '�顱��?, '3', '12204', '0');
INSERT INTO `yjcode_city` VALUES ('1066', '1220402', '西安�?, '3', '12204', '0');
INSERT INTO `yjcode_city` VALUES ('1067', '1220403', '东丰ա?, '3', '12204', '0');
INSERT INTO `yjcode_city` VALUES ('1068', '1220404', '东辽ա?, '3', '12204', '0');
INSERT INTO `yjcode_city` VALUES ('1069', '1220499', '其他区县', '3', '12204', '0');
INSERT INTO `yjcode_city` VALUES ('1070', '1220501', '串�ǹ�?, '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1071', '1220502', '二道江区', '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1072', '1220503', '梅河口徺', '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1073', '1220504', '��安�?, '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1074', '1220505', '��벌�ա?, '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1075', '1220506', '辉南ա?, '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1076', '1220507', '�ҳ河ա?, '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1077', '1220599', '其他区县', '3', '807', '0');
INSERT INTO `yjcode_city` VALUES ('1078', '1220601', '八道江区', '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1079', '1220602', '江源�?, '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1080', '1220603', '临江�?, '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1081', '1220604', '抚潧ա?, '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1082', '1220605', '�ǖ宇ա?, '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1083', '1220606', '长������鲜�ߏ自治县', '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1084', '1220699', '其他区县', '3', '12206', '0');
INSERT INTO `yjcode_city` VALUES ('1085', '1220701', '宁江�?, '3', '803', '0');
INSERT INTO `yjcode_city` VALUES ('1086', '1220702', '�ض余ա?, '3', '803', '0');
INSERT INTO `yjcode_city` VALUES ('1087', '1220703', '长岭ա?, '3', '803', '0');
INSERT INTO `yjcode_city` VALUES ('1088', '1220704', '乾安ա?, '3', '803', '0');
INSERT INTO `yjcode_city` VALUES ('1089', '1220705', '前郭�����斯蒙古族���治ա?, '3', '803', '0');
INSERT INTO `yjcode_city` VALUES ('1090', '1220799', '其他区县', '3', '803', '0');
INSERT INTO `yjcode_city` VALUES ('1091', '1220801', '洮北�?, '3', '802', '0');
INSERT INTO `yjcode_city` VALUES ('1092', '1220802', '洮南�?, '3', '802', '0');
INSERT INTO `yjcode_city` VALUES ('1093', '1220803', '大安�?, '3', '802', '0');
INSERT INTO `yjcode_city` VALUES ('1094', '1220804', '镴ѵ�ա?, '3', '802', '0');
INSERT INTO `yjcode_city` VALUES ('1095', '1220805', '�͚榆ա?, '3', '802', '0');
INSERT INTO `yjcode_city` VALUES ('1096', '1220899', '其他区县', '3', '802', '0');
INSERT INTO `yjcode_city` VALUES ('1097', '806', '延吉�?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1098', '1220902', '�ƾ们�?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1099', '1220903', '敦化�?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1100', '808', '珲春�?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1101', '1220905', '龙井�?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1102', '1220906', '和龙�?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1103', '1220907', '汪清ա?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1104', '1220908', '安图ա?, '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1105', '1220999', '其他区县', '3', '12209', '0');
INSERT INTO `yjcode_city` VALUES ('1106', '1230119', '�ɨ力�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1107', '1230101', '松北�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1108', '1230102', '��̢���?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1109', '1230103', '南岗�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1110', '1230104', '���줖�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1111', '1230105', '�����?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1112', '1230106', '平房�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1113', '1230107', '�ͼ兰�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1114', '1230108', '�ֿ城�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1115', '1230109', '双城�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1116', '1230110', '��֯�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1117', '1230111', '五常�?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1118', '1230112', '依兰ա?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1119', '1230113', '方正ա?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1120', '1230114', '宾县', '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1121', '1230115', '巴彦ա?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1122', '1230116', '���兰ա?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1123', '1230117', '�͚河ա?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1124', '1230118', '延寿ա?, '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1125', '1230199', '其他区县', '3', '701', '0');
INSERT INTO `yjcode_city` VALUES ('1126', '1230201', '建华�?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1127', '1230202', '龙沙�?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1128', '1230203', '�Ё锋�?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1129', '1230204', '昂昂溪区', '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1130', '1230205', '富拉尔基�?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1131', '1230206', '碾子山区', '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1132', '1230207', '梅里斯达斡尔�ߏ区', '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1133', '1230208', '讷河�?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1134', '1230209', '龙江ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1135', '1230210', '依安ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1136', '1230211', '泰来ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1137', '1230212', '��덗ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1138', '1230213', '富裕ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1139', '1230214', '��ɱ�ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1140', '1230215', '克东ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1141', '1230216', '拲׳�ա?, '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1142', '1230299', '其他区县', '3', '702', '0');
INSERT INTO `yjcode_city` VALUES ('1143', '1230301', '鸡冠�?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1144', '1230302', '恒山�?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1145', '1230303', '滴道�?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1146', '1230304', '梨树�?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1147', '1230305', '城子河区', '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1148', '1230306', '麻山�?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1149', '1230307', '虎����?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1150', '1230308', '密山�?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1151', '1230309', '鸡东ա?, '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1152', '1230399', '其他区县', '3', '708', '0');
INSERT INTO `yjcode_city` VALUES ('1153', '1230401', '兴山�?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1154', '1230402', '向阳�?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1155', '1230403', '工农�?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1156', '1230404', '南山�?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1157', '1230405', '兴安�?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1158', '1230406', '东山�?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1159', '1230407', '萝北ա?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1160', '1230408', '绥滨ա?, '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1161', '1230499', '其他区县', '3', '709', '0');
INSERT INTO `yjcode_city` VALUES ('1162', '1230501', '尖山�?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1163', '1230502', '岭东�?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1164', '1230503', '�ƛ方台区', '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1165', '1230504', '宝山�?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1166', '1230505', '���ش�ա?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1167', '1230506', '友谊ա?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1168', '1230507', '宝清ա?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1169', '1230508', '饶河ա?, '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1170', '1230599', '其他区县', '3', '12305', '0');
INSERT INTO `yjcode_city` VALUES ('1171', '1230610', '开发区', '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1172', '1230601', '萨尔�ƾ区', '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1173', '1230602', '�顇��?, '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1174', '1230603', '让胡路区', '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1175', '1230604', '大同�?, '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1176', '1230605', '红岗�?, '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1177', '1230606', '��州ա?, '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1178', '1230607', '��源ա?, '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1179', '1230608', '林甸ա?, '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1180', '1230609', '杜尔伯特�顏��ߏ自治县', '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1181', '1230699', '其他区县', '3', '704', '0');
INSERT INTO `yjcode_city` VALUES ('1182', '1230701', '伊春�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1183', '1230702', '南����?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1184', '1230703', '��ɥ��?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1185', '1230704', '西����?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1186', '1230705', '翠峦�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1187', '1230706', '新青�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1188', '1230707', '美溪�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1189', '1230708', '金山屯区', '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1190', '1230709', '五营�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1191', '1230710', '乌马河区', '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1192', '1230711', '汤旺河区', '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1193', '1230712', '带岭�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1194', '1230713', '乌��岭区', '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1195', '1230714', '红星�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1196', '1230715', '上甘岭区', '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1197', '1230716', '�Ё力�?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1198', '1230717', '嘉荫ա?, '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1199', '1230799', '其他区县', '3', '705', '0');
INSERT INTO `yjcode_city` VALUES ('1200', '1230811', '永红�?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1201', '1230801', '前进�?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1202', '1230802', '向阳�?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1203', '1230803', '东风�?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1204', '1230804', '郊区', '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1205', '1230805', '同江�?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1206', '1230806', '富锦�?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1207', '1230807', '桦南ա?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1208', '1230808', '桦川ա?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1209', '1230809', '汤�ʦա?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1210', '1230810', '�뵿�ա?, '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1211', '1230899', '其他区县', '3', '706', '0');
INSERT INTO `yjcode_city` VALUES ('1212', '1230901', '桃山�?, '3', '12309', '0');
INSERT INTO `yjcode_city` VALUES ('1213', '1230902', '新兴�?, '3', '12309', '0');
INSERT INTO `yjcode_city` VALUES ('1214', '1230903', '���子河区', '3', '12309', '0');
INSERT INTO `yjcode_city` VALUES ('1215', '1230904', '勃利ա?, '3', '12309', '0');
INSERT INTO `yjcode_city` VALUES ('1216', '1230999', '其他区县', '3', '12309', '0');
INSERT INTO `yjcode_city` VALUES ('1217', '1231001', '爱民�?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1218', '1231002', '东安�?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1219', '1231003', '�ֳ明�?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1220', '1231004', '西安�?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1221', '1231005', '穆棱�?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1222', '1231006', '绥芬河徺', '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1223', '1231007', '海����?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1224', '1231008', '宁安�?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1225', '1231009', '东宁ա?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1226', '1231010', '林口ա?, '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1227', '1231099', '其他区县', '3', '707', '0');
INSERT INTO `yjcode_city` VALUES ('1228', '1231101', '爱�Ե�?, '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1229', '1231102', '北安�?, '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1230', '1231103', '五大连����?, '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1231', '1231104', '嫩江ա?, '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1232', '1231105', '�͊克ա?, '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1233', '1231106', '�顐�ա?, '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1234', '1231199', '其他区县', '3', '703', '0');
INSERT INTO `yjcode_city` VALUES ('1235', '1231201', '北����?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1236', '1231202', '安达�?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1237', '1231203', '��东�?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1238', '1231204', '海伦�?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1239', '1231205', '���奎ա?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1240', '1231206', '兰西ա?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1241', '1231207', '�ǒ���ա?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1242', '1231208', '庆安ա?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1243', '1231209', '明水ա?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1244', '1231210', '绥棱ա?, '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1245', '1231299', '其他区县', '3', '12312', '0');
INSERT INTO `yjcode_city` VALUES ('1246', '1231301', '�ͼ�˧ա?, '3', '12313', '0');
INSERT INTO `yjcode_city` VALUES ('1247', '1231302', '塔河ա?, '3', '12313', '0');
INSERT INTO `yjcode_city` VALUES ('1248', '1231303', '漠河ա?, '3', '12313', '0');
INSERT INTO `yjcode_city` VALUES ('1249', '1231399', '其他区县', '3', '12313', '0');
INSERT INTO `yjcode_city` VALUES ('1250', '1310101', '黄浦�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1251', '1310102', '卢湾�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1252', '1310103', '徐汇�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1253', '1310104', '长宁�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1254', '1310105', '��顮��?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1255', '1310106', '普陀�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1256', '1310107', '闸北�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1257', '1310108', '虹口�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1258', '1310109', '杨浦�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1259', '1310110', '闵行�?浦江�?', '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1260', '1310111', '宝山�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1261', '1310112', '嘉定�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1262', '1310113', '浦东新区', '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1263', '1310114', '金山�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1264', '1310115', '松江�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1265', '1310116', '�ǒ浦�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1266', '1310117', '南汇�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1267', '1310118', '奉贤�?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1268', '1310119', '崇明ա?, '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1269', '1310200', '闵行区�ֽ浦江镇以外Ｖ', '3', '3', '0');
INSERT INTO `yjcode_city` VALUES ('1270', '1320114', '高新开发区', '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1271', '1320101', '玄武�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1272', '1320102', '白下�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1273', '1320103', '秦淮�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1274', '1320104', '建邺�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1275', '1320105', '鼓楼�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1276', '1320106', '��Ʌ��?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1277', '1320107', '浦口�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1278', '1320108', '六合�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1279', '1320109', '�ݖ霞�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1280', '1320110', '��花台区', '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1281', '1320111', '江宁�?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1282', '1320112', '溧水ա?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1283', '1320113', '高淳ա?, '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1284', '1320199', '其他区县', '3', '1601', '0');
INSERT INTO `yjcode_city` VALUES ('1285', '1320201', '崇安�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1286', '1320202', '南����?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1287', '1320203', '北塘�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1288', '1320204', '滨湖�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1289', '1320205', '惠山�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1290', '1320206', '�ӡ山�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1291', '1611', '江阴�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1292', '1320208', '宜兴�?, '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1293', '1320299', '其他区县', '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1294', '1320209', '新区', '3', '1607', '0');
INSERT INTO `yjcode_city` VALUES ('1295', '1320301', '云龙�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1296', '1320302', '鼓楼�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1297', '1320303', '九里�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1298', '1320304', '贾汪�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1299', '1320305', '泉山�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1300', '1625', '�̳州�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1301', '1320307', '新沂�?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1302', '1320308', '�М山ա?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1303', '1320309', '�Ԣ宁ա?, '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1304', '1320310', '沛县', '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1305', '1320311', '丰县', '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1306', '1320399', '其他区县', '3', '1603', '0');
INSERT INTO `yjcode_city` VALUES ('1307', '1320401', '�ԟ楼�?, '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1308', '1320402', '天宁�?, '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1309', '1320403', '�벢�堰区', '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1310', '1320404', '新北�?, '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1311', '1320405', '武进�?, '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1312', '1320406', '金坛�?, '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1313', '1320407', '溧阳�?, '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1314', '1320499', '其他区县', '3', '1608', '0');
INSERT INTO `yjcode_city` VALUES ('1315', '1320511', '高新�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1316', '1320512', '工业�ƭ区', '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1317', '1320501', '金阊�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1318', '1320502', '沧浪�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1319', '1320503', '平江�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1320', '1320504', '虎丘�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1321', '1320505', '吴中�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1322', '1320506', '相城�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1323', '1320507', '吴江�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1324', '1619', '昆山�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1325', '1320509', '太仓�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1326', '1320510', '常熟�?, '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1327', '1621', '张家港徺', '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1328', '1320599', '其他区县', '3', '1602', '0');
INSERT INTO `yjcode_city` VALUES ('1329', '1320609', '经济开发区', '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1330', '1320601', '崇川�?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1331', '1320602', '港闸�?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1332', '1320603', '海门�?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1333', '1320604', '启东�?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1334', '1320605', '��벷��?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1335', '1320606', '如皋�?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1336', '1320607', '妱���ա?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1337', '1320608', '海安ա?, '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1338', '1320699', '其他区县', '3', '1620', '0');
INSERT INTO `yjcode_city` VALUES ('1339', '1320701', '新浦�?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1340', '1320702', '连云�?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1341', '1320703', '海州�?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1342', '1320704', '赣榆ա?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1343', '1320705', '灌云ա?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1344', '1320706', '串׵�ա?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1345', '1320707', '灌南ա?, '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1346', '1320799', '其他区县', '3', '1604', '0');
INSERT INTO `yjcode_city` VALUES ('1347', '1320801', '清河�?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1348', '1320802', '清浦�?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1349', '1320803', '�벷��?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1350', '1624', '淮阴�?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1351', '1320805', '金湖ա?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1352', '1320806', '盱眙ա?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1353', '1320807', '洪泽ա?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1354', '1320808', '涟水ա?, '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1355', '1320899', '其他区县', '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1356', '1320809', '经济开发区', '3', '1606', '0');
INSERT INTO `yjcode_city` VALUES ('1357', '1320901', '亭湖�?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1358', '1320902', '盐都�?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1359', '1320903', '东台�?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1360', '1320904', '大丰�?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1361', '1320905', '射阳ա?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1362', '1320906', '�֜宁ա?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1363', '1320907', '滨海ա?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1364', '1320908', '响水ա?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1365', '1320909', '建湖ա?, '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1366', '1320999', '其他区县', '3', '13209', '0');
INSERT INTO `yjcode_city` VALUES ('1367', '1321008', '开发区', '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1368', '1321001', '维扬�?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1369', '1321002', '广����?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1370', '1321003', '�̗江�?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1371', '1321004', '仪征�?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1372', '1622', '江都�?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1373', '1321006', '高邮�?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1374', '1321007', '宝应ա?, '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1375', '1321099', '其他区县', '3', '1610', '0');
INSERT INTO `yjcode_city` VALUES ('1376', '1321101', '京口�?, '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1377', '1321102', '润州�?, '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1378', '1618', '丹����?, '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1379', '1321104', '�ج中�?, '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1380', '1617', '丹阳�?, '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1381', '1321106', '句容�?, '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1382', '1321199', '其他区县', '3', '1609', '0');
INSERT INTO `yjcode_city` VALUES ('1383', '1321201', '海����?, '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1384', '1321202', '高港�?, '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1385', '1615', '�ǖ江�?, '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1386', '1614', '泰兴�?, '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1387', '1616', '姜堰�?, '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1388', '1613', '兴化�?, '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1389', '1321299', '其他区县', '3', '1612', '0');
INSERT INTO `yjcode_city` VALUES ('1390', '1321301', '宿城�?, '3', '1605', '0');
INSERT INTO `yjcode_city` VALUES ('1391', '1321302', '宿豫�?, '3', '1605', '0');
INSERT INTO `yjcode_city` VALUES ('1392', '1623', '沭阳ա?, '3', '1605', '0');
INSERT INTO `yjcode_city` VALUES ('1393', '1321304', '泗阳ա?, '3', '1605', '0');
INSERT INTO `yjcode_city` VALUES ('1394', '1321305', '泗洪ա?, '3', '1605', '0');
INSERT INTO `yjcode_city` VALUES ('1395', '1321399', '其他区县', '3', '1605', '0');
INSERT INTO `yjcode_city` VALUES ('1396', '1330109', '下沙经济开发区', '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1397', '1330101', '上城�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1398', '1330102', '��ɟ��?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1399', '1330103', '江干�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1400', '1330104', '拱墅�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1401', '1330105', '西湖�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1402', '1933', '滨江�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1403', '1330107', '萧山�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1404', '1330108', '余�ɬ�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1405', '1911', '建德�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1406', '1948', '富阳�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1407', '1949', '临安�?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1408', '1950', '桐庐ա?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1409', '1951', '淳安ա?, '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1410', '1330199', '其他区县', '3', '1901', '0');
INSERT INTO `yjcode_city` VALUES ('1411', '1330210', '科技�ƭ区', '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1412', '1330201', '海曙�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1413', '1330202', '江东�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1414', '1330203', '江北�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1415', '1330204', '北仑�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1416', '1330205', '镇海�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1417', '1330206', '鄞州�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1418', '1920', '�顧��?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1419', '1921', '慈溪�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1420', '1330209', '奉化�?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1421', '1922', '象山ա?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1422', '1934', '宁海ա?, '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1423', '1330299', '其他区县', '3', '1905', '0');
INSERT INTO `yjcode_city` VALUES ('1424', '1330301', '鹿城�?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1425', '1330302', '龙湾�?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1426', '1330303', '瓯海�?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1427', '1907', '瑞安�?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1428', '1913', '乐清�?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1429', '1330306', '洞头ա?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1430', '1935', '永嘉ա?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1431', '1330308', '平阳ա?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1432', '1330309', '苍南ա?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1433', '1330310', '文成ա?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1434', '1330311', '泰顺ա?, '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1435', '1330399', '其他区县', '3', '1906', '0');
INSERT INTO `yjcode_city` VALUES ('1436', '1330401', '南湖�?, '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1437', '1330402', '秀城区', '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1438', '1936', '平湖�?, '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1439', '1932', '海宁�?, '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1440', '1931', '桐乡�?, '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1441', '1930', '嘉善ա?, '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1442', '1937', '海盐ա?, '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1443', '1330499', '其他区县', '3', '1903', '0');
INSERT INTO `yjcode_city` VALUES ('1444', '1330501', '吴兴�?, '3', '1902', '0');
INSERT INTO `yjcode_city` VALUES ('1445', '1330502', '南浔�?, '3', '1902', '0');
INSERT INTO `yjcode_city` VALUES ('1446', '1945', '长兴ա?, '3', '1902', '0');
INSERT INTO `yjcode_city` VALUES ('1447', '1944', '德清ա?, '3', '1902', '0');
INSERT INTO `yjcode_city` VALUES ('1448', '1946', '安吉ա?, '3', '1902', '0');
INSERT INTO `yjcode_city` VALUES ('1449', '1330599', '其他区县', '3', '1902', '0');
INSERT INTO `yjcode_city` VALUES ('1450', '1330601', '越城�?, '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1451', '1927', '诸暨�?, '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1452', '1916', '上虞�?, '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1453', '1917', '嵊州�?, '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1454', '1330605', '绍兴ա?, '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1455', '1926', '新�ǹա?, '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1456', '1330699', '其他区县', '3', '1914', '0');
INSERT INTO `yjcode_city` VALUES ('1457', '1330701', '婺城�?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1458', '1330702', '金东�?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1459', '1918', '兰溪�?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1460', '1909', '永康�?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1461', '1928', '义乌�?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1462', '1929', '东阳�?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1463', '1330707', '武义ա?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1464', '1938', '浦江ա?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1465', '1330709', '磐安ա?, '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1466', '1330799', '其他区县', '3', '1910', '0');
INSERT INTO `yjcode_city` VALUES ('1467', '1330801', '�ү城�?, '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1468', '1330802', '衢江�?, '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1469', '1915', '江山�?, '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1470', '1330804', '常山ա?, '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1471', '1330805', '开化县', '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1472', '1330806', '龙游ա?, '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1473', '1330899', '其他区县', '3', '1908', '0');
INSERT INTO `yjcode_city` VALUES ('1474', '1330901', '定海�?, '3', '1904', '0');
INSERT INTO `yjcode_city` VALUES ('1475', '1330902', '普陀�?, '3', '1904', '0');
INSERT INTO `yjcode_city` VALUES ('1476', '1330903', '岱山ա?, '3', '1904', '0');
INSERT INTO `yjcode_city` VALUES ('1477', '1330904', '嵊泗ա?, '3', '1904', '0');
INSERT INTO `yjcode_city` VALUES ('1478', '1330999', '其他区县', '3', '1904', '0');
INSERT INTO `yjcode_city` VALUES ('1479', '1924', '椒江�?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1480', '1923', '黄岩�?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1481', '1925', '路桥�?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1482', '1940', '临海�?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1483', '1912', '温岭�?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1484', '1331006', '三门ա?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1485', '1941', '天台ա?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1486', '1942', '�顱�ա?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1487', '1331009', '玉环ա?, '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1488', '1331099', '其他区县', '3', '1939', '0');
INSERT INTO `yjcode_city` VALUES ('1489', '1331101', '�ǲ都�?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1490', '1331102', '龙泉�?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1491', '1331103', '缙云ա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1492', '1331104', '�ǒ田ա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1493', '1331105', '云和ա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1494', '1331106', '�ς�ǹա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1495', '1331107', '松阳ա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1496', '1331108', '庆元ա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1497', '1331109', '景宁畲族���治ա?, '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1498', '1331199', '其他区县', '3', '1943', '0');
INSERT INTO `yjcode_city` VALUES ('1499', '1340101', '庐阳�?, '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1500', '1340102', '瑶海�?, '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1501', '1340103', '蜀山区', '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1502', '1340104', '包河�?, '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1503', '1340105', '长丰ա?, '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1504', '1340106', '��东ա?, '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1505', '1340107', '��西ա?, '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1506', '1340199', '其他区县', '3', '1501', '0');
INSERT INTO `yjcode_city` VALUES ('1507', '1340201', '镲׹��?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1508', '1340202', '弋江�?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1509', '1340203', '三山�?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1510', '1340204', '鸠江�?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1511', '1340205', '芲׹�ա?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1512', '1340206', '繁�ǹա?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1513', '1340207', '南���ա?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1514', '1340299', '其他区县', '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1515', '1340208', '高新�?, '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1516', '1340209', '经济开发区', '3', '1508', '0');
INSERT INTO `yjcode_city` VALUES ('1517', '1340308', '高新技���开发区', '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1518', '1340309', '经济开发区', '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1519', '1340301', '蚌山�?, '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1520', '1340302', '�顭�湖区', '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1521', '1340303', '禹�ϸ�?, '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1522', '1340304', '淮上�?, '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1523', '1340305', '��远县', '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1524', '1340306', '五河ա?, '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1525', '1340307', '�ƺ镇ա?, '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1526', '1340399', '其他区县', '3', '1506', '0');
INSERT INTO `yjcode_city` VALUES ('1527', '1340407', '开发区', '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1528', '1340401', '田家庵区', '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1529', '1340402', '大�벌�', '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1530', '1340403', '谢家��区', '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1531', '1340404', '八公山区', '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1532', '1340405', '潘集�?, '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1533', '1340406', '凤台ա?, '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1534', '1340499', '其他区县', '3', '1503', '0');
INSERT INTO `yjcode_city` VALUES ('1535', '1340505', '经济技���开发区', '3', '1510', '0');
INSERT INTO `yjcode_city` VALUES ('1536', '1340501', '��山�?, '3', '1510', '0');
INSERT INTO `yjcode_city` VALUES ('1537', '1340502', '花山�?, '3', '1510', '0');
INSERT INTO `yjcode_city` VALUES ('1538', '1340503', '金家庄区', '3', '1510', '0');
INSERT INTO `yjcode_city` VALUES ('1539', '1340504', '当涂ա?, '3', '1510', '0');
INSERT INTO `yjcode_city` VALUES ('1540', '1340599', '其他区县', '3', '1510', '0');
INSERT INTO `yjcode_city` VALUES ('1541', '1340605', '南湖开发区', '3', '1502', '0');
INSERT INTO `yjcode_city` VALUES ('1542', '1340601', '相山�?, '3', '1502', '0');
INSERT INTO `yjcode_city` VALUES ('1543', '1340602', '杜集�?, '3', '1502', '0');
INSERT INTO `yjcode_city` VALUES ('1544', '1340603', '������?, '3', '1502', '0');
INSERT INTO `yjcode_city` VALUES ('1545', '1340604', '濉溪ա?, '3', '1502', '0');
INSERT INTO `yjcode_city` VALUES ('1546', '1340699', '其他区县', '3', '1502', '0');
INSERT INTO `yjcode_city` VALUES ('1547', '1340701', '�М官山区', '3', '1514', '0');
INSERT INTO `yjcode_city` VALUES ('1548', '1340702', '��子山区', '3', '1514', '0');
INSERT INTO `yjcode_city` VALUES ('1549', '1340703', '郊区', '3', '1514', '0');
INSERT INTO `yjcode_city` VALUES ('1550', '1340704', '�М���ա?, '3', '1514', '0');
INSERT INTO `yjcode_city` VALUES ('1551', '1340799', '其他区县', '3', '1514', '0');
INSERT INTO `yjcode_city` VALUES ('1552', '1340814', '开发区', '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1553', '1340801', '迎江�?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1554', '1340802', '大观�?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1555', '1340804', '桐城�?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1556', '1340805', '��宁县', '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1557', '1340806', '�Ϊ��ա?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1558', '1340807', '潜山ա?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1559', '1340808', '太湖ա?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1560', '1340809', '宿潧ա?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1561', '1340810', '���江ա?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1562', '1340811', '岳西ա?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1563', '1340813', '����?, '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1564', '1340899', '其他区县', '3', '1516', '0');
INSERT INTO `yjcode_city` VALUES ('1565', '1340901', '屯溪�?, '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1566', '1340902', '黄山�?, '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1567', '1340903', '徽州�?, '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1568', '1340904', '�顎�', '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1569', '1340905', '休宁ա?, '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1570', '1340906', '黟县', '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1571', '1340907', '祁门ա?, '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1572', '1340999', '其他区县', '3', '1507', '0');
INSERT INTO `yjcode_city` VALUES ('1573', '1341009', '经济开发区', '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1574', '1341010', '�ج子工业开发区', '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1575', '1341001', '琅琊�?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1576', '1341002', '南谯�?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1577', '1517', '明光�?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1578', '1341004', '天����?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1579', '1341005', '来安ա?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1580', '1341006', '全椒ա?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1581', '1341007', '�뵿�ա?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1582', '1341008', '凤阳ա?, '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1583', '1341099', '其他区县', '3', '1505', '0');
INSERT INTO `yjcode_city` VALUES ('1584', '1341101', '颍州�?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1585', '1341102', '�ո���?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1586', '1341103', '颍泉�?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1587', '1341104', '界首�?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1588', '1341105', '临泉ա?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1589', '1341106', '太和ա?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1590', '1341107', '�֜南ա?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1591', '1341108', '�ո��ա?, '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1592', '1341199', '其他区县', '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1593', '1341109', '经济技���开发区', '3', '1513', '0');
INSERT INTO `yjcode_city` VALUES ('1594', '1341306', '民营开发区', '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1595', '1341301', '居巢�?, '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1596', '1341302', '庐江ա?, '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1597', '1341303', '�ߠ为ա?, '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1598', '1341304', '含山ա?, '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1599', '1341305', '和县', '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1600', '1341399', '其他区县', '3', '1511', '0');
INSERT INTO `yjcode_city` VALUES ('1601', '1341408', '经济开发区', '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1602', '1341401', '金安�?, '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1603', '1341402', '裕安�?, '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1604', '1341403', '寿县', '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1605', '1341404', '霍邱ա?, '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1606', '1341405', '舒城ա?, '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1607', '1341406', '金寨ա?, '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1608', '1341407', '霍山ա?, '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1609', '1341499', '其他区县', '3', '1521', '0');
INSERT INTO `yjcode_city` VALUES ('1610', '1341501', '谯城�?, '3', '1504', '0');
INSERT INTO `yjcode_city` VALUES ('1611', '1341502', '涡阳ա?, '3', '1504', '0');
INSERT INTO `yjcode_city` VALUES ('1612', '1341503', '�顟�ա?, '3', '1504', '0');
INSERT INTO `yjcode_city` VALUES ('1613', '1341504', '利辛ա?, '3', '1504', '0');
INSERT INTO `yjcode_city` VALUES ('1614', '1341599', '其他区县', '3', '1504', '0');
INSERT INTO `yjcode_city` VALUES ('1615', '1512', '贵����?, '3', '1519', '0');
INSERT INTO `yjcode_city` VALUES ('1616', '1341602', '东�߿ա?, '3', '1519', '0');
INSERT INTO `yjcode_city` VALUES ('1617', '1341603', '石台ա?, '3', '1519', '0');
INSERT INTO `yjcode_city` VALUES ('1618', '1341604', '�ǒ阳ա?, '3', '1519', '0');
INSERT INTO `yjcode_city` VALUES ('1619', '1341699', '其他区县', '3', '1519', '0');
INSERT INTO `yjcode_city` VALUES ('1620', '1341701', '宣州�?, '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1621', '1341702', '宁国�?, '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1622', '1341703', '郎溪ա?, '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1623', '1341704', '广德ա?, '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1624', '1341705', '泾县', '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1625', '1341706', '�ߌ德ա?, '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1626', '1341707', '绩溪ա?, '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1627', '1341799', '其他区县', '3', '1515', '0');
INSERT INTO `yjcode_city` VALUES ('1628', '1350101', '鼓楼�?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1629', '1350102', '台江�?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1630', '1350103', '��챱�?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1631', '1350104', '马尾�?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1632', '1350105', '��ɮ��?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1633', '2111', '福清�?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1634', '2120', '长乐�?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1635', '2122', '闽侯ա?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1636', '2116', '连江ա?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1637', '2121', '罗源ա?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1638', '2123', '闽清ա?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1639', '2124', '永泰ա?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1640', '2125', '平潭ա?, '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1641', '1350199', '其他区县', '3', '2101', '0');
INSERT INTO `yjcode_city` VALUES ('1642', '1350201', '��明�?, '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1643', '1350202', '海沧�?, '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1644', '1350203', '湖里�?, '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1645', '1350204', '�����?, '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1646', '1350205', '同安�?, '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1647', '1350206', '翔安�?, '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1648', '1350299', '其他区县', '3', '2105', '0');
INSERT INTO `yjcode_city` VALUES ('1649', '1350301', '城厢�?, '3', '2103', '0');
INSERT INTO `yjcode_city` VALUES ('1650', '1350302', '涵江�?, '3', '2103', '0');
INSERT INTO `yjcode_city` VALUES ('1651', '1350303', '��城�?, '3', '2103', '0');
INSERT INTO `yjcode_city` VALUES ('1652', '1350304', '秀屿区', '3', '2103', '0');
INSERT INTO `yjcode_city` VALUES ('1653', '1350305', '仙游ա?, '3', '2103', '0');
INSERT INTO `yjcode_city` VALUES ('1654', '1350399', '其他区县', '3', '2103', '0');
INSERT INTO `yjcode_city` VALUES ('1655', '1350401', '梅列�?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1656', '1350402', '三元�?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1657', '2126', '永安�?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1658', '2134', '明溪ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1659', '2130', '清流ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1660', '2131', '宁化ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1661', '2128', '大田ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1662', '2129', '尤溪ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1663', '2127', '�顎�', '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1664', '2133', '将乐ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1665', '2117', '泰宁ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1666', '2132', '建宁ա?, '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1667', '1350499', '其他区县', '3', '2102', '0');
INSERT INTO `yjcode_city` VALUES ('1668', '1350501', '丰泽�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1669', '1350502', '鲤城�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1670', '1350503', '洛江�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1671', '1350504', '泉港�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1672', '2112', '石狮�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1673', '2115', '晋江�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1674', '1350507', '南安�?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1675', '1350508', '惠安ա?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1676', '1350509', '安溪ա?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1677', '1350510', '永春ա?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1678', '1350511', '德化ա?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1679', '1350512', '金门ա?, '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1680', '1350599', '其他区县', '3', '2104', '0');
INSERT INTO `yjcode_city` VALUES ('1681', '1350601', '芗城�?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1682', '1350602', '龙文�?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1683', '1350603', '龙海�?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1684', '1350604', '云霄ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1685', '1350605', '漳浦ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1686', '1350606', '诏安ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1687', '1350607', '长泰ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1688', '1350608', '东山ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1689', '2118', '南靖ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1690', '2119', '平和ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1691', '1350611', '华安ա?, '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1692', '1350699', '其他区县', '3', '2106', '0');
INSERT INTO `yjcode_city` VALUES ('1693', '1350701', '延平�?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1694', '1350702', '�̵武�?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1695', '2114', '武夷山徺', '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1696', '2108', '建瓯�?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1697', '1350705', '建阳�?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1698', '1350706', '顺�ǹա?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1699', '1350707', '浦城ա?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1700', '1350708', '光泽ա?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1701', '1350709', '松溪ա?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1702', '1350710', '政和ա?, '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1703', '1350799', '其他区县', '3', '2107', '0');
INSERT INTO `yjcode_city` VALUES ('1704', '1350801', '新����?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1705', '2135', '漳平�?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1706', '2137', '长汀ա?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1707', '1350804', '永定ա?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1708', '2136', '上�ɬա?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1709', '1350806', '武平ա?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1710', '2138', '连城ա?, '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1711', '1350899', '其他区县', '3', '2113', '0');
INSERT INTO `yjcode_city` VALUES ('1712', '1350901', '蕉城�?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1713', '1350902', '福安�?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1714', '2110', '福鼎�?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1715', '1350904', '寿宁ա?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1716', '1350905', '霞浦ա?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1717', '1350906', '�Ҙ���ա?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1718', '1350907', '屏南ա?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1719', '1350908', '古田ա?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1720', '1350909', '�ͨ宁ա?, '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1721', '1350999', '其他区县', '3', '2109', '0');
INSERT INTO `yjcode_city` VALUES ('1722', '1360101', '串׹��?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1723', '1360102', '西湖�?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1724', '1360103', '�ǒ云谱区', '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1725', '2015', '湾里�?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1726', '1360105', '�ǒ山湖区', '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1727', '2014', '南�ǹա?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1728', '2016', '新建ա?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1729', '1360108', '安义ա?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1730', '1360109', '进贤ա?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1731', '1360199', '其他区县', '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1732', '1360110', '高新技���开发区', '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1733', '1360111', '红谷滩新�?, '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1734', '1360112', '昌北经济技���开发区', '3', '2001', '0');
INSERT INTO `yjcode_city` VALUES ('1735', '1360201', '珠山�?, '3', '2003', '0');
INSERT INTO `yjcode_city` VALUES ('1736', '1360202', '昌江�?, '3', '2003', '0');
INSERT INTO `yjcode_city` VALUES ('1737', '1360203', '乐平�?, '3', '2003', '0');
INSERT INTO `yjcode_city` VALUES ('1738', '1360204', '浮梁ա?, '3', '2003', '0');
INSERT INTO `yjcode_city` VALUES ('1739', '1360299', '其他区县', '3', '2003', '0');
INSERT INTO `yjcode_city` VALUES ('1740', '1360301', '安源�?, '3', '2006', '0');
INSERT INTO `yjcode_city` VALUES ('1741', '1360302', '������?, '3', '2006', '0');
INSERT INTO `yjcode_city` VALUES ('1742', '1360303', '�ǲ花ա?, '3', '2006', '0');
INSERT INTO `yjcode_city` VALUES ('1743', '1360304', '上栗ա?, '3', '2006', '0');
INSERT INTO `yjcode_city` VALUES ('1744', '1360305', '芦溪ա?, '3', '2006', '0');
INSERT INTO `yjcode_city` VALUES ('1745', '1360399', '其他区县', '3', '2006', '0');
INSERT INTO `yjcode_city` VALUES ('1746', '1360401', '浔阳�?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1747', '1360402', '庐山�?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1748', '1360403', '瑞�ǹ�?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1749', '1360404', '九江ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1750', '1360405', '武宁ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1751', '1360406', '修水ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1752', '1360407', '永修ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1753', '1360408', '德安ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1754', '1360409', '星子ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1755', '1360410', '都�ǹա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1756', '1360411', '湖口ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1757', '1360412', '彭泽ա?, '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1758', '1360499', '其他区县', '3', '2002', '0');
INSERT INTO `yjcode_city` VALUES ('1759', '1360501', '渝水�?, '3', '2005', '0');
INSERT INTO `yjcode_city` VALUES ('1760', '1360502', '分宜ա?, '3', '2005', '0');
INSERT INTO `yjcode_city` VALUES ('1761', '1360599', '其他区县', '3', '2005', '0');
INSERT INTO `yjcode_city` VALUES ('1762', '1360601', '���湖�?, '3', '2004', '0');
INSERT INTO `yjcode_city` VALUES ('1763', '2013', '贵溪�?, '3', '2004', '0');
INSERT INTO `yjcode_city` VALUES ('1764', '1360603', '余江ա?, '3', '2004', '0');
INSERT INTO `yjcode_city` VALUES ('1765', '1360699', '其他区县', '3', '2004', '0');
INSERT INTO `yjcode_city` VALUES ('1766', '1360701', '章贡�?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1767', '1360702', '�Ϊ���?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1768', '1360703', '南康�?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1769', '1360704', '赣县', '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1770', '1360705', '信丰ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1771', '1360706', '大余ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1772', '1360707', '上犹ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1773', '1360708', '崇义ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1774', '1360709', '安远ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1775', '1360710', '�額�ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1776', '1360711', '�벍�ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1777', '1360712', '全南ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1778', '1360713', '宁都ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1779', '1360714', '于都ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1780', '1360715', '兴国ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1781', '1360716', '会�ǹա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1782', '1360717', '寻乌ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1783', '1360718', '石城ա?, '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1784', '1360799', '其他区县', '3', '2008', '0');
INSERT INTO `yjcode_city` VALUES ('1785', '1360801', '吉州�?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1786', '1360802', '�ǒ�ʦ�?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1787', '2010', '井���山徺', '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1788', '1360804', '吉安ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1789', '1360805', '吉水ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1790', '1360806', '峡江ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1791', '1360807', '新干ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1792', '1360808', '永丰ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1793', '1360809', '泰和ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1794', '1360810', '�ς川ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1795', '1360811', '万安ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1796', '1360812', '安福ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1797', '1360813', '永新ա?, '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1798', '1360899', '其他区县', '3', '2007', '0');
INSERT INTO `yjcode_city` VALUES ('1799', '1360901', '袁州�?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1800', '1360902', '丰城�?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1801', '1360903', '樟树�?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1802', '1360904', '��뮉�?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1803', '1360905', '奉新ա?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1804', '1360906', '临ѽ�ա?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1805', '1360907', '上���ա?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1806', '1360908', '宜丰ա?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1807', '1360909', '�ǖ安ա?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1808', '1360910', '�М鼓ա?, '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1809', '1360999', '其他区县', '3', '2012', '0');
INSERT INTO `yjcode_city` VALUES ('1810', '1361001', '临川�?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1811', '1361002', '南城ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1812', '1361003', '黎川ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1813', '1361004', '南丰ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1814', '1361005', '崇仁ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1815', '1361006', '乐安ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1816', '1361007', '宜黄ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1817', '1361008', '金溪ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1818', '1361009', '资溪ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1819', '1361010', '东乡ա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1820', '1361011', '广�ǹա?, '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1821', '1361099', '其他区县', '3', '2009', '0');
INSERT INTO `yjcode_city` VALUES ('1822', '1361101', '信州�?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1823', '1361102', '德兴�?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1824', '1361103', '上饶ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1825', '1361104', '广丰ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1826', '1361105', '玉山ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1827', '1361106', '�Ѕ山ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1828', '1361107', '横峰ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1829', '1361108', '弋阳ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1830', '1361109', '�项�ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1831', '1361110', '鄱阳ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1832', '1361111', '万年ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1833', '1361112', '婺源ա?, '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1834', '1361199', '其他区县', '3', '2011', '0');
INSERT INTO `yjcode_city` VALUES ('1835', '1370111', '高新�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1836', '1370101', '帱����?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1837', '1370102', 'ա�下�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1838', '1370103', '槐荫�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1839', '1370104', '天桥�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1840', '1370105', 'ա�城�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1841', '1370106', '长清�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1842', '1370107', '章丘�?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1843', '1370108', '平阴ա?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1844', '1370109', '济阳ա?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1845', '1370110', '商河ա?, '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1846', '1370199', '其他区县', '3', '1101', '0');
INSERT INTO `yjcode_city` VALUES ('1847', '1370201', '市南�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1848', '1370202', '市北�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1849', '1370203', '�ƛ方�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1850', '1370204', '黄岛�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1851', '1370205', '崂山�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1852', '1370206', '城阳�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1853', '1370207', '李沧�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1854', '1370208', '胶州�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1855', '1116', '即墨�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1856', '1370210', '平度�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1857', '1370211', '胶南�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1858', '1370212', '�Ǳ西�?, '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1859', '1370299', '其他区县', '3', '1106', '0');
INSERT INTO `yjcode_city` VALUES ('1860', '1370301', '张店�?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1861', '1370302', '淄川�?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1862', '1370303', '�벱��?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1863', '1370304', '临淄�?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1864', '1370305', '�ͨ村�?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1865', '1370306', '��쏰ա?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1866', '1370307', '高青ա?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1867', '1370308', '沂源ա?, '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1868', '1370399', '其他区县', '3', '1104', '0');
INSERT INTO `yjcode_city` VALUES ('1869', '1370401', '帱����?, '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1870', '1370402', '薛城�?, '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1871', '1370403', '峄城�?, '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1872', '1370404', '台儿庄区', '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1873', '1370405', '山亭�?, '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1874', '1370406', '滕州�?, '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1875', '1370499', '其他区县', '3', '13704', '0');
INSERT INTO `yjcode_city` VALUES ('1876', '1370501', '东营�?, '3', '1105', '0');
INSERT INTO `yjcode_city` VALUES ('1877', '1370502', '河口�?, '3', '1105', '0');
INSERT INTO `yjcode_city` VALUES ('1878', '1370503', '垦利ա?, '3', '1105', '0');
INSERT INTO `yjcode_city` VALUES ('1879', '1370504', '利津ա?, '3', '1105', '0');
INSERT INTO `yjcode_city` VALUES ('1880', '1370505', '广饶ա?, '3', '1105', '0');
INSERT INTO `yjcode_city` VALUES ('1881', '1370599', '其他区县', '3', '1105', '0');
INSERT INTO `yjcode_city` VALUES ('1882', '1370613', '开发区', '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1883', '1370601', '�Ǳ山�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1884', '1370602', '芝罘�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1885', '1370603', '福山�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1886', '1370604', '牟平�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1887', '1370605', '�ݖ霞�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1888', '1370606', '海阳�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1889', '1370607', '�顏��?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1890', '1111', '�Ǳ阳�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1891', '1370609', '�Ǳ州�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1892', '1370610', '蓬莱�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1893', '1114', '招远�?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1894', '1370612', '长岛ա?, '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1895', '1370699', '其他区县', '3', '1110', '0');
INSERT INTO `yjcode_city` VALUES ('1896', '1370801', '潍城�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1897', '1370802', '寒亭�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1898', '1370803', '坊子�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1899', '1370804', '奎文�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1900', '1370805', '安丘�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1901', '1370806', '昌邑�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1902', '1370807', '��믆�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1903', '1370808', '�ǒ州�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1904', '1370809', '诸城�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1905', '1370810', '寿光�?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1906', '1370811', '临��ա?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1907', '1370812', '昌乐ա?, '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1908', '1370899', '其他区县', '3', '1103', '0');
INSERT INTO `yjcode_city` VALUES ('1909', '1370905', '高新技���产�벼�发区', '3', '1113', '0');
INSERT INTO `yjcode_city` VALUES ('1910', '1370901', '环翠�?, '3', '1113', '0');
INSERT INTO `yjcode_city` VALUES ('1911', '1370902', '文���?, '3', '1113', '0');
INSERT INTO `yjcode_city` VALUES ('1912', '1370903', '��成�?, '3', '1113', '0');
INSERT INTO `yjcode_city` VALUES ('1913', '1370904', '乳山�?, '3', '1113', '0');
INSERT INTO `yjcode_city` VALUES ('1914', '1370999', '其他区县', '3', '1113', '0');
INSERT INTO `yjcode_city` VALUES ('1915', '1371001', '帱����?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1916', '1371002', '任城�?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1917', '1371003', '��阜�?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1918', '1371004', '兖州�?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1919', '1371005', '�̹城�?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1920', '1371006', '微山ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1921', '1371007', '鱼台ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1922', '1371008', '金乡ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1923', '1371009', '嘉祥ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1924', '1371010', '汶上ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1925', '1371011', '泗水ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1926', '1371012', '梁山ա?, '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1927', '1371099', '其他区县', '3', '13710', '0');
INSERT INTO `yjcode_city` VALUES ('1928', '1371101', '泰山�?, '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1929', '1371102', '岱岳�?, '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1930', '1371103', '新泰�?, '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1931', '1371104', '��城�?, '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1932', '1371105', '宁阳ա?, '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1933', '1371106', '东平ա?, '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1934', '1371199', '其他区县', '3', '13711', '0');
INSERT INTO `yjcode_city` VALUES ('1935', '1371205', '开发区', '3', '1108', '0');
INSERT INTO `yjcode_city` VALUES ('1936', '1371201', '串׸��?, '3', '1108', '0');
INSERT INTO `yjcode_city` VALUES ('1937', '1371202', '�벱��?, '3', '1108', '0');
INSERT INTO `yjcode_city` VALUES ('1938', '1371203', '五莲ա?, '3', '1108', '0');
INSERT INTO `yjcode_city` VALUES ('1939', '1371204', '�ǒ县', '3', '1108', '0');
INSERT INTO `yjcode_city` VALUES ('1940', '1371299', '其他区县', '3', '1108', '0');
INSERT INTO `yjcode_city` VALUES ('1941', '1371303', '开发区', '3', '1112', '0');
INSERT INTO `yjcode_city` VALUES ('1942', '1371301', '�Ǳ城�?, '3', '1112', '0');
INSERT INTO `yjcode_city` VALUES ('1943', '1371302', '�Ԣ城�?, '3', '1112', '0');
INSERT INTO `yjcode_city` VALUES ('1944', '1371399', '其他区县', '3', '1112', '0');
INSERT INTO `yjcode_city` VALUES ('1945', '1371401', '兰山�?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1946', '1371402', '罗����?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1947', '1371403', '沴����?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1948', '1371404', '郯城ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1949', '1371405', '苍山ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1950', '1371406', '�ǒ南ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1951', '1371407', '沂水ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1952', '1371408', '蒙阴ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1953', '1371409', '平邑ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1954', '1371410', '费县', '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1955', '1371411', '沂南ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1956', '1371412', '临沭ա?, '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1957', '1371499', '其他区县', '3', '1107', '0');
INSERT INTO `yjcode_city` VALUES ('1958', '1371501', '德城�?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1959', '1371502', '乐����?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1960', '1371503', '禹城�?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1961', '1371504', '陵县', '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1962', '1371505', '平�ʦա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1963', '1371506', '夏津ա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1964', '1371507', '武城ա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1965', '1371508', '齐河ա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1966', '1371509', '临邑ա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1967', '1371510', '宁津ա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1968', '1371511', '庆云ա?, '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1969', '1371599', '其他区县', '3', '1102', '0');
INSERT INTO `yjcode_city` VALUES ('1970', '1371601', '串�ǹ府区', '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1971', '1371602', '临清�?, '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1972', '1371603', '�ֳ谷ա?, '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1973', '1371604', '���뎿', '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1974', '1371605', '���平ա?, '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1975', '1371606', '东阿ա?, '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1976', '1371607', '冠县', '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1977', '1371608', '��딐ա?, '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1978', '1371699', '其他区县', '3', '1115', '0');
INSERT INTO `yjcode_city` VALUES ('1979', '1371701', '滨城�?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1980', '1371702', '惠民ա?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1981', '1371703', '�ִ���ա?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1982', '1371704', '�ߠ棣ա?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1983', '1371705', '沾化ա?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1984', '1371706', '�벅�ա?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1985', '1371707', '�̹平ա?, '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1986', '1371799', '其他区县', '3', '1109', '0');
INSERT INTO `yjcode_city` VALUES ('1987', '1371801', '牡丹�?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1988', '1371802', '��县', '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1989', '1371803', '定陶ա?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1990', '1371804', '成武ա?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1991', '1371805', '单县', '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1992', '1371806', '巨鵱ա?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1993', '1371807', '��쟎ա?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1994', '1371808', '鄄城ա?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1995', '1371809', '串ט�ա?, '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1996', '1371899', '其他区县', '3', '13718', '0');
INSERT INTO `yjcode_city` VALUES ('1997', '1410115', '高新技���开发区', '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('1998', '1410114', '经济技���开发区', '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('1999', '1410113', '郑东新区', '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2000', '1410101', '中�ʦ�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2001', '1410102', '二七�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2002', '1410103', '管城�ƞ族�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2003', '1410104', '金水�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2004', '1410105', '上街�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2005', '1410106', '惠济�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2006', '1410107', '新郑�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2007', '1410108', '登封�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2008', '1410109', '新密�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2009', '1410110', '巩义�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2010', '1410111', '��阳�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2011', '1410112', '中牟ա?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2012', '1410199', '其他区县', '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2013', '1410116', '出口�ɠ工�?, '3', '1401', '0');
INSERT INTO `yjcode_city` VALUES ('2014', '1410201', '鼓楼�?, '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2015', '1410202', '龙亭�?, '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2016', '1410203', '顺河�ƞ族�?, '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2017', '1410204', '禹王台区', '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2018', '1410205', '金明�?, '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2019', '1410206', '杞县', '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2020', '1410207', '��뵮�ա?, '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2021', '1410208', '尉氏ա?, '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2022', '1410209', '开封县', '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2023', '1410210', '兰考县', '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2024', '1410299', '其他区县', '3', '1408', '0');
INSERT INTO `yjcode_city` VALUES ('2025', '1410411', '新城�?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2026', '1410401', '新华�?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2027', '1410402', '卫东�?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2028', '1410403', '湛河�?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2029', '1410404', '石龙�?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2030', '1410405', '�Ϊ���?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2031', '1410406', '汝州�?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2032', '1410407', '宝丰ա?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2033', '1410408', '叶县', '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2034', '1410409', '鲁山ա?, '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2035', '1410410', '郏县', '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2036', '1410499', '其他区县', '3', '1413', '0');
INSERT INTO `yjcode_city` VALUES ('2037', '1410501', '山阳�?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2038', '1410502', '解放�?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2039', '1410503', '中站�?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2040', '1410504', '马村�?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2041', '1410505', '孟州�?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2042', '1410506', '沁阳�?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2043', '1410507', '修武ա?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2044', '1410508', '博爱ա?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2045', '1410509', '武陟ա?, '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2046', '1410510', '温县', '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2047', '1410599', '其他区县', '3', '1404', '0');
INSERT INTO `yjcode_city` VALUES ('2048', '1410601', '淇滨�?, '3', '1411', '0');
INSERT INTO `yjcode_city` VALUES ('2049', '1410602', '山城�?, '3', '1411', '0');
INSERT INTO `yjcode_city` VALUES ('2050', '1410603', '鹤山�?, '3', '1411', '0');
INSERT INTO `yjcode_city` VALUES ('2051', '1410604', '�벎�', '3', '1411', '0');
INSERT INTO `yjcode_city` VALUES ('2052', '1410605', '淇县', '3', '1411', '0');
INSERT INTO `yjcode_city` VALUES ('2053', '1410699', '其他区县', '3', '1411', '0');
INSERT INTO `yjcode_city` VALUES ('2054', '1410701', '卫滨�?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2055', '1410702', '红����?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2056', '1410703', '凤泉�?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2057', '1410704', '牧鵱�?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2058', '1410705', '卫�Ե�?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2059', '1410706', '辉县�?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2060', '1410707', '新乡ա?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2061', '1410708', '�Ƿ嘉ա?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2062', '1410709', 'ա�阳ա?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2063', '1410710', '延津ա?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2064', '1410711', '封丘ա?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2065', '1410712', '长垣ա?, '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2066', '1410799', '其他区县', '3', '1405', '0');
INSERT INTO `yjcode_city` VALUES ('2067', '1410801', '北关�?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2068', '1410802', '文峰�?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2069', '1410803', '殷都�?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2070', '1410804', '�顮��?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2071', '1410805', '林州�?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2072', '1410806', '安阳ա?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2073', '1410807', '汤阴ա?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2074', '1410808', '滑县', '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2075', '1410809', '内黄ա?, '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2076', '1410899', '其他区县', '3', '1406', '0');
INSERT INTO `yjcode_city` VALUES ('2077', '1410901', '华龙�?, '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2078', '1410902', '清丰ա?, '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2079', '1410903', '南乐ա?, '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2080', '1410904', '���县', '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2081', '1410905', '台前ա?, '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2082', '1410906', '濮阳ա?, '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2083', '1410999', '其他区县', '3', '1414', '0');
INSERT INTO `yjcode_city` VALUES ('2084', '1411001', '魏都�?, '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2085', '1411002', '禹州�?, '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2086', '1411003', '长����?, '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2087', '1411004', '许�ǹա?, '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2088', '1411005', '鄢���ա?, '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2089', '1411006', '襄城ա?, '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2090', '1411099', '其他区县', '3', '1409', '0');
INSERT INTO `yjcode_city` VALUES ('2091', '1411101', '源汇�?, '3', '1407', '0');
INSERT INTO `yjcode_city` VALUES ('2092', '1411102', '郾城�?, '3', '1407', '0');
INSERT INTO `yjcode_city` VALUES ('2093', '1411103', '召����?, '3', '1407', '0');
INSERT INTO `yjcode_city` VALUES ('2094', '1411104', '�Ϊ��ա?, '3', '1407', '0');
INSERT INTO `yjcode_city` VALUES ('2095', '1411105', '临颍ա?, '3', '1407', '0');
INSERT INTO `yjcode_city` VALUES ('2096', '1411199', '其他区县', '3', '1407', '0');
INSERT INTO `yjcode_city` VALUES ('2097', '1411201', '湖滨�?, '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2098', '1411202', '义马�?, '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2099', '1411203', '灵宝�?, '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2100', '1411204', '渑���ա?, '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2101', '1411205', '陕县', '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2102', '1411206', '卢氏ա?, '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2103', '1411299', '其他区县', '3', '1402', '0');
INSERT INTO `yjcode_city` VALUES ('2104', '1411314', '南阳油田', '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2105', '1411301', '卧龙�?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2106', '1411302', '宛城�?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2107', '1411303', '���췞�?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2108', '1411304', '南��ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2109', '1411305', '方城ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2110', '1411306', '西峡ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2111', '1411307', '镇平ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2112', '1411308', '内乡ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2113', '1411309', '淅川ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2114', '1411310', '社���ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2115', '1411311', '唐河ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2116', '1411312', '新鵱ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2117', '1411313', '桐柏ա?, '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2118', '1411399', '其他区县', '3', '1415', '0');
INSERT INTO `yjcode_city` VALUES ('2119', '1411401', '梁园�?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2120', '1411402', '�Ԣ阳�?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2121', '1411403', '永城�?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2122', '1411404', '虞城ա?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2123', '1411405', '民权ա?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2124', '1411406', '宁���ա?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2125', '1411407', '�Ԣ县', '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2126', '1411408', '夏邑ա?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2127', '1411409', '���럎ա?, '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2128', '1411499', '其他区县', '3', '1412', '0');
INSERT INTO `yjcode_city` VALUES ('2129', '1411601', '川汇�?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2130', '1411602', '项城�?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2131', '1411603', '�ض沟ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2132', '1411604', '西华ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2133', '1411605', '商水ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2134', '1411606', '太康ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2135', '1411607', '鹿邑ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2136', '1411608', '郸城ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2137', '1411609', '淮阳ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2138', '1411610', '沈丘ա?, '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2139', '1411699', '其他区县', '3', '14116', '0');
INSERT INTO `yjcode_city` VALUES ('2140', '1411701', '驿城�?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2141', '1411702', '确山ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2142', '1411703', '泌阳ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2143', '1411704', '�ς平ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2144', '1411705', '西平ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2145', '1411706', '上��ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2146', '1411707', '汝南ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2147', '1411708', '平舆ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2148', '1411709', '新��ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2149', '1411710', '正阳ա?, '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2150', '1411799', '其他区县', '3', '1416', '0');
INSERT INTO `yjcode_city` VALUES ('2151', '1420201', '黄石港区', '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2152', '1420202', '西塞山区', '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2153', '1420203', '下陆�?, '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2154', '1420204', '�Ё山�?, '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2155', '1420205', '大冶�?, '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2156', '1420206', '�ֳ新ա?, '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2157', '1420299', '其他区县', '3', '1708', '0');
INSERT INTO `yjcode_city` VALUES ('2158', '1420301', '襄城�?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2159', '1420302', '樊城�?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2160', '1420303', '襄阳�?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2161', '1420304', 'Կ�河口徺', '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2162', '1420305', '枣阳�?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2163', '1420306', '宜城�?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2164', '1420307', '南漳ա?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2165', '1420308', '谷城ա?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2166', '1420309', '保康ա?, '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2167', '1420399', '其他区县', '3', '1706', '0');
INSERT INTO `yjcode_city` VALUES ('2168', '1420401', '张湾�?, '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2169', '1420402', '���箭�?, '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2170', '1420403', '丹江口徺', '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2171', '1420404', '郧县', '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2172', '1420405', '竹山ա?, '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2173', '1420406', '房县', '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2174', '1420407', '郧西ա?, '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2175', '1420408', '竹溪ա?, '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2176', '1420499', '其他区县', '3', '1702', '0');
INSERT INTO `yjcode_city` VALUES ('2177', '1420509', '城南开发区', '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2178', '1420501', '�顾��?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2179', '1420502', '��州�?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2180', '1420503', '石首�?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2181', '1420504', '洪湖�?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2182', '1420505', '松滋�?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2183', '1420506', '江���ա?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2184', '1420507', '公安ա?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2185', '1420508', '监利ա?, '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2186', '1420599', '其他区县', '3', '1714', '0');
INSERT INTO `yjcode_city` VALUES ('2187', '1420701', '东宝�?, '3', '1704', '0');
INSERT INTO `yjcode_city` VALUES ('2188', '1420702', '掇刀�?, '3', '1704', '0');
INSERT INTO `yjcode_city` VALUES ('2189', '1420703', '�ԟ祥�?, '3', '1704', '0');
INSERT INTO `yjcode_city` VALUES ('2190', '1420704', '沙洋ա?, '3', '1704', '0');
INSERT INTO `yjcode_city` VALUES ('2191', '1420705', '京山ա?, '3', '1704', '0');
INSERT INTO `yjcode_city` VALUES ('2192', '1420799', '其他区县', '3', '1704', '0');
INSERT INTO `yjcode_city` VALUES ('2193', '1420801', '鄂城�?, '3', '1710', '0');
INSERT INTO `yjcode_city` VALUES ('2194', '1420802', '梁子湖区', '3', '1710', '0');
INSERT INTO `yjcode_city` VALUES ('2195', '1420803', '华容�?, '3', '1710', '0');
INSERT INTO `yjcode_city` VALUES ('2196', '1420899', '其他区县', '3', '1710', '0');
INSERT INTO `yjcode_city` VALUES ('2197', '1420901', '孝南�?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2198', '1420902', '应城�?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2199', '1420903', '安陆�?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2200', '1420904', '汉川�?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2201', '1420905', '孝�ǹա?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2202', '1420906', '大悟ա?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2203', '1420907', '云梦ա?, '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2204', '1420999', '其他区县', '3', '1705', '0');
INSERT INTO `yjcode_city` VALUES ('2205', '1421001', '黄州�?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2206', '1421002', '麻城�?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2207', '1711', '武穴�?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2208', '1421004', '红安ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2209', '1421005', '罗田ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2210', '1421006', '英山ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2211', '1421007', '浠水ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2212', '1421008', '蕲春ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2213', '1421009', '黄梅ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2214', '1421010', '�Ƣ风ա?, '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2215', '1421099', '其他区县', '3', '1712', '0');
INSERT INTO `yjcode_city` VALUES ('2216', '1421101', '咸安�?, '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2217', '1421102', '赤壁�?, '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2218', '1421103', '嘉鱼ա?, '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2219', '1421104', '��벟�ա?, '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2220', '1421105', '崇阳ա?, '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2221', '1421106', '��벱�ա?, '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2222', '1421199', '其他区县', '3', '1713', '0');
INSERT INTO `yjcode_city` VALUES ('2223', '1421201', '��都�?, '3', '14212', '0');
INSERT INTO `yjcode_city` VALUES ('2224', '1421202', '广水�?, '3', '14212', '0');
INSERT INTO `yjcode_city` VALUES ('2225', '1421299', '其他区县', '3', '14212', '0');
INSERT INTO `yjcode_city` VALUES ('2226', '1421301', '恩施�?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2227', '1421302', '利川�?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2228', '1421303', '建始ա?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2229', '1421304', '巴东ա?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2230', '1421305', '宣恩ա?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2231', '1421306', '咸丰ա?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2232', '1421307', '来凤ա?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2233', '1421308', '鹤峰ա?, '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2234', '1421399', '其他区县', '3', '14213', '0');
INSERT INTO `yjcode_city` VALUES ('2235', '1430101', '岳麓�?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2236', '1430102', '���?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2237', '1430103', '天弨�?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2238', '1430104', '开福区', '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2239', '1430105', '��花�?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2240', '1430106', '浏阳�?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2241', '1430107', '长沙ա?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2242', '1430108', '���城ա?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2243', '1430109', '宁乡ա?, '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2244', '1430199', '其他区县', '3', '1801', '0');
INSERT INTO `yjcode_city` VALUES ('2245', '1430201', '天元�?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2246', '1430202', '��塘�?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2247', '1430203', '芦淞�?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2248', '1430204', '石峰�?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2249', '1430205', '�Ĵ����?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2250', '1430206', '�ݪ洲ա?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2251', '1430207', '攸县', '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2252', '1430208', '�����ա?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2253', '1430209', '�͎���ա?, '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2254', '1430299', '其他区县', '3', '1811', '0');
INSERT INTO `yjcode_city` VALUES ('2255', '1430301', '岳塘�?, '3', '1803', '0');
INSERT INTO `yjcode_city` VALUES ('2256', '1430302', '��湖�?, '3', '1803', '0');
INSERT INTO `yjcode_city` VALUES ('2257', '1430303', '������?, '3', '1803', '0');
INSERT INTO `yjcode_city` VALUES ('2258', '1430304', '���山�?, '3', '1803', '0');
INSERT INTO `yjcode_city` VALUES ('2259', '1430305', '湘潭ա?, '3', '1803', '0');
INSERT INTO `yjcode_city` VALUES ('2260', '1430399', '其他区县', '3', '1803', '0');
INSERT INTO `yjcode_city` VALUES ('2261', '1430401', '��峰�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2262', '1430402', '珠晖�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2263', '1430403', '石鼓�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2264', '1430404', '蒸湘�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2265', '1430405', '南岳�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2266', '1430406', '常宁�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2267', '1430407', 'Կ�阳�?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2268', '1430408', '衡阳ա?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2269', '1430409', '衡南ա?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2270', '1430410', '衡山ա?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2271', '1430411', '衡东ա?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2272', '1430412', '祁东ա?, '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2273', '1430499', '其他区县', '3', '1808', '0');
INSERT INTO `yjcode_city` VALUES ('2274', '1430501', '双清�?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2275', '1430502', '大祥�?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2276', '1430503', '北塔�?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2277', '1430504', '武����?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2278', '1430505', '�̵东ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2279', '1430506', '�̵阳ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2280', '1430507', '新邵ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2281', '1430508', '隆回ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2282', '1430509', '洞口ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2283', '1430510', '绥宁ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2284', '1430511', '新宁ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2285', '1430512', '城步苗族���治ա?, '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2286', '1430599', '其他区县', '3', '1810', '0');
INSERT INTO `yjcode_city` VALUES ('2287', '1430601', '岳阳楼区', '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2288', '1430602', '君山�?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2289', '1430603', '云溪�?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2290', '1430604', '汨����?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2291', '1430605', '临湘�?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2292', '1430606', '岳阳ա?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2293', '1430607', '华容ա?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2294', '1430608', '湘阴ա?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2295', '1430609', '平江ա?, '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2296', '1430699', '其他区县', '3', '1807', '0');
INSERT INTO `yjcode_city` VALUES ('2297', '1430701', '武����?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2298', '1430702', '鼎城�?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2299', '1430703', '津徺�?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2300', '1430704', '安乡ա?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2301', '1430705', '汉寿ա?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2302', '1430706', '澧县', '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2303', '1430707', '临澧ա?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2304', '1430708', '桃源ա?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2305', '1430709', '石门ա?, '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2306', '1430799', '其他区县', '3', '1805', '0');
INSERT INTO `yjcode_city` VALUES ('2307', '1430801', '永定�?, '3', '1802', '0');
INSERT INTO `yjcode_city` VALUES ('2308', '1430802', '武���源区', '3', '1802', '0');
INSERT INTO `yjcode_city` VALUES ('2309', '1430803', '�����ա?, '3', '1802', '0');
INSERT INTO `yjcode_city` VALUES ('2310', '1430804', '桑植ա?, '3', '1802', '0');
INSERT INTO `yjcode_city` VALUES ('2311', '1430899', '其他区县', '3', '1802', '0');
INSERT INTO `yjcode_city` VALUES ('2312', '1430901', '赫山�?, '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2313', '1430902', '资阳�?, '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2314', '1430903', '沅江�?, '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2315', '1430904', '南县', '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2316', '1430905', '桃江ա?, '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2317', '1430906', '安化ա?, '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2318', '1430999', '其他区县', '3', '1806', '0');
INSERT INTO `yjcode_city` VALUES ('2319', '1431001', '北湖�?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2320', '1431002', '苏仙�?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2321', '1431003', '资兴�?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2322', '1431004', '桂阳ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2323', '1431005', '永兴ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2324', '1431006', '���ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2325', '1431007', '嘉禾ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2326', '1431008', '临武ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2327', '1431009', '汝城ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2328', '1431010', '桱���ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2329', '1431011', '安仁ա?, '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2330', '1431099', '其他区县', '3', '1809', '0');
INSERT INTO `yjcode_city` VALUES ('2331', '1431101', '冷水滩区', '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2332', '1431102', '������?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2333', '1431103', '东安ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2334', '1431104', '���쎿', '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2335', '1431105', '宁远ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2336', '1431106', '江永ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2337', '1431107', '蓝山ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2338', '1431108', '新田ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2339', '1431109', '双牌ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2340', '1431110', '祁阳ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2341', '1431111', '江华瑶族���治ա?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2342', '1431199', '其他区县', '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2343', '1431112', '芝山�?, '3', '14311', '0');
INSERT INTO `yjcode_city` VALUES ('2344', '1431201', '鹤城�?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2345', '1431202', '洪江�?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2346', '1431203', '沅���ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2347', '1431204', '辰溪ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2348', '1431205', '溆浦ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2349', '1431206', '中方ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2350', '1431207', '�벐�ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2351', '1431208', '麻阳苗族���治ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2352', '1431209', '新晃侗族���治ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2353', '1431210', '芷江侗族���治ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2354', '1431211', '�ǖ州苗族侗族���治ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2355', '1431212', '�͚道侗族���治ա?, '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2356', '1431299', '其他区县', '3', '1804', '0');
INSERT INTO `yjcode_city` VALUES ('2357', '1431301', '娄星�?, '3', '1812', '0');
INSERT INTO `yjcode_city` VALUES ('2358', '1431302', '冷水江徺', '3', '1812', '0');
INSERT INTO `yjcode_city` VALUES ('2359', '1431303', '涟源�?, '3', '1812', '0');
INSERT INTO `yjcode_city` VALUES ('2360', '1431304', '双峰ա?, '3', '1812', '0');
INSERT INTO `yjcode_city` VALUES ('2361', '1431305', '新化ա?, '3', '1812', '0');
INSERT INTO `yjcode_city` VALUES ('2362', '1431399', '其他区县', '3', '1812', '0');
INSERT INTO `yjcode_city` VALUES ('2363', '1431401', '吉首�?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2364', '1431402', '泸溪ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2365', '1431403', '凤凰ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2366', '1431404', '花垣ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2367', '1431405', '保靖ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2368', '1431406', '古丈ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2369', '1431407', '永顺ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2370', '1431408', '�顱�ա?, '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2371', '1431499', '其他区县', '3', '14314', '0');
INSERT INTO `yjcode_city` VALUES ('2372', '1440108', '萝岗�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2373', '1440109', '南沙�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2374', '1440101', '越秀�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2375', '1440102', '东山�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2376', '1440103', '��湾�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2377', '1440104', '海珠�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2378', '1440105', '天河�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2379', '1440106', '芳村�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2380', '1440107', '白云�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2381', '535', '黄埔�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2382', '514', '番禺�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2383', '505', '花都�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2384', '519', '增城�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2385', '518', '从化�?, '3', '5', '0');
INSERT INTO `yjcode_city` VALUES ('2386', '1440201', '福田�?, '3', '7', '0');
INSERT INTO `yjcode_city` VALUES ('2387', '1440202', '罗湖�?, '3', '7', '0');
INSERT INTO `yjcode_city` VALUES ('2388', '1440203', '南山�?, '3', '7', '0');
INSERT INTO `yjcode_city` VALUES ('2389', '1440204', '宝安�?, '3', '7', '0');
INSERT INTO `yjcode_city` VALUES ('2390', '1440205', '�顲��?, '3', '7', '0');
INSERT INTO `yjcode_city` VALUES ('2391', '1440206', '盐田�?, '3', '7', '0');
INSERT INTO `yjcode_city` VALUES ('2392', '1440301', '香洲�?, '3', '504', '0');
INSERT INTO `yjcode_city` VALUES ('2393', '1440302', '斗门�?, '3', '504', '0');
INSERT INTO `yjcode_city` VALUES ('2394', '1440303', '金湾�?, '3', '504', '0');
INSERT INTO `yjcode_city` VALUES ('2395', '1440399', '其他区县', '3', '504', '0');
INSERT INTO `yjcode_city` VALUES ('2396', '1440401', '金平�?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2397', '1440402', '濠江�?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2398', '1440403', '龙湖�?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2399', '542', '潮阳�?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2400', '560', '潮南�?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2401', '1440406', '澄海�?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2402', '1440407', '南澳ա?, '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2403', '1440499', '其他区县', '3', '507', '0');
INSERT INTO `yjcode_city` VALUES ('2404', '1440501', '浈江�?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2405', '1440502', '武江�?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2406', '1440503', '��江�?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2407', '1440504', '乐�ǹ�?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2408', '1440505', '南雄�?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2409', '1440506', '��Ʌ�ա?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2410', '1440507', '仁化ա?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2411', '1440508', '翁源ա?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2412', '1440509', '新丰ա?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2413', '1440510', '乳源瑶族���治ա?, '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2414', '1440599', '其他区县', '3', '533', '0');
INSERT INTO `yjcode_city` VALUES ('2415', '1440601', '禅城�?, '3', '521', '0');
INSERT INTO `yjcode_city` VALUES ('2416', '517', '南海�?, '3', '521', '0');
INSERT INTO `yjcode_city` VALUES ('2417', '513', '顺德�?, '3', '521', '0');
INSERT INTO `yjcode_city` VALUES ('2418', '527', '三水�?, '3', '521', '0');
INSERT INTO `yjcode_city` VALUES ('2419', '522', '高明�?, '3', '521', '0');
INSERT INTO `yjcode_city` VALUES ('2420', '1440699', '其他区县', '3', '521', '0');
INSERT INTO `yjcode_city` VALUES ('2421', '1440701', '江海�?, '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2422', '1440702', '蓬江�?, '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2423', '520', '新�ϸ�?, '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2424', '528', '恩平�?, '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2425', '524', '台山�?, '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2426', '525', '开平徺', '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2427', '523', '鹤山�?, '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2428', '1440799', '其他区县', '3', '509', '0');
INSERT INTO `yjcode_city` VALUES ('2429', '1440801', '赤坎�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2430', '1440802', '霞山�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2431', '1440803', '坡头�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2432', '1440804', '麻章�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2433', '1440805', '吴川�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2434', '1440806', '廉江�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2435', '1440807', '��州�?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2436', '1440808', '�ς溪ա?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2437', '1440809', '徐闻ա?, '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2438', '1440899', '其他区县', '3', '516', '0');
INSERT INTO `yjcode_city` VALUES ('2439', '1440901', '���南�?, '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2440', '1440902', '���港�?, '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2441', '1440903', '化州�?, '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2442', '1440904', '信宜�?, '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2443', '1440905', '��뷞�?, '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2444', '1440906', '电���ա?, '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2445', '1440999', '其他区县', '3', '511', '0');
INSERT INTO `yjcode_city` VALUES ('2446', '1441001', '端州�?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2447', '1441002', '鼎湖�?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2448', '1441003', '高要�?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2449', '526', '�ƛ�ϸ�?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2450', '1441005', '广宁ա?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2451', '1441006', '�䀰�县', '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2452', '1441007', '封开ա?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2453', '1441008', '德��ա?, '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2454', '1441099', '其他区县', '3', '534', '0');
INSERT INTO `yjcode_city` VALUES ('2455', '1441101', '惠城�?, '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2456', '1441102', '惠阳�?, '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2457', '543', '博���ա?, '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2458', '1441104', '惠东ա?, '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2459', '1441105', '龙门ա?, '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2460', '537', '陈江', '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2461', '1441199', '其他区县', '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2462', '1441106', '大亚湾区', '3', '508', '0');
INSERT INTO `yjcode_city` VALUES ('2463', '1441201', '梅江�?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2464', '493', '兴宁�?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2465', '491', '梅县', '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2466', '548', '大埔ա?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2467', '550', '丰顺ա?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2468', '552', '五华ա?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2469', '554', '平远ա?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2470', '492', '蕉岭ա?, '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2471', '1441299', '其他区县', '3', '545', '0');
INSERT INTO `yjcode_city` VALUES ('2472', '1441301', '城区', '3', '529', '0');
INSERT INTO `yjcode_city` VALUES ('2473', '499', '陆丰�?, '3', '529', '0');
INSERT INTO `yjcode_city` VALUES ('2474', '530', '海丰ա?, '3', '529', '0');
INSERT INTO `yjcode_city` VALUES ('2475', '495', '陆河ա?, '3', '529', '0');
INSERT INTO `yjcode_city` VALUES ('2476', '1441399', '其他区县', '3', '529', '0');
INSERT INTO `yjcode_city` VALUES ('2477', '1441501', '源城�?, '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2478', '498', '紫金ա?, '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2479', '500', '�顷�ա?, '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2480', '496', '连平ա?, '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2481', '501', '和平ա?, '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2482', '494', '串׺�ա?, '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2483', '1441599', '其他区县', '3', '544', '0');
INSERT INTO `yjcode_city` VALUES ('2484', '1441601', '江城�?, '3', '531', '0');
INSERT INTO `yjcode_city` VALUES ('2485', '539', '�ֳ春�?, '3', '531', '0');
INSERT INTO `yjcode_city` VALUES ('2486', '532', '�ֳ西ա?, '3', '531', '0');
INSERT INTO `yjcode_city` VALUES ('2487', '538', '�ִ���ա?, '3', '531', '0');
INSERT INTO `yjcode_city` VALUES ('2488', '1441699', '其他区县', '3', '531', '0');
INSERT INTO `yjcode_city` VALUES ('2489', '1441701', '清城�?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2490', '551', '英德�?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2491', '555', '连州�?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2492', '549', '佛���ա?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2493', '553', '�ֳ山ա?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2494', '547', '清新ա?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2495', '559', '连山壮族瑶族���治ա?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2496', '557', '连南瑶族���治ա?, '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2497', '1441799', '其他区县', '3', '512', '0');
INSERT INTO `yjcode_city` VALUES ('2498', '1441804', '东城�?, '3', '510', '0');
INSERT INTO `yjcode_city` VALUES ('2499', '1441802', '南城�?, '3', '510', '0');
INSERT INTO `yjcode_city` VALUES ('2500', '1441805', '市辖�?, '3', '510', '0');
INSERT INTO `yjcode_city` VALUES ('2501', '1441801', '�Ǟ城�?, '3', '510', '0');
INSERT INTO `yjcode_city` VALUES ('2502', '1441803', '万江�?, '3', '510', '0');
INSERT INTO `yjcode_city` VALUES ('2503', '1441901', '东区', '3', '515', '0');
INSERT INTO `yjcode_city` VALUES ('2504', '1441905', '火炬开发区', '3', '515', '0');
INSERT INTO `yjcode_city` VALUES ('2505', '1441903', '南区', '3', '515', '0');
INSERT INTO `yjcode_city` VALUES ('2506', '1441904', '石岐�?, '3', '515', '0');
INSERT INTO `yjcode_city` VALUES ('2507', '1441906', '市辖�?, '3', '515', '0');
INSERT INTO `yjcode_city` VALUES ('2508', '1441902', '西区', '3', '515', '0');
INSERT INTO `yjcode_city` VALUES ('2509', '1442001', '湘桥�?, '3', '506', '0');
INSERT INTO `yjcode_city` VALUES ('2510', '1442002', '潮安ա?, '3', '506', '0');
INSERT INTO `yjcode_city` VALUES ('2511', '1442003', '饶平ա?, '3', '506', '0');
INSERT INTO `yjcode_city` VALUES ('2512', '1442099', '其他区县', '3', '506', '0');
INSERT INTO `yjcode_city` VALUES ('2513', '1442101', '榕城�?, '3', '540', '0');
INSERT INTO `yjcode_city` VALUES ('2514', '541', '普宁�?, '3', '540', '0');
INSERT INTO `yjcode_city` VALUES ('2515', '1442103', '揭东ա?, '3', '540', '0');
INSERT INTO `yjcode_city` VALUES ('2516', '1442104', '揭西ա?, '3', '540', '0');
INSERT INTO `yjcode_city` VALUES ('2517', '1442105', '惠来ա?, '3', '540', '0');
INSERT INTO `yjcode_city` VALUES ('2518', '1442199', '其他区县', '3', '540', '0');
INSERT INTO `yjcode_city` VALUES ('2519', '1442201', '云城�?, '3', '546', '0');
INSERT INTO `yjcode_city` VALUES ('2520', '556', '罗定�?, '3', '546', '0');
INSERT INTO `yjcode_city` VALUES ('2521', '558', '云安ա?, '3', '546', '0');
INSERT INTO `yjcode_city` VALUES ('2522', '503', '新兴ա?, '3', '546', '0');
INSERT INTO `yjcode_city` VALUES ('2523', '502', '郁南ա?, '3', '546', '0');
INSERT INTO `yjcode_city` VALUES ('2524', '1442299', '其他区县', '3', '546', '0');
INSERT INTO `yjcode_city` VALUES ('2525', '1450101', '�ǒ秀�?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2526', '1450102', '兴宁�?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2527', '1450103', '江南�?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2528', '1450104', '西乡��댺', '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2529', '1450105', '良���?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2530', '1450106', '�̕宁�?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2531', '1450107', '武鸣ա?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2532', '1450108', '横县', '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2533', '1450109', '宾阳ա?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2534', '1450110', '上���ա?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2535', '1450111', '隆安ա?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2536', '1450112', '马山ա?, '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2537', '1450199', '其他区县', '3', '2201', '0');
INSERT INTO `yjcode_city` VALUES ('2538', '1450211', '高新�?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2539', '1450201', '城中�?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2540', '1450202', '鱼峰�?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2541', '1450203', '�ҳ南�?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2542', '1450204', '�ҳ北�?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2543', '1450205', '�ҳ江ա?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2544', '1450206', '�ҳ城ա?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2545', '1450207', '鹿寨ա?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2546', '1450208', '融安ա?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2547', '1450209', '三江侗族���治ա?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2548', '1450210', '融水苗族���治ա?, '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2549', '1450299', '其他区县', '3', '2203', '0');
INSERT INTO `yjcode_city` VALUES ('2550', '1450301', '象山�?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2551', '1450302', '叠彩�?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2552', '1450303', '秀峰区', '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2553', '1450304', '七星�?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2554', '1450305', '��山�?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2555', '1450306', '�ֳ朔ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2556', '1450307', '临桂ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2557', '1450308', '灵川ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2558', '1450309', '全州ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2559', '1450310', '兴安ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2560', '1450311', '永福ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2561', '1450312', '灌阳ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2562', '1450313', '资源ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2563', '1450314', '年���ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2564', '1450315', '��浦ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2565', '1450316', '��各族���治ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2566', '1450317', '恭城瑶族���治ա?, '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2567', '1450399', '其他区县', '3', '2202', '0');
INSERT INTO `yjcode_city` VALUES ('2568', '1450401', '万秀�?, '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2569', '1450402', '蝶山�?, '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2570', '1450403', '长洲�?, '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2571', '1450404', '岑溪�?, '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2572', '1450405', '苍梧ա?, '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2573', '1450406', '藤县', '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2574', '1450407', '�顱�ա?, '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2575', '1450499', '其他区县', '3', '2204', '0');
INSERT INTO `yjcode_city` VALUES ('2576', '1450501', '海城�?, '3', '2206', '0');
INSERT INTO `yjcode_city` VALUES ('2577', '1450502', '�ж海�?, '3', '2206', '0');
INSERT INTO `yjcode_city` VALUES ('2578', '1450503', '�Ё山港区', '3', '2206', '0');
INSERT INTO `yjcode_city` VALUES ('2579', '1450504', '合浦ա?, '3', '2206', '0');
INSERT INTO `yjcode_city` VALUES ('2580', '1450599', '其他区县', '3', '2206', '0');
INSERT INTO `yjcode_city` VALUES ('2581', '1450601', '港口�?, '3', '14506', '0');
INSERT INTO `yjcode_city` VALUES ('2582', '1450602', '�ֲ城�?, '3', '14506', '0');
INSERT INTO `yjcode_city` VALUES ('2583', '1450603', '东兴�?, '3', '14506', '0');
INSERT INTO `yjcode_city` VALUES ('2584', '1450604', '上思县', '3', '14506', '0');
INSERT INTO `yjcode_city` VALUES ('2585', '1450699', '其他区县', '3', '14506', '0');
INSERT INTO `yjcode_city` VALUES ('2586', '1450701', '�Ԧ南�?, '3', '2205', '0');
INSERT INTO `yjcode_city` VALUES ('2587', '1450702', '�Ԧ北�?, '3', '2205', '0');
INSERT INTO `yjcode_city` VALUES ('2588', '1450703', '灵山ա?, '3', '2205', '0');
INSERT INTO `yjcode_city` VALUES ('2589', '1450704', '浦北ա?, '3', '2205', '0');
INSERT INTO `yjcode_city` VALUES ('2590', '1450799', '其他区县', '3', '2205', '0');
INSERT INTO `yjcode_city` VALUES ('2591', '1450801', '港北�?, '3', '14508', '0');
INSERT INTO `yjcode_city` VALUES ('2592', '1450802', '港南�?, '3', '14508', '0');
INSERT INTO `yjcode_city` VALUES ('2593', '1450803', '覃塘�?, '3', '14508', '0');
INSERT INTO `yjcode_city` VALUES ('2594', '1450804', '桂平�?, '3', '14508', '0');
INSERT INTO `yjcode_city` VALUES ('2595', '1450805', '平南ա?, '3', '14508', '0');
INSERT INTO `yjcode_city` VALUES ('2596', '1450899', '其他区县', '3', '14508', '0');
INSERT INTO `yjcode_city` VALUES ('2597', '1450907', '开发区', '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2598', '1450901', '玉州�?, '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2599', '1450902', '北流�?, '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2600', '1450903', '兴业ա?, '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2601', '1450904', '容县', '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2602', '1450905', '陆川ա?, '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2603', '1450906', '博���ա?, '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2604', '1450999', '其他区县', '3', '2207', '0');
INSERT INTO `yjcode_city` VALUES ('2605', '1451001', '右江�?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2606', '1451002', '田阳ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2607', '1451003', '田东ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2608', '1451004', '平果ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2609', '1451005', '德���ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2610', '1451006', '�ǖ西ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2611', '1451007', '�̣��ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2612', '1451008', '凌云ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2613', '1451009', '乐业ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2614', '1451010', '西���ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2615', '1451011', '田���ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2616', '1451012', '隆���各族���治ա?, '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2617', '1451099', '其他区县', '3', '14510', '0');
INSERT INTO `yjcode_city` VALUES ('2618', '1451101', '八步�?, '3', '14511', '0');
INSERT INTO `yjcode_city` VALUES ('2619', '1451102', '昭平ա?, '3', '14511', '0');
INSERT INTO `yjcode_city` VALUES ('2620', '1451103', '�ԟ山ա?, '3', '14511', '0');
INSERT INTO `yjcode_city` VALUES ('2621', '1451104', '富川瑶族���治ա?, '3', '14511', '0');
INSERT INTO `yjcode_city` VALUES ('2622', '1451199', '其他区县', '3', '14511', '0');
INSERT INTO `yjcode_city` VALUES ('2623', '1451212', '城中�?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2624', '1451213', '河北�?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2625', '1451201', '金城江区', '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2626', '1451202', '宜州�?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2627', '1451203', '南丹ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2628', '1451204', '天峨ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2629', '1451205', '凤山ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2630', '1451206', '东兰ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2631', '1451207', '巴马瑶族���治ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2632', '1451208', '都安瑶族���治ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2633', '1451209', '大化瑶族���治ա?, '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2634', '1451210', '罗城仫佬�ߏ自治县', '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2635', '1451211', '环江毛南�ߏ自治县', '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2636', '1451299', '其他区县', '3', '14512', '0');
INSERT INTO `yjcode_city` VALUES ('2637', '1451301', '兴宾�?, '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2638', '1451302', '������?, '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2639', '1451303', '象州ա?, '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2640', '1451304', '武宣ա?, '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2641', '1451305', '忻城ա?, '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2642', '1451306', '金秀瑶族���治ա?, '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2643', '1451399', '其他区县', '3', '14513', '0');
INSERT INTO `yjcode_city` VALUES ('2644', '1451401', '江州�?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2645', '1451402', '凭祥�?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2646', '1451403', '�ض绥ա?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2647', '1451404', '大新ա?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2648', '1451405', '天等ա?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2649', '1451406', '宁明ա?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2650', '1451407', '�顷�ա?, '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2651', '1451499', '其他区县', '3', '14514', '0');
INSERT INTO `yjcode_city` VALUES ('2652', '1460101', '�額��?, '3', '2301', '0');
INSERT INTO `yjcode_city` VALUES ('2653', '1460102', '秀英区', '3', '2301', '0');
INSERT INTO `yjcode_city` VALUES ('2654', '1460103', '琼山�?, '3', '2301', '0');
INSERT INTO `yjcode_city` VALUES ('2655', '1460104', '美兰�?, '3', '2301', '0');
INSERT INTO `yjcode_city` VALUES ('2656', '1460199', '其他区县', '3', '2301', '0');
INSERT INTO `yjcode_city` VALUES ('2657', '1500141', '高新�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2658', '1500101', '渝中�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2659', '1500102', '大渡口区', '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2660', '1500103', '江北�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2661', '1500104', '�顝�坝区', '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2662', '1500105', '九龙坡区', '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2663', '1500106', '南岸�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2664', '1500107', '北碚�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2665', '1500108', '万盛�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2666', '1500109', '双桥�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2667', '1500110', '渝北�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2668', '1500111', '巴南�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2669', '1500112', '万州�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2670', '1500113', '涪����?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2671', '1500114', '黔江�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2672', '1500115', '长寿�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2673', '1500116', '江津�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2674', '1500117', '������?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2675', '1500118', '永川�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2676', '1500119', '南川�?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2677', '1500120', '綦江ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2678', '1500121', '潼南ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2679', '1500122', '�вע�ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2680', '1500123', '大足ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2681', '1500124', '���ǹա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2682', '1500125', '��山ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2683', '1500126', '垫江ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2684', '1500127', '武隆ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2685', '1500128', '丰都ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2686', '1500129', '城口ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2687', '1500130', '梁平ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2688', '1500131', '开ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2689', '1500132', '巫溪ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2690', '1500133', '巫山ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2691', '1500134', '奉节ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2692', '1500135', '云阳ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2693', '1500136', '忠县', '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2694', '1500137', '石柱ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2695', '1500138', '彭水ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2696', '1500139', '酉阳ա?, '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2697', '1500140', '秀山县', '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2698', '1500199', '其他区县', '3', '401', '0');
INSERT INTO `yjcode_city` VALUES ('2699', '1510120', '高新�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2700', '1510101', '�ǒ羊�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2701', '1510102', '�Ӧ江�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2702', '1510103', '金牛�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2703', '1510104', '武侯�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2704', '1510105', '成华�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2705', '1510106', '龙泉驿区', '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2706', '1510107', '�ǒ���江区', '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2707', '1510108', '新都�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2708', '1510109', '温江�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2709', '3004', '都江堰徺', '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2710', '3003', '彭州�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2711', '1510112', '�̛����?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2712', '1510113', '崇州�?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2713', '1510114', '金堂ա?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2714', '1510115', '双流ա?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2715', '1510116', '郫县', '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2716', '1510117', '大邑ա?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2717', '1510118', '蒲江ա?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2718', '1510119', '新津ա?, '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2719', '1510199', '其他区县', '3', '3001', '0');
INSERT INTO `yjcode_city` VALUES ('2720', '1510201', '���流井区', '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2721', '1510202', '大安�?, '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2722', '1510203', '贡井�?, '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2723', '1510204', '沿滩�?, '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2724', '1510205', '��县', '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2725', '1510206', '富顺ա?, '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2726', '1510299', '其他区县', '3', '3010', '0');
INSERT INTO `yjcode_city` VALUES ('2727', '1510301', '东区', '3', '15103', '0');
INSERT INTO `yjcode_city` VALUES ('2728', '1510302', '西区', '3', '15103', '0');
INSERT INTO `yjcode_city` VALUES ('2729', '1510303', '仁和�?, '3', '15103', '0');
INSERT INTO `yjcode_city` VALUES ('2730', '1510304', '米易ա?, '3', '15103', '0');
INSERT INTO `yjcode_city` VALUES ('2731', '1510305', '盐边ա?, '3', '15103', '0');
INSERT INTO `yjcode_city` VALUES ('2732', '1510399', '其他区县', '3', '15103', '0');
INSERT INTO `yjcode_city` VALUES ('2733', '1510401', '江阳�?, '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2734', '1510402', '纳溪�?, '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2735', '1510403', '龙马潭区', '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2736', '1510404', '泸县', '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2737', '1510405', '合江ա?, '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2738', '1510406', '叙永ա?, '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2739', '1510407', '古蔺ա?, '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2740', '1510499', '其他区县', '3', '3009', '0');
INSERT INTO `yjcode_city` VALUES ('2741', '1510501', '�ߌ阳�?, '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2742', '1510502', '什�̡徺', '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2743', '1510503', '广汉�?, '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2744', '1510504', '绵竹�?, '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2745', '1510505', '罗江ա?, '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2746', '1510506', '中江ա?, '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2747', '1510599', '其他区县', '3', '3005', '0');
INSERT INTO `yjcode_city` VALUES ('2748', '1510601', '涪城�?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2749', '1510602', '游仙�?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2750', '1510603', '江油�?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2751', '1510604', '三台ա?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2752', '1510605', '盐亭ա?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2753', '1510606', '安县', '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2754', '1510607', '梓潼ա?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2755', '1510608', '平武ա?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2756', '1510609', '北川羌族���治ա?, '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2757', '1510699', '其他区县', '3', '3007', '0');
INSERT INTO `yjcode_city` VALUES ('2758', '1510701', '利州�?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2759', '1510702', '元坝�?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2760', '1510703', '���天�?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2761', '1510704', '�ߺ苍ա?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2762', '1510705', '�ǒ川ա?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2763', '1510706', '剑���ա?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2764', '1510707', '苍溪ա?, '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2765', '1510799', '其他区县', '3', '3013', '0');
INSERT INTO `yjcode_city` VALUES ('2766', '1510801', '船山�?, '3', '15108', '0');
INSERT INTO `yjcode_city` VALUES ('2767', '1510802', '安居�?, '3', '15108', '0');
INSERT INTO `yjcode_city` VALUES ('2768', '1510803', '蓬溪ա?, '3', '15108', '0');
INSERT INTO `yjcode_city` VALUES ('2769', '1510804', '射洪ա?, '3', '15108', '0');
INSERT INTO `yjcode_city` VALUES ('2770', '1510805', '大英ա?, '3', '15108', '0');
INSERT INTO `yjcode_city` VALUES ('2771', '1510899', '其他区县', '3', '15108', '0');
INSERT INTO `yjcode_city` VALUES ('2772', '1510901', '帱����?, '3', '15109', '0');
INSERT INTO `yjcode_city` VALUES ('2773', '1510902', '东兴�?, '3', '15109', '0');
INSERT INTO `yjcode_city` VALUES ('2774', '1510903', '威远ա?, '3', '15109', '0');
INSERT INTO `yjcode_city` VALUES ('2775', '1510904', '资中ա?, '3', '15109', '0');
INSERT INTO `yjcode_city` VALUES ('2776', '1510905', '隆�ǹա?, '3', '15109', '0');
INSERT INTO `yjcode_city` VALUES ('2777', '1510999', '其他区县', '3', '15109', '0');
INSERT INTO `yjcode_city` VALUES ('2778', '1511001', '帱����?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2779', '1511002', '沙湾�?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2780', '1511003', '五通桥�?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2781', '1511004', '金口河区', '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2782', '3011', '峨眉山徺', '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2783', '1511006', '��ո��ա?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2784', '1511007', '亿�үա?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2785', '1511008', '夹江ա?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2786', '1511009', '沐川ա?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2787', '1511010', '峨边彝族���治ա?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2788', '1511011', '马边彝族���治ա?, '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2789', '1511099', '其他区县', '3', '3012', '0');
INSERT INTO `yjcode_city` VALUES ('2790', '1511101', '顺���?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2791', '1511102', '��띪�?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2792', '1511103', '嘉����?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2793', '1511104', '�ֆ中�?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2794', '1511105', '南部ա?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2795', '1511106', '营山ա?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2796', '1511107', '蓬安ա?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2797', '1511108', '仪陇ա?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2798', '1511109', '西充ա?, '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2799', '1511199', '其他区县', '3', '3008', '0');
INSERT INTO `yjcode_city` VALUES ('2800', '1511201', '翠屏�?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2801', '1511202', '宜宾ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2802', '1511203', '南溪ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2803', '1511204', '江安ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2804', '1511205', '长宁ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2805', '1511206', '��뎿', '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2806', '1511207', '�Р连ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2807', '1511208', '�顎�', '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2808', '1511209', '兴文ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2809', '1511210', '屏山ա?, '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2810', '1511299', '其他区县', '3', '15112', '0');
INSERT INTO `yjcode_city` VALUES ('2811', '1511301', '广安�?, '3', '15113', '0');
INSERT INTO `yjcode_city` VALUES ('2812', '1511302', '华����?, '3', '15113', '0');
INSERT INTO `yjcode_city` VALUES ('2813', '1511303', '岳���ա?, '3', '15113', '0');
INSERT INTO `yjcode_city` VALUES ('2814', '1511304', '武胜ա?, '3', '15113', '0');
INSERT INTO `yjcode_city` VALUES ('2815', '1511305', '�̻水ա?, '3', '15113', '0');
INSERT INTO `yjcode_city` VALUES ('2816', '1511399', '其他区县', '3', '15113', '0');
INSERT INTO `yjcode_city` VALUES ('2817', '1511401', '��벷��?, '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2818', '1511402', '万源�?, '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2819', '1511403', '达县', '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2820', '1511404', '宣汉ա?, '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2821', '1511405', '开江县', '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2822', '1511406', '大竹ա?, '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2823', '1511407', '渠县', '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2824', '1511499', '其他区县', '3', '15114', '0');
INSERT INTO `yjcode_city` VALUES ('2825', '1511501', '东���?, '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2826', '1511502', '仁寿ա?, '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2827', '1511503', '彭山ա?, '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2828', '1511504', '洪雅ա?, '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2829', '1511505', '丹棱ա?, '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2830', '1511506', '�ǒ神ա?, '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2831', '1511599', '其他区县', '3', '15115', '0');
INSERT INTO `yjcode_city` VALUES ('2832', '1511601', '��城�?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2833', '1511602', '名山ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2834', '1511603', '��经ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2835', '1511604', '汉源ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2836', '1511605', '石棉ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2837', '1511606', '天全ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2838', '1511607', '芦山ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2839', '1511608', '宝兴ա?, '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2840', '1511699', '其他区县', '3', '15116', '0');
INSERT INTO `yjcode_city` VALUES ('2841', '1511701', '巴州�?, '3', '15117', '0');
INSERT INTO `yjcode_city` VALUES ('2842', '1511702', '�͚江ա?, '3', '15117', '0');
INSERT INTO `yjcode_city` VALUES ('2843', '1511703', '南江ա?, '3', '15117', '0');
INSERT INTO `yjcode_city` VALUES ('2844', '1511704', '平�ǹա?, '3', '15117', '0');
INSERT INTO `yjcode_city` VALUES ('2845', '1511799', '其他区县', '3', '15117', '0');
INSERT INTO `yjcode_city` VALUES ('2846', '1511801', '��江�?, '3', '15118', '0');
INSERT INTO `yjcode_city` VALUES ('2847', '1511802', '简�ֳ徺', '3', '15118', '0');
INSERT INTO `yjcode_city` VALUES ('2848', '1511803', '乐�߿ա?, '3', '15118', '0');
INSERT INTO `yjcode_city` VALUES ('2849', '1511804', '安岳ա?, '3', '15118', '0');
INSERT INTO `yjcode_city` VALUES ('2850', '1511899', '其他区县', '3', '15118', '0');
INSERT INTO `yjcode_city` VALUES ('2851', '1511901', '马尔康县', '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2852', '1511902', '汶川ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2853', '1511903', '理县', '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2854', '1511904', '���县', '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2855', '1511905', '松潘ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2856', '1511906', '九寨沟县', '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2857', '1511907', '金川ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2858', '1511908', '小金ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2859', '1511909', '黑水ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2860', '1511910', '壤塘ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2861', '1511911', '�ֿ坝ա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2862', '1511912', '若尔盖县', '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2863', '1511913', '红�ʦա?, '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2864', '1511999', '其他区县', '3', '15119', '0');
INSERT INTO `yjcode_city` VALUES ('2865', '1512001', '康定ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2866', '1512002', '泸定ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2867', '1512003', '丹巴ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2868', '1512004', '九龙ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2869', '1512005', '��江ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2870', '1512006', '���쭚ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2871', '1512007', '�͉霍ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2872', '1512008', '��뭜ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2873', '1512009', '新龙ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2874', '1512010', '德格ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2875', '1512011', '白玉ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2876', '1512012', '石渠ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2877', '1512013', '色达ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2878', '1512014', '理塘ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2879', '1512015', '巴塘ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2880', '1512016', '乡城ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2881', '1512017', '稻城ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2882', '1512018', '得���ա?, '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2883', '1512099', '其他区县', '3', '15120', '0');
INSERT INTO `yjcode_city` VALUES ('2884', '3006', '西�ǹ�?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2885', '1512102', '盐源ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2886', '1512103', '德�ǹա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2887', '1512104', '会理ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2888', '1512105', '��⸜ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2889', '1512106', '宁南ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2890', '1512107', '普格ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2891', '1512108', '布拖ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2892', '1512109', '金阳ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2893', '1512110', '昭觉ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2894', '1512111', '喜德ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2895', '1512112', '冕宁ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2896', '1512113', '越西ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2897', '1512114', '甘洛ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2898', '1512115', '美姑ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2899', '1512116', '��波ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2900', '1512117', '���里藏族���治ա?, '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2901', '1512199', '其他区县', '3', '15121', '0');
INSERT INTO `yjcode_city` VALUES ('2902', '1520101', '乌当�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2903', '1520102', '南明�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2904', '1520103', '云岩�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2905', '1520104', '花溪�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2906', '1520105', '白云�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2907', '1520106', '小河�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2908', '1520107', '清镇�?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2909', '1520108', '开�ֳ县', '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2910', '1520109', '修文ա?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2911', '1520110', '息烽ա?, '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2912', '1520199', '其他区县', '3', '2501', '0');
INSERT INTO `yjcode_city` VALUES ('2913', '1520201', '�ԟ山�?, '3', '2502', '0');
INSERT INTO `yjcode_city` VALUES ('2914', '1520202', '��뎿', '3', '2502', '0');
INSERT INTO `yjcode_city` VALUES ('2915', '1520203', '水城ա?, '3', '2502', '0');
INSERT INTO `yjcode_city` VALUES ('2916', '1520204', '六枝特区', '3', '2502', '0');
INSERT INTO `yjcode_city` VALUES ('2917', '1520299', '其他区县', '3', '2502', '0');
INSERT INTO `yjcode_city` VALUES ('2918', '1520301', '红花岗区', '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2919', '1520302', '汇川�?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2920', '1520303', '赤水�?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2921', '1520304', '仁怀�?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2922', '1520305', '�ϵ义ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2923', '1520306', '桐梓ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2924', '1520307', '绥阳ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2925', '1520308', '正安ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2926', '1520309', '凤���ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2927', '1520310', '湄潭ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2928', '1520311', '�顼�ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2929', '1520312', '习水ա?, '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2930', '1520313', '�ϓ真仡佬�ߏ苗�ߏ自治县', '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2931', '1520314', '�ɡ川仡佬�ߏ苗�ߏ自治县', '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2932', '1520399', '其他区县', '3', '2503', '0');
INSERT INTO `yjcode_city` VALUES ('2933', '1520401', '西秀�?, '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2934', '1520402', '平坝ա?, '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2935', '1520403', '普定ա?, '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2936', '1520404', '关岭布依�ߏ苗�ߏ自治县', '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2937', '1520405', '镇宁布依�ߏ苗�ߏ自治县', '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2938', '1520406', '紫云苗族布依�ߏ自治县', '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2939', '1520499', '其他区县', '3', '2504', '0');
INSERT INTO `yjcode_city` VALUES ('2940', '1520501', '�М仁�?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2941', '1520502', '江口ա?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2942', '1520503', '石��ա?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2943', '1520504', '��南ա?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2944', '1520505', '德江ա?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2945', '1520506', '玉屏侗族���治ա?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2946', '1520507', '印江土家�ߏ苗�ߏ自治县', '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2947', '1520508', '沿河土家�ߏ自治县', '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2948', '1520509', '松桃苗族���治ա?, '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2949', '1520510', '万山特区', '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2950', '1520599', '其他区县', '3', '15205', '0');
INSERT INTO `yjcode_city` VALUES ('2951', '2506', '毕节�?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2952', '1520602', '大方ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2953', '1520603', '黔西ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2954', '1520604', '金沙ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2955', '1520605', '织金ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2956', '1520606', '纳雍ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2957', '1520607', '赫章ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2958', '1520608', '威宁彝族�ƞ族苗族���治ա?, '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2959', '1520699', '其他区县', '3', '2505', '0');
INSERT INTO `yjcode_city` VALUES ('2960', '1520701', '兴义�?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2961', '1520702', '兴仁ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2962', '1520703', '普安ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2963', '1520704', '晴隆ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2964', '1520705', '贞丰ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2965', '1520706', '���谟ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2966', '1520707', '册亨ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2967', '1520708', '安龙ա?, '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2968', '1520799', '其他区县', '3', '15207', '0');
INSERT INTO `yjcode_city` VALUES ('2969', '1520801', '凯里�?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2970', '1520802', '黄平ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2971', '1520803', '施秉ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2972', '1520804', '三穗ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2973', '1520805', '镴ѿ�ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2974', '1520806', '岑巩ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2975', '1520807', '天柱ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2976', '1520808', '�Ӧ屏ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2977', '1520809', '剑河ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2978', '1520810', '台江ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2979', '1520811', '黎平ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2980', '1520812', '榕江ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2981', '1520813', '从江ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2982', '1520814', '��山ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2983', '1520815', '麻江ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2984', '1520816', '丹寨ա?, '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2985', '1520899', '其他区县', '3', '15208', '0');
INSERT INTO `yjcode_city` VALUES ('2986', '1520901', '都匀�?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2987', '1520902', '福泉�?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2988', '1520903', '��波ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2989', '1520904', '贵定ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2990', '1520905', '瓮安ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2991', '1520906', '��山ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2992', '1520907', '平塘ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2993', '1520908', '罗甸ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2994', '1520909', '长顺ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2995', '1520910', '龙里ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2996', '1520911', '惠水ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2997', '1520912', '三都水族���治ա?, '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2998', '1520999', '其他区县', '3', '15209', '0');
INSERT INTO `yjcode_city` VALUES ('2999', '1530101', '盘龙�?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3000', '1530102', '五华�?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3001', '1530103', '官渡�?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3002', '1530104', '西山�?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3003', '1530105', '东川�?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3004', '1530106', '安宁�?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3005', '1530107', '�͈贡ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3006', '1530108', '��ɮ�ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3007', '1530109', '富民ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3008', '1530110', '宜�̳ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3009', '1530111', '嵩明ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3010', '1530112', '石���彝族���治ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3011', '1530113', '禄劝彝族苗族���治ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3012', '1530114', '寻甸�ƞ族彝族���治ա?, '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3013', '1530199', '其他区县', '3', '2401', '0');
INSERT INTO `yjcode_city` VALUES ('3014', '1530201', '麒����?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3015', '1530202', '宣威�?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3016', '1530203', '马龙ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3017', '1530204', '沾益ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3018', '1530205', '富源ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3019', '1530206', '罗平ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3020', '1530207', '�����ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3021', '1530208', '���̳ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3022', '1530209', '会泽ա?, '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3023', '1530299', '其他区县', '3', '2402', '0');
INSERT INTO `yjcode_city` VALUES ('3024', '1530401', '红塔�?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3025', '1530402', '江川ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3026', '1530403', '澄江ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3027', '1530404', '�͚海ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3028', '1530405', '华宁ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3029', '1530406', '�̢��ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3030', '1530407', '峨山彝族���治ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3031', '1530408', '新平彝族傣族���治ա?, '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3032', '1530409', '元江������ߏ彝�ߏ傣�ߏ自治县', '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3033', '1530499', '其他区县', '3', '2403', '0');
INSERT INTO `yjcode_city` VALUES ('3034', '1530501', '隆阳�?, '3', '2404', '0');
INSERT INTO `yjcode_city` VALUES ('3035', '1530502', '施甸ա?, '3', '2404', '0');
INSERT INTO `yjcode_city` VALUES ('3036', '1530503', '腾冲ա?, '3', '2404', '0');
INSERT INTO `yjcode_city` VALUES ('3037', '1530504', '龙���ա?, '3', '2404', '0');
INSERT INTO `yjcode_city` VALUES ('3038', '1530505', '昌宁ա?, '3', '2404', '0');
INSERT INTO `yjcode_city` VALUES ('3039', '1530599', '其他区县', '3', '2404', '0');
INSERT INTO `yjcode_city` VALUES ('3040', '1530601', '昭阳�?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3041', '1530602', '鲁甸ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3042', '1530603', '巧家ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3043', '1530604', '盐津ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3044', '1530605', '大关ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3045', '1530606', '永善ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3046', '1530607', '绥江ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3047', '1530608', '镇雄ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3048', '1530609', '彝�̳ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3049', '1530610', '威信ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3050', '1530611', '水富ա?, '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3051', '1530699', '其他区县', '3', '15306', '0');
INSERT INTO `yjcode_city` VALUES ('3052', '1530701', '古城�?, '3', '2405', '0');
INSERT INTO `yjcode_city` VALUES ('3053', '1530702', '永胜ա?, '3', '2405', '0');
INSERT INTO `yjcode_city` VALUES ('3054', '1530703', '华坪ա?, '3', '2405', '0');
INSERT INTO `yjcode_city` VALUES ('3055', '1530704', '玉龙纳西�ߏ自治县', '3', '2405', '0');
INSERT INTO `yjcode_city` VALUES ('3056', '1530705', '宁蒗彝族���治ա?, '3', '2405', '0');
INSERT INTO `yjcode_city` VALUES ('3057', '1530799', '其他区县', '3', '2405', '0');
INSERT INTO `yjcode_city` VALUES ('3058', '1530801', '��茅�?, '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3059', '1530802', '宁洱������ߏ彝�ߏ自治县', '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3060', '1530803', '墨江������ߏ自治县', '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3061', '1530804', '景东彝族���治ա?, '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3062', '1530805', '景谷傣族彝族���治ա?, '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3063', '1530806', '镇沅彝族������ߏ拉祲ח����治ա?, '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3064', '1530807', '江城������ߏ彝�ߏ自治县', '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3065', '1530808', '孟连傣族拉祜�ߏ佤�ߏ自治县', '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3066', '1530809', '澲ײ�拉祜�ߏ自治县', '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3067', '1530810', '西盟佤族���治ա?, '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3068', '1530899', '其他区县', '3', '15308', '0');
INSERT INTO `yjcode_city` VALUES ('3069', '1530901', '临翔�?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3070', '1530902', '凤��ա?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3071', '1530903', '云县', '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3072', '1530904', '永德ա?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3073', '1530905', '镇康ա?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3074', '1530906', '双江拉祜�ߏ佤�ߏ布���族傣族���治ա?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3075', '1530907', 'Կ�马傣族佤族���治ա?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3076', '1530908', '沧源佤族���治ա?, '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3077', '1530999', '其他区县', '3', '15309', '0');
INSERT INTO `yjcode_city` VALUES ('3078', '1531001', '文山ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3079', '1531002', '��벱�ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3080', '1531003', '西畴ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3081', '1531004', '麻栗坡县', '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3082', '1531005', '马关ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3083', '1531006', '��댗ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3084', '1531007', '广南ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3085', '1531008', '富宁ա?, '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3086', '1531099', '其他区县', '3', '15310', '0');
INSERT INTO `yjcode_city` VALUES ('3087', '1531101', '��ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3088', '1531102', '个旧�?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3089', '1531103', '开远徺', '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3090', '1531104', '绿春ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3091', '1531105', '建水ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3092', '1531106', '石屏ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3093', '1531107', '弥勒ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3094', '1531108', '泸西ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3095', '1531109', '元阳ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3096', '1531110', '红河ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3097', '1531111', '金平苗族瑶族傣族���治ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3098', '1531112', '河口瑶族���治ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3099', '1531113', '屏边苗族���治ա?, '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3100', '1531199', '其他区县', '3', '15311', '0');
INSERT INTO `yjcode_city` VALUES ('3101', '1531201', '景洪�?, '3', '15312', '0');
INSERT INTO `yjcode_city` VALUES ('3102', '1531202', '勐海ա?, '3', '15312', '0');
INSERT INTO `yjcode_city` VALUES ('3103', '1531203', '勐腊ա?, '3', '15312', '0');
INSERT INTO `yjcode_city` VALUES ('3104', '1531299', '其他区县', '3', '15312', '0');
INSERT INTO `yjcode_city` VALUES ('3105', '1531301', '楚雄�?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3106', '1531302', '双柏ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3107', '1531303', '牟定ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3108', '1531304', '南华ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3109', '1531305', '�벮�ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3110', '1531306', '大姚ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3111', '1531307', '永仁ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3112', '1531308', '元谋ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3113', '1531309', '武定ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3114', '1531310', '禄丰ա?, '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3115', '1531399', '其他区县', '3', '15313', '0');
INSERT INTO `yjcode_city` VALUES ('3116', '1531401', '大理�?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3117', '1531402', '祥云ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3118', '1531403', '宾川ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3119', '1531404', '弥渡ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3120', '1531405', '永平ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3121', '1531406', '云龙ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3122', '1531407', '洱源ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3123', '1531408', '剑川ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3124', '1531409', '鹤��ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3125', '1531410', '漾濞彝族���治ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3126', '1531411', '南涧彝族���治ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3127', '1531412', '巍山彝族�ƞ族���治ա?, '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3128', '1531499', '其他区县', '3', '15314', '0');
INSERT INTO `yjcode_city` VALUES ('3129', '1531501', '潞西�?, '3', '15315', '0');
INSERT INTO `yjcode_city` VALUES ('3130', '1531502', '瑞丽�?, '3', '15315', '0');
INSERT INTO `yjcode_city` VALUES ('3131', '1531503', '梁河ա?, '3', '15315', '0');
INSERT INTO `yjcode_city` VALUES ('3132', '1531504', '盈江ա?, '3', '15315', '0');
INSERT INTO `yjcode_city` VALUES ('3133', '1531505', '陇川ա?, '3', '15315', '0');
INSERT INTO `yjcode_city` VALUES ('3134', '1531599', '其他区县', '3', '15315', '0');
INSERT INTO `yjcode_city` VALUES ('3135', '1531601', '泸水ա?, '3', '15316', '0');
INSERT INTO `yjcode_city` VALUES ('3136', '1531602', '福贡ա?, '3', '15316', '0');
INSERT INTO `yjcode_city` VALUES ('3137', '1531603', '贡山��龙�ߏ怒族���治ա?, '3', '15316', '0');
INSERT INTO `yjcode_city` VALUES ('3138', '1531604', '兰坪白族普米�ߏ自治县', '3', '15316', '0');
INSERT INTO `yjcode_city` VALUES ('3139', '1531699', '其他区县', '3', '15316', '0');
INSERT INTO `yjcode_city` VALUES ('3140', '1531701', '香格里拉ա?, '3', '15317', '0');
INSERT INTO `yjcode_city` VALUES ('3141', '1531702', '德钦ա?, '3', '15317', '0');
INSERT INTO `yjcode_city` VALUES ('3142', '1531703', '维西������ߏ自治县', '3', '15317', '0');
INSERT INTO `yjcode_city` VALUES ('3143', '1531799', '其他区县', '3', '15317', '0');
INSERT INTO `yjcode_city` VALUES ('3144', '1540101', '城关�?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3145', '1540102', '林周ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3146', '1540103', '�̢��ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3147', '1540104', '尼木ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3148', '1540105', '��水ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3149', '1540106', '堆龙德��ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3150', '1540107', '达孜ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3151', '1540108', '墨竹工卡ա?, '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3152', '1540199', '其他区县', '3', '2901', '0');
INSERT INTO `yjcode_city` VALUES ('3153', '1540201', '昌都ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3154', '1540202', '江达ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3155', '1540203', '贡觉ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3156', '1540204', '类乌齐县', '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3157', '1540205', '丁青ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3158', '1540206', '察雅ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3159', '1540207', '八宿ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3160', '1540208', '左贡ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3161', '1540209', '芒康ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3162', '1540210', '洛隆ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3163', '1540211', '边坝ա?, '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3164', '1540299', '其他区县', '3', '2903', '0');
INSERT INTO `yjcode_city` VALUES ('3165', '1540301', '乃东ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3166', '1540302', '�؎囊ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3167', '1540303', '贡嘎ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3168', '1540304', '桑日ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3169', '1540305', '琼结ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3170', '1540306', '��潧ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3171', '1540307', '措��ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3172', '1540308', '洛扎ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3173', '1540309', '�ɠ查ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3174', '1540310', '隆子ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3175', '1540311', '�ә那ա?, '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3176', '1540312', '浪卡子县', '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3177', '1540399', '其他区县', '3', '2905', '0');
INSERT INTO `yjcode_city` VALUES ('3178', '1540401', '�ߥ喀�顾�', '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3179', '1540402', '南木林县', '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3180', '1540403', '江孜ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3181', '1540404', '定日ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3182', '1540405', '萨迦ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3183', '1540406', '拉孜ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3184', '1540407', '昱���ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3185', '1540408', '谢通门ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3186', '1540409', '白朗ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3187', '1540410', '仁布ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3188', '1540411', '康马ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3189', '1540412', '定结ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3190', '1540413', '仲巴ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3191', '1540414', '��⸜ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3192', '1540415', '吉隆ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3193', '1540416', '聂拉���县', '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3194', '1540417', '萨嘎ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3195', '1540418', '岗巴ա?, '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3196', '1540499', '其他区县', '3', '15404', '0');
INSERT INTO `yjcode_city` VALUES ('3197', '1540501', '�̣曲ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3198', '1540502', '嘉黎ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3199', '1540503', '比如ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3200', '1540504', '聂���ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3201', '1540505', '安多ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3202', '1540506', '申扎ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3203', '1540507', '索县', '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3204', '1540508', '班戈ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3205', '1540509', '巴青ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3206', '1540510', '尼�˧ա?, '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3207', '1540599', '其他区县', '3', '2902', '0');
INSERT INTO `yjcode_city` VALUES ('3208', '1540601', '噶尔ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3209', '1540602', '普兰ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3210', '1540603', '���达ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3211', '1540604', '�ߥ土ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3212', '1540605', '�ǩ吉ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3213', '1540606', '改则ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3214', '1540607', '措勤ա?, '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3215', '1540699', '其他区县', '3', '15406', '0');
INSERT INTO `yjcode_city` VALUES ('3216', '1540701', '林芝ա?, '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3217', '1540702', '工布江达ա?, '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3218', '1540703', '米���ա?, '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3219', '1540704', '墨脱ա?, '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3220', '1540705', '波密ա?, '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3221', '1540706', '察隅ա?, '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3222', '1540707', '���县', '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3223', '1540799', '其他区县', '3', '2904', '0');
INSERT INTO `yjcode_city` VALUES ('3224', '1610114', '高新技���产�벼�发区', '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3225', '1610101', '���央�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3226', '1610102', '�ǲ湖�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3227', '1610103', '新城�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3228', '1610104', '碑����?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3229', '1610105', '灞桥�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3230', '1610106', '��塔�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3231', '1610107', '�֎�̳�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3232', '1610108', '临潼�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3233', '1610109', '长安�?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3234', '1610110', '蓝田ա?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3235', '1610111', '�ͨ�߿ա?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3236', '1610112', '户县', '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3237', '1610113', '高���ա?, '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3238', '1610199', '其他区县', '3', '20', '0');
INSERT INTO `yjcode_city` VALUES ('3239', '1610201', 'Կ�州区', '3', '1309', '0');
INSERT INTO `yjcode_city` VALUES ('3240', '1610202', '王益�?, '3', '1309', '0');
INSERT INTO `yjcode_city` VALUES ('3241', '1610203', '印台�?, '3', '1309', '0');
INSERT INTO `yjcode_city` VALUES ('3242', '1610204', '宜君ա?, '3', '1309', '0');
INSERT INTO `yjcode_city` VALUES ('3243', '1610299', '其他区县', '3', '1309', '0');
INSERT INTO `yjcode_city` VALUES ('3244', '1610301', '渭滨�?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3245', '1610302', '金台�?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3246', '1610303', '陈仓�?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3247', '1610304', '凤翔ա?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3248', '1610305', '岐山ա?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3249', '1610306', '�ض风ա?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3250', '1610307', '眉县', '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3251', '1610308', '陇县', '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3252', '1610309', '千阳ա?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3253', '1610310', '麟游ա?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3254', '1610311', '凤县', '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3255', '1610312', '太���ա?, '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3256', '1610399', '其他区县', '3', '1307', '0');
INSERT INTO `yjcode_city` VALUES ('3257', '1610401', '秦都�?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3258', '1610402', '杨����?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3259', '1610403', '渭城�?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3260', '1610404', '兴平�?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3261', '1610405', '三�ʦա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3262', '1610406', '泾阳ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3263', '1610407', '乾县', '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3264', '1610408', '礼泉ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3265', '1610409', '永寿ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3266', '1610410', '彬县', '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3267', '1610411', '长武ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3268', '1610412', '�߬邑ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3269', '1610413', '淳化ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3270', '1610414', '武功ա?, '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3271', '1610499', '其他区县', '3', '1302', '0');
INSERT INTO `yjcode_city` VALUES ('3272', '1610501', '临渭�?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3273', '1610502', '华阴�?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3274', '1610503', '���城�?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3275', '1310', '华县', '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3276', '1610505', '潼关ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3277', '1610506', '大荔ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3278', '1610507', '蒲城ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3279', '1610508', '澄城ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3280', '1610509', '白水ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3281', '1610510', '合阳ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3282', '1610511', '富平ա?, '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3283', '1610599', '其他区县', '3', '1305', '0');
INSERT INTO `yjcode_city` VALUES ('3284', '1610601', '宝塔�?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3285', '1610602', '延���ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3286', '1610603', '延川ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3287', '1610604', '子���ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3288', '1610605', '安塞ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3289', '1610606', '志丹ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3290', '1610607', '吴起ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3291', '1610608', '甘泉ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3292', '1610609', '富县', '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3293', '1610610', '洛川ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3294', '1610611', '宜川ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3295', '1610612', '黄龙ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3296', '1610613', '黄���ա?, '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3297', '1610699', '其他区县', '3', '1306', '0');
INSERT INTO `yjcode_city` VALUES ('3298', '1610701', '汉台�?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3299', '1610702', '南郑ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3300', '1610703', '城固ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3301', '1610704', '��Ɏ�', '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3302', '1610705', '西乡ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3303', '1610706', '勉县', '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3304', '1610707', '宁强ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3305', '1610708', '略阳ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3306', '1610709', '镇巴ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3307', '1610710', '�顝�ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3308', '1610711', '佛坪ա?, '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3309', '1610799', '其他区县', '3', '1308', '0');
INSERT INTO `yjcode_city` VALUES ('3310', '1610801', '榆阳�?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3311', '1610802', '神木ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3312', '1610803', '府谷ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3313', '1610804', '横山ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3314', '1610805', '�ǖ边ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3315', '1610806', '�뵾�ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3316', '1610807', '绥德ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3317', '1610808', '米��ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3318', '1610809', '佳县', '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3319', '1610810', '吴堡ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3320', '1610811', '清涧ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3321', '1610812', '子洲ա?, '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3322', '1610899', '其他区县', '3', '1303', '0');
INSERT INTO `yjcode_city` VALUES ('3323', '1610901', '汉滨�?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3324', '1610902', '汉阴ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3325', '1610903', '石泉ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3326', '1610904', '宁陕ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3327', '1610905', '紫阳ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3328', '1610906', '岚皋ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3329', '1610907', '平利ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3330', '1610908', '镇坪ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3331', '1610909', '�߬阳ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3332', '1610910', '白河ա?, '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3333', '1610999', '其他区县', '3', '1304', '0');
INSERT INTO `yjcode_city` VALUES ('3334', '1611001', '商州�?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3335', '1611002', '洛南ա?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3336', '1611003', '丹凤ա?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3337', '1611004', '商南ա?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3338', '1611005', '山阳ա?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3339', '1611006', '镇安ա?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3340', '1611007', '�Ҟ水ա?, '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3341', '1611099', '其他区县', '3', '16110', '0');
INSERT INTO `yjcode_city` VALUES ('3342', '1620101', '城关�?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3343', '1620102', '七里河区', '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3344', '1620103', '西固�?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3345', '1620104', '安宁�?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3346', '1620105', '红古�?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3347', '1620106', '永��ա?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3348', '1620107', '���Ʌ�ա?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3349', '1620108', '榆中ա?, '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3350', '1620199', '其他区县', '3', '2701', '0');
INSERT INTO `yjcode_city` VALUES ('3351', '1620301', '金川�?, '3', '2703', '0');
INSERT INTO `yjcode_city` VALUES ('3352', '1620302', '永�ǹա?, '3', '2703', '0');
INSERT INTO `yjcode_city` VALUES ('3353', '1620399', '其他区县', '3', '2703', '0');
INSERT INTO `yjcode_city` VALUES ('3354', '1620401', '白银�?, '3', '16204', '0');
INSERT INTO `yjcode_city` VALUES ('3355', '1620402', '平川�?, '3', '16204', '0');
INSERT INTO `yjcode_city` VALUES ('3356', '1620403', '�ǖ远ա?, '3', '16204', '0');
INSERT INTO `yjcode_city` VALUES ('3357', '1620404', '�벮�ա?, '3', '16204', '0');
INSERT INTO `yjcode_city` VALUES ('3358', '1620405', '景泰ա?, '3', '16204', '0');
INSERT INTO `yjcode_city` VALUES ('3359', '1620499', '其他区县', '3', '16204', '0');
INSERT INTO `yjcode_city` VALUES ('3360', '1620501', '秦州�?, '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3361', '1620502', '麦积�?, '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3362', '1620503', '清水ա?, '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3363', '1620504', '秦安ա?, '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3364', '1620505', '甘谷ա?, '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3365', '1620506', '武山ա?, '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3366', '1620507', '张家川回�ߏ自治县', '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3367', '1620599', '其他区县', '3', '2704', '0');
INSERT INTO `yjcode_city` VALUES ('3368', '1620601', '凉州�?, '3', '16206', '0');
INSERT INTO `yjcode_city` VALUES ('3369', '1620602', '民勤ա?, '3', '16206', '0');
INSERT INTO `yjcode_city` VALUES ('3370', '1620603', '古浪ա?, '3', '16206', '0');
INSERT INTO `yjcode_city` VALUES ('3371', '1620604', '天祝藏族���治ա?, '3', '16206', '0');
INSERT INTO `yjcode_city` VALUES ('3372', '1620699', '其他区县', '3', '16206', '0');
INSERT INTO `yjcode_city` VALUES ('3373', '1620701', '��뷞�?, '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3374', '1620702', '民乐ա?, '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3375', '1620703', '临泽ա?, '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3376', '1620704', '��돰ա?, '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3377', '1620705', '山丹ա?, '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3378', '1620706', '��南裕固�ߏ自治县', '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3379', '1620799', '其他区县', '3', '16207', '0');
INSERT INTO `yjcode_city` VALUES ('3380', '1620801', '崆峒�?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3381', '1620802', '泾川ա?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3382', '1620803', '灵台ա?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3383', '1620804', '崇信ա?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3384', '1620805', '华亭ա?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3385', '1620806', '庄浪ա?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3386', '1620807', '��顮�ա?, '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3387', '1620899', '其他区县', '3', '16208', '0');
INSERT INTO `yjcode_city` VALUES ('3388', '1620901', '��州�?, '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3389', '1620902', '玉门�?, '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3390', '1620903', '敦煌�?, '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3391', '1620904', '金塔ա?, '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3392', '1620905', '瓜州ա?, '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3393', '1620906', '��北�顏��ߏ自治县', '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3394', '1620907', '�ֿ克塞哈萨克�ߏ自治县', '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3395', '1620999', '其他区县', '3', '2706', '0');
INSERT INTO `yjcode_city` VALUES ('3396', '1621001', '西峰�?, '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3397', '1621002', '庆城ա?, '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3398', '1621003', '环县', '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3399', '1621004', '华���ա?, '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3400', '1621005', '合水ա?, '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3401', '1621006', '正宁ա?, '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3402', '1621007', '宁县', '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3403', '1621008', '镇�ʦա?, '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3404', '1621099', '其他区县', '3', '16210', '0');
INSERT INTO `yjcode_city` VALUES ('3405', '1621101', '安定�?, '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3406', '1621102', '�͚渭ա?, '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3407', '1621103', '临洮ա?, '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3408', '1621104', '漳县', '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3409', '1621105', '岷县', '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3410', '1621106', '渭源ա?, '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3411', '1621107', '陴ѥ�ա?, '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3412', '1621199', '其他区县', '3', '16211', '0');
INSERT INTO `yjcode_city` VALUES ('3413', '1621201', '武都�?, '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3414', '1621202', '成县', '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3415', '1621203', '宕�ǹա?, '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3416', '1621204', '康县', '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3417', '1621205', '文县', '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3418', '1621206', '西和ա?, '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3419', '1621207', '礼县', '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3420', '1621208', '两当ա?, '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3421', '1621209', '徽县', '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3422', '1621299', '其他区县', '3', '16212', '0');
INSERT INTO `yjcode_city` VALUES ('3423', '1621301', '临夏�?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3424', '1621302', '临夏ա?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3425', '1621303', '康乐ա?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3426', '1621304', '永靖ա?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3427', '1621305', '广河ա?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3428', '1621306', '和���ա?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3429', '1621307', '东乡�ߏ自治县', '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3430', '1621308', '积石山���安族东乡�ߏ撒拉族���治ա?, '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3431', '1621399', '其他区县', '3', '16213', '0');
INSERT INTO `yjcode_city` VALUES ('3432', '1621401', '合作�?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3433', '1621402', '临潭ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3434', '1621403', '��찼ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3435', '1621404', '舟曲ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3436', '1621405', '迭部ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3437', '1621406', '玛曲ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3438', '1621407', '碌曲ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3439', '1621408', '夏河ա?, '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3440', '1621499', '其他区县', '3', '16214', '0');
INSERT INTO `yjcode_city` VALUES ('3441', '1630101', '城中�?, '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3442', '1630102', '城东�?, '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3443', '1630103', '城西�?, '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3444', '1630104', '城北�?, '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3445', '1630105', '湟源ա?, '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3446', '1630106', '湟中ա?, '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3447', '1630107', '大�벛��ߏ土�ߏ自治县', '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3448', '1630199', '其他区县', '3', '3101', '0');
INSERT INTO `yjcode_city` VALUES ('3449', '1630201', '平安ա?, '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3450', '1630202', '乐都ա?, '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3451', '1630203', '民和�ƞ族土族���治ա?, '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3452', '1630204', '互�ֶ土族���治ա?, '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3453', '1630205', '化隆�ƞ族���治ա?, '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3454', '1630206', '循化撒拉�ߏ自治县', '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3455', '1630299', '其他区县', '3', '3102', '0');
INSERT INTO `yjcode_city` VALUES ('3456', '1630301', '海晏ա?, '3', '3103', '0');
INSERT INTO `yjcode_city` VALUES ('3457', '1630302', '祁连ա?, '3', '3103', '0');
INSERT INTO `yjcode_city` VALUES ('3458', '1630303', '����ա?, '3', '3103', '0');
INSERT INTO `yjcode_city` VALUES ('3459', '1630304', '门源�ƞ族���治ա?, '3', '3103', '0');
INSERT INTO `yjcode_city` VALUES ('3460', '1630399', '其他区县', '3', '3103', '0');
INSERT INTO `yjcode_city` VALUES ('3461', '1630401', '同仁ա?, '3', '3105', '0');
INSERT INTO `yjcode_city` VALUES ('3462', '1630402', '尖扎ա?, '3', '3105', '0');
INSERT INTO `yjcode_city` VALUES ('3463', '1630403', '泽库ա?, '3', '3105', '0');
INSERT INTO `yjcode_city` VALUES ('3464', '1630404', '河南�顏��ߏ自治县', '3', '3105', '0');
INSERT INTO `yjcode_city` VALUES ('3465', '1630499', '其他区县', '3', '3105', '0');
INSERT INTO `yjcode_city` VALUES ('3466', '1630501', '共和ա?, '3', '3104', '0');
INSERT INTO `yjcode_city` VALUES ('3467', '1630502', '同德ա?, '3', '3104', '0');
INSERT INTO `yjcode_city` VALUES ('3468', '1630503', '贵德ա?, '3', '3104', '0');
INSERT INTO `yjcode_city` VALUES ('3469', '1630504', '兴海ա?, '3', '3104', '0');
INSERT INTO `yjcode_city` VALUES ('3470', '1630505', '贵南ա?, '3', '3104', '0');
INSERT INTO `yjcode_city` VALUES ('3471', '1630599', '其他区县', '3', '3104', '0');
INSERT INTO `yjcode_city` VALUES ('3472', '1630601', '玛沁ա?, '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3473', '1630602', '班�˧ա?, '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3474', '1630603', '��뾷ա?, '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3475', '1630604', '达日ա?, '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3476', '1630605', '久治ա?, '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3477', '1630606', '玛多ա?, '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3478', '1630699', '其他区县', '3', '16306', '0');
INSERT INTO `yjcode_city` VALUES ('3479', '1630701', '玉树ա?, '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3480', '1630702', '杂多ա?, '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3481', '1630703', '称多ա?, '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3482', '1630704', '治多ա?, '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3483', '1630705', '�Ɗ谦ա?, '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3484', '1630706', '��麻�Ǳ县', '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3485', '1630799', '其他区县', '3', '16307', '0');
INSERT INTO `yjcode_city` VALUES ('3486', '1630801', '德令�����', '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3487', '1630802', '�ݼ尔���徺', '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3488', '1630803', '乌兰ա?, '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3489', '1630804', '都兰ա?, '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3490', '1630805', '天峻ա?, '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3491', '1630806', '冷湖行委', '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3492', '1630807', '大柴�ߦ行�?, '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3493', '1630808', '��崖行委', '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3494', '1630899', '其他区县', '3', '16308', '0');
INSERT INTO `yjcode_city` VALUES ('3495', '1640101', '兴���?, '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3496', '1640102', '金凤�?, '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3497', '1640103', '西夏�?, '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3498', '1640104', '灵武�?, '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3499', '1640105', '永宁ա?, '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3500', '1640106', '贺兰ա?, '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3501', '1640199', '其他区县', '3', '2801', '0');
INSERT INTO `yjcode_city` VALUES ('3502', '1640201', '大武口区', '3', '2802', '0');
INSERT INTO `yjcode_city` VALUES ('3503', '1640202', '惠农�?, '3', '2802', '0');
INSERT INTO `yjcode_city` VALUES ('3504', '1640203', '平���ա?, '3', '2802', '0');
INSERT INTO `yjcode_city` VALUES ('3505', '1640299', '其他区县', '3', '2802', '0');
INSERT INTO `yjcode_city` VALUES ('3506', '1640301', '利�벌�', '3', '2803', '0');
INSERT INTO `yjcode_city` VALUES ('3507', '1640302', '�ǒ铜峡徺', '3', '2803', '0');
INSERT INTO `yjcode_city` VALUES ('3508', '1640303', '盐���ա?, '3', '2803', '0');
INSERT INTO `yjcode_city` VALUES ('3509', '1640304', '同弨ա?, '3', '2803', '0');
INSERT INTO `yjcode_city` VALUES ('3510', '1640399', '其他区县', '3', '2803', '0');
INSERT INTO `yjcode_city` VALUES ('3511', '1640401', 'ա�州�?, '3', '2804', '0');
INSERT INTO `yjcode_city` VALUES ('3512', '1640402', '西吉ա?, '3', '2804', '0');
INSERT INTO `yjcode_city` VALUES ('3513', '1640403', '隆德ա?, '3', '2804', '0');
INSERT INTO `yjcode_city` VALUES ('3514', '1640404', '泾源ա?, '3', '2804', '0');
INSERT INTO `yjcode_city` VALUES ('3515', '1640405', '彭阳ա?, '3', '2804', '0');
INSERT INTO `yjcode_city` VALUES ('3516', '1640499', '其他区县', '3', '2804', '0');
INSERT INTO `yjcode_city` VALUES ('3517', '1640501', '���头区', '3', '16405', '0');
INSERT INTO `yjcode_city` VALUES ('3518', '1640502', '中宁ա?, '3', '16405', '0');
INSERT INTO `yjcode_city` VALUES ('3519', '1640503', '海�ʦա?, '3', '16405', '0');
INSERT INTO `yjcode_city` VALUES ('3520', '1640599', '其他区县', '3', '16405', '0');
INSERT INTO `yjcode_city` VALUES ('3521', '1650101', '天山�?, '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3522', '1650102', '沙依巴克�?, '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3523', '1650103', '新徺�?, '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3524', '1650104', '水磨沟区', '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3525', '1650105', '头屯河区', '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3526', '1650106', '达坂城区', '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3527', '1650107', '籴����?, '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3528', '1650108', '乌鲁�����ա?, '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3529', '1650199', '其他区县', '3', '2601', '0');
INSERT INTO `yjcode_city` VALUES ('3530', '1650201', '克拉玛依�?, '3', '2613', '0');
INSERT INTO `yjcode_city` VALUES ('3531', '1650202', '��山子区', '3', '2613', '0');
INSERT INTO `yjcode_city` VALUES ('3532', '1650203', '白碱滩区', '3', '2613', '0');
INSERT INTO `yjcode_city` VALUES ('3533', '1650204', '乌尔禾区', '3', '2613', '0');
INSERT INTO `yjcode_city` VALUES ('3534', '1650299', '其他区县', '3', '2613', '0');
INSERT INTO `yjcode_city` VALUES ('3535', '2614', '吐鲁番徺', '3', '16503', '0');
INSERT INTO `yjcode_city` VALUES ('3536', '1650302', '鄯善ա?, '3', '16503', '0');
INSERT INTO `yjcode_city` VALUES ('3537', '1650303', '���녋�͊县', '3', '16503', '0');
INSERT INTO `yjcode_city` VALUES ('3538', '1650399', '其他区县', '3', '16503', '0');
INSERT INTO `yjcode_city` VALUES ('3539', '2609', '������?, '3', '16504', '0');
INSERT INTO `yjcode_city` VALUES ('3540', '1650402', '伊吾ա?, '3', '16504', '0');
INSERT INTO `yjcode_city` VALUES ('3541', '1650403', '巴里坤哈萨克���治ա?, '3', '16504', '0');
INSERT INTO `yjcode_city` VALUES ('3542', '1650499', '其他区县', '3', '16504', '0');
INSERT INTO `yjcode_city` VALUES ('3543', '2608', '和田�?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3544', '1650502', '和田ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3545', '1650503', '墨玉ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3546', '1650504', '�Ю山ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3547', '1650505', '洛浦ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3548', '1650506', '�Ж勒ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3549', '1650507', '于田ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3550', '1650508', '民丰ա?, '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3551', '1650599', '其他区县', '3', '2604', '0');
INSERT INTO `yjcode_city` VALUES ('3552', '2607', '�ֿ克苏徺', '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3553', '1650602', '温宿ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3554', '1650603', '库车ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3555', '1650604', '沙雅ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3556', '1650605', '新和ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3557', '1650606', '拜城ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3558', '1650607', '乌什ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3559', '1650608', '�ֿ瓦提县', '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3560', '1650609', '�ү坪ա?, '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3561', '1650699', '其他区县', '3', '2603', '0');
INSERT INTO `yjcode_city` VALUES ('3562', '2611', '喀什�?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3563', '1650702', '疏附ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3564', '1650703', '疏勒ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3565', '1650704', '英吉�顎�', '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3566', '1650705', '泽普ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3567', '1650706', '�ǎ车ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3568', '1650707', '叶城ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3569', '1650708', '麦盖提县', '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3570', '1650709', '岳普湖县', '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3571', '1650710', '伽师ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3572', '1650711', '巴楚ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3573', '1650712', '塔什��찔干塔吉克���治ա?, '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3574', '1650799', '其他区县', '3', '2602', '0');
INSERT INTO `yjcode_city` VALUES ('3575', '1650801', '�ֿ图什�?, '3', '16508', '0');
INSERT INTO `yjcode_city` VALUES ('3576', '1650802', '�ֿ克陶县', '3', '16508', '0');
INSERT INTO `yjcode_city` VALUES ('3577', '1650803', '�ֿ合奇县', '3', '16508', '0');
INSERT INTO `yjcode_city` VALUES ('3578', '1650804', '乌恰ա?, '3', '16508', '0');
INSERT INTO `yjcode_city` VALUES ('3579', '1650899', '其他区县', '3', '16508', '0');
INSERT INTO `yjcode_city` VALUES ('3580', '2606', '��찔勒徺', '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3581', '1650902', '轮台ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3582', '1650903', '尉犁ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3583', '1650904', '若���ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3584', '1650905', '且���ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3585', '1650906', '和���ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3586', '1650907', '和硕ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3587', '1650908', '博湖ա?, '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3588', '1650909', '爫耆回�ߏ自治县', '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3589', '1650999', '其他区县', '3', '16509', '0');
INSERT INTO `yjcode_city` VALUES ('3590', '2610', '昌吉�?, '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3591', '1651002', '�֜康�?, '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3592', '1651003', '�ͼ图壁县', '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3593', '1651004', '玛纳斯县', '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3594', '1651005', '奇台ա?, '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3595', '1651006', '吉木萨尔ա?, '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3596', '1651007', '���垒哈萨克自治县', '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3597', '1651099', '其他区县', '3', '2605', '0');
INSERT INTO `yjcode_city` VALUES ('3598', '2618', '��⹐�?, '3', '16511', '0');
INSERT INTO `yjcode_city` VALUES ('3599', '1651102', '精河ա?, '3', '16511', '0');
INSERT INTO `yjcode_city` VALUES ('3600', '1651103', '温泉ա?, '3', '16511', '0');
INSERT INTO `yjcode_city` VALUES ('3601', '1651199', '其他区县', '3', '16511', '0');
INSERT INTO `yjcode_city` VALUES ('3602', '2619', '伊宁�?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3603', '2615', '奎屯�?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3604', '1651203', '伊宁ա?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3605', '1651204', '霍城ա?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3606', '1651205', '巩留ա?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3607', '1651206', '新源ա?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3608', '1651207', '昭苏ա?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3609', '1651208', '特克斯县', '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3610', '1651209', '尼勒��Ɏ�', '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3611', '1651210', '察布�ҥ尔�ӡ伯���治ա?, '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3612', '1651299', '其他区县', '3', '16512', '0');
INSERT INTO `yjcode_city` VALUES ('3613', '2620', '塔城�?, '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3614', '1651302', '乌苏�?, '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3615', '1651303', '额敏ա?, '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3616', '1651304', '沙湾ա?, '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3617', '1651305', '�ؘ里ա?, '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3618', '1651306', '裕民ա?, '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3619', '1651307', '和布克赛尔蒙古自治县', '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3620', '1651399', '其他区县', '3', '16513', '0');
INSERT INTO `yjcode_city` VALUES ('3621', '2617', '�ֿ勒泰徺', '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3622', '1651402', '布尔津县', '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3623', '1651403', '富蕴ա?, '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3624', '1651404', '福海ա?, '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3625', '1651405', '�����河县', '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3626', '1651406', '�ǒ河ա?, '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3627', '1651407', '吉木乃县', '3', '16514', '0');
INSERT INTO `yjcode_city` VALUES ('3628', '1651499', '其他区县', '3', '16514', '0');

-- ----------------------------
-- Table structure for yjcode_clear
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_clear`;
CREATE TABLE `yjcode_clear` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tp` char(50) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_clear
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_control
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_control`;
CREATE TABLE `yjcode_control` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weburlv` char(50) DEFAULT NULL,
  `webnamev` char(50) DEFAULT NULL,
  `webtit` varchar(250) DEFAULT NULL,
  `webkey` varchar(250) DEFAULT NULL,
  `webdes` text,
  `webtj` text,
  `dbsj` int(11) DEFAULT NULL,
  `ycsj` int(11) DEFAULT NULL,
  `tksj` int(11) DEFAULT NULL,
  `webtelv` char(50) DEFAULT NULL,
  `webqqv` varchar(250) DEFAULT NULL,
  `selltc` float DEFAULT NULL,
  `regmoney` float DEFAULT NULL,
  `pjjf` int(11) DEFAULT NULL,
  `zftype` int(11) DEFAULT NULL,
  `partner` char(50) DEFAULT NULL,
  `security_code` char(50) DEFAULT NULL,
  `seller_email` char(50) DEFAULT NULL,
  `ifsell` char(10) DEFAULT NULL,
  `openshop` float DEFAULT NULL,
  `ifproduct` char(10) DEFAULT NULL,
  `mailname` char(50) DEFAULT NULL,
  `mailsmtp` char(50) DEFAULT NULL,
  `mailpwd` char(50) DEFAULT NULL,
  `maildk` char(10) DEFAULT NULL,
  `tenpay1` char(50) DEFAULT NULL,
  `tenpay2` varchar(250) DEFAULT NULL,
  `qqappid` char(50) DEFAULT NULL,
  `qqappkey` varchar(200) DEFAULT NULL,
  `ifmob` char(10) DEFAULT NULL,
  `smsfun` text,
  `ifkf` char(10) DEFAULT NULL,
  `beian` char(50) DEFAULT NULL,
  `websyposv` int(11) DEFAULT NULL,
  `qdjf` int(10) DEFAULT NULL,
  `propx` int(10) DEFAULT NULL,
  `regjf` int(10) DEFAULT NULL,
  `jfmoney` int(10) DEFAULT NULL,
  `tjmoney` float DEFAULT NULL,
  `bankbh` char(50) DEFAULT NULL,
  `bankkey` char(50) DEFAULT NULL,
  `taskok` int(11) DEFAULT NULL,
  `sellbl` float DEFAULT NULL,
  `smskc` int(10) DEFAULT NULL,
  `sermode` int(10) DEFAULT NULL,
  `ipsshh` char(50) DEFAULT NULL,
  `ipszs` varchar(250) DEFAULT NULL,
  `tknum` int(10) DEFAULT NULL,
  `txdi` int(10) DEFAULT '0',
  `txfl` float DEFAULT '0',
  `nowmb` char(50) DEFAULT NULL,
  `shoprz` char(50) DEFAULT NULL,
  `inittj` varchar(200) DEFAULT NULL,
  `fhxs` char(40) DEFAULT NULL,
  `wxpay` text,
  `yunpay` varchar(250) DEFAULT NULL,
  `ifuc` int(10) DEFAULT NULL,
  `ifci` int(10) DEFAULT NULL,
  `ci` text,
  `txyh` varchar(220) DEFAULT '支付�?,
  `wxpayfs` int(10) DEFAULT NULL,
  `smsmode` int(10) DEFAULT NULL,
  `taskyj` float DEFAULT NULL,
  `ifwap` int(10) DEFAULT NULL,
  `iftask` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_control
-- ----------------------------
INSERT INTO `yjcode_control` VALUES ('1', 'http://www.ymw1.cn/', '湘琴源码�?, '湘琴源码�?���网�?网站建设,湘琴建站,网站排名��댖,���网站需要多少��,���网�顓�家公司好,网站源码,LOGO设计,源码交易,源码下载,Dz插件,Dz模板', '湘琴源码�?���网�?网站建设,湘琴建站,网站排名��댖,���网站需要多少��,���网�顓�家公司好,网站源码,LOGO设计,源码交易,源码下载,Dz插件,Dz模板', '湘琴源码网�ֽwww.xqwzjs.cn）是一家专注为企业提供个性化电子商务解决方案�Є互��콑��씨技���服�ɡ提供商,���力为全�����子商�ɡ用户提供一�顷�解决方案。湘琴源���网主要�Ǣ向公司�ƺ定客户，�ǿ�ƽ内外企�벒�个人用户，提供基于LAMP（Linux / Apache / MySQL / Php）的企业电子商务配套���务.', '<script>\r\nvar _hmt = _hmt || [];\r\n(function() {\r\n  var hm = document.createElement(\"script\");\r\n  hm.src = \"https://hm.baidu.com/hm.js?47a35b0040a512779ea2bd6761d98c12\";\r\n  var s = document.getElementsByTagName(\"script\")[0]; \r\n  s.parentNode.insertBefore(hm, s);\r\n})();\r\n</script>\r\n<script type=\"text/javascript\">\r\n    (function(win,doc){\r\n        var s = doc.createElement(\"script\"), h = doc.getElementsByTagName(\"head\")[0];\r\n        if (!win.alimamatk_show) {\r\n            s.charset = \"gbk\";\r\n            s.async = true;\r\n            s.src = \"https://alimama.alicdn.com/tkapi.js\";\r\n            h.insertBefore(s, h.firstChild);\r\n        };\r\n        var o = {\r\n            pid: \"mm_40369795_24398550_81784919\",/*推广单元ID，用于区分不同的推广渠道*/\r\n            appkey: \"\",/*��뵱�TOP平台申请�Єappkey，设置后引导成交�벅�联appkey*/\r\n            unid: \"\",/*���定义统计字�?/\r\n            type: \"click\" /* click 组件�Є入口标�?（使用click组件必设�?/\r\n        };\r\n        win.alimamatk_onload = win.alimamatk_onload || [];\r\n        win.alimamatk_onload.push(o);\r\n    })(window,document);\r\n</script>\r\n\r\n', '1', '3', '1', '15957458299', '511199479*平台客服,511199479*平台小二,511199479*招商入驻', '0.7', '0.5', '20', '0', '2088702420229558', 's5uvz0oz6nl7369y3s99stmjz1w70ov6', '15957458299', 'off', '0', 'off', 'xqwzjs@163.com', 'smtp.163.com', 'xqwzjs123', '25', '', '', '101344840', '2eb00aa0476d88ad982f725df0c4355e', 'off', 'function yjsendsms($m1,$m2){\r\n$user = \'xqwzjs123\';\r\n$password = \'taojin888\';\r\n$sign = \"【湘琴源���网】\";//短信�о名\r\nif(!empty($m1)){\r\n$url = \"http://api.smsbao.com/sms\";\r\n$url .= \'?u=\'.$user.\'&p=\'.md5($password).\'&m=\'.$m1.\'&c=\'.urlencode(iconv(\"GBK\",\"UTF-8//IGNORE\",$sign.$m2));\r\n$ret = file_get_contents($url);\r\n}\r\n}', 'on', '浙ICP�?6016550�?, '9', '5', '0', '10', '100', '0.02', '', '', '1', '0.9', '90', '0', '', '', '3', '50', '5', 'ke', 'xcf2xcf3xcf', '', '1,2,3,4,5,', ',,,', ',,', '0', '1', 'av|操|��?, '支付宝xcf', '1', '0', '0.08', '0', '0');

-- ----------------------------
-- Table structure for yjcode_db
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_db`;
CREATE TABLE `yjcode_db` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `money1` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `selluserid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `dboksj` datetime DEFAULT NULL,
  `probh` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `orderbh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_db
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_dingdang
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_dingdang`;
CREATE TABLE `yjcode_dingdang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `ddbh` char(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `ddzt` char(50) DEFAULT NULL,
  `alipayzt` char(50) DEFAULT NULL,
  `bz` varchar(250) NOT NULL,
  `ifok` int(11) DEFAULT NULL,
  `probh` varchar(250) DEFAULT NULL,
  `pronum` varchar(250) DEFAULT NULL,
  `tcid` varchar(200) DEFAULT NULL,
  `wxddbh` char(50) DEFAULT NULL,
  `jyh` varchar(250) DEFAULT NULL,
  `buyform` text,
  `shdz` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_dingdang
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_djl
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_djl`;
CREATE TABLE `yjcode_djl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  `admin` char(4) DEFAULT NULL,
  `bhid` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_djl
-- ----------------------------
INSERT INTO `yjcode_djl` VALUES ('1', '0', '2017-04-18 11:31:41', '119.0.165.112', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('2', '0', '2017-04-16 23:02:54', '101.226.89.122', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('3', '0', '2017-04-16 23:39:55', '180.153.214.190', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('4', '0', '2017-04-17 09:53:20', '121.33.112.93', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('5', '0', '2017-04-17 10:25:07', '125.110.209.250', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('6', '0', '2017-04-17 10:43:35', '113.68.65.49', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('7', '0', '2017-04-18 09:08:15', '66.249.64.73', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('8', '0', '2017-04-18 08:21:37', '66.249.64.78', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('9', '0', '2017-04-17 15:20:07', '222.216.204.200', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('10', '0', '2017-04-17 17:20:29', '101.226.68.215', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('11', '0', '2017-04-17 20:32:40', '62.210.250.212', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('12', '0', '2017-04-18 05:08:26', '66.249.64.83', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('13', '0', '2017-04-18 07:42:51', '5.9.111.70', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('14', '0', '2017-04-18 12:31:44', '66.249.66.151', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('15', '0', '2017-04-18 10:58:50', '66.249.66.147', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('16', '0', '2017-05-01 01:45:54', '61.151.226.16', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('17', '0', '2017-04-18 11:31:54', '140.207.185.112', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('18', '0', '2017-04-18 11:32:01', '180.153.214.180', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('19', '0', '2017-04-18 15:02:42', '66.249.66.210', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('20', '1', '2017-04-20 12:31:13', '58.42.95.173', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('21', '0', '2017-04-18 16:58:59', '101.226.89.115', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('22', '0', '2017-04-19 03:26:49', '192.162.227.231', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('23', '0', '2017-04-19 15:04:15', '5.9.88.103', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('24', '0', '2017-04-19 20:01:01', '213.133.111.165', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('25', '0', '2017-04-20 04:46:26', '162.210.196.98', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('26', '0', '2017-04-20 12:31:23', '180.153.81.203', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('27', '0', '2017-04-20 17:39:41', '91.209.51.22', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('28', '0', '2017-04-20 18:37:11', '114.138.180.49', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('29', '0', '2017-04-21 22:27:10', '111.122.156.86', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('30', '0', '2017-04-21 23:32:05', '111.122.156.86', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('31', '0', '2017-04-20 23:39:38', '66.249.69.52', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('32', '0', '2017-04-20 23:40:34', '66.249.69.48', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('33', '0', '2017-04-21 17:55:23', '111.122.156.86', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('34', '7', '2017-04-21 16:50:02', '111.122.156.86', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('35', '0', '2017-04-21 16:34:47', '111.122.156.86', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('36', '7', '2017-04-22 13:34:49', '119.0.172.182', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('37', '7', '2017-04-22 18:46:31', '119.0.172.182', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('38', '0', '2017-04-22 15:09:39', '123.146.196.110', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('39', '0', '2017-04-22 15:09:27', '123.146.196.110', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('40', '0', '2017-04-22 15:09:33', '123.146.196.110', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('41', '7', '2017-04-22 19:31:42', '119.0.172.182', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('42', '0', '2017-04-22 19:53:39', '119.0.172.182', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('43', '0', '2017-04-25 00:01:15', '119.0.167.80', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('44', '0', '2017-04-25 10:44:29', '183.238.50.186', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('45', '1', '2017-04-25 16:32:27', '119.0.167.80', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('46', '1', '2017-04-25 16:38:34', '119.0.167.80', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('47', '1', '2017-04-25 16:38:37', '119.0.167.80', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('48', '0', '2017-04-25 22:18:33', '123.125.193.37', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('49', '13', '2017-04-26 12:13:14', '171.110.45.58', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('50', '13', '2017-04-26 12:16:01', '171.110.45.58', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('51', '0', '2017-04-26 17:22:06', '123.125.71.33', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('52', '0', '2017-04-27 04:59:10', '66.249.79.83', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('53', '0', '2017-04-26 20:25:24', '66.249.79.78', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('54', '0', '2017-04-26 20:08:43', '66.249.79.73', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('55', '0', '2017-04-26 21:03:59', '123.151.64.143', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('56', '0', '2017-04-26 20:11:27', '180.153.201.15', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('57', '0', '2017-04-27 04:47:49', '66.249.79.73', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('58', '0', '2017-04-26 20:32:11', '66.249.79.73', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('59', '0', '2017-04-27 04:51:36', '66.249.79.78', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('60', '0', '2017-04-27 05:09:36', '119.147.207.158', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('61', '0', '2017-05-04 22:55:04', '203.208.60.245', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('62', '0', '2017-05-05 06:35:45', '203.208.60.247', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('63', '0', '2017-05-05 06:37:23', '203.208.60.243', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('64', '0', '2017-05-04 22:55:38', '203.208.60.246', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('65', '0', '2017-05-04 13:14:38', '203.208.60.244', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('66', '0', '2017-05-04 13:13:05', '203.208.60.246', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('67', '0', '2017-05-04 13:14:48', '203.208.60.243', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('68', '0', '2017-05-04 13:16:56', '203.208.60.247', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('69', '0', '2017-05-04 13:09:26', '203.208.60.245', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('70', '5', '2017-04-27 20:18:58', '1.206.180.189', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('71', '0', '2017-04-27 18:04:43', '66.249.69.44', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('72', '5', '2017-04-27 18:49:57', '1.206.180.189', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('73', '0', '2017-04-27 20:44:21', '112.90.82.218', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('74', '0', '2017-04-27 21:12:43', '183.57.53.222', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('75', '7', '2017-04-28 12:59:14', '61.159.165.77', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('76', '0', '2017-04-28 18:16:04', '203.208.60.246', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('77', '0', '2017-04-28 18:24:08', '203.208.60.247', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('78', '0', '2017-04-28 18:24:23', '203.208.60.243', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('79', '0', '2017-04-28 18:14:30', '203.208.60.244', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('80', '0', '2017-04-28 18:31:14', '203.208.60.245', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('81', '0', '2017-04-28 21:08:19', '183.57.53.197', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('82', '8', '2017-04-28 21:27:25', '61.159.165.77', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('83', '0', '2017-04-28 21:37:38', '183.57.53.177', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('84', '0', '2017-04-28 22:26:17', '101.226.64.174', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('85', '0', '2017-04-30 01:15:13', '66.249.64.78', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('86', '8', '2017-04-29 12:38:56', '61.159.165.77', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('87', '0', '2017-04-29 16:38:30', '66.249.64.78', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('88', '0', '2017-04-30 01:14:53', '66.249.64.73', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('89', '0', '2017-04-30 01:14:14', '66.249.64.83', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('90', '0', '2017-04-30 00:59:25', '203.208.60.233', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('91', '0', '2017-04-30 08:23:30', '66.249.66.147', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('92', '0', '2017-04-30 12:57:01', '120.7.92.143', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('93', '0', '2017-04-30 15:53:07', '123.147.246.177', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('94', '0', '2017-04-30 17:28:29', '66.249.66.151', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('95', '0', '2017-05-01 00:58:29', '66.249.66.79', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('96', '17', '2017-05-01 01:43:45', '106.87.11.115', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('97', '0', '2017-05-01 01:43:55', '101.226.68.200', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('98', '17', '2017-05-01 01:43:57', '106.87.11.115', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('99', '0', '2017-05-01 01:44:07', '101.226.68.200', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('100', '0', '2017-05-01 01:44:18', '101.226.33.206', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('101', '0', '2017-05-01 01:44:24', '180.153.206.21', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('102', '0', '2017-05-01 01:44:28', '117.185.27.114', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('103', '0', '2017-05-01 01:44:32', '101.226.89.123', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('104', '0', '2017-05-01 01:44:33', '101.226.68.213', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('105', '0', '2017-05-01 01:44:33', '101.226.33.220', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('106', '0', '2017-05-01 01:44:35', '101.226.33.238', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('107', '0', '2017-05-01 01:44:38', '101.226.66.173', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('108', '0', '2017-05-01 01:44:42', '101.226.89.120', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('109', '0', '2017-05-01 01:44:43', '101.226.33.218', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('110', '0', '2017-05-01 01:44:43', '101.226.61.207', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('111', '0', '2017-05-01 01:44:43', '180.153.205.253', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('112', '17', '2017-05-01 01:45:44', '106.87.11.115', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('113', '0', '2017-05-01 01:46:06', '101.226.66.192', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('114', '17', '2017-05-01 01:48:30', '106.87.11.115', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('115', '0', '2017-05-01 01:48:40', '101.226.33.240', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('116', '17', '2017-05-01 01:52:34', '106.87.11.115', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('117', '0', '2017-05-01 01:52:44', '101.226.66.174', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('118', '0', '2017-05-01 18:40:52', '123.125.71.48', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('119', '0', '2017-05-01 18:47:32', '220.181.108.115', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('120', '0', '2017-05-01 18:54:12', '220.181.108.102', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('121', '0', '2017-05-01 19:00:52', '123.125.71.46', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('122', '0', '2017-05-01 19:07:32', '123.125.71.83', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('123', '0', '2017-05-01 19:29:46', '220.181.108.123', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('124', '0', '2017-05-01 19:45:19', '123.125.71.89', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('125', '0', '2017-05-03 09:28:01', '42.236.99.65', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('126', '0', '2017-05-03 09:28:01', '42.236.10.106', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('127', '0', '2017-05-03 09:28:02', '42.236.99.30', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('128', '0', '2017-05-03 09:28:03', '42.236.99.230', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('129', '0', '2017-05-03 09:28:03', '42.236.10.106', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('130', '0', '2017-05-03 09:28:04', '42.236.10.113', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('131', '0', '2017-05-03 09:28:04', '42.236.10.75', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('132', '0', '2017-05-04 22:50:44', '203.208.60.244', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('133', '0', '2017-05-04 09:01:06', '101.226.64.174', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('134', '0', '2017-05-04 10:32:31', '42.236.99.166', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('135', '0', '2017-05-04 10:32:32', '42.236.99.79', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('136', '0', '2017-05-04 10:32:33', '180.153.236.157', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('137', '0', '2017-05-04 10:32:33', '42.236.10.82', 'c2', '4');
INSERT INTO `yjcode_djl` VALUES ('138', '0', '2017-05-04 10:32:34', '42.236.99.242', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('139', '0', '2017-05-04 10:32:35', '42.236.10.102', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('140', '0', '2017-05-04 12:22:43', '183.57.53.196', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('141', '7', '2017-05-04 22:18:47', '119.0.189.206', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('142', '0', '2017-05-05 13:42:03', '106.109.0.66', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('143', '0', '2017-05-07 02:02:16', '66.249.65.216', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('144', '0', '2017-05-06 18:07:42', '66.249.65.222', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('145', '0', '2017-05-05 15:15:16', '119.0.189.206', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('146', '0', '2017-05-05 22:02:21', '66.249.65.216', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('147', '0', '2017-05-06 11:02:12', '66.249.65.219', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('148', '0', '2017-05-06 13:52:32', '119.0.167.141', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('149', '0', '2017-05-07 04:10:20', '180.153.236.67', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('150', '0', '2017-05-07 04:21:05', '42.236.99.58', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('151', '0', '2017-05-07 04:50:02', '180.153.236.59', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('152', '0', '2017-05-07 05:02:14', '42.236.99.194', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('153', '0', '2017-05-07 05:19:12', '180.153.236.117', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('154', '0', '2017-05-07 05:33:48', '42.236.10.82', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('155', '0', '2017-05-07 14:28:38', '59.42.239.114', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('156', '0', '2017-05-08 10:31:55', '127.0.0.1', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('157', '22', '2017-05-09 14:23:28', '123.119.239.179', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('158', '22', '2017-05-09 15:43:03', '123.119.239.179', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('159', '0', '2017-05-08 17:03:43', '123.119.239.179', 'c2', '5');
INSERT INTO `yjcode_djl` VALUES ('160', '22', '2017-05-09 15:25:37', '123.119.239.179', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('161', '22', '2017-05-09 19:26:18', '60.195.25.171', 'c2', '8');
INSERT INTO `yjcode_djl` VALUES ('162', '24', '2017-05-10 12:37:21', '123.119.239.179', 'c1', '24');
INSERT INTO `yjcode_djl` VALUES ('163', '0', '2017-05-10 14:51:09', '117.136.0.180', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('164', '0', '2017-05-13 00:42:42', '27.187.255.1', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('165', '25', '2017-05-11 18:19:09', '27.187.255.1', 'c1', '25');
INSERT INTO `yjcode_djl` VALUES ('166', '0', '2017-05-10 22:38:16', '27.187.255.1', 'c2', '19');
INSERT INTO `yjcode_djl` VALUES ('167', '0', '2017-05-13 00:46:03', '27.187.255.1', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('168', '25', '2017-05-10 22:43:41', '27.187.255.1', 'c2', '20');
INSERT INTO `yjcode_djl` VALUES ('169', '25', '2017-05-10 22:45:32', '27.187.255.1', 'c2', '23');
INSERT INTO `yjcode_djl` VALUES ('170', '0', '2017-05-11 10:53:57', '27.187.255.1', 'c2', '33');
INSERT INTO `yjcode_djl` VALUES ('171', '0', '2017-05-11 12:07:51', '27.187.255.1', 'c2', '29');
INSERT INTO `yjcode_djl` VALUES ('172', '22', '2017-05-11 18:20:43', '27.187.255.1', 'c2', '34');
INSERT INTO `yjcode_djl` VALUES ('173', '0', '2017-05-11 18:21:08', '123.151.42.50', 'c2', '34');
INSERT INTO `yjcode_djl` VALUES ('174', '22', '2017-05-11 18:23:49', '123.151.42.50', 'c2', '33');
INSERT INTO `yjcode_djl` VALUES ('175', '22', '2017-05-12 23:15:03', '27.187.255.1', 'c2', '32');
INSERT INTO `yjcode_djl` VALUES ('176', '0', '2017-05-12 23:16:08', '123.151.42.50', 'c2', '32');
INSERT INTO `yjcode_djl` VALUES ('177', '25', '2017-05-12 11:49:54', '59.42.239.160', 'c1', '25');
INSERT INTO `yjcode_djl` VALUES ('178', '25', '2017-05-12 11:31:02', '27.187.255.1', 'c2', '26');
INSERT INTO `yjcode_djl` VALUES ('179', '24', '2017-05-12 14:00:45', '49.77.138.25', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('180', '0', '2017-05-12 16:13:21', '66.249.65.51', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('181', '0', '2017-05-12 16:13:31', '66.249.65.51', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('182', '0', '2017-05-12 16:13:41', '66.249.65.51', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('183', '0', '2017-05-12 16:13:52', '66.249.65.51', 'c1', '8');
INSERT INTO `yjcode_djl` VALUES ('184', '0', '2017-05-12 22:59:01', '101.226.99.197', 'c2', '32');
INSERT INTO `yjcode_djl` VALUES ('185', '0', '2017-05-12 23:06:17', '101.226.33.208', 'c2', '32');
INSERT INTO `yjcode_djl` VALUES ('186', '0', '2017-05-13 01:05:02', '27.187.255.1', 'c1', '5');
INSERT INTO `yjcode_djl` VALUES ('187', '0', '2017-05-13 00:43:32', '27.187.255.1', 'c1', '7');
INSERT INTO `yjcode_djl` VALUES ('188', '27', '2017-05-13 00:41:07', '27.187.255.1', 'c1', '27');
INSERT INTO `yjcode_djl` VALUES ('189', '27', '2017-05-13 11:49:10', '127.0.0.1', 'c1', '27');
INSERT INTO `yjcode_djl` VALUES ('190', '27', '2017-05-13 11:49:54', '127.0.0.1', 'c1', '1');
INSERT INTO `yjcode_djl` VALUES ('191', '27', '2017-05-13 12:25:04', '127.0.0.1', 'c2', '5');

-- ----------------------------
-- Table structure for yjcode_gd
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_gd`;
CREATE TABLE `yjcode_gd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `mail` char(50) DEFAULT NULL,
  `txt` text,
  `gdzt` int(10) DEFAULT NULL,
  `orderbh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_gd
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_gdhf
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_gdhf`;
CREATE TABLE `yjcode_gdhf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `gdbh` char(50) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_gdhf
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_gg
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_gg`;
CREATE TABLE `yjcode_gg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `djl` int(10) DEFAULT NULL,
  `uip` char(30) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `zt` int(10) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_gg
-- ----------------------------
INSERT INTO `yjcode_gg` VALUES ('1', '1492357221g22', '2017-04-16 23:40:21', '3', '119.0.165.112', null, null, '99', null, null);
INSERT INTO `yjcode_gg` VALUES ('2', '1492681748g50', '2017-04-20 17:49:08', '5', '114.138.180.49', null, null, '99', null, null);
INSERT INTO `yjcode_gg` VALUES ('3', '1492681757g5', '2017-04-20 17:49:17', '1', '114.138.180.49', null, null, '99', null, null);
INSERT INTO `yjcode_gg` VALUES ('6', '1492753412g98', '2017-04-21 13:43:32', '10', '111.122.156.86', null, null, '99', null, null);
INSERT INTO `yjcode_gg` VALUES ('7', '1494649500g90', '2017-05-13 12:25:00', '9', '127.0.0.1', null, null, '99', null, null);

-- ----------------------------
-- Table structure for yjcode_help
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_help`;
CREATE TABLE `yjcode_help` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `ty1id` int(11) DEFAULT NULL,
  `ty2id` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` text,
  `djl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_help
-- ----------------------------
INSERT INTO `yjcode_help` VALUES ('20', '1494649561h48', null, null, null, null, '2017-05-13 15:22:29', '99', null, null, '1');

-- ----------------------------
-- Table structure for yjcode_helptype
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_helptype`;
CREATE TABLE `yjcode_helptype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_helptype
-- ----------------------------
INSERT INTO `yjcode_helptype` VALUES ('9', '2014-10-15 17:27:48', '1', '买家指南', null, '1');
INSERT INTO `yjcode_helptype` VALUES ('10', '2014-10-15 17:27:53', '1', '卖家指南', null, '2');
INSERT INTO `yjcode_helptype` VALUES ('11', '2014-10-15 17:27:58', '1', '安全交易', null, '3');
INSERT INTO `yjcode_helptype` VALUES ('12', '2014-10-15 17:28:02', '1', '常见问题', null, '4');
INSERT INTO `yjcode_helptype` VALUES ('13', '2017-05-10 20:36:32', '1', '商务中弨', null, '5');
INSERT INTO `yjcode_helptype` VALUES ('14', '2014-10-15 17:28:28', '2', '买家指南', '妱���注册', '1');
INSERT INTO `yjcode_helptype` VALUES ('15', '2014-10-15 17:28:33', '2', '买家指南', '妱���购买', '2');
INSERT INTO `yjcode_helptype` VALUES ('16', '2014-10-15 17:28:37', '2', '买家指南', '���商品', '3');
INSERT INTO `yjcode_helptype` VALUES ('17', '2014-10-15 17:28:41', '2', '买家指南', '支付方��', '4');
INSERT INTO `yjcode_helptype` VALUES ('18', '2014-10-15 17:28:47', '2', '卖家指南', '妱���出售', '1');
INSERT INTO `yjcode_helptype` VALUES ('19', '2014-10-15 17:28:55', '2', '卖家指南', '收费�݇���', '2');
INSERT INTO `yjcode_helptype` VALUES ('20', '2014-10-15 17:29:02', '2', '卖家指南', '入驻�о约', '3');
INSERT INTO `yjcode_helptype` VALUES ('21', '2014-10-15 17:29:24', '2', '安全交易', '��̢���ֲ骗', '1');
INSERT INTO `yjcode_helptype` VALUES ('22', '2014-10-15 17:29:31', '2', '安全交易', '预防盗��', '2');
INSERT INTO `yjcode_helptype` VALUES ('23', '2014-10-15 17:29:37', '2', '安全交易', '谨防诈骗', '3');
INSERT INTO `yjcode_helptype` VALUES ('24', '2014-10-15 17:29:44', '2', '安全交易', '实名认证', '4');
INSERT INTO `yjcode_helptype` VALUES ('25', '2014-10-15 17:30:30', '2', '常见问题', '妱���充�?, '1');
INSERT INTO `yjcode_helptype` VALUES ('26', '2014-10-15 17:30:35', '2', '常见问题', '妱���提现', '2');
INSERT INTO `yjcode_helptype` VALUES ('27', '2014-10-15 17:30:41', '2', '常见问题', '真假客服', '3');
INSERT INTO `yjcode_helptype` VALUES ('28', '2014-10-15 17:30:47', '2', '常见问题', '忘记密码', '4');
INSERT INTO `yjcode_helptype` VALUES ('29', '2017-05-10 20:47:19', '2', '商务中弨', '个人版课�?, '1');
INSERT INTO `yjcode_helptype` VALUES ('30', '2017-05-10 21:09:39', '2', '商务中弨', '投资|合伙�?, '4');
INSERT INTO `yjcode_helptype` VALUES ('33', '2017-05-10 21:09:19', '2', '商务中弨', '企业版课�?, '2');
INSERT INTO `yjcode_helptype` VALUES ('34', '2017-05-10 21:09:28', '2', '商务中弨', '上门培训', '3');
INSERT INTO `yjcode_helptype` VALUES ('35', '2017-05-10 21:09:52', '2', '商务中弨', '网络一对一培训', '9');
INSERT INTO `yjcode_helptype` VALUES ('36', '2017-05-10 21:06:58', '2', '商务中弨', '微信代理招商', '6');
INSERT INTO `yjcode_helptype` VALUES ('37', '2017-05-10 21:07:04', '2', '商务中弨', '传统代理招商', '7');
INSERT INTO `yjcode_helptype` VALUES ('38', '2017-05-11 19:15:50', '1', '走进闪学��?, null, '0');
INSERT INTO `yjcode_helptype` VALUES ('39', '2017-05-11 19:16:06', '2', '走进闪学��?, '品牌故事', '1');
INSERT INTO `yjcode_helptype` VALUES ('40', '2017-05-11 19:16:38', '2', '走进闪学��?, '高管�Ƣ队', '2');
INSERT INTO `yjcode_helptype` VALUES ('41', '2017-05-11 19:17:52', '2', '走进闪学��?, '董事长致�?, '0');
INSERT INTO `yjcode_helptype` VALUES ('42', '2017-05-11 19:27:52', '2', '走进闪学��?, '大事�?, '4');

-- ----------------------------
-- Table structure for yjcode_jfrecord
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_jfrecord`;
CREATE TABLE `yjcode_jfrecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `jfnum` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_jfrecord
-- ----------------------------
INSERT INTO `yjcode_jfrecord` VALUES ('1', '1', '注册�벑�赠送积�?, '10', '2017-05-14 13:24:51', '127.0.0.1');

-- ----------------------------
-- Table structure for yjcode_kc
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_kc`;
CREATE TABLE `yjcode_kc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `userid1` int(10) DEFAULT NULL,
  `ka` text,
  `mi` text,
  `ifok` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_kc
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_kuaidi
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_kuaidi`;
CREATE TABLE `yjcode_kuaidi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tit` varchar(200) DEFAULT NULL,
  `kdweb` varchar(200) DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_kuaidi
-- ----------------------------
INSERT INTO `yjcode_kuaidi` VALUES ('2', '1492751871', '顺丰快�?, 'http://www.sf-express.com/cn/sc/', '1', '2017-04-21 13:18:15', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('3', '1494055908', '中国�̮���', '', '2', '2017-05-06 15:33:43', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('5', '1494056033', '申�벿���?, '', '3', '2017-05-06 15:33:57', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('6', '1494056039', '中国�̮���EMS', '', '4', '2017-05-06 15:34:10', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('7', '1494056052', '中�벿���?, '', '5', '2017-05-06 15:34:18', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('8', '1494056060', '圆�벿���?, '', '6', '2017-05-06 15:34:31', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('9', '1494056073', '���达快�?, '', '7', '2017-05-06 15:34:36', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('10', '1494056082', '汇�벿���?, '', '8', '2017-05-06 15:34:47', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('11', '1494056088', '天天快�?, '', '9', '2017-05-06 15:34:51', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('12', '1494056093', '宅急�?, '', '10', '2017-05-06 15:35:31', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('13', '1494056133', '�ƽ�벿���?, '', '11', '2017-05-06 15:35:38', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('14', '1494056140', '全峰快�?, '', '12', '2017-05-06 15:35:58', '0');
INSERT INTO `yjcode_kuaidi` VALUES ('15', '1494056160', '德丰物流', '', '13', '2017-05-06 15:36:11', '0');

-- ----------------------------
-- Table structure for yjcode_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_loginlog`;
CREATE TABLE `yjcode_loginlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_loginlog
-- ----------------------------
INSERT INTO `yjcode_loginlog` VALUES ('114', '2', '4', '2017-05-12 10:47:43', '27.187.255.1');
INSERT INTO `yjcode_loginlog` VALUES ('115', '2', '4', '2017-05-13 15:05:38', '127.0.0.1');
INSERT INTO `yjcode_loginlog` VALUES ('116', '2', '4', '2017-05-14 13:22:59', '127.0.0.1');
INSERT INTO `yjcode_loginlog` VALUES ('117', '1', '1', '2017-05-14 13:24:50', '127.0.0.1');

-- ----------------------------
-- Table structure for yjcode_moneyrecord
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_moneyrecord`;
CREATE TABLE `yjcode_moneyrecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `moneynum` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `rengbh` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_moneyrecord
-- ----------------------------
INSERT INTO `yjcode_moneyrecord` VALUES ('1', '1494739490', '1', '注册�벑�赠送金�?, '0.5', '2017-05-14 13:24:50', '127.0.0.1', null, null);

-- ----------------------------
-- Table structure for yjcode_news
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_news`;
CREATE TABLE `yjcode_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type1id` int(11) DEFAULT NULL,
  `type2id` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` longtext,
  `djl` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `bh` char(50) DEFAULT NULL,
  `ifjc` int(11) DEFAULT NULL,
  `titys` char(20) DEFAULT NULL,
  `zze` char(50) DEFAULT NULL,
  `ly` char(50) DEFAULT NULL,
  `lyurl` varchar(250) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wdes` text,
  `zt` int(11) DEFAULT NULL,
  `iftp` int(11) DEFAULT NULL,
  `indextop` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_news
-- ----------------------------
INSERT INTO `yjcode_news` VALUES ('1', '0', '0', null, null, '131', '2017-04-20 17:49:22', '2017-04-20 17:49:22', '114.138.180.49', '1492681762n66', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('2', '0', '0', null, null, '48', '2017-04-21 13:02:28', '2017-04-21 13:02:28', '111.122.156.86', '1492750948n24', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('3', '0', '0', null, null, '30', '2017-04-21 13:03:55', '2017-04-21 13:03:55', '111.122.156.86', '1492751035n15', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('5', '0', '0', null, null, '154', '2017-04-21 13:29:14', '2017-04-21 13:29:14', '111.122.156.86', '1492752554n77', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('6', '0', '0', null, null, '185', '2017-04-21 13:43:24', '2017-04-21 13:43:24', '111.122.156.86', '1492753404n93', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('7', '0', '0', null, null, '110', '2017-04-21 13:43:35', '2017-04-21 13:43:35', '111.122.156.86', '1492753415n55', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('14', '0', '0', null, null, '103', '2017-05-08 13:24:08', '2017-05-08 13:24:08', '123.119.239.179', '1494221048n66', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('15', '0', '0', null, null, '71', '2017-05-09 15:29:32', '2017-05-09 15:29:32', '123.119.239.179', '1494314972n100', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('16', '0', '0', null, null, '51', '2017-05-09 15:43:37', '2017-05-09 15:43:37', '123.119.239.179', '1494315817n90', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('17', '0', '0', null, null, '158', '2017-05-10 20:27:32', '2017-05-10 20:27:32', '27.187.255.1', '1494419252n93', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('18', '0', '0', null, null, '104', '2017-05-10 20:31:20', '2017-05-10 20:31:20', '27.187.255.1', '1494419480n16', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('19', '23', '0', '出错:91-���设置对象变量或 With block 变量', '<p style=\"margin-top: 0px; margin-bottom: 0.5em; padding: 0px; list-style: none; border: 0px; font-size: 15px; line-height: 22px; white-space: normal; color: rgb(51, 51, 51); outline: invert none 0px; font-stretch: normal; font-family: 微软��黑, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255);\">T3���케�ж行�ߥ记账时，弹出报�ә�ϸ出错:91-���设置对象变量或 With block 变量</p><p style=\"margin-top: 0px; margin-bottom: 0.5em; padding: 0px; list-style: none; border: 0px; font-size: 15px; line-height: 22px; white-space: normal; color: rgb(51, 51, 51); outline: invert none 0px; font-stretch: normal; font-family: 微软��黑, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255);\"><img title=\"出错91.png\" alt=\"出错91.png\" src=\"http://qxu1152210157.my3w.com/config/ueditor/php/upload/98491494423500.png\" style=\"margin: 0px; padding: 0px; list-style: none; border: 0px; font-size: 12px; outline: invert none 0px;\"/></p><p style=\"margin-top: 0px; margin-bottom: 0.5em; padding: 0px; list-style: none; border: 0px; font-size: 15px; line-height: 22px; white-space: normal; color: rgb(51, 51, 51); outline: invert none 0px; font-stretch: normal; font-family: 微软��黑, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255);\">这是�Ơ为计算���名称中含有特殊字符，计算机�᫧�应只包含字母和数字，不应包含符��、中文，��ɦ��?�?/p><p style=\"margin-top: 0px; margin-bottom: 0.5em; padding: 0px; list-style: none; border: 0px; font-size: 15px; line-height: 22px; white-space: normal; color: rgb(51, 51, 51); outline: invert none 0px; font-stretch: normal; font-family: 微软��黑, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255);\">否则�벯����财�ɡ软件报�ә�?/p><p style=\"margin-top: 0px; margin-bottom: 0.5em; padding: 0px; list-style: none; border: 0px; font-size: 15px; line-height: 22px; white-space: normal; color: rgb(51, 51, 51); outline: invert none 0px; font-stretch: normal; font-family: 微软��黑, Arial, Helvetica, sans-serif; background-color: rgb(255, 255, 255);\"><img title=\"计算���名.png\" alt=\"计算���名.png\" src=\"http://qxu1152210157.my3w.com/config/ueditor/php/upload/31761494423500.png\" style=\"margin: 0px; padding: 0px; list-style: none; border: 0px; font-size: 12px; outline: invert none 0px;\"/></p>', '162', '2017-05-10 21:37:55', '2017-05-10 21:37:55', '27.187.255.1', '1494423475n9', '0', '#333', '', '', '', '出错:91-���设置对象变量或 With block 变量', 'T3���케�ж行�ߥ记账时，弹出报�ә�ϸ出错:91-���设置对象变量或 With block 变量这是�Ơ为计算���名称中含有特殊字符，计算机�᫧�应只包含字母和数字，不应包含符��、中文，��ɦ��?。否则�ϸ导致财务软件报错�?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('20', '23', '0', '用友T6进入系统管理提示启动MSDTC���务失败', '<p>按以下步骤操作�ϸ</p><p>1、打开注册表，删除注册表中�Є键�?HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services</p><p>\\MSDTC&nbsp;HKEY_LOCAL_MACHINE\\SOFTWARE\\Microsoft</p><p>\\MSDTC&nbsp;HKEY_CLASSES_ROOT\\CID<br style=\"padding: 0px; margin: 0px;\"/>2、点击���脑左下角 开始—运�?，输入cmd �ͽ令进入 DOS窗口</p><p>3、停止MSDTC���务：net&nbsp;stop&nbsp;msdtc</p><p>4、卸���SDTC���务：msdtc&nbsp;-uninstall</p><p>5、��新安装MSDTC���务：msdtc&nbsp;-install&nbsp;</p><p>6、卸��IS，��新安装IIS</p><p><br/></p>', '88', '2017-05-10 22:42:40', '2017-05-10 22:42:40', '27.187.255.1', '1494427360n58', '0', '#333', '', '', '', '用友T6进入系统管理提示启动MSDTC���务失败', '按以下步骤操作�ϸ1、打开注册表，删除注册表中�Є键�?HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Services\\MSDTC&nbsp;HKEY_LOCAL_MACHINE\\SOFTWARE\\Microsoft\\MSDTC&nbsp;HKEY_CLASSES_ROOT\\CID2、点击���脑左下角 开始—运�?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('21', '23', '0', '用友设置季度利润�?, '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"overflow: hidden; font-family: Verdana; padding: 0px; margin: 0px;\">1、新建利润表（进入财�ɡ报表之后，�͹����زז�件�?-�زז�建�?-左边�͉择行业��质--右边�͉择利润表Ｖ</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">2、将左下角红色的字切换成�ؘ格式�顐��͉中C列�ֽ�����꧀?-�زכ�换”Ｖ</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">3、输入查�ؾ内容为：月，再��셥��换内容为�ϸ�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">4、取������Ӯ字�زל��؝�ֽ�زו�据�?-�؜关�Ӯ字��?-�؜取消�?-勾选月�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">5、添�ɠ关�Ӯ字�؜季�؝�ֽ�زו�据�?-�؜关�Ӯ字��?-�؜设置�?-勾选季�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">6、最后将左下角红色的字切换成�زו�据”之后录入数据�ֽ�زו�据�?-�؜关�Ӯ字��?-�؜录入�?-季度可以�͉择�?/p><p><br/></p>', '156', '2017-05-10 22:44:03', '2017-05-10 22:44:03', '27.187.255.1', '1494427443n43', '0', '#333', '', '', '', '用友设置季度利润�?, '1、新建利润表（进入财�ɡ报表之后，�͹����زז�件�?-�زז�建�?-左边�͉择行业��质--右边�͉择利润表Ｖ2、将左下角红色的字切换成�ؘ格式�顐��͉中C列�ֽ�����꧀?-�زכ�换”Ｖ3、输入查�ؾ内容为：月，再��셥��换内容为�ϸ�?、取������Ӯ字�زל��؝�ֽ��?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('22', '23', '0', '用友�ƺ定资产计提折旧报错', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">��벥�账套备份，对账套�ا行语句插入8���份�Є折�ߧ分配凭证记录，勇后重新计提折旧�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">insert fa_DeprVoucherMain(loptID,sNum,iMaxPeriod,iMinPeriod,istyle) values (86,&#39;08&#39;,8,8,1)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\">fa_DeprVoucherMain 折旧分配凭证主表</p><p><br/></p>', '5', '2017-05-10 22:44:26', '2017-05-10 22:44:26', '27.187.255.1', '1494427466n81', '0', '#333', '', '', '', '用友�ƺ定资产计提折旧报错', '��벥�账套备份，对账套�ا行语句插入8���份�Є折�ߧ分配凭证记录，勇后重新计提折旧。insert fa_DeprVoucherMain(loptID,sNum,iMaxPeriod,iMinPeriod,istyle) values (86,&#39;08&#39;,8,8,1)fa_DeprVoucherMain 折旧分配凭证主表', '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('23', '23', '0', '用友T3取消正常单据记账', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"overflow: hidden; font-family: Verdana; padding: 0px; margin: 0px;\">�Ơ为��캓已经������处理了��</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 12px; text-align: justify; line-height: 24px; white-space: normal; font-stretch: normal; font-family: Simsun; text-indent: 28px; background-color: rgb(255, 255, 255);\"><span style=\"overflow: hidden; font-family: Verdana; padding: 0px; margin: 0px;\">�͹����زנ�算�Ũ��′ל����处理�Ũ��“已������处理��캓�؝勾上需要取消期���处理的��캓后点击��������，取消������处理后再�͹����زנ�算�?�زנ�算�?�؜取消正常单据记账”，�͉择��캓�͹������������，�͉择要取消记账的单据�͹����زׁ���Ѐ��?/span></p><p><br/></p>', '169', '2017-05-10 22:44:56', '2017-05-10 22:44:56', '27.187.255.1', '1494427496n49', '0', '#333', '', '', '', '用友T3取消正常单据记账', '�Ơ为��캓已经������处理了���͹����زנ�算�Ũ��′ל����处理�Ũ��“已������处理��캓�؝勾上需要取消期���处理的��캓后点击��������，取消������处理后再�͹����زנ�算�?�زנ�算�?�؜取消正常单据记账”，�͉择��캓�͹������������，�͉择要取消记账的单据�͹�����?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('24', '23', '0', '解决用友软件429���ﯯ�Є方�?, '<p><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">1�?nbsp; 修复安装用友软件一试��&nbsp;</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">850以后版本�Є软件，把安装光盘放入光驱，���动运行后，都�ϸ提示�؜修��Ѐ�，�؜修改”，�؜删除”之类的提示，选择�؜修��Ѐ�，待复制��文件后，重启计算���，再运行相应出�ә模块一试，如果�����行可以进行下一步�?nbsp;</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">ա�因分析�뵿�种情况一般是妱����͠成�Є呢？因为大家在使用用友软件�Є计算机�¦��般���进行其他软件�Є操作，如安装一些学习、游戏等��씨软件。安装这些软件一般不�벯�用友软件�͠成影响，但是在卸载这些软件�Є时���，常常会遇到这�ݷ的提示，′ן��Ґ文件是系统共享文件，是否删除？�؝有�زט��؝，�؜否�؝，�؜全是”，�؜全否”之类的提示，一般朋友为了不在系统中留下垃圾文件，选择了′ט��؝或是“全是”。这�ݷ就���可能把用友软件也共享使用的系统文件删除了，�ո��用用友软件自勇就会报�ә�?nbsp;</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">&nbsp;2、用友软件�벸���ݔ�windows系统��?OCX文件，从这里�Ԁ�؋试诿����?/span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">用友软件注册用到���常用�Є文件是richtx32.ocx、msmask32.ocx、mscomm32.ocx。将这些文件重新注册试试�?/span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">重新注册richtx32.ocx(可从其他���子拷贝新的richtx32.ocx文件)&nbsp;&nbsp;&nbsp; 在[开重新注册完这三个ocx文件�?��账可以顺利进入,�ҥ询��账,明细账都没有问题.���此问题全部解决,从而避�ո��重装系统�Є麻�?&nbsp;</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">(如果重新注册完这三个文件后���不行�Є话,也只能��装系统��)</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">始]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [运行]下输�?/span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp; regsvr32&nbsp; &quot;c:\\windows\\system\\richtx32.ocx&nbsp;</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">regsvr32是��新注册系统文件的�ͽ令,平时我们�χ到�Є系统MSADO15.DLL出错,也可以用这个�ͽ令来��新注册MSADO15.DLL以解决问�?其他dll文件出错也一�ݷ这�ݷ解�?&nbsp;</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">重新注册系统文件�ո��可以解决429���ﯯ,Կ�且可以解决�Ơ系统MSADO15.DLL出错Կ�导���的第一次启�ɨ系统管理提���A口令被修改的问题。我惴���后大家遇�?29���ﯯ�߶，�ոϸ束�׹�ߠ策了吧</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">3.开�?运行/��셥regsvr32 C:\\windows\\system32\\ufcomsql\\usnote.dll</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; regsvr32 C:\\WINDOWS\\system32\\ufcomsql\\uszzpub.dll</span><br style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 22px; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; regsvr32 C:\\WINDOWS\\system32\\ufcomsql\\ufrtprn.ocx</span></p>', '37', '2017-05-10 22:46:11', '2017-05-10 22:46:11', '27.187.255.1', '1494427571n33', '0', '#333', '', '', '', '解决用友软件429���ﯯ�Є方�?, '1�?nbsp; 修复安装用友软件一试��&nbsp;850以后版本�Є软件，把安装光盘放入光驱，���动运行后，都�ϸ提示�؜修��Ѐ�，�؜修改”，�؜删除”之类的提示，选择�؜修��Ѐ�，待复制��文件后，重启计算���，再运行相应出�ә模块一试，如果�����行可以进�?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('25', '23', '0', '用友财务软件ufo报表编制流程', '<p>从新建报表的角度来看，其�ո��步骤大体分为七步，在具体��씨�߶，具体涉�ǿ哪几步应视具体情况而定�?/p><p>1、启�ɨ财�ɡ报表，建立报表</p><p>2、设计报表的�ݼ��</p><p>3、定义各类公�?/p><p>4、报表数据处�?/p><p>5、报表图形处�?/p><p>6、打印报�?/p><p>7、退出财�ɡ报表系�?/p><p><br/></p>', '24', '2017-05-10 22:46:35', '2017-05-10 22:46:35', '27.187.255.1', '1494427595n76', '0', '#333', '', '', '', '用友财务软件ufo报表编制流程', '从新建报表的角度来看，其�ո��步骤大体分为七步，在具体��씨�߶，具体涉�ǿ哪几步应视具体情况而定�?、启�ɨ财�ɡ报表，建立报表2、设计报表的�ݼ��3、定义各类公�?、报表数据处�?、报表图形处�?、打印报�?、退出财�ɡ报表系�?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('26', '23', '0', '用友软件u8妱���对�ϸ计科目进行增�ɠ、修改和删除', '<p><span style=\"overflow: hidden; font-stretch: normal; font-size: 12px; line-height: 24px; font-family: Arial, Helvetica, sans-serif, 微软��黑, 宋体; background-color: rgb(255, 255, 255);\">在设置——财�ɡ——�ϸ计科目中可以进行�뵮�科目�Є增�ɠ、修改、删除等工作〱�ϸ计科目名称可以进行更改、科目编���不能进行更改��系统可以任意设置���级科目�Є平级科目，也允许增�ɠ���级科目的下级科目，增�ɠ以后，���级科目�Є金额�ϸ���动地转到最���级科目�?/span><br style=\"white-space: normal; font-stretch: normal; font-size: 12px; line-height: 24px; font-family: Arial, Helvetica, sans-serif, 微软��黑, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-stretch: normal; font-size: 12px; line-height: 24px; font-family: Arial, Helvetica, sans-serif, 微软��黑, 宋体; background-color: rgb(255, 255, 255);\">注意�벦�果不指定�ж行、现金的��帐科目，将�ߠ法进行出纳管理�?/span><br style=\"white-space: normal; font-stretch: normal; font-size: 12px; line-height: 24px; font-family: Arial, Helvetica, sans-serif, 微软��黑, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-stretch: normal; font-size: 12px; line-height: 24px; font-family: Arial, Helvetica, sans-serif, 微软��黑, 宋体; background-color: rgb(255, 255, 255);\">在�ϸ计科目界�Ǣ—�?gt;编辑�ؔ�?gt;指定科目�ؔ�?gt;现金��帐科目�ؔ�?gt;�ж行��帐科目�ؔ—�?gt;�؝到&quot;已选科�?quot;�ݏ中�ؔ�?gt;确定</span></p>', '146', '2017-05-10 22:47:17', '2017-05-10 22:47:17', '27.187.255.1', '1494427637n37', '0', '#333', '', '', '', '用友软件u8妱���对�ϸ计科目进行增�ɠ、修改和删除', '在设置——财�ɡ——�ϸ计科目中可以进行�뵮�科目�Є增�ɠ、修改、删除等工作〱�ϸ计科目名称可以进行更改、科目编���不能进行更改��系统可以任意设置���级科目�Є平级科目，也允许增�ɠ���级科目的下级科目，增�ɠ以后，���级科目�Є金额�ϸ���动地转�?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('27', '22', '0', '财务管理陷阱和隐��你知多�?', '<p><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">一套��整企�뵴��ɡ模��Ɍ�括三张表:资产负债表、利润表、现金流量表.这三张表相互��쳻互相影响,构成了一个企�뵴��ɡ运营��整模�?��뵱�对模��ɏ�数调�?可对企业各种运营�Ӷ况进行���쩶,从而对现金流和估值有深入�Є分�?�؍能深入��ا�公司运营���质.������收藏!&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">1.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">大多数企�뵮�置的财务部门只是负责账目�Є记录、核算等基础��的工作,他们分不清财�ɡ管理与�뵮��Є区�?��߿认为财务管理和�ϸ计是相同�Є概�?其实这是���ﯯ��?财务管理和�ϸ计是不同�Є两个概�?�뵮�是财�ɡ管理的一部分.�뵮�工作是财�ɡ管理中���基础�Є工�?为其提供财务数据�Є支�?��뵱�财务管理制定出适合企业发展�Є道�?�Ơ此,要明确财�ɡ管理和�뵮��Є各 ���的职能.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">2.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">部分公司�Є财�ɡ部门下也�ϸ���一些分公司财务�?在这种情况下往往很难协调各种财务关系,只是�؍各���的部门利益出发,�ߠ法为公司的战略提供一个有�ɛ的财务决策.�Ơ此,要��调各部门之间�Є关�?�Ͽ免财务风���,企业�Є财�ɡ管��ئ�配合发展战略�Є实�?&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">3.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">一些企业的财务管理Կ�为保证企业利润�Є最大化Կ�提出��一些错误的财务决策,这样过度�Є追求利润并不利于企业的长久发展.企业在追求利润的同时也要顾�ǿ到消费者、投资者、员工等�Є利�?以���证企��⻷���的���大化.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">4.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">��˼��뵧�模扩大后,不少财务管理Կ�为��ؿ�求更大的利益不顾风���进行�벅�化理�?但是企业并不具备相关�Є财�ɛ、人�ɛ和精力,这时��顯�企业�Є发展是�Ǟ常不利��?�Ơ此,财务管理Կ�要 �ݹ据��쉍�Є经济形�ɿ和企业�Є实际发展情况来制定出相��욄财务计划.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">5.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">随着经济�Є发展和�߶代�Є变�?不少�Є财�ɡ管理人�͘的工作方��已经�ߠ法满足企业�Є发展需�?�Ơ此,财务管理人员要结合目�᫚�经济形势�͂时改变���己�Є工佲ר��?建立���全财务管理制度,明确工作职责,�ֲ范财务风���,提���企业竞争��?&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">在现代企业管理当�?财务管理是一项涉及���广、综合性和制约��都������Є系统工�?它是��뵱�价值形��对资金运动进行决策、计划和控制�Є综合性管�?是企业管理的�ݸ弨内容.部分企业管理Կ�在财务管理活动�?�ո��用价���实物管�?轻价���综合管�?�᫔�产成���管�?轻资金成������?重当���收�?轻风险���?�ո��后分�?轻事前预�ֲ等.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">这造成了企�뵴��ɡ管理无章、无�?��ﴢ�ɡ工作埋下��隐患,较为普遍�Є问�����要有以下几个方���:&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">1�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">��ɉ�预算不力,��ɐ�分析不到�?�����企业管理Կ�事前没���采��数据进行认真分析并编制预算,在事中执行��程中也没���对预算完成情况进行严格Կ�核,��ɐ�评价和分析不到位也是企业�Ǣ临�Є��要问�?&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">2�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">信息化程度不�?缺乏财务创新.在现代企业管理当�?�����企业财务管理模��受网绲׊����的限制,采用较分散的管理模��,电子化程度不�?财务信息�¦��级之间无法共�?监管信息反馈滞后,工作效率低下,没有开发出能适应电子商务环境�Є财�ɡ管理信息系�?&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">3�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">财务架构不健�?组织���构设置不合�?大部分企�뵴��ɡ机构的设置是中间层次多、效率���?还有部分企业管理Կ�在财务���构设置方���不够科学,���的��߿���设置专门的财务���构.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">4�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">内��体系不���?缺乏风���管理�׏识.部分企业财务运行不够规范,权责不到�?内部控制制度�Љ基���财�ɡ管理制度不���全.部分企业缺乏风���管理和��制机�?&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">5�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">费用管理不规��?资产管理散乱.在费用开支上,部分企业管理�ո��,���建立或���实�?quot;一支���&quot;审批制度.在资产管理上,部分企业没有定期对资产进行盘��?资产实物与��记簿�᫬�,实物管理和账�ɡ管理都���很多���?&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">6�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">成本�ݸ算粗放,成本控制�ո��.���的企业成本�ݸ算十分粗放,将各�ո��品成���笼统汇��核�?不利于加强成������?���的企业管理Կ�只注��生产过程�Є成������?��ɉ�、事中��制能�ɛ輩�?�͠成不必要的浪费.&nbsp;</span><br style=\"font-size: 14px; white-space: normal; word-wrap: break-word; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(68, 68, 68); font-stretch: normal; line-height: 21px; font-family: Tahoma, &#39;Microsoft Yahei&#39;, Simsun; background-color: rgb(255, 255, 255);\">在财�ɡ管理当中应�Ԁ重避�ո��述问题的出现,在日常企业管理方�Ǣ只���加强财�ɡ管�?��ոϸ增加企业�Є竞争能��?提���企业抵抗市场风����Є能��?�ة大企业�����,�؀以财�ɡ管理的���序和规���是企业可持续发屿���前提. &nbsp;</span></p>', '18', '2017-05-10 22:48:49', '2017-05-10 22:48:49', '27.187.255.1', '1494427729n24', '0', '#333', '', '', '', '财务管理陷阱和隐��你知多�?', '一套��整企�뵴��ɡ模��Ɍ�括三张表:资产负债表、利润表、现金流量表.这三张表相互��쳻互相影响,构成了一个企�뵴��ɡ运营��整模�?��뵱�对模��ɏ�数调�?可对企业各种运营�Ӷ况进行���쩶,从而对现金流和估值有深入�Є分�?�؍能深入��ا�公司运营���质', '0', '1', '0', null);
INSERT INTO `yjcode_news` VALUES ('28', '23', '0', '用友u8软件妱���结账�᫻��?, '<span id=\"_baidu_bookmark_start_1\" style=\"display: none; line-height: 0px;\"></span><span id=\"_baidu_bookmark_start_3\" style=\"display: none; line-height: 0px;\"></span><p>1、如何进行帐套结�?A、除��账以外�Є系统应首先结账，即釴Ѵ�管理、库存管理、存货核算、应收应付系统、固�뵵�产系统等应在��账结账��ɉ�进行结账; B、执行记账程序�ϸ记账��ɺ�在财�ɡ�ϸ计——总账�ؔ—凭证——记账中(注意记账��ɉ�要执行审�ݸ命�?; C、记账��毕后，执行对账程�?不是�Ǟ必�?�뵴��ɡ�ϸ计——总账�ؔ—期���——对�? D、对账��毕后，执行结账程序�ϸ财务�뵮��ؔ—总账�ؔ—期���—��컓�?/p><p>2、如何进行帐套的�᫻��?当系统结账��毕后，若发现已结账的���份中存在错误，需要修改的，必须执行反结账�ͽ令;�᫻�账的步骤为�ϸ 财务�뵮��ؔ—总账�ؔ—期���—��컓账，将鼠�݇指向需要修改的���份，同�߶按下ctrl+shift+f6�Ӯ，系统会提示输入密���，��셥正确�Є密���后，反结账完成; 财务�뵮��ؔ—总账�ؔ—期���——对账，同时按下ctrl+H，系统�ϸ提示�����ׁ�复记账前�Ӷ态已被激活�?勇后在财�ɡ�ϸ计——总账�ؔ—凭证——恢复记账前�Ӷ态中�ا行反记账命�? 恢复到记账前�Ӷ态后，需要修改凭证的，���需要取�����证审��?注意�뵰�审核谁取�?。取�����证审�ݸ后，就可以修改凭证�?/p><p><br/></p><span id=\"_baidu_bookmark_end_4\" style=\"display: none; line-height: 0px;\"></span><span id=\"_baidu_bookmark_end_2\" style=\"display: none; line-height: 0px;\"></span>', '102', '2017-05-10 22:50:26', '2017-05-10 22:50:26', '27.187.255.1', '1494427826n15', '0', '#333', '', '', '', '用友u8软件妱���结账�᫻��?, '1、如何进行帐套结�?A、除��账以外�Є系统应首先结账，即釴Ѵ�管理、库存管理、存货核算、应收应付系统、固�뵵�产系统等应在��账结账��ɉ�进行结账; B、执行记账程序�ϸ记账��ɺ�在财�ɡ�ϸ计——总账�ؔ—凭证——记账中(注意记账��ɉ�要执行审��?, '0', '1', '0', null);
INSERT INTO `yjcode_news` VALUES ('29', '22', '0', '�뵮�行业是如何分类的�?, '<p><span style=\"overflow: hidden; font-size: 14px; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">按行�번�为�ϸ工业企业�뵮�、商品流����ϸ计、金融证券�ϸ计、���险企���ϸ计、施工企���ϸ计、房地产���ϸ计、邮电�뵮��뵮�、农��⼁���ϸ计、旅游餐饮�ϸ计、医疗卫生�ϸ计、交��뵿����ϸ计、文化教���ϸ计、物业管理�ϸ计、行政事���ϸ计、上市公司�ϸ计、物流企���ϸ计、连�Ӂ经营�ϸ计、出�����刷�ϸ计、私营企���ϸ计、小企业�뵮�(制造业)�뵮�、小企业�뵮�(商业)�뵮�、����ɛ企���ϸ计、煤�ͭ企���ϸ计、钢�Ё企���ϸ计、石油化工�ϸ计、汽车行���ϸ计、烟��企���ϸ计、���类企���ϸ计、食品企���ϸ计、药品企���ϸ计、加工制�͠�ϸ计、轻工纺织�ϸ计、外经外贸�ϸ计、信息咨询服�ɡ业�뵮�、广�͊服�ɡ�ϸ计、房屋中介服�ɡ�ϸ计、徺场�ֽ农贸、五金、批发、建材、服装等）�ϸ计、个人独资企���ϸ计、���新技���企���ϸ计、软件�ǿ��成电路�뵮��?nbsp;</span><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按工作内容分为�ϸ��帐�뵮�、���来�ϸ计、成����ϸ计、材料�ϸ计等�?/span></p>', '19', '2017-05-10 22:52:23', '2017-05-10 22:52:23', '27.187.255.1', '1494427943n23', '0', '#333', '', '', '', '�뵮�行业是如何分类的�?, '按行�번�为�ϸ工业企业�뵮�、商品流����ϸ计、金融证券�ϸ计、���险企���ϸ计、施工企���ϸ计、房地产���ϸ计、邮电�뵮��뵮�、农��⼁���ϸ计、旅游餐饮�ϸ计、医疗卫生�ϸ计、交��뵿����ϸ计、文化教���ϸ计、物业管理�ϸ计、行政事���ϸ计、上市公司�ϸ�?, '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('30', '23', '0', '�뵮�证的�᫱����哪�?', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">一开始我们���是先��ا�一下�ϸ计证�Є分类，这样����ֶ于我们对�뵮�证有个全�Ǣ的��ا�，也在弨里稍微盘算一下从事�ϸ计工作应该��ݚ�证书���哪些。这�?012�뵮�就业前景��˸�分析�Є第一个方�Ǣ〱����Ǣ是我��解到�Є�ϸ计证比輩全����Є一些分类�ϸ</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">1、上岗证(�뵮��?�ؔ—�ϸ计从�뵵��ݼ证书、�ϸ计���算化�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">2、职称证�ؔ—�ֶ理�ϸ计师(初级)、�ϸ计师(中级)、���级�ϸ计师(高级)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">3、执�뵵��ݼ证�ؔ—注册�ϸ计师(CPA-PRC)�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">4、特许公认注册�ϸ计师(英国、欧洲�ǿ许多主要�ƽ家法定�뵮�师资��?(ACCA)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">5、国际注册内部审计师(CIA)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">6、英�ƽ国际�ϸ计师(AIA)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">7、���ƽ注册�ϸ计师(CPA-US)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">8、英�ƽ特许管理�ϸ计师证书(CIMA)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">9、加拿大注册�뵮��?CGA)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">10、澳大利亚注册�ϸ计师(CPA-AS)</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">11、���ƽ注册管理�ϸ计师(CMA)</p>', '15', '2017-05-10 22:52:43', '2017-05-10 22:52:43', '27.187.255.1', '1494427963n22', '0', '#333', '', '', '', '�뵮�证的�᫱����哪�?', '一开始我们���是先��ا�一下�ϸ计证�Є分类，这样����ֶ于我们对�뵮�证有个全�Ǣ的��ا�，也在弨里稍微盘算一下从事�ϸ计工作应该��ݚ�证书���哪些。这�?012�뵮�就业前景��˸�分析�Є第一个方�Ǣ〱����Ǣ是我��解到�Є�ϸ计证比輩全����Є一些分类�ϸ1、上岗证', '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('31', '22', '0', '�뵮���⹉是什么？', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">�?监督和管��ش��ɡ的工作，主要内容有填制各种记账凭证，处��ش��ɡ，编制各种���关报表�Љ�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">�?担任�뵮�工作�Є人���Ӏɡ��</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">��˸���⹉���ϸ计是以货币为主要计量单位，采用一系列�̢���Є方法和��ɺ�，对经济交易或事项进行连续、系统、综������ݸ算和监�ԣ，提供经济信息，参与预��Ɇ��Ж的一�᫮�理活��?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">�뵮�是对一个单�᫚�经济活动进行确认、计量和报告，作出预测，叱���决策，实行监�ԣ，�ߨ在实现���佳经济效益的一�᫮�理活�ɨ�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">�뵮�可分财务�뵮�和管理�ϸ计两部分�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">财务�뵮�：编制财�ɡ报表，为企�벆�部和外部用户提供信息。财�ɡ�ϸ计的信息是提供广泛的用户。其�᫂�在于报告财务�Ӷ况和营运状况�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">管理�뵮���⸻要是对企业的管理层提供信息，作为企业内部各部门进行决�Ж的依据。没���标准的模��、不受�ϸ计���则的控制�?/p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; font-size: 14px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">�뵮��Є职能主要是反���和��制经济活�ɨ��程，保证�뵮�信息�Є合法、真实、���确和完整，为管理经济提供必要�Є财�ɡ资料，并参与决�Ж，谋求���佳的经济效益�?/p>', '85', '2017-05-10 22:53:19', '2017-05-10 22:53:19', '27.187.255.1', '1494427999n57', '0', '#333', '', '', '', '�뵮���⹉是什么？', '�?监督和管��ش��ɡ的工作，主要内容有填制各种记账凭证，处��ش��ɡ，编制各种���关报表�Љ。② 担任�뵮�工作�Є人���Ӏɡ����˸���⹉���ϸ计是以货币为主要计量单位，采用一系列�̢���Є方法和��ɺ�，对经济交易或事项进行连续、系统、综������ݸ算和监', '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('32', '22', '0', 'ERP系统中财�ɡ与�᫫�物流��成浅析', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none; font-size: 14px; line-height: 22px; font-family: Tahoma, Geneva, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">企业资源计划系统（ERP）是一种利用信息化�؋段将先进的企业管理理念�ƺ化�Є管理信息系统，用于实现跨地域、跨�벊�流程、甚���跨公司进行生产、财�ɡ等信息�Є实�߶管控。ERP系统中涵盖���售、生产、采购、财�ɡ、成���等��⸪�ɟ能模块，这些模块间�Є���度实�߶集成使财务�Є核算管理与�᫫��벊�紧密��쳻，使财务�Є计划、核算、分析延伸到企业各个�벊�部门�Є最���端，为企业�Є生产经营提供快�͟、���效的决策支持�?/p><p><img alt=\"ERPXT.jpg\" width=\"399\" height=\"220\" src=\"http://qxu1152210157.my3w.com/config/ueditor/php/upload/78081494428124.jpg\" style=\"margin: 0px; padding: 0px; list-style: none; border: none;\"/><br/>&nbsp;&nbsp;&nbsp; 在前端物流主要有以下几个模块与财�ɡ���度集成�ϸ�Ӏ售�ֽSD）、生产�ֽPP）、采购和��쭘管理（MM）〱����Ǣ���Կ�将��쐈在实施企��⿡息化过程中的一些弨得体伷����͐一介绍财务与这些模块的��成�͹，来说明财�ɡ模块是妱���完全融入企业整体流程中去�Є�?/p><p><br/>&nbsp;&nbsp;&nbsp; 我们先来设计一个�Ķ卿����벊�场景，将�顇�个模块联系起来�ϸ�Ґ客户需要定�?00吨某��ɷ��Є钢材，���Ѯ�需要预交款；���售人���뜨系统中对这����벊�创建一张���售订单，在订单录入时会检�ҥ自己的��쭘，若��캓内有足够�Є库��㼌且货物金额不超��信贷风��ָ�额，那�����接着�ݹ据计划�Є时间进行交货，发货和开票等后续处理；若此时没有足够�Є库��㼌生产部门就�ϸ创建生产订单组织生产。生产��程中如果需要外部采购一些�ʦ材料，那么系统�ϸ���动生成釴Ѵ�请求，采购部门的同事再��据采购请求决定是不是进行该�ʦ材料�Є采购等�Љ，���后�뵱�生产提供足够�Є库��㼌�Ӏ售这边就可以进行交货开票���?/p><p><br/></p>', '88', '2017-05-10 22:55:08', '2017-05-10 22:55:08', '27.187.255.1', '1494428108n4', '0', '#333', '', '', '', 'ERP系统中财�ɡ与�᫫�物流��成浅析', '企业资源计划系统（ERP）是一种利用信息化�؋段将先进的企业管理理念�ƺ化�Є管理信息系统，用于实现跨地域、跨�벊�流程、甚���跨公司进行生产、财�ɡ等信息�Є实�߶管控。ERP系统中涵盖���售、生产、采购、财�ɡ、成���等��⸪�ɟ能模块，这些模块间', '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('33', '22', '0', '个人�؀得税�Є税率是�벰��?, '<p><span style=\"overflow: hidden; font-size: 14px; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">个人�؀得税�ݹ据不同�Є征税项目，分别规定了三�ո��同的税率�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">1、工资、薪金所得，�͂用9级超额累进税率，按月��캳税所得额计算征税。该税率按个人月工资、薪金应税所得额划分级距，最�����级为45%，最低一级为5%，共9级�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">2、适用5级超额累进税率。适用按年计算、分���预缴税款的个体工商户的生产、经营所得和对企事业单位�Є���包经营、���租经营的全年��캳税所得额划分级距，最低一级为5%,��������级为35%，共5级�?nbsp;</span><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><br style=\"font-size: 14px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; font-size: 14px; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">3、比例税率。对个人�Є稿酬所得，�ɳ务报酬�؀得，特许权使用费�؀得，利息、股息、红利所得，财产租赁�؀得，财产转让�؀得，���然�؀得和其他�؀得，按次计算征收个人�؀得税，适用20%�Є比例税率。其中，对稿酬所得适用20%�Є比例税率，并按��캳税额减征30%；对�ɳ务报酬�؀得一次性收入畸高的、特高的，除�?0%征税外，��돯以实行加成征收，以���护合理的收入和限制不合理�Є收入�?nbsp;</span></p>', '197', '2017-05-10 22:55:31', '2017-05-10 22:55:31', '27.187.255.1', '1494428131n11', '0', '#333', '', '', '', '个人�؀得税�Є税率是�벰��?, '个人�؀得税�ݹ据不同�Є征税项目，分别规定了三�ո��同的税率�?nbsp;1、工资、薪金所得，�͂用9级超额累进税率，按月��캳税所得额计算征税。该税率按个人月工资、薪金应税所得额划分级距，最�����级为45%，最低一级为5%，共9级�?nbsp;2、适用', '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('34', '22', '0', '哪些人需要缴纴���人所得税�?, '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 7px 0px; list-style: none; border: 0px; line-height: 25px; white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">中国个人�؀得税�Є纳税义�ɡ人是在中国境内居住���所得的人，以�ǿ不在中国境内居住Կ�从中国境内取����؀得的个人，包括中�ƽ国内公民，在华取����؀得的外籍人员和港、澳、台同����?nbsp;<br/></p><h2 style=\"margin: 20px -10px 12px; padding: 7px 0px 8px 18px; list-style: none; border-style: solid none; border-width: 1px 0px; border-color: rgb(223, 241, 249); font-size: 16px; height: auto; font-family: tahoma, arial, 宋体; white-space: normal; color: rgb(51, 51, 51); clear: both; line-height: normal; background: rgb(244, 251, 255);\">（一）居民纳税义�ɡ人</h2><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none;\"><span style=\"overflow: hidden; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">在中�ƽ境内有�؀住所，或Կ�无住所Կ�在境内居住�?年的个人，是居民纳税义务人，应当�ؿ担�ߠ限纳税义务，即就其��⸭�ƽ境内和境外取����Є所得，依法缴纳个人�؀得税�?nbsp;</span><br style=\"white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><br style=\"white-space: normal; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\"/><span style=\"overflow: hidden; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">为���ة大对外交流，鼓�ɱ外�ո���͘来我国任职、嵯��，���着从宽、从简�Є�ʦ则，税法又作出规宷�ϸ对于在中�ƽ境内无住所，但是居住一年以�¦��年以下的个人，起来源于中�ƽ境外的�؀得，经主管税�ɡ机关批准，可以之久由中�ƽ境内公司、企��⻥及其他经济组织或Կ�个人支付的部分缴纳个人�؀得税；居住超过五年的个人，从第六年起，应��찱其来源于中国境外�Є全部所得缴纴���人所得税�?nbsp;</span><br/></p><h2 style=\"margin: 20px -10px 12px; padding: 7px 0px 8px 18px; list-style: none; border-style: solid none; border-width: 1px 0px; border-color: rgb(223, 241, 249); font-size: 16px; height: auto; font-family: tahoma, arial, 宋体; white-space: normal; color: rgb(51, 51, 51); clear: both; line-height: normal; background: rgb(244, 251, 255);\">（二）非居民纳税义务�?/h2><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style: none; border: none;\"><span style=\"overflow: hidden; color: rgb(51, 51, 51); font-stretch: normal; line-height: 25px; font-family: tahoma, arial, 宋体; background-color: rgb(255, 255, 255);\">在中�ƽ境内无住所又不居住或者无住所Կ�在境内居住不满一年的个人，是�Ǟ居民纳税义�ɡ人，���担有限纳税义�ɡ，仅就其从中国境内取����Є所得，依法缴纳个人�؀得税�?/span></p><h3 class=\"titleMain titleMain-b red\" style=\"margin: 0px; padding: 0px; list-style: none; border-style: solid none dotted; border-top-width: 1px; border-bottom-width: 1px; border-top-color: rgb(221, 221, 221); border-bottom-color: rgb(204, 204, 204); font-size: 12px; line-height: 60px;\"><span class=\"txt pl10\" style=\"overflow: hidden; float: none; font-size: 18px; font-family: &#39;Microsoft YaHei&#39;; display: block; position: relative; top: -1px;\">�͹���排行�?/span></h3><ul class=\"newsRankList newsRankList-in list-paddingleft-2\" style=\"list-style-type: none;\"><li><p><a href=\"http://www.shanxuet.com/zixun/hyzh/2017-05-03/146.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">生成ISO�Є一些技�?/a></p></li><li><p><a href=\"http://www.shanxuet.com/zixun/erpzs/40.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">ERP系统中财�ɡ与�᫫�物流��成浅析</a></p></li><li><p><a href=\"http://www.shanxuet.com/zixun/erpxx/2017-04-19/90.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">用友T3取消正常单据记账</a></p></li><li><p><a href=\"http://www.shanxuet.com/zixun/erpzx/68.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">妱���制定人力资源管理制度�?/a></p></li><li><p><a href=\"http://www.shanxuet.com/zixun/erpss/2017-04-19/106.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">�ݸ算项目妱���增加二级部门</a></p></li><li><p><a href=\"http://www.shanxuet.com/zixun/erpzx/54.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">企业管理�Є主要内容和职能是什么？</a></p></li><li><p><a href=\"http://www.shanxuet.com/zixun/erpss/2017-04-19/97.html\" target=\"_blank\" style=\"text-decoration: none; color: rgb(89, 89, 89); overflow: hidden; float: left; height: 24px; line-height: 24px; margin-top: 5px; text-overflow: ellipsis; white-space: nowrap; width: 248px;\">�����license��ɐ�下载license引入产品，未显示�؀���产品的模块信息</a></p></li><li><p><br/></p></li></ul>', '16', '2017-05-10 22:55:59', '2017-05-10 22:55:59', '27.187.255.1', '1494428159n71', '0', '#333', '', '', '', '哪些人需要缴纴���人所得税�?, '中国个人�؀得税�Є纳税义�ɡ人是在中国境内居住���所得的人，以�ǿ不在中国境内居住Կ�从中国境内取����؀得的个人，包括中�ƽ国内公民，在华取����؀得的外籍人员和港、澳、台同����?nbsp;（一）居民纳税义�ɡ人在中�ƽ境内有�؀住所，或Կ�无住所Կ�在', '0', '0', '0', null);
INSERT INTO `yjcode_news` VALUES ('36', '0', '0', null, null, '29', '2017-05-11 19:18:11', '2017-05-11 19:18:11', '27.187.255.1', '1494501491n15', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('39', '0', '0', null, null, '158', '2017-05-13 12:24:50', '2017-05-13 12:24:50', '127.0.0.1', '1494649490n18', '0', null, '', '', '', null, null, '99', '0', null, null);
INSERT INTO `yjcode_news` VALUES ('40', '0', '0', null, null, '90', '2017-05-13 12:25:13', '2017-05-13 12:25:13', '127.0.0.1', '1494649513n84', '0', null, '', '', '', null, null, '99', '0', null, null);

-- ----------------------------
-- Table structure for yjcode_newspj
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_newspj`;
CREATE TABLE `yjcode_newspj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsbh` char(50) DEFAULT NULL,
  `fbuserid` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `txt` text,
  `hf` text,
  `hfsj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_newspj
-- ----------------------------
INSERT INTO `yjcode_newspj` VALUES ('1', '1492861846n96', '0', '1', '2017-04-25 00:01:43', '119.0.167.80', '没���病老铁', '', null, '0');

-- ----------------------------
-- Table structure for yjcode_newstype
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_newstype`;
CREATE TABLE `yjcode_newstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_newstype
-- ----------------------------
INSERT INTO `yjcode_newstype` VALUES ('22', '税务财务', null, '1', '3', '2017-05-10 22:41:50');
INSERT INTO `yjcode_newstype` VALUES ('23', '�?�?�?, null, '1', '4', '2017-05-10 22:41:56');

-- ----------------------------
-- Table structure for yjcode_onecontrol
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_onecontrol`;
CREATE TABLE `yjcode_onecontrol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  `tyid` int(11) DEFAULT NULL,
  `txt` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_onecontrol
-- ----------------------------
INSERT INTO `yjcode_onecontrol` VALUES ('1', '2017-05-13 12:28:30', '1', '<p><strong>尊敬�Є用户�ϸ��好�?/strong></p><p>欢迎光湘琴源���网（www.xqwzjs.cn）网站�ֽ以下简称′ל�站”Ｖ�?/p><p>用户需要同�׏本���务条款�؍能成为���站�Є注册用户并享嵯���网站所提供�Є各项服�ɡ。用户注册是完全免费�Є，继续注册前请先阅读服�ɡ��款�?/p><p><br/></p><p><strong>1. ���站���务条款确认与接�?/strong></p><p>�����议是用户（您）与���站之间�Є��议，���站依据�����议��款为��提供服�ɡ�?/p><p>1.1 �����议服�ɡ��款构成您（无论是个人或者单位Ｖ使用���站�؀提供���务��Ʌ�决��件。如��不同意�����议服�ɡ��款或其随�߶对其的修改，您应不使用或主�ɨ取消本站提供的���务。您�Є使用行为将被视为您对本协议���务条款及其随时修改版本�Є��全接受��</p><p>1.2 这些条款可由���站随时��新，且毋须另行�͚知〱���改后�Є服�ɡ��款一�ߦ在���站上公布即取代���ʦ来的���务条款，并构成�����款整��˹�一部分。您可随�߶访问本站查�օ最新的���务条款�?/p><p><br/></p><p><strong>2. ���站提供�Є服��?/strong></p><p>2.1 ���站向您提供包括但不限于妱������务�?/p><p>�?）本站主页www.719xi.com�����其他任何由本站直接所���或运营�Є任使���站Ｖ�?nbsp;</p><p>�?）本�顈�用直接拥���或运营�Є服�ɡ器、为��提供的信息网络��남空间�?nbsp;</p><p>�?）本站网��盟�ֽ包括其他第三方网站Ｖ�?nbsp;</p><p>�?）本站提供给��的任何其他技���和/或服�ɡ�?/p><p>���站仅��据您�Є指令，提供信息网络��남空间（或信息登记）�ǿ相关平台���务，本身不直接�¦�������布Ｖ任何内容。您利用���站���务�¦���Є内容包括但不限于文档�ֽ文字）、图片、音视频课件�Љ，��担保对利用���站���务�¦��、传播的内容负全部法律责任�?/p><p>2.2 ��在此明确陈述并保证对所���上传、传播到���站上的内容，拥���或取���了所���必要的权利并���担全部的法律责任，包括但不限于�ϸ��有权或已取得必要的许可、授权、���许来使用或授权本站使用所���与�¦��作品���关�Є所���专利、商�݇、商业秘密、版权、表演者权及其他私���权利��</p><p>2.3 对所���上传�߿���站�Є内容�ֽ��在此���证已�Ƿ���权利人的明确授权），��在此同�׏授予本�顯��؀���上述作品和内容�Є在全球���围内的免费、不可撤�Ӏ�Є、无限期�Є、并且可转让�Є非��家使用权许可�����站���权视情况展示、散布�ǿ推广前述内容，有权对前述内容进行任何形���Є复制、修改、出版、发行�ǿ以其他方式使用或Կ�授��ݬ�三方进行复制、修改、出版、发行�ǿ以其他方式使</p><p>用��<br/></p><p>2.4 ���站并不担�����所���上传内容能够�뵱����站���务为其他用户所�Ƿ取、浏览，���站没有义务和责任对�؀���您�¦��、传播的内容进行监测；但���站保留�ݹ据�ƽ家法律、法规的要求对上传、传播的内容进行不定�߶抽�ҥ的权利，并���权在不��Ʌ��͚知�Є情况下移除�Ƿ断开�о接违法、侵��ݚ�内容。此款的规定并不排除��对�¦��内容�Є版权担保，亦并�Ǟ表明本站有责任及能�ɛ判断您�¦��内容�Є版权归�?�?/p><p><br/></p><p><strong>3. 用户注册</strong></p><p>如果��使用本站提供的网络��남空间进行资料�¦��、传播服�ɡ，��需要注册一个账号、密���，并确保注册信息的真实��、正确性�ǿ完整��，如果上述注册信息发生��댖，您应�ǿ�߶更改。在安全完成���服�ɡ的登记��ɺ�并收到一个密����ǿ账��后，��应维持密码及账号的���密安全。您应对任何人利用您�Є密����ǿ账���؀进行�Є活�ɨ负完全�Є责任，���站�ߠ法对非法或���经��授权使用您账���?/p><p>密码�Є行为做出甄别，�Ơ此���站不���担任何责任。在此，��同�׏并�ؿ诺��번��?br/></p><p>3.1 当您�Є密���或账���ϭ到���获授权�Є使用，或者发生其他任何安全问题时，您会立即有������͚知到本站��</p><p>3.2 当您每次登录���站或使用其他相关服�ɡ后，�ϸ将有关账号等安全�̀出��</p><p>3.3 ��同�׏接受本站�뵱�电子�̮件、客户端、网页或其他合法方��向您发送相关商��⿡息。在使用电信增值服�ɡ的情况下，��同�׏接受本��ǿ其合作公司�뵱�增值服�ɡ系统或其他方��向您发送的相关���务信息或其他信息，其他信息包括但不限于�͚知信息、宣传信息、广��¦��息等�?/p><p>3.4 �����诺不在注册、使用本��ﴦ号时从事��Ɉ�行为�?/p><p>�?�?故意冒用他人信息为自己注册本��ﴦ号��&nbsp;</p><p>�?�?���经他人合法授权以他人名义注册本��ﴦ号��</p><p>�?�?使用侮辱、诽谤、色情等违反公序良�֯�Є词语注册本��ﴦ号�?/p><p>3.5 ��在此同�׏，���站���权�ݹ据���己�Є判宷���对����ո��述��款的用户拒绝提供账��注册或取消该账���Є使用��</p><p>3.6 ���站保证，您提供给本站的�؀���注册信息将�ݹ据���站隐私保护政策予以保密，但�ݹ据�ƽ家法律强制��要汱���以披露的除外�?/p><p><br/></p><p><strong>4. 用户行为与����?/strong></p><p>��单�����担发布内容的责任。您对服�ɡ的使用是��据所���适用于服�ɡ的地方法律、国家法��ɒ��ƽ�̨法律�݇����Є�?/p><p>用户�ؿ诺�?/p><p>4.1 在本站的网页上发布信息或Կ�利用本站的���务�߶必须符合中�ƽ有关法规，不���在本站的网页上或Կ�利用本站的���务制作、复制、发布、传播以下信息�ϸ</p><p>�?）反对宪法所确定�Є基����ʦ则的�?/p><p>�?）危害国家安全，泄露�ƽ家��믆，颠覆国家���权，���坏�ƽ家统一�Є��</p><p>�?）损害国家���誉和利益�Є��</p><p>�?）煽�ɨ民�ߏ仇恨、民�ߏ歧视，���坏民族�Ƣ结�Є��</p><p>�?）破坏国家宗教����Ж，宣扬�̪教和封建迷信的�?/p><p>�?）散布谣言，扰乱社会秩序，���坏社�ϸ稳定�Є��</p><p>�?）散布淫秽、色情、赌博、暴�ɛ、凶杀、恐��或Կ�教唆犯罪的�?/p><p>�?）侮辱或Կ�诽谤他人，侵害他人合法��ݛ��Є��</p><p>�?）煽�ɨ非法集会、结社、游行、示娲���聚众扰乱社会秩序的�?/p><p>�?0）以�Ǟ法民间组织�ո��活动�Є��</p><p>�?1）含���法律、行政法规禁止的其他内容�Є�?/p><p>4.2 不利用本站的���务从事以下活动�?/p><p>�?）未经允许，进入计算���信息网绲׈�Կ�使用计算机信息网络资源�Є��</p><p>�?）未经允许，对计算机信息网络�ɟ能进行删除、修改或Կ�增�ɠ的�?nbsp;</p><p>�?）未经允许，对进入计算机信息网络中存储、处理或Կ�传输的数据和应用程序进行删除、修改或Կ�增�ɠ的�?/p><p>�?）故�׏制作、传播计算机病毒�Љ破坏性程序的�?/p><p>�?）其他危害计算机信息网络安全�Є行为�?/p><p>4.3 �ϵ守���站�Є所���其他规�벒���ɺ��?/p><p><br/></p><p><strong>5. 隐私保护</strong></p><p>当您注册���站�Є服�ɡ时，您须提供个人信息。本站收��个人信息的目的是为��提供尽可能多的个人化网上服�ɡ。本站不�벜����经合法�Ƿ�����授权时，公开、编辑或�͏露��的个人信息�¦����뜨���站中的�Ǟ公开内容，除�Ǟ有��Ɉ�情况�?/p><p>�?）有关法律规定或���站合法���务��ɺ�规定�?nbsp;</p><p>�?）在紧急情况下，为维护���ǿ公众�Є权益��&nbsp;</p><p>�?）为维护���站�Є商�݇权、专利权及其他任何合法权益��</p><p>�?）其他依法需要公开、编辑或�͏露个人信息�Є情况�?/p><p><br/></p><p><strong>6. 免责声明</strong></p><p>6.1���站���身�᫛�接上传、发布任何包括但不限于文档�ֽ文字）、图片、音视频课件�Љ内容。所���内容均由用户上传、发布，���站合理信赖内容�¦�������布ＶԿ�是ա�创作者或是已经征得���佲ם�人的同意并与著作权人就相关问��끚出��妥善处理。内容上传�ֽ发布）者担保对利用���站���务�¦��、传播的内容负全部法律责任，���站不负担任何责任�?/p><p>6.2 ���网�顏���ݚ�各类数字产品文档，访问者在���网�顏�表的观点以�ǿ以链接形式推��的其他网站内容，仅为提供更��⿡息以参考使用或Կ�学习交流，并不代表���网��蓼�͹，也不构成任何�Ӏ售建议�?/p><p>6.3以下情形导致�Є个人信息泄露，���站免责�?nbsp;</p><p>�?）���府部门、司法机关等依照法定��ɺ�要求���站披露个人资料�߶，���站将��据执法单�ո��要求或为公共安全之目�Є提供个人资料��&nbsp;</p><p>�?）由于用户将个人密码�͊知他人或与他人共享注册账户，由此导���的任何个人资料泄露�?nbsp;</p><p>�?）任使���于计算机问题、黑客攻击、计算机病毒侵入或发作、因政府管制Կ�造成�Є暂�߶性关闭等影响网络正常经营�Є不可抗�ɛ而造成�Є个人资料泄露、丢失、被盗用或被窲ה��Љ��&nbsp;</p><p>�?）由于与���站�о接�Є其他网站所�͠成之个人资料泄露��&nbsp;</p><p>6.4 ���站若因线路及本站��制范�ƴ外�Є硬件故隲׈�其它不可抗力Կ�导���暂���ל��ɡ，暂停���务���间给用户造成�Є一切损失，���站不���担任何法律责任�?/p><p>6.5 除本站注明之���务条款外，其他一切因使用���站Կ�引���之任何�׏外、疏忽、诽谤、版权或知识产权侵犯及其�؀�͠成�Є损失�ֽ包括�Ơ下载而感�ғ���脑病毒Ｖ，本站不�ؿ担任何法律责任�?nbsp;</p><p>6.6 为方便您使用，本站服�ɡ可能�ϸ提供与第三方�ƽ�̨互联网网站或资源进行�о接。除�Ǟ另���声明，���站�ߠ法对第三方网站���务进行控制，您�Ơ使用或依赖上述网站或资源所产生�Є损失或损害，本站不负担任何责任�?/p><p><br/></p><p><strong>7. 版权政策</strong></p><p>���站�ݹ据用户指令提供内容�¦��、传播的信息网络��남空间，我们充分尊重�ʦ创作Կ�的著作权和知识产权。��据�¦���ƽ人民共和国版权法》〲��¦��息网络传播权保护条例》〲��¦����콑著作权行政���护办法》等相关法律、法规的规定，本站针对网络侵权采取如下版权����Ж�ϸ</p><p>�?）本�顯�网络版权保护尽合理、审慎的义务，在���理由确信有任何明显侵犯任何第三人版��ݚ�内容��뜨�߶，���权�ո��先通知随时删除该侵权内容��</p><p>�?）在接到符合法定要求�Є版权通知�߶，迅速删除涉嫌侵权内容��</p><p>�?）采取必要的技���措施，尽量�ֲ止相同侵权内容�Є再次上传��</p><p>�?）对���证据证明反�ո��传侵权内容的用户随时���׭�提供网络��남空间�Є技���服�ɡ和信息发布���务�?/p><p><br/></p><p><strong>8. ���务终止</strong></p><p>8.1 ��同�׏本站有权基于其���行之考��，因任何理由，包括但不限于缺乏使用或���站认为��已经���反本协议�Є文字�ǿ精神，而终止您�Є账号或���务��Ʌ�部或任何部分，并将您在本站的���务内的任何内容�ɠ以移除并删除��</p><p>8.2 ��同�׏依�����议任何规定提供之���务，无需进行��Ʌ��͚知即可中断或终止，�����认并同意，本�顏���ɍ�关闭或删除您�Є账号�ǿ��账号中�؀���相兴���息�ǿ文件，�ǿ/或禁止继续使用前述文件或���站�Є服�ɡ�?/p><p>此外，您同意若本站的���务之使用被中断、终止或��的账��及相兴���息和文件被关闭、删除，���站对您或任使���三人均不�ؿ担任何责任�?/p><p><br/></p><p><strong>9. 其他</strong></p><p>请确认您已仔细阅读�����服�ɡ��款，接嵯���站���务条款全部内容，成为本站的正��用户。用户在享嵯���站���务�߶必须��全、严�ݼ遵守本���务条款�?nbsp;</p><p>���服�ɡ��款的�؀���解释权归本站所����?/p>');
INSERT INTO `yjcode_onecontrol` VALUES ('2', '2017-05-11 19:24:36', '2', '<h1 label=\"�݇题居左\" style=\"font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;\"><span style=\"font-size: 20px;\">平台概述</span></h1><p style=\"margin-top: 0px; margin-bottom: 16px; padding: 0px; list-style: none; border: none; font-size: 15px; color: rgb(68, 68, 68); line-height: 30px; font-family: &#39;Microsoft YaHei&#39;; white-space: normal; box-sizing: border-box;\">明佳巴巴��团�ߗ下全资公司闪学���⸓注于信息化中高端��，我公司是一家以培训、在线教��、课程�ү发为一体的高速发屿���科技公司，为广大客户提供优质�Є学习服�ɡ。闪学通是中国���大的信息化行业教程产品提供商，全职���级讲师与��쮶10几名，��职讲�?00�顐�，自成立之日起便密切关注社�ϸ技能需要，成功帮�ֶ十三万多学员实现��؇�我价���增长和就业，使学䷶Կ�能够适应工作环境，发挥个人�ǿ企业���大价����?/p><p style=\"margin-top: 0px; margin-bottom: 16px; padding: 0px; list-style: none; border: none; font-size: 15px; color: rgb(68, 68, 68); line-height: 30px; font-family: &#39;Microsoft YaHei&#39;; white-space: normal; box-sizing: border-box;\">我们�Є主要业�ɡ包括�ϸ信息化建设培训、信息化课程�번�、以及渠�ϓ策划与运营�?/p><p style=\"margin-top: 0px; margin-bottom: 16px; padding: 0px; list-style: none; border: none; font-size: 15px; color: rgb(68, 68, 68); line-height: 30px; font-family: &#39;Microsoft YaHei&#39;; white-space: normal; box-sizing: border-box;\">我们秉����؜为学员创造价���”的�ݸ弨价值观，并以“诚实、育人、创新、服�ɡ”为企业精神，�뵱����主创新和真诚服�ɡ为管理软件用户，技���，管理Կ�创�͠价����?/p>');
INSERT INTO `yjcode_onecontrol` VALUES ('3', '2017-05-11 19:34:54', '3', '<p><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">1、本站没义务向广�͊方提供站点流量统计，广�͊方可自行�뵱�第三方统计查看�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">2、不接弹窗广�͊，不接插件类、捆绑类广告及诱导性下载广�͊�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">3、广��¦��，先�ؓ款后上广告，广�͊按���支��㼌���站不欺骗，也不要���价，广告不做测试、也不���诺多少点击和效果、能给你带来�벰�利润�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">4、广�͊到���后系统���动拿下，客户如需续费请提前联系，���能及时续费���站将有权利预定�顅�他公司�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">5、本站为企业平台，投放广�͊可以开具正规普��벏�票，广告�᫧�出后不接受退款同�߶不能更换到其它�᫽�；洯个月可以免费��换广告词或�ƾ片3次�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">6、广�͊款到帐后开始投放广�͊，1个月起租，季��돯以在包月价格基础�¦���?�����惠，我们��밆给������客户赠�́免费广��¦���?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">7、广�͊大小不宜大�?0KB，广�͊如为FLASH�ݼ��请勿带声���特���ǿ鼠标移�����动弹窗特效，动��图片变化频率不能��快，以免影响浏览Կ�视觉�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">8、广�͊商�؀���的广告如有�벁�，或Կ�有人举报为骗子或骗子公司，如广�͊商没办法做出有效答复或解���，本站有权利ա�除广告并不给����̀款�?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">9、在广告投放过程中，如遇���站访问�ո��或其它故障影响广�͊正常投放，���站将对广告投放�߶间延����?/span><br style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">具体广告位�ǿ价格�?/span><a target=\"_blank;\" href=\"http://wpa.qq.com/msgrd?v=3&uin=2489614100&site=qq&menu=yes\" style=\"text-decoration: none; color: rgb(38, 132, 194); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">��쳻我们</a><span style=\"color: rgb(68, 68, 68); font-family: &#39;Microsoft YaHei&#39;; font-size: 15px; line-height: 30px; background-color: rgb(255, 255, 255);\">咨询.</span></p>');
INSERT INTO `yjcode_onecontrol` VALUES ('4', '2017-05-13 12:29:05', '4', '<p style=\"text-align: center;\">湘琴源码�?/p><p><a href=\"http://www.xqwzjs.cn\" _src=\"http://www.xqwzjs.cn\">www.xqwzjs.cn</a> </p><p>LINE511199479</p>');
INSERT INTO `yjcode_onecontrol` VALUES ('5', '2017-04-21 13:26:55', '5', '<h1 label=\"�݇题居中\" style=\"font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\"><span style=\"font-size: 18px;\"><strong style=\"margin: 0px auto; padding: 0px;\">&nbsp;隐私保护</strong></span></h1><p><br/></p><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Simsun; font-size: 12px; line-height: 28px; white-space: normal;\"><span style=\"font-size: 18px;\">当您注册���站�Є服�ɡ时，您须提供个人信息。本站收��个人信息的目的是为��提供尽可能多的个人化网上服�ɡ。本站不�벜����经合法�Ƿ�����授权时，公开、编辑或�͏露��的个人信息�¦����뜨���站中的�Ǟ公开内容，除�Ǟ有��Ɉ�情况�?/span></p><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Simsun; font-size: 12px; line-height: 28px; white-space: normal;\"><span style=\"font-size: 18px;\">�?）有关法律规定或���站合法���务��ɺ�规定�?nbsp;</span></p><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Simsun; font-size: 12px; line-height: 28px; white-space: normal;\"><span style=\"font-size: 18px;\">�?）在紧急情况下，为维护���ǿ公众�Є权益��&nbsp;</span></p><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Simsun; font-size: 12px; line-height: 28px; white-space: normal;\"><span style=\"font-size: 18px;\">�?）为维护���站�Є商�݇权、专利权及其他任何合法权益��</span></p><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Simsun; font-size: 12px; line-height: 28px; white-space: normal;\"><span style=\"font-size: 18px;\">�?）其他依法需要公开、编辑或�͏露个人信息�Є情况�?/span></p><p><br/></p>');
INSERT INTO `yjcode_onecontrol` VALUES ('6', '2017-04-21 13:21:54', '6', '<p style=\"white-space: normal;\"><strong>免责声明</strong></p><p style=\"white-space: normal;\">&nbsp;���站���身�᫛�接上传、发布任何包括但不限于文档�ֽ文字）、图片、音视频课件�Љ内容。所���内容均由用户上传、发布，���站合理信赖内容�¦�������布ＶԿ�是ա�创作者或是已经征得���佲ם�人的同意并与著作权人就相关问��끚出��妥善处理。内容上传�ֽ发布）者担保对利用���站���务�¦��、传播的内容负全部法律责任，���站不负担任何责任�?/p><p style=\"white-space: normal;\">&nbsp;���网�顏���ݚ�各类数字产品文档，访问者在���网�顏�表的观点以�ǿ以链接形式推��的其他网站内容，仅为提供更��⿡息以参考使用或Կ�学习交流，并不代表���网��蓼�͹，也不构成任何�Ӏ售建议�?/p><p style=\"white-space: normal;\">&nbsp;以下情形导致�Є个人信息泄露，���站免责�?nbsp;</p><p style=\"white-space: normal;\">�?）���府部门、司法机关等依照法定��ɺ�要求���站披露个人资料�߶，���站将��据执法单�ո��要求或为公共安全之目�Є提供个人资料��&nbsp;</p><p style=\"white-space: normal;\">�?）由于用户将个人密码�͊知他人或与他人共享注册账户，由此导���的任何个人资料泄露�?nbsp;</p><p style=\"white-space: normal;\">�?）任使���于计算机问题、黑客攻击、计算机病毒侵入或发作、因政府管制Կ�造成�Є暂�߶性关闭等影响网络正常经营�Є不可抗�ɛ而造成�Є个人资料泄露、丢失、被盗用或被窲ה��Љ��&nbsp;</p><p style=\"white-space: normal;\">�?）由于与���站�о接�Є其他网站所�͠成之个人资料泄露��&nbsp;</p><p style=\"white-space: normal;\">&nbsp;���站若因线路及本站��制范�ƴ外�Є硬件故隲׈�其它不可抗力Կ�导���暂���ל��ɡ，暂停���务���间给用户造成�Є一切损失，���站不���担任何法律责任�?/p><p style=\"white-space: normal;\">&nbsp;&nbsp;除本站注明之���务条款外，其他一切因使用���站Կ�引���之任何�׏外、疏忽、诽谤、版权或知识产权侵犯及其�؀�͠成�Є损失�ֽ包括�Ơ下载而感�ғ���脑病毒Ｖ，本站不�ؿ担任何法律责任�?nbsp;</p><p style=\"white-space: normal;\">&nbsp;为方便您使用，本站服�ɡ可能�ϸ提供与第三方�ƽ�̨互联网网站或资源进行�о接。除�Ǟ另���声明，���站�ߠ法对第三方网站���务进行控制，您�Ơ使用或依赖上述网站或资源所产生�Є损失或损害，本站不负担任何责任�?/p><p><br/></p>');
INSERT INTO `yjcode_onecontrol` VALUES ('7', '2014-10-30 16:58:10', '7', '<p>开店��议资料整理中�ئ�?/p>');
INSERT INTO `yjcode_onecontrol` VALUES ('8', '2014-11-02 14:00:30', '8', '<p>商品发布条款正在整理�?/p>');
INSERT INTO `yjcode_onecontrol` VALUES ('9', '2017-05-04 13:02:16', '9', '<p><img src=\"http://www.719xi.com/config/ueditor/php/upload/24211492760829.jpg\" title=\"交易规则.jpg\"/></p><ul class=\" list-paddingleft-2\" style=\"list-style-type: none;\"><li><h1 label=\"�݇题居左\" style=\"font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;\"><br/></h1></li><li><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px;\"><span style=\"margin: 0px auto -2px; padding: 0px 1px; font-weight: 700; float: left; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(255, 119, 0); font-size: 15px;\">发货方��</span></p></li><li><p><br/></p></li><li><p style=\"margin: 0px auto; padding: 0px;\"><strong style=\"margin: 0px auto; padding: 0px;\">���动�?/strong>在上方���隲ל��ɡ中�݇有���动发货�Є商品，�ո��后，将�ϸ���动收到来自卖家�Є商品获取�ֽ下载）链接��</p><p style=\"margin: 0px auto; padding: 0px;\"><strong style=\"margin: 0px auto; padding: 0px;\">���Ɋ��?/strong>���标���自�ɨ发货的�Є商品，�ո��后，卖家会收到邮件、短信提�Ē，也可��뵱�LINE或订单中�Є���话联系对方�?/p></li><li><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px;\"><span style=\"margin: 0px auto -2px; padding: 0px 1px; font-weight: 700; float: left; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(255, 119, 0); font-size: 15px;\">�̀款说�?/span></p></li><li><p style=\"margin: 0px auto; padding: 0px;\"><strong style=\"margin: 0px auto; padding: 0px;\">描述�?/strong>源码描述(含标�?与实际源���不一���的（例：描述PHP�Ϊ̨为ASP、描述的�ɟ能�Ϊ̨缺少、版���不符等）��</p><p style=\"margin: 0px auto; padding: 0px;\">2�?strong style=\"margin: 0px auto; padding: 0px;\">��줺�?/strong>���演示站�߶，与实际源���小�?00%一���的（但描述中有&quot;�ո��证��全一�ݷ、有��댖�Є可能�?quot;类似显���声明�Є除外Ｖ�?/p><p style=\"margin: 0px auto; padding: 0px;\">3�?strong style=\"margin: 0px auto; padding: 0px;\">发货�?/strong>���Ɋ�发货源码，在卖家���发货前，已申请�̀款的�?/p><p style=\"margin: 0px auto; padding: 0px;\">4�?strong style=\"margin: 0px auto; padding: 0px;\">���务�?/strong>卖家不提供安装服�ɡ或需额外收费�Є�ֽ但描述中���显著声明的除外）��</p><p style=\"margin: 0px auto; padding: 0px;\">5�?strong style=\"margin: 0px auto; padding: 0px;\">其他�?/strong>如质量方�Ǣ的硬性常规问题等�?/p><p style=\"margin: 0px auto; padding: 0px;\"><strong style=\"margin: 0px auto; padding: 0px; color: rgb(255, 102, 0);\">注�ϸ经核实符合上述任一，均支持�̀款，但��家���以积极解决问��눙除外〱�����˸��Є商品，卖家�ߠ法对描述进行修改！</strong></p></li><li><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px;\"><span style=\"margin: 0px auto -2px; padding: 0px 1px; font-weight: 700; float: left; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(255, 119, 0); font-size: 15px;\">注意事项</span></p></li><li><p><br/></p></li><li><p style=\"margin: 0px auto; padding: 0px;\">1、在���拍��ɉ�，双方在LINE上所商定�Є内容，亦可成为纠纷评判依据�������⸎描述冲突�߶，商定为���）��</p><p style=\"margin: 0px auto; padding: 0px;\">2、在商品同时���网站演示与�ƾ片��줺，且站演与图演不一���时，默认按�ƾ演作为纠纷评判依据（特别声明或���商定除外Ｖ�?/p><p style=\"margin: 0px auto; padding: 0px;\">3、在没有&quot;�ߠ任何正�̢��款依�?quot;�Є前提下，写��?quot;一�ߦ售出，榱���支持�̀�?quot;�Љ类似的声明，视为无�����明��</p><p style=\"margin: 0px auto; padding: 0px;\">4、���勇交��˺�生纠纷的几率�����，但请尽量����顦�聊天记录这样�Є��要信息，以防产生纠纷�߶便于互站介入快�͟处理�?/p></li><li><p style=\"margin-top: 2pt; margin-bottom: 0px; padding: 0px;\"><span style=\"margin: 0px auto -2px; padding: 0px 1px; font-weight: 700; float: left; border-bottom-width: 2px; border-bottom-style: solid; border-bottom-color: rgb(255, 119, 0); font-size: 15px;\">夕游声明</span></p></li><li><p><br/></p></li><li><p style=\"margin: 0px auto; padding: 0px;\"><span style=\"font-size: 15px; font-weight: bold;\">夕游�?/span>作为第三方中��ɹ�台，依据交易����������品描述、交��쉍商定�Є内容Ｖ来���障交易的安全�¦��卖双方的��ݛ��?/p><p style=\"margin: 0px auto; padding: 0px;\">2、非平台线上交易�Є项目，出现任何后果均与互站�ߠ关；无论��家以使���由要求线下交易的，请��쳻管理举报�?/p></li></ul>');

-- ----------------------------
-- Table structure for yjcode_openyue
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_openyue`;
CREATE TABLE `yjcode_openyue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yue` int(10) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_openyue
-- ----------------------------
INSERT INTO `yjcode_openyue` VALUES ('8', '12', '0');
INSERT INTO `yjcode_openyue` VALUES ('9', '24', '1000');
INSERT INTO `yjcode_openyue` VALUES ('10', '36', '3000');

-- ----------------------------
-- Table structure for yjcode_order
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_order`;
CREATE TABLE `yjcode_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `fhsj` datetime DEFAULT NULL,
  `oksj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  `selluserid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `orderbh` char(50) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `ddzt` char(15) DEFAULT NULL,
  `tksj` datetime DEFAULT NULL,
  `tkly` text,
  `tkjg` varchar(250) DEFAULT NULL,
  `tkoksj` datetime DEFAULT NULL,
  `txt` text,
  `tcv` varchar(200) DEFAULT NULL,
  `buyform` text,
  `tcid` int(10) DEFAULT NULL,
  `fhxs` int(10) DEFAULT NULL,
  `kdid` int(10) DEFAULT NULL,
  `kddh` char(50) DEFAULT NULL,
  `shdz` varchar(250) DEFAULT NULL,
  `yunfei` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_order
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_paykami
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_paykami`;
CREATE TABLE `yjcode_paykami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ka` varchar(220) DEFAULT NULL,
  `mi` text,
  `money1` float DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `ifok` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `usesj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_paykami
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_payreng
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_payreng`;
CREATE TABLE `yjcode_payreng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money1` float DEFAULT NULL,
  `type1` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `ddbh` varchar(100) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `ifok` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_payreng
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_pro
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_pro`;
CREATE TABLE `yjcode_pro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `mybh` char(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `ty1id` int(11) DEFAULT NULL,
  `ty2id` int(11) DEFAULT NULL,
  `ty3id` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `tysx` varchar(250) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` longtext,
  `djl` int(11) DEFAULT NULL,
  `xsnum` int(11) DEFAULT NULL,
  `kcnum` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `money3` float DEFAULT NULL,
  `yhxs` int(11) DEFAULT NULL,
  `yhsm` char(50) DEFAULT NULL,
  `yhsj1` datetime DEFAULT NULL,
  `yhsj2` datetime DEFAULT NULL,
  `ifxj` int(11) DEFAULT NULL,
  `iftuan` int(11) DEFAULT NULL,
  `pf1` float DEFAULT NULL,
  `pf2` float DEFAULT NULL,
  `pf3` float DEFAULT NULL,
  `iftj` int(11) DEFAULT NULL,
  `fhxs` int(11) DEFAULT NULL,
  `wpurl` varchar(250) DEFAULT NULL,
  `wppwd` char(50) DEFAULT NULL,
  `upf` char(50) DEFAULT NULL,
  `ysweb` varchar(250) DEFAULT NULL,
  `wdes` varchar(250) DEFAULT NULL,
  `wkey` varchar(250) DEFAULT NULL,
  `wppwd1` varchar(200) DEFAULT NULL,
  `ifuserdj` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_pro
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_profav
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_profav`;
CREATE TABLE `yjcode_profav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_profav
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_propj
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_propj`;
CREATE TABLE `yjcode_propj` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `selluserid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `pf1` int(11) DEFAULT NULL,
  `pf2` int(11) DEFAULT NULL,
  `pf3` int(11) DEFAULT NULL,
  `txt` text,
  `hf` text,
  `hfsj` datetime DEFAULT NULL,
  `orderbh` char(50) DEFAULT NULL,
  `pjlx` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_propj
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_prouserdj
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_prouserdj`;
CREATE TABLE `yjcode_prouserdj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `djname` char(50) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `zhi` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_prouserdj
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_qiandao
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_qiandao`;
CREATE TABLE `yjcode_qiandao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `jf` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_qiandao
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_qiandaojf
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_qiandaojf`;
CREATE TABLE `yjcode_qiandaojf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daynum` int(10) DEFAULT NULL,
  `jf` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_qiandaojf
-- ----------------------------
INSERT INTO `yjcode_qiandaojf` VALUES ('26', '1', '5');
INSERT INTO `yjcode_qiandaojf` VALUES ('27', '2', '8');
INSERT INTO `yjcode_qiandaojf` VALUES ('28', '3', '11');
INSERT INTO `yjcode_qiandaojf` VALUES ('29', '4', '14');
INSERT INTO `yjcode_qiandaojf` VALUES ('30', '5', '17');

-- ----------------------------
-- Table structure for yjcode_shdz
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_shdz`;
CREATE TABLE `yjcode_shdz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `add1` int(10) DEFAULT NULL,
  `add1v` char(50) DEFAULT NULL,
  `add2` int(10) DEFAULT NULL,
  `add2v` char(50) DEFAULT NULL,
  `add3` int(10) DEFAULT NULL,
  `add3v` char(50) DEFAULT NULL,
  `addr` varchar(250) DEFAULT NULL,
  `lxr` char(50) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `yb` char(50) DEFAULT NULL,
  `ifmr` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_shdz
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_shopfav
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_shopfav`;
CREATE TABLE `yjcode_shopfav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_shopfav
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_smsmail
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_smsmail`;
CREATE TABLE `yjcode_smsmail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(10) DEFAULT NULL,
  `fa` char(50) DEFAULT NULL,
  `tyid` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `txt` text,
  `tit` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_smsmail
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_smsmb
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_smsmb`;
CREATE TABLE `yjcode_smsmb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mybh` char(20) DEFAULT NULL,
  `txt` text,
  `mbid` char(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_smsmb
-- ----------------------------
INSERT INTO `yjcode_smsmb` VALUES ('1', '001', '验证����ϸ${yzm},��正在����ƞ密���，如果不是���人�ո��，请忽略此信息�?, 'SMS_62360119');
INSERT INTO `yjcode_smsmb` VALUES ('2', '002', '验证����ϸ${yzm},��正在进行�׹���解除绑宷���如果不是���人�ո��，请忽略此信息�?, 'SMS_62355150');
INSERT INTO `yjcode_smsmb` VALUES ('3', '003', '验证����ϸ${yzm},��正在进行�׹���绑宷���如果不是���人�ո��，请忽略此信息�?, 'SMS_62445099');
INSERT INTO `yjcode_smsmb` VALUES ('4', '004', '亲，���新订单啦！请尽快��彿����顏�货，购买商品为�ϸ${tit}', 'SMS_62455151');
INSERT INTO `yjcode_smsmb` VALUES ('5', '005', '�̀款通知：有买家进行了退款，商品单价${money1}元，数量${num}，请尽快登录网站处理', 'SMS_62490162');
INSERT INTO `yjcode_smsmb` VALUES ('6', '006', '验证����ϸ${yzm},��正在�뵱��؋机验证直接登录，如果不是本人操作，请忽略此信息�?, 'SMS_62445150');

-- ----------------------------
-- Table structure for yjcode_taocan
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_taocan`;
CREATE TABLE `yjcode_taocan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money1` float DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `probh` char(50) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `tit2` char(50) DEFAULT NULL,
  `fhxs` int(10) DEFAULT NULL,
  `wpurl` varchar(250) DEFAULT NULL,
  `wppwd` varchar(200) DEFAULT NULL,
  `upf` varchar(200) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `kcnum` int(10) DEFAULT NULL,
  `wppwd1` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_taocan
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_taocan_kc
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_taocan_kc`;
CREATE TABLE `yjcode_taocan_kc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `probh` char(50) DEFAULT NULL,
  `tcid` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `userid1` int(10) DEFAULT NULL,
  `ka` text,
  `mi` varchar(250) DEFAULT NULL,
  `ifok` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_taocan_kc
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_task
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_task`;
CREATE TABLE `yjcode_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `tit` varchar(250) DEFAULT NULL,
  `txt` text,
  `type1id` int(10) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `djl` int(10) DEFAULT NULL,
  `type2id` int(10) DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `money3` float DEFAULT NULL,
  `money4` float DEFAULT NULL,
  `lastsj` datetime DEFAULT NULL,
  `useridhf` int(10) DEFAULT NULL,
  `jgxs` int(10) DEFAULT NULL,
  `rwzq` int(10) DEFAULT NULL,
  `yxq` datetime DEFAULT NULL,
  `yjtx` int(10) DEFAULT NULL,
  `qqxs` int(10) DEFAULT NULL,
  `motxs` int(10) DEFAULT NULL,
  `yjfs` int(10) DEFAULT NULL,
  `money5` float DEFAULT NULL,
  `fj` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_task
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_taskhf
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_taskhf`;
CREATE TABLE `yjcode_taskhf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `uip` char(30) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `useridhf` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `txt` text,
  `ifxz` int(10) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `xgnum` int(10) DEFAULT NULL,
  `mybh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_taskhf
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_tasklog
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_tasklog`;
CREATE TABLE `yjcode_tasklog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `useridhf` int(10) DEFAULT NULL,
  `admin` int(10) DEFAULT NULL,
  `txt` text,
  `sj` datetime DEFAULT NULL,
  `fj` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_tasklog
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_tasktype
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_tasktype`;
CREATE TABLE `yjcode_tasktype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name1` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `admin` int(10) DEFAULT '1',
  `name2` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_tasktype
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_tixian
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_tixian`;
CREATE TABLE `yjcode_tixian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  `txyh` char(30) DEFAULT NULL,
  `txname` char(30) DEFAULT NULL,
  `txzh` char(50) DEFAULT NULL,
  `txkhh` char(50) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `sm` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_tixian
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_tk
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_tk`;
CREATE TABLE `yjcode_tk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `money1` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `tkoksj` datetime DEFAULT NULL,
  `selluserid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `probh` char(50) DEFAULT NULL,
  `tkly` text,
  `orderbh` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_tk
-- ----------------------------

-- ----------------------------
-- Table structure for yjcode_tp
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_tp`;
CREATE TABLE `yjcode_tp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tp` varchar(200) DEFAULT NULL,
  `type1` char(30) DEFAULT NULL,
  `iffm` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_tp
-- ----------------------------
INSERT INTO `yjcode_tp` VALUES ('22', '1494427729n24', 'upload/news/20170510/1494427729n24/1494427762.jpg', '资讯', '1', '2017-05-10 22:49:22', '0', '1');
INSERT INTO `yjcode_tp` VALUES ('23', '1494427826n15', 'upload/news/20170510/1494427826n15/1494427856.jpg', '资讯', '1', '2017-05-10 22:50:56', '0', '1');

-- ----------------------------
-- Table structure for yjcode_type
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_type`;
CREATE TABLE `yjcode_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `type1` char(50) DEFAULT NULL,
  `type2` char(50) DEFAULT NULL,
  `type3` char(50) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `col` char(30) DEFAULT NULL,
  `iftj` int(10) DEFAULT NULL,
  `buyform` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_type
-- ----------------------------
INSERT INTO `yjcode_type` VALUES ('37', '1', '网站建设', null, null, '1', '2017-03-03 15:25:36', '#333', '0', null);
INSERT INTO `yjcode_type` VALUES ('79', '1', '�ɟ能组件', null, null, '2', '2017-03-22 17:33:04', '#333', '0', null);
INSERT INTO `yjcode_type` VALUES ('80', '1', '增值服��?, null, null, '3', '2017-03-22 17:33:13', '#333', '0', null);
INSERT INTO `yjcode_type` VALUES ('76', '2', '网站建设', '医院/奴���/���康', null, '8', '2017-03-06 17:00:06', null, null, '');
INSERT INTO `yjcode_type` VALUES ('75', '2', '网站建设', '小说/文章/文学', null, '7', '2017-03-06 17:00:00', null, null, '');
INSERT INTO `yjcode_type` VALUES ('74', '2', '网站建设', '聊天/交友/直播', null, '6', '2017-03-06 16:59:47', null, null, '');
INSERT INTO `yjcode_type` VALUES ('73', '2', '网站建设', '游戏/�ɨ漫/竞技', null, '4', '2017-03-06 16:59:34', null, null, '');
INSERT INTO `yjcode_type` VALUES ('72', '2', '网站建设', '电影/视频/������', null, '2', '2017-03-06 16:59:18', null, null, '');
INSERT INTO `yjcode_type` VALUES ('71', '2', '网站建设', 'LINE�Ǟ主�?�ƾ片', null, '1', '2017-03-06 16:59:02', null, null, '');
INSERT INTO `yjcode_type` VALUES ('53', '2', '网站建设', '导航/网址/�ҥ询', null, '13', '2017-03-06 16:52:46', null, null, '');
INSERT INTO `yjcode_type` VALUES ('54', '2', '网站建设', '��뮢/网店/商城', null, '14', '2017-03-06 16:53:09', null, null, '');
INSERT INTO `yjcode_type` VALUES ('55', '2', '网站建设', '门户/新闻/资讯', null, '15', '2017-03-06 16:53:28', null, null, '');
INSERT INTO `yjcode_type` VALUES ('56', '2', '网站建设', '论坛/社区/问答', null, '16', '2017-03-06 16:53:43', null, null, '');
INSERT INTO `yjcode_type` VALUES ('57', '2', '网站建设', '二�׹/B２B/分类', null, '17', '2017-03-06 16:53:56', null, null, '');
INSERT INTO `yjcode_type` VALUES ('58', '2', '网站建设', '软件/下载/电脑', null, '18', '2017-03-06 16:54:12', null, null, '');
INSERT INTO `yjcode_type` VALUES ('59', '2', '网站建设', '�߅游/餐饮/票务', null, '19', '2017-03-06 16:54:28', null, null, '');
INSERT INTO `yjcode_type` VALUES ('60', '2', '网站建设', '房产/商铺/装修', null, '20', '2017-03-06 16:55:39', null, null, '');
INSERT INTO `yjcode_type` VALUES ('61', '2', '网站建设', '学校/��/人才', null, '21', '2017-03-06 16:55:51', null, null, '');
INSERT INTO `yjcode_type` VALUES ('62', '2', '网站建设', '财经/��票/金融', null, '22', '2017-03-06 16:56:03', null, null, '');
INSERT INTO `yjcode_type` VALUES ('63', '2', '网站建设', '企业/公司/政府', null, '1', '2017-03-24 21:41:32', null, null, '');
INSERT INTO `yjcode_type` VALUES ('64', '2', '网站建设', '行业/�ɞ公/系统', null, '24', '2017-03-06 16:56:25', null, null, '');
INSERT INTO `yjcode_type` VALUES ('65', '2', '网站建设', '�벮�/个人/blog', null, '25', '2017-03-06 16:56:36', null, null, '');
INSERT INTO `yjcode_type` VALUES ('66', '2', '网站建设', '体育/运动/赛事', null, '26', '2017-03-06 16:56:44', null, null, '');
INSERT INTO `yjcode_type` VALUES ('67', '2', '网站建设', '物流/快�?交�?, null, '27', '2017-03-06 16:56:52', null, null, '');
INSERT INTO `yjcode_type` VALUES ('68', '2', '网站建设', '域名/空间/建站', null, '28', '2017-03-06 16:57:00', null, null, '');
INSERT INTO `yjcode_type` VALUES ('69', '2', '网站建设', '汽车/二�׹/车行', null, '29', '2017-03-06 16:57:08', null, null, '');
INSERT INTO `yjcode_type` VALUES ('70', '2', '网站建设', 'Wap/微信/App', null, '30', '2017-03-06 16:57:10', null, null, '');
INSERT INTO `yjcode_type` VALUES ('81', '1', '实物交易', null, null, '4', '2017-05-13 15:17:27', '#333', '0', null);
INSERT INTO `yjcode_type` VALUES ('82', '1', '类别填充A', null, null, '5', '2017-05-13 15:17:47', '#333', '0', null);
INSERT INTO `yjcode_type` VALUES ('83', '1', '类别填充AB', null, null, '6', '2017-05-13 15:17:52', '#333', '0', null);

-- ----------------------------
-- Table structure for yjcode_typesx
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_typesx`;
CREATE TABLE `yjcode_typesx` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL,
  `name1` char(50) DEFAULT NULL,
  `name2` char(50) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `xh` int(11) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `ifjd` int(10) DEFAULT NULL,
  `ifzi` int(10) DEFAULT NULL,
  `ifsel` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_typesx
-- ----------------------------
INSERT INTO `yjcode_typesx` VALUES ('19', '37', '系统品牌', null, '1', '1', '2017-03-02 19:15:07', '0', '1', '1');
INSERT INTO `yjcode_typesx` VALUES ('20', '37', '开发语言', null, '1', '2', '2017-03-02 19:15:20', '0', '1', '1');
INSERT INTO `yjcode_typesx` VALUES ('21', '37', '数据�?, null, '1', '3', '2017-03-02 19:15:32', '0', '1', '1');
INSERT INTO `yjcode_typesx` VALUES ('22', '37', '系统品牌', '织梦', '2', '1', '2017-03-02 19:18:34', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('23', '37', '系统品牌', '帝国', '2', '2', '2017-03-02 19:18:43', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('24', '37', '系统品牌', '新云', '2', '3', '2017-03-02 19:18:49', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('25', '37', '系统品牌', '�ɨ易', '2', '4', '2017-03-02 19:18:55', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('26', '37', '系统品牌', '齐博', '2', '5', '2017-03-02 19:19:00', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('27', '37', '系统品牌', '杰奇', '2', '6', '2017-03-02 19:19:04', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('28', '37', '系统品牌', '苹果CMS', '2', '7', '2017-03-02 19:19:31', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('29', '37', '系统品牌', 'Discuz', '2', '8', '2017-03-02 19:19:37', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('30', '37', '系统品牌', 'Phpwind', '2', '9', '2017-03-02 19:19:53', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('31', '37', '系统品牌', 'Ecshop', '2', '10', '2017-03-02 19:20:01', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('32', '37', '系统品牌', 'WordPress', '2', '11', '2017-03-02 19:20:12', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('33', '37', '系统品牌', 'Maxcms', '2', '12', '2017-03-02 19:20:18', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('34', '37', '系统品牌', 'Phpcms', '2', '13', '2017-03-02 19:20:24', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('35', '37', '系统品牌', 'Thinkphp', '2', '14', '2017-03-02 19:20:28', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('36', '37', '系统品牌', 'Destoon', '2', '15', '2017-03-02 19:20:41', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('37', '37', '系统品牌', '其他', '2', '16', '2017-03-02 19:20:43', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('38', '37', '开发语言', 'ASP', '2', '1', '2017-03-02 19:21:35', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('39', '37', '开发语言', 'PHP', '2', '2', '2017-03-02 19:21:39', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('40', '37', '开发语言', 'NET', '2', '3', '2017-03-02 19:21:44', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('41', '37', '开发语言', 'Jsp', '2', '4', '2017-03-02 19:21:48', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('42', '37', '开发语言', 'HTML', '2', '5', '2017-03-02 19:21:53', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('43', '37', '开发语言', 'VC＋��', '2', '6', '2017-03-02 19:22:07', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('44', '37', '开发语言', 'Java', '2', '7', '2017-03-02 19:22:11', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('45', '37', '开发语言', 'VB', '2', '8', '2017-03-02 19:22:15', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('46', '37', '开发语言', 'object-c', '2', '9', '2017-03-02 19:22:21', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('47', '37', '开发语言', 'C�?, '2', '10', '2017-03-02 19:22:26', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('48', '37', '开发语言', 'Python', '2', '11', '2017-03-02 19:22:35', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('49', '37', '开发语言', '其他', '2', '12', '2017-03-02 19:22:46', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('50', '37', '数据�?, 'Access', '2', '1', '2017-03-02 19:23:47', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('51', '37', '数据�?, 'Mysql', '2', '2', '2017-03-02 19:23:57', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('52', '37', '数据�?, 'Mssql', '2', '3', '2017-03-02 19:24:08', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('53', '37', '数据�?, 'Oracle', '2', '4', '2017-03-02 19:24:20', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('54', '37', '数据�?, '��?, '2', '5', '2017-03-02 19:24:32', null, null, null);
INSERT INTO `yjcode_typesx` VALUES ('55', '37', '数据�?, '其他', '2', '6', '2017-03-02 19:24:36', null, null, null);

-- ----------------------------
-- Table structure for yjcode_update
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_update`;
CREATE TABLE `yjcode_update` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_update
-- ----------------------------
INSERT INTO `yjcode_update` VALUES ('11', '2017-04-30 21:47:37');

-- ----------------------------
-- Table structure for yjcode_user
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_user`;
CREATE TABLE `yjcode_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` char(40) DEFAULT NULL,
  `pwd` char(50) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `uip` char(40) DEFAULT NULL,
  `money1` float DEFAULT NULL,
  `jf` int(11) DEFAULT NULL,
  `nc` char(30) DEFAULT NULL,
  `mot` char(50) DEFAULT NULL,
  `ifmot` int(11) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `ifemail` int(11) DEFAULT NULL,
  `uqq` varchar(250) DEFAULT NULL,
  `weixin` char(50) DEFAULT NULL,
  `yxsj` datetime DEFAULT NULL,
  `openid` char(50) DEFAULT NULL,
  `ifqq` int(11) DEFAULT NULL,
  `djl` int(11) DEFAULT NULL,
  `shopname` char(50) DEFAULT NULL,
  `seokey` varchar(250) DEFAULT NULL,
  `seodes` varchar(250) DEFAULT NULL,
  `txt` text,
  `pm` int(11) DEFAULT NULL,
  `zt` int(11) DEFAULT NULL,
  `openshop` float DEFAULT NULL,
  `shopzt` int(11) DEFAULT NULL,
  `shopztsm` varchar(250) DEFAULT NULL,
  `getpwd` char(20) DEFAULT NULL,
  `bdmot` char(20) DEFAULT NULL,
  `bdemail` char(20) DEFAULT NULL,
  `txyh` char(30) DEFAULT NULL,
  `txname` char(30) DEFAULT NULL,
  `txzh` char(50) DEFAULT NULL,
  `txkhh` char(50) DEFAULT NULL,
  `zfmm` char(50) DEFAULT NULL,
  `sellmall` float DEFAULT NULL,
  `sellmyue` float DEFAULT NULL,
  `tjuserid` int(10) DEFAULT NULL,
  `sellbl` float DEFAULT NULL,
  `xinyong` int(10) DEFAULT NULL,
  `sfz` char(50) DEFAULT NULL,
  `sfzrz` int(10) DEFAULT '3',
  `sfzrzsm` varchar(250) DEFAULT NULL,
  `uname` char(40) DEFAULT NULL,
  `djmoney` int(10) DEFAULT '0',
  `pf1` float DEFAULT NULL,
  `pf2` float DEFAULT NULL,
  `pf3` float DEFAULT NULL,
  `baomoney` float DEFAULT NULL,
  `dqsj` datetime DEFAULT NULL,
  `userdj` char(40) DEFAULT NULL,
  `userdjdq` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_user
-- ----------------------------
INSERT INTO `yjcode_user` VALUES ('1', 'xx123456', '162dbd90747fe84dff2fbcb22e83ac96e78df997', '2017-05-14 13:24:50', '127.0.0.1', '0.5', '10', 'xx123456', null, '0', '3443543@qq.com', '0', '53324324', null, '2014-10-15 00:00:00', null, null, '0', null, null, null, null, '0', '1', '0', '0', null, null, null, null, null, null, null, null, '162dbd90747fe84dff2fbcb22e83ac96e78df997', '0', '0', '0', '0.9', null, null, '3', null, null, '0', null, null, null, '0', null, null, null);

-- ----------------------------
-- Table structure for yjcode_userdj
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_userdj`;
CREATE TABLE `yjcode_userdj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(20) DEFAULT NULL,
  `name1` char(40) DEFAULT NULL,
  `xh` int(10) DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `zhekou` float DEFAULT NULL,
  `money1` int(10) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  `jgdw` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_userdj
-- ----------------------------
INSERT INTO `yjcode_userdj` VALUES ('1', '1492335811d14', null, '1', '2017-04-16 17:43:31', null, null, '99', null);
INSERT INTO `yjcode_userdj` VALUES ('3', '1492356605d83', '���VIP�벑�', '2', '2017-05-10 11:18:45', '2.98', '298', '0', '0');
INSERT INTO `yjcode_userdj` VALUES ('4', '1492489059d17', null, '3', '2017-04-18 12:17:39', null, null, '99', null);
INSERT INTO `yjcode_userdj` VALUES ('5', '1492489163d22', null, '3', '2017-04-18 12:19:23', null, null, '99', null);
INSERT INTO `yjcode_userdj` VALUES ('6', '1492489182d11', '年VIP�벑�', '3', '2017-05-10 11:18:52', '1.88', '1880', '0', '1');
INSERT INTO `yjcode_userdj` VALUES ('9', '1494385618d50', null, '6', '2017-05-10 11:06:58', null, null, '99', null);
INSERT INTO `yjcode_userdj` VALUES ('10', '1494386011d89', '普���ϸ��?, '1', '2017-05-10 11:13:47', '10', '0', '0', '0');

-- ----------------------------
-- Table structure for yjcode_yunfei
-- ----------------------------
DROP TABLE IF EXISTS `yjcode_yunfei`;
CREATE TABLE `yjcode_yunfei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bh` char(50) DEFAULT NULL,
  `tit` char(50) DEFAULT NULL,
  `cityid` text,
  `money1` float DEFAULT NULL,
  `money2` float DEFAULT NULL,
  `sj` datetime DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `zt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yjcode_yunfei
-- ----------------------------
