-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: Y-m-d H:i:s
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `taoyinyin`
--
CREATE DATABASE IF NOT EXISTS `taoyinyin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taoyinyin`;

-- --------------------------------------------------------

--
-- 表的结构 `tyy_admin`
--

CREATE TABLE IF NOT EXISTS `tyy_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(32) NOT NULL COMMENT '用户名',
  `passwd` char(32) NOT NULL COMMENT '密码,md532位',
  `lastip` varchar(16) DEFAULT NULL COMMENT '上次登录ip',
  `lasttime` int(10) unsigned DEFAULT NULL COMMENT '上次登录时间',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tyy_admin`
--

INSERT INTO `tyy_admin` (`aid`, `name`, `passwd`, `lastip`, `lasttime`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '127.0.0.1', NULL),
(6, 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tyy_attachment`
--

CREATE TABLE IF NOT EXISTS `tyy_attachment` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件id',
  `loc` varchar(260) NOT NULL COMMENT '附件相对地址',
  `name` varchar(64) NOT NULL COMMENT '文件名',
  `uid` int(10) unsigned NOT NULL,
  `uniqid` varchar(20) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='附件表' AUTO_INCREMENT=119 ;

--
-- 转存表中的数据 `tyy_attachment`
--

INSERT INTO `tyy_attachment` (`tid`, `loc`, `name`, `uid`, `uniqid`) VALUES
(109, './attachment/2014-12-03/547eb44a81593.ppt', 'matlab No.4 (1).ppt', 28, '547e728a3bd44'),
(110, './attachment/2014-12-03/547eb5e612a3f.ppt', 'Lesson9Applet.ppt', 28, '547e728a3bd44'),
(111, './attachment/2014-12-03/547eb70ccab01.ppt', 'matlab No.4.ppt', 28, '547e728a3bd44'),
(112, './attachment/2014-12-03/547ee2b8d7020.ppt', 'Lesson9Applet.ppt', 30, '547ee2040b8e1'),
(113, './attachment/2014-12-03/547ee3e5ce83e.ppt', 'matlab No.4 (2).ppt', 30, '547ee2040b8e1'),
(114, './attachment/2014-12-03/547ee40178f6b.ppt', 'matlab No.4 (2).ppt', 30, '547ee2040b8e1'),
(115, './attachment/2014-12-03/547ee4230bd03.ppt', 'matlab No.4 (2).ppt', 30, '547ee2040b8e1'),
(116, './attachment/2014-12-03/547ee468ef98b.ppt', 'Lesson9Applet.ppt', 30, '547ee2040b8e1'),
(117, './attachment/2014-12-03/547ee47e3ea5b.ppt', 'matlab No.4 (2).ppt', 30, '547ee2040b8e1'),
(118, './attachment/2014-12-03/547ee73b50016.ppt', 'matlab No.4.ppt', 30, '547ee2040b8e1');

-- --------------------------------------------------------

--
-- 表的结构 `tyy_option`
--

CREATE TABLE IF NOT EXISTS `tyy_option` (
  `oid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '设置id',
  `okey` varchar(128) NOT NULL COMMENT '设置名',
  `oval` text NOT NULL COMMENT '设置值',
  `osort` enum('int','str','obj') NOT NULL DEFAULT 'str' COMMENT '值类型，分整型、字符串和对象',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `okey` (`okey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='网站设置表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `tyy_option`
--

INSERT INTO `tyy_option` (`oid`, `okey`, `oval`, `osort`) VALUES
(1, 'site_name', '淘印印在线打印', 'str'),
(2, 'site_descript', 'O2O在线打印平台，专注于免费打印业务。', 'str'),
(3, 'site_keyword', '淘印印,在线打印,打印,o2o,免费打印', 'str'),
(4, 'root_email', 'master@taoyinyin.com', 'str'),
(5, 'icp_code', '备案号正在申请中。aaa', 'str'),
(6, 'stat_code', '&lt;script&gt;alert(1)&lt;/script&gt;&lt;img&gt;', 'str'),
(8, 'web_open', '1', 'int'),
(9, 'reg_open', '1', 'int'),
(10, 'print_open', '1', 'int'),
(11, 'site_url', 'http://www.taoyinyin.com/', 'str');

-- --------------------------------------------------------

--
-- 表的结构 `tyy_order`
--

CREATE TABLE IF NOT EXISTS `tyy_order` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `rcode` char(16) NOT NULL COMMENT '订单号',
  `order_uid` int(10) unsigned NOT NULL COMMENT '下单用户',
  `order_address` text NOT NULL COMMENT '订单配送地址',
  `order_sid` int(10) unsigned NOT NULL COMMENT '订单对应商户',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态,0提交,1已支付,2已完成,3用户取消',
  `attach` varchar(60) NOT NULL COMMENT '附件id（待打印内容）',
  `time` varchar(20) DEFAULT NULL COMMENT '下单时间',
  `order_money` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '总金额',
  `message` text NOT NULL COMMENT '用户留言',
  `finish_time` int(10) unsigned DEFAULT NULL COMMENT '完成订单的时间',
  `order_mobile` varchar(32) NOT NULL,
  `recvname` varchar(64) NOT NULL COMMENT '收件人姓名',
  `uniqid` varchar(20) NOT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `rcode` (`rcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='订单表' AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `tyy_order`
--

INSERT INTO `tyy_order` (`rid`, `rcode`, `order_uid`, `order_address`, `order_sid`, `status`, `attach`, `time`, `order_money`, `message`, `finish_time`, `order_mobile`, `recvname`, `uniqid`) VALUES
(48, 'tyy547eb48d08f07', 28, 'aaa', 0, 0, '109,', '1417589901', 0, 'gdd', 0, '21', '321', '547e728a3bd44'),
(49, 'tyy547eb711ca067', 28, 'aaa', 0, 0, '111,', '1417590545', 0, '', 0, '', '', '547e728a3bd44'),
(50, 'tyy547ee489eddc2', 30, 'aaa', 0, 0, '113,114,115,117,', '1417602186', 0, 'dsaf', 0, 'safd', 'fhdsjahjk', '547ee2040b8e1'),
(51, 'tyy547ee7453355c', 30, 'bbb', 0, 0, '118,', '1417602885', 0, 'asfs', 0, 'dassf', 'er', '547ee2040b8e1'),
(52, 'tyy547f240920cc1', 21, 'aaa', 0, 0, ',', '1417618441', 0, '', 0, '', '', '547efd88d5336'),
(53, 'tyy54dad9165c4c1', 18, 'aaa', 0, 0, ',', '1423628566', 0, '', 0, '', '', '54dad8f2c9583');

-- --------------------------------------------------------

--
-- 表的结构 `tyy_order_attach`
--

CREATE TABLE IF NOT EXISTS `tyy_order_attach` (
  `oaid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `oid` int(11) NOT NULL COMMENT '订单id',
  `aid` int(11) NOT NULL COMMENT '附件id',
  `file_num` int(11) NOT NULL COMMENT '打印份数',
  `paper_size` varchar(10) NOT NULL COMMENT '纸张大小',
  `paper_color` int(11) NOT NULL COMMENT '纸张颜色',
  `is_double` int(11) NOT NULL COMMENT '是否打印双面',
  `print_range` varchar(10) NOT NULL COMMENT '打印范围',
  `print_block` int(11) NOT NULL COMMENT '宫格数',
  PRIMARY KEY (`oaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='订单附件关系表' AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `tyy_order_attach`
--

INSERT INTO `tyy_order_attach` (`oaid`, `oid`, `aid`, `file_num`, `paper_size`, `paper_color`, `is_double`, `print_range`, `print_block`) VALUES
(18, 48, 109, 5, 'a4', 0, 2, '0', 4),
(19, 49, 111, 1, 'a4', 0, 2, '0', 4),
(20, 50, 117, 1, 'a4', 0, 2, '0', 4),
(21, 50, 117, 1, 'a4', 0, 2, '0', 4),
(22, 50, 117, 1, 'a4', 0, 2, '0', 4),
(23, 50, 117, 1, 'a4', 0, 2, '0', 4),
(24, 51, 118, 1, 'a4', 0, 2, '0', 4);

-- --------------------------------------------------------

--
-- 表的结构 `tyy_shop`
--

CREATE TABLE IF NOT EXISTS `tyy_shop` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商户id',
  `sname` varchar(64) NOT NULL COMMENT '登录用户名',
  `passwd` char(32) NOT NULL COMMENT '密码',
  `shopname` varchar(128) NOT NULL COMMENT '商户名称',
  `address` text COMMENT '地址',
  `mobile` varchar(16) NOT NULL COMMENT '电话',
  `boss` varchar(32) DEFAULT NULL COMMENT '联系人（可选）',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱（可选）',
  `money` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '账户下的余额',
  `detail` text COMMENT '介绍等详细信息',
  `used` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sname` (`sname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商户用户表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tyy_shop`
--

INSERT INTO `tyy_shop` (`sid`, `sname`, `passwd`, `shopname`, `address`, `mobile`, `boss`, `email`, `money`, `detail`, `used`) VALUES
(1, 'test', '4297f44b13955235245b2497399d7a93', '西电新综打印店a', '西电新综合楼一楼', '13322110011', '张三a', '123123@qq.com', 0, 'aaaaaaaaaxxxxxaawwww', 1),
(4, 'shop', '4297f44b13955235245b2497399d7a93', '1、2号楼打印店', '西电1、2号楼', '13322212311', '李四', '', 0, '', 1),
(5, 'shop2', '4297f44b13955235245b2497399d7a93', '新综打印店', '西电新综', '13212312312', '南岸', '', 0, '呵呵呵呵&lt;/textarea&gt;&lt;img src=1&gt;', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tyy_user`
--

CREATE TABLE IF NOT EXISTS `tyy_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `uname` varchar(12) NOT NULL COMMENT '用户名，即为手机',
  `passwd` char(32) NOT NULL COMMENT '密码，md5 32位',
  `nickname` varchar(20) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `major` varchar(30) NOT NULL,
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `school` varchar(128) DEFAULT NULL COMMENT '学校',
  `grade` varchar(8) DEFAULT NULL COMMENT '年级，如大一、大四、研一等',
  `point` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户积分',
  `vild_email` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否验证了邮箱',
  `vild_mobile` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否验证了手机号',
  `address` text COMMENT '地址',
  `regtime` int(10) unsigned DEFAULT NULL COMMENT '注册时间',
  `regip` varchar(16) DEFAULT NULL COMMENT '注册IP',
  `loginip` varchar(16) DEFAULT NULL COMMENT '上次登录IP',
  `logintime` int(10) unsigned DEFAULT NULL COMMENT '上次登录时间',
  `weixin_code` varchar(64) DEFAULT NULL COMMENT '微信唯一串',
  `vild_weixin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否验证了微信',
  `qq` varchar(16) DEFAULT NULL COMMENT 'QQ号',
  `website` varchar(64) DEFAULT NULL COMMENT '个人主页',
  `weixin` varchar(64) DEFAULT NULL COMMENT '微信号',
  `weibo` varchar(64) DEFAULT NULL COMMENT '新浪微博',
  `used` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用，默认是',
  `truename` varchar(64) DEFAULT NULL COMMENT '真实姓名',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`uname`),
  KEY `mobile` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `tyy_user`
--

INSERT INTO `tyy_user` (`uid`, `uname`, `passwd`, `nickname`, `sex`, `major`, `email`, `school`, `grade`, `point`, `vild_email`, `vild_mobile`, `address`, `regtime`, `regip`, `loginip`, `logintime`, `weixin_code`, `vild_weixin`, `qq`, `website`, `weixin`, `weibo`, `used`, `truename`) VALUES
(8, '13211112222', '4297f44b13955235245b2497399d7a93', '', 0, '', 'root@leavesongs.com', '按时打算的', '', 0, 0, 0, '自行车在线程执行从', 1417082440, '127.0.0.1', 'regip', 567567, NULL, 0, NULL, NULL, NULL, NULL, 1, ''),
(11, '14364565', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417197779, '127.0.0.1', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(12, '32134', 'c4ca4238a0b923820dcc509a6f75849b', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417198024, '127.0.0.1', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(13, '1', 'c4ca4238a0b923820dcc509a6f75849b', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417237166, '127.0.0.1', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(14, '11', 'c4ca4238a0b923820dcc509a6f75849b', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417237234, '127.0.0.1', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(17, '111', '698d51a19d8a121ce581499d7b701668', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 2014, '127.0.0.1', '127.0.0.1', 2014, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(18, '112', '7f6ffaa6bb0b408017b62254211691b5', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 2014, '127.0.0.1', '127.0.0.1', 1423628530, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(19, '122', 'a0a080f42e6f13b3a2df133f073095dd', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 2014, '127.0.0.1', '127.0.0.1', 2014, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(20, '131', '1afa34a7f984eeabdbb0a7d494132ee5', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417271020, '127.0.0.1', '127.0.0.1', 1417272052, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(21, '121', '4c56ff4ce4aaf9573aa5dff913df997a', '', 0, '', '', '', '0', 0, 0, 0, NULL, 1417274133, '127.0.0.1', '127.0.0.1', 1418352432, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(22, '2', 'c4ca4238a0b923820dcc509a6f75849b', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417277714, '127.0.0.1', '127.0.0.1', 1417277718, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(23, '32', 'c4ca4238a0b923820dcc509a6f75849b', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417277920, '127.0.0.1', '127.0.0.1', 1417286177, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(24, '125', 'd92e9cc5051723ab2bcff699ac5f14e6', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417323601, '127.0.0.1', '127.0.0.1', 1417323603, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(25, '1252', 'd92e9cc5051723ab2bcff699ac5f14e6', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417323862, '127.0.0.1', '127.0.0.1', 1417323868, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(26, '1242', '4297f44b13955235245b2497399d7a93', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417324023, '127.0.0.1', '127.0.0.1', 1417324031, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(27, '174378', '4297f44b13955235245b2497399d7a93', '', 0, '', NULL, NULL, NULL, 0, 0, 0, NULL, 1417347922, '127.0.0.1', '127.0.0.1', 1417347925, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(28, '131123456', 'e10adc3949ba59abbe56e057f20f883e', '会觉得好看21', 1, '专业', '5984979@423.hsfd', '学校', '0', 0, 0, 0, NULL, 1417533735, '127.0.0.1', '127.0.0.1', 1418352386, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL),
(30, '12390', 'e10adc3949ba59abbe56e057f20f883e', 'asfds', 0, 'dhsahjfk', '', 'safds', '0', 0, 0, 0, NULL, 1417601525, '127.0.0.1', '127.0.0.1', 1417601539, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
