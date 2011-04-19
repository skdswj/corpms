/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50128
Source Host           : localhost:3306
Source Database       : corpms

Target Server Type    : MYSQL
Target Server Version : 50128
File Encoding         : 65001

Date: 2011-04-19 16:31:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `corp_moderator`
-- ----------------------------
DROP TABLE IF EXISTS `corp_moderator`;
CREATE TABLE `corp_moderator` (
  `cid` char(8) NOT NULL COMMENT '社团编号',
  `uid` mediumint(8) NOT NULL COMMENT 'uid',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='社团';

-- ----------------------------
-- Records of corp_moderator
-- ----------------------------
INSERT INTO `corp_moderator` VALUES ('QD-11-22', '4');
INSERT INTO `corp_moderator` VALUES ('QD-11-22', '2');

-- ----------------------------
-- Table structure for `corp_note`
-- ----------------------------
DROP TABLE IF EXISTS `corp_note`;
CREATE TABLE `corp_note` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='用户信息';

-- ----------------------------
-- Records of corp_note
-- ----------------------------
INSERT INTO `corp_note` VALUES ('27', '6', 'test', 'test', '2011-04-15 07:40:38');
INSERT INTO `corp_note` VALUES ('22', '6', 'ss', 'dads', '2011-04-11 16:18:07');
INSERT INTO `corp_note` VALUES ('25', '6', 'teet', 'ss', '2011-04-11 16:40:24');
INSERT INTO `corp_note` VALUES ('26', '6', 'teet', 'ss', '2011-04-11 16:40:32');

-- ----------------------------
-- Table structure for `corp_pubnotice`
-- ----------------------------
DROP TABLE IF EXISTS `corp_pubnotice`;
CREATE TABLE `corp_pubnotice` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `dateline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='用户信息';

-- ----------------------------
-- Records of corp_pubnotice
-- ----------------------------
INSERT INTO `corp_pubnotice` VALUES ('27', '6', 'test', '&nbsp;test', '2011-04-15 07:43:43');
INSERT INTO `corp_pubnotice` VALUES ('28', '6', 'test', '&nbsp;afdsadsa', '2011-04-15 07:43:51');
INSERT INTO `corp_pubnotice` VALUES ('29', '6', '', '', '2011-04-15 08:08:31');
INSERT INTO `corp_pubnotice` VALUES ('30', '6', '喵~', '<strong>&nbsp;咪</strong>~', '2011-04-15 08:12:44');
INSERT INTO `corp_pubnotice` VALUES ('31', '6', 'test', '&nbsp;test', '2011-04-15 08:13:10');
INSERT INTO `corp_pubnotice` VALUES ('32', '6', 'test', '<h3 style=\"color: red; \">&nbsp;a<strong>dvcvvvv</strong>&nbsp;a<strong>dv</strong><span style=\"font-family: 楷体_GB2312; \"><strong>cvvvv</strong>&nbsp;a<strong>dvcv<br />\r\nvvv</strong></span>&nbsp;a<strong>dvcvvvv</strong>&nbsp;a<strong>dvcvvvv</strong>&nbsp;a<strong>dv</strong><span style=\"font-size: larger; \"><strong>cvvv<br />\r\nv</strong>&nbsp;a<strong>dvcv</strong></span><strong>vvv</strong></h3>', '2011-04-19 15:58:30');
