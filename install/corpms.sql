-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 04 月 20 日 09:39
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
('QD-11-22', '网球社团', 1, 14, 2, '网球', '11112323', 30, 20);

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
(1, '超级管理员'),
(2, '管理员'),
(3, '社团负责人'),
(4, '普通会员');

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
-- 表的结构 `corp_moderator`
--

CREATE TABLE IF NOT EXISTS `corp_moderator` (
  `cid` char(8) NOT NULL COMMENT '社团编号',
  `uid` mediumint(8) NOT NULL COMMENT 'uid',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团';

--
-- 转存表中的数据 `corp_moderator`
--

INSERT INTO `corp_moderator` (`cid`, `uid`) VALUES
('QD-11-22', 4),
('QD-11-22', 2);

-- --------------------------------------------------------

--
-- 表的结构 `corp_note`
--

CREATE TABLE IF NOT EXISTS `corp_note` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户信息' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `corp_note`
--

INSERT INTO `corp_note` (`nid`, `uid`, `title`, `content`, `dateline`) VALUES
(27, 6, 'test', 'test', '2011-04-15 07:40:38'),
(22, 6, 'ss', 'dads', '2011-04-11 16:18:07'),
(25, 6, 'teet', 'ss', '2011-04-11 16:40:24'),
(26, 6, 'teet', 'ss', '2011-04-11 16:40:32');

-- --------------------------------------------------------

--
-- 表的结构 `corp_pubnotice`
--

CREATE TABLE IF NOT EXISTS `corp_pubnotice` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户信息' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `corp_pubnotice`
--

INSERT INTO `corp_pubnotice` (`nid`, `uid`, `title`, `content`, `dateline`) VALUES
(27, 6, 'test', '&nbsp;test', '2011-04-15 07:43:43'),
(28, 6, 'test', '&nbsp;afdsadsa', '2011-04-15 07:43:51'),
(29, 6, '', '', '2011-04-15 08:08:31'),
(30, 6, '喵~', '<strong>&nbsp;咪</strong>~', '2011-04-15 08:12:44'),
(31, 6, 'test', '&nbsp;test', '2011-04-15 08:13:10'),
(32, 6, 'test', '<h3 style="color: red; ">&nbsp;a<strong>dvcvvvv</strong>&nbsp;a<strong>dv</strong><span style="font-family: 楷体_GB2312; "><strong>cvvvv</strong>&nbsp;a<strong>dvcv<br />\r\nvvv</strong></span>&nbsp;a<strong>dvcvvvv</strong>&nbsp;a<strong>dvcvvvv</strong>&nbsp;a<strong>dv</strong><span style="font-size: larger; "><strong>cvvv<br />\r\nv</strong>&nbsp;a<strong>dvcv</strong></span><strong>vvv</strong></h3>', '2011-04-19 15:58:30');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户信息' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `corp_user`
--

INSERT INTO `corp_user` (`uid`, `username`, `sex`, `number`, `password`, `coid`, `mid`, `class`, `phone`, `gid`) VALUES
(10, 'admin', 1, '123456', 'b605e86d02eef8bfd0646f6a704c17c9', 1, 1, '2345', '12345678', 1),
(11, 'jml', 1, '123456', 'b605e86d02eef8bfd0646f6a704c17c9', 1, 1, '5677', '23235345645', 2),
(7, 'aaaa', 1, '123456', 'b605e86d02eef8bfd0646f6a704c17c9', 1, 1, '0906', '15054218192', 4),
(8, 'qq', 0, '123456', 'b605e86d02eef8bfd0646f6a704c17c9', 2, 2, '1234', '1234567', 3);

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

