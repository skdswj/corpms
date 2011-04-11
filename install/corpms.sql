-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 04 月 11 日 09:45
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `corpms`
--

-- --------------------------------------------------------

--
-- 表的结构 `corp_college`
--

CREATE TABLE IF NOT EXISTS `corp_college` (
  `coid` tinyint(3) unsigned NOT NULL COMMENT '学院编号',
  `coname` varchar(20) NOT NULL COMMENT '学院名称',
  PRIMARY KEY (`coid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学院';

--
-- 转存表中的数据 `corp_college`
--

INSERT INTO `corp_college` (`coid`, `coname`) VALUES
(1, '信息学院'),
(2, '信电学院'),
(3, '外国语学院'),
(0, '校直属');

-- --------------------------------------------------------

--
-- 表的结构 `corp_corporation`
--

CREATE TABLE IF NOT EXISTS `corp_corporation` (
  `cid` char(8) NOT NULL COMMENT '社团编号',
  `cname` varchar(20) NOT NULL COMMENT '社团名称',
  `coid` tinyint(3) unsigned NOT NULL COMMENT '学院编号',
  `dues` float unsigned NOT NULL COMMENT '会费',
  `tid` tinyint(3) unsigned NOT NULL COMMENT '类型',
  `information` text NOT NULL COMMENT '社团简介',
  `others` text NOT NULL COMMENT '管理员添加',
  `maxnum` smallint(4) unsigned NOT NULL COMMENT '社团最大人数',
  `curnum` smallint(4) unsigned NOT NULL COMMENT '当前人数',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团';

--
-- 转存表中的数据 `corp_corporation`
--

INSERT INTO `corp_corporation` (`cid`, `cname`, `coid`, `dues`, `tid`, `information`, `others`, `maxnum`, `curnum`) VALUES
('QD-05-09', '静语计算机协会', 1, 20, 1, '静语计算机协会', '静语计算机协会', 300, 0),
('QD-11-22', '网球社团', 1, 1, 1, '网球', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `corp_duty`
--

CREATE TABLE IF NOT EXISTS `corp_duty` (
  `did` tinyint(2) unsigned NOT NULL,
  `dname` varchar(20) NOT NULL COMMENT '职务',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='职务';

--
-- 转存表中的数据 `corp_duty`
--

INSERT INTO `corp_duty` (`did`, `dname`) VALUES
(0, '无'),
(1, '会长'),
(2, '副会长');

-- --------------------------------------------------------

--
-- 表的结构 `corp_files`
--

CREATE TABLE IF NOT EXISTS `corp_files` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `description` varchar(100) NOT NULL,
  `originalname` varchar(100) NOT NULL,
  `savedir` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `corp_files`
--

INSERT INTO `corp_files` (`fid`, `date`, `description`, `originalname`, `savedir`) VALUES
(1, '2011-03-04 21:35:06', 'progit中文教程', 'progit.zh.pdf', 'upfiles/progit.zh.pdf137.pdf'),
(2, '2011-03-04 21:42:21', '', 'progit.zh.pdf', 'upfiles/progit.zh.pdf382.pdf'),
(3, '2011-03-04 21:43:00', '', 'progit.zh.pdf', 'upfiles/progit.zh.pdf102.pdf'),
(4, '2011-03-04 21:56:36', '考研资料', '统计.ods', 'upfiles/统计.ods137.ods');

-- --------------------------------------------------------

--
-- 表的结构 `corp_group`
--

CREATE TABLE IF NOT EXISTS `corp_group` (
  `gid` tinyint(1) unsigned NOT NULL COMMENT 'gid',
  `gname` varchar(20) NOT NULL COMMENT '用户组名',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组';

--
-- 转存表中的数据 `corp_group`
--

INSERT INTO `corp_group` (`gid`, `gname`) VALUES
(0, '超级管理员'),
(3, '普通会员'),
(2, '社团负责人'),
(1, '管理员');

-- --------------------------------------------------------

--
-- 表的结构 `corp_log`
--

CREATE TABLE IF NOT EXISTS `corp_log` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `uid` mediumint(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `motion` varchar(50) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `corp_log`
--

INSERT INTO `corp_log` (`lid`, `date`, `uid`, `username`, `motion`) VALUES
(1, '2011-03-05 15:55:15', 6, 'admin', '修改qqqq(学号1)的信息'),
(2, '2011-03-05 16:05:18', 6, 'admin', '修改qqqq(学号1)的信息');

-- --------------------------------------------------------

--
-- 表的结构 `corp_major`
--

CREATE TABLE IF NOT EXISTS `corp_major` (
  `mid` smallint(3) unsigned NOT NULL COMMENT '专业编号',
  `mname` varchar(20) NOT NULL COMMENT '专业名称',
  `coid` smallint(2) unsigned NOT NULL COMMENT '学院',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专业';

--
-- 转存表中的数据 `corp_major`
--

INSERT INTO `corp_major` (`mid`, `mname`, `coid`) VALUES
(1, '计算机科学与技术', 1),
(2, '信息与管理', 1),
(3, '数学', 1);

-- --------------------------------------------------------

--
-- 表的结构 `corp_type`
--

CREATE TABLE IF NOT EXISTS `corp_type` (
  `tid` tinyint(3) unsigned NOT NULL COMMENT '类型编号',
  `tname` varchar(20) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团类型';

--
-- 转存表中的数据 `corp_type`
--

INSERT INTO `corp_type` (`tid`, `tname`) VALUES
(1, '计算机类'),
(2, '英语类'),
(3, '舞蹈类'),
(4, '乒乓球'),
(5, '篮球'),
(6, '交际');

-- --------------------------------------------------------

--
-- 表的结构 `corp_user`
--

CREATE TABLE IF NOT EXISTS `corp_user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'uid',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `sex` tinyint(1) unsigned NOT NULL COMMENT '性别 0女 1男',
  `number` char(12) NOT NULL COMMENT '学号',
  `password` char(32) NOT NULL COMMENT '密码',
  `coid` tinyint(3) unsigned NOT NULL COMMENT '学院编号',
  `mid` smallint(3) unsigned NOT NULL COMMENT '专业',
  `class` varchar(10) NOT NULL COMMENT '班级',
  `phone` char(11) NOT NULL COMMENT '联系方式',
  `gid` tinyint(1) unsigned NOT NULL COMMENT '用户类型',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户信息' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `corp_user`
--

INSERT INTO `corp_user` (`uid`, `username`, `sex`, `number`, `password`, `coid`, `mid`, `class`, `phone`, `gid`) VALUES
(5, 'admin1', 0, '', 'b605e86d02eef8bfd0646f6a704c17c9', 0, 0, '', '', 0),
(2, 'sdf', 1, '0901051722', '99c6cf36db8253371f1468ae0d30d2a2', 1, 1, '0906', '15054218192', 4),
(4, 'qqqq', 1, '1', 'b605e86d02eef8bfd0646f6a704c17c9', 1, 1, '0906', '16777215', 3),
(6, 'admin', 1, '1', 'b605e86d02eef8bfd0646f6a704c17c9', 1, 1, '1', '158', 0);

-- --------------------------------------------------------

--
-- 表的结构 `corp_user_corporation`
--

CREATE TABLE IF NOT EXISTS `corp_user_corporation` (
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `cid` varchar(8) NOT NULL COMMENT '社团id',
  `did` tinyint(2) NOT NULL COMMENT '职务',
  `is_accept` tinyint(1) NOT NULL COMMENT '是否通过加入社团',
  PRIMARY KEY (`uid`,`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户社团对照表';

--
-- 转存表中的数据 `corp_user_corporation`
--

INSERT INTO `corp_user_corporation` (`uid`, `cid`, `did`, `is_accept`) VALUES
(2, 'QD-05-09', 1, 0),
(6, 'QD-11-22', 2, 0),
(6, 'QD-05-09', 1, 0);
