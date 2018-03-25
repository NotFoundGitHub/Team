/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : team

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-25 18:55:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actlist`
-- ----------------------------
DROP TABLE IF EXISTS `actlist`;
CREATE TABLE `actlist` (
  `actId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '活动id',
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `actName` varchar(255) DEFAULT NULL,
  `actCollage` varchar(255) DEFAULT NULL,
  `endTime` varchar(255) DEFAULT NULL,
  `isEnd` tinyint(1) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actlist
-- ----------------------------
INSERT INTO `actlist` VALUES ('0000000016', '张三', '12345678900', '互联网+大赛', '学校', '2018-03-28', '0');
INSERT INTO `actlist` VALUES ('0000000017', '张三', '12345678900', '易班应用软件大赛', '信息学院', '2018-03-26', '0');
INSERT INTO `actlist` VALUES ('0000000018', '张三', '12345678900', '大学生科技创新训练', '', '2018-05-01', '0');

-- ----------------------------
-- Table structure for `detail`
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `name` varchar(255) DEFAULT NULL,
  `sid` varchar(255) NOT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `skill` text,
  `phone` varchar(255) DEFAULT NULL,
  `aid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`sid`,`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detail
-- ----------------------------
INSERT INTO `detail` VALUES ('张三', '2015112345', '信工电商153', '热心，比较积极', '18821704915', '16', '41');
INSERT INTO `detail` VALUES ('张三', '2015012751', '信工电商151', '擅长ps,web制作，参加过互联网+和科创', '12345678900', '16', '41');
INSERT INTO `detail` VALUES ('吴海松', '2017011533', '林学-林学175', '细心，耐心，吃苦，熟悉一部分办公软件', '17792513668', '16', '41');
INSERT INTO `detail` VALUES ('吴海松', '2017011533', '林学-林学175', '细心，耐心，吃苦，熟悉一部分办公软件', '17792513668', '16', '42');

-- ----------------------------
-- Table structure for `team`
-- ----------------------------
DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `tid` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `sid` varchar(255) DEFAULT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `QQ` varchar(255) DEFAULT NULL,
  `need` int(2) DEFAULT NULL,
  `note` text,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of team
-- ----------------------------
INSERT INTO `team` VALUES ('0000000041', '张三', '12345678900', '2015012751', '信工电商151', '1266666666', '4', '互联网+大赛队伍1，需要四名态度端正，能坚持做下去，文笔较好，能主动当队长，不要求会什么，会答辩就行。', '16');
INSERT INTO `team` VALUES ('0000000042', '张三', '12345678900', '2015012751', '信工电商151', '1266666666', '3', '项目2，项目已经做好，只需要写一些东西，然后找个老师就行了，只要愿意来就行，还有不能有三分热情，否则会被踢出团队。', '16');
INSERT INTO `team` VALUES ('0000000043', '张三', '12345678900', '2015012751', '信工电商151', '1266666666', '3', '需要有责任心的即可，三分热情一定会踢，只想参与不做事的踢', '17');
INSERT INTO `team` VALUES ('0000000044', '张三', '12345678900', '2015012751', '信工电商151', '1266666666', '4', '会ps，ppt的优先。', '17');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `sid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `skill` text,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2015012751', '张三', '12345678900', '信工电商151', '123456', '擅长ps,web制作，参加过互联网+和科创');
INSERT INTO `user` VALUES ('2015112345', '张三', '18821704915', '信工电商153', '12345', '热心，比较积极');

